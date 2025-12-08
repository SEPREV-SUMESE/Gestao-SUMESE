<form action="{{ route('socioeducating.documents.update',$socioeducating->id) }}" method="POST" enctype="multipart/form-data">
 @csrf
 @method('PUT')

 <h3>Documentos</h3>
 <label>Guia CNJ</label><input type="file" name="cnj_guide_path">
 @if($documents && $documents->cnj_guide_path)
   <a href="{{ asset('storage/'.$documents->cnj_guide_path) }}" target="_blank">Ver atual</a>
 @endif

 <label>Representação MP</label><input type="file" name="mp_representation_path">
 @if($documents && $documents->mp_representation_path)
   <a href="{{ asset('storage/'.$documents->mp_representation_path) }}" target="_blank">Ver atual</a>
 @endif

 <label>Sentença/Decisão Judicial</label><input type="file" name="judicial_decision_path">
 @if($documents && $documents->judicial_decision_path)
   <a href="{{ asset('storage/'.$documents->judicial_decision_path) }}" target="_blank">Ver atual</a>
 @endif

 <label>Documento de Identificação</label><input type="file" name="personal_doc_path">
 @if($documents && $documents->personal_doc_path)
   <a href="{{ asset('storage/'.$documents->personal_doc_path) }}" target="_blank">Ver atual</a>
 @endif

 <label>Guia Exame Pericial</label><input type="file" name="forensic_exam_path">
 @if($documents && $documents->forensic_exam_path)
   <a href="{{ asset('storage/'.$documents->forensic_exam_path) }}" target="_blank">Ver atual</a>
 @endif

 <h3>Dados Jurídicos</h3>
 <label>Unidade de internação</label><input type="text" name="detention_unit" value="{{ $documents->detention_unit ?? '' }}">
 <label>Comarca</label><input type="text" name="county" value="{{ $documents->county ?? '' }}">
 <label>Medida Aplicada</label><input type="text" name="applied_measure" value="{{ $documents->applied_measure ?? '' }}">
 <label>Data da decisão</label><input type="date" name="decision_date" value="{{ $documents->decision_date ?? '' }}">
 <label>Data de entrada</label><input type="date" name="entry_date" value="{{ $documents->entry_date ?? '' }}">
 <label>Observações</label><textarea name="notes">{{ $documents->notes ?? '' }}</textarea>
 <label>Nº Processo Conhecimento</label><input type="text" name="process_number" value="{{ $documents->process_number ?? '' }}">
 <label>Nº Processo Execução</label><input type="text" name="execution_process_number" value="{{ $documents->execution_process_number ?? '' }}">

 <button type="submit">Atualizar</button>
 <a href="{{ route('socioeducating.index') }}">Cancelar</a>
</form>
