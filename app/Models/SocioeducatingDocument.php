<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocioeducatingDocument extends Model
{
    protected $table = 'socioeducating_documents';

    protected $fillable = [
        'socioeducating_id',
        'cnj_guide_path',
        'mp_representation_path',
        'judicial_decision_path',
        'personal_doc_path',
        'forensic_exam_path',
        'detention_unit',
        'county',
        'applied_measure',
        'decision_date',
        'entry_date',
        'notes',
        'process_number',
        'execution_process_number'
    ];

        protected $casts = [
        'entry_date' => 'date',
    ];


    public function socioeducating()
    {
        return $this->belongsTo(Socioeducating::class);
    }
}
