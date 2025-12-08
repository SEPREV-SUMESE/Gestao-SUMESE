<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Socioeducating;
use App\Models\SocioeducatingDocument;

class SocioEducatingController extends Controller
{

    public function index(Request $request)
    {
        $query = Socioeducating::query();

        if($request->filled('search')){
            $search = $request->search;
            $query->where('full_name','like',"%$search%")
                ->orWhere('document_id','like',"%$search%");
        }

        $socioeducandos = $query->orderBy('full_name')->paginate(12);

        return view('socioeducating.index', compact('socioeducandos'));
    }


    public function register_step_1()
    {

        $breadcrumbs = [
            [
                'name' => 'Socioeducandos',
                'link' => route('socioeducating.index')
            ],
            [
                'name' => 'Identificação de Novo Socioeducando',
                'status' => true
            ]
        ];

    return view('socioeducating.register-step-1', compact('breadcrumbs'));
    }

public function register_step_1_store(Request $request)
{
    $validated = $request->validate([
        'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'full_name' => 'required|string|max:255',
        'social_name' => 'nullable|string|max:255',
        'birth_date' => 'required|date',
        'document_id' => 'required|string|max:255',
        'schooling' => 'nullable|string|max:255',
        'marital_status' => 'nullable|string|max:255',
        'gender_identity' => 'nullable|string|max:255',
        'sexual_orientation' => 'nullable|string|max:255',
        'race_color' => 'nullable|string|max:255',
        'weight_kg' => 'nullable|numeric',
        'height_cm' => 'nullable|numeric',
        'address' => 'nullable|string',
        'affiliation' => 'nullable|string|max:255',
        'contact' => 'nullable|string|max:255',
    ]);

    $data = $request->except('photo');

    if ($request->hasFile('photo')) {
        $data['photo_path'] = $request->file('photo')->store('photos', 'public');
    }

    if (isset($data['weight_kg']) && isset($data['height_cm'])) {
        $h = $data['height_cm'] / 100;
        $data['bmi'] = round($data['weight_kg'] / ($h * $h), 2);
    }

    $data['created_by'] = auth()->id();

    $socioeducating = Socioeducating::create($data);

    return redirect()->route('socioeducating.register_step_2', $socioeducating->id);
}

    public function register_step_2($id)
    {
        $breadcrumbs = [
            [
                'name' => 'Socioeducandos',
                'link' => route('socioeducating.index')
            ],
            [
                'name' => 'Identificação de Novo Socioeducando',
                'status' => true
            ]
        ];

        $socioeducating = Socioeducating::findOrFail($id);
        return view('socioeducating.register-step-2', compact('socioeducating','breadcrumbs'));
    }

    public function register_step_2_store(Request $request, $id)
    {
        $socioeducating = Socioeducating::findOrFail($id);

        $dataToSave = $request->only([
            'detention_unit', 'county', 'applied_measure', 'decision_date', 'entry_date',
            'notes', 'process_number', 'execution_process_number'
        ]);

        $fileFields = [
            'cnj_guide_path',
            'mp_representation_path',
            'judicial_decision_path',
            'personal_doc_path',
            'forensic_exam_path'
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $dataToSave[$field] = $request->file($field)->store('documents/' . $socioeducating->id, 'public');
            }
        }

        $dataToSave['socioeducating_id'] = $socioeducating->id;

        SocioeducatingDocument::create($dataToSave);

        return redirect()->route('socioeducating.index')->with('success', 'Cadastro completo!');
    }

    public function profile($id)
    {

        $socioeducando = Socioeducating::findOrFail($id);

        $breadcrumbs = [
            [
                'name' => 'Socioeducandos',
                'link' => route('socioeducating.index')
            ],
            [
                'name' => $socioeducando->full_name,
                'status' => true
            ]
        ];


        $socioeducando->load('documents');


        return view('socioeducating.profile', [
            'socioeducando' => $socioeducando, 'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function edit($id)
    {
        $socioeducating = Socioeducating::findOrFail($id);
        return view('socioeducating.edit', compact('socioeducating'));
    }

    public function update(Request $request, $id)
    {
        $socioeducating = Socioeducating::findOrFail($id);

        $validated = $request->validate([
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'full_name' => 'required|string|max:255',
            'social_name' => 'nullable|string|max:255',
            'birth_date' => 'required|date',
            'document_id' => 'required|string|max:255',
            'schooling' => 'nullable|string|max:255',
            'marital_status' => 'nullable|string|max:255',
            'gender_identity' => 'nullable|string|max:255',
            'sexual_orientation' => 'nullable|string|max:255',
            'race_color' => 'nullable|string|max:255',
            'weight_kg' => 'nullable|numeric',
            'height_cm' => 'nullable|numeric',
            'address' => 'nullable|string',
            'affiliation' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:255',
        ]);

        if($request->hasFile('photo')){
            $validated['photo_path'] = $request->file('photo')->store('photos','public');
        }

        if($validated['weight_kg'] && $validated['height_cm']){
            $h = $validated['height_cm']/100;
            $validated['bmi'] = round($validated['weight_kg']/($h*$h),2);
        }

        $socioeducating->update($validated);

        return redirect()->route('socioeducating.documents.edit', $socioeducating->id)
                         ->with('success','Dados pessoais atualizados!');
    }

    public function editDocuments($id)
    {
        $socioeducating = Socioeducating::findOrFail($id);
        $documents = $socioeducating->documents;
        return view('socioeducating.documents_edit', compact('socioeducating','documents'));
    }

    public function updateDocuments(Request $request, $id)
    {
        $socioeducating = Socioeducating::findOrFail($id);
        $documents = $socioeducating->documents;

        $data = $request->only([
            'detention_unit','county','applied_measure','decision_date','entry_date',
            'notes','process_number','execution_process_number'
        ]);

        foreach([
            'cnj_guide_path',
            'mp_representation_path',
            'judicial_decision_path',
            'personal_doc_path',
            'forensic_exam_path'
        ] as $field){
            if($request->hasFile($field)){
                $data[$field] = $request->file($field)->store('documents','public');
            } else {
                $data[$field] = $documents ? $documents->$field : null;
            }
        }

        $data['socioeducating_id'] = $socioeducating->id;

        if($documents){
            $documents->update($data);
        } else {
            SocioeducatingDocument::create($data);
        }

        return redirect()->route('socioeducating.index')->with('success','Documentos atualizados!');
    }
}
