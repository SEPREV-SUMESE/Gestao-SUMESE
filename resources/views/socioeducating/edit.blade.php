<form action="{{ route('socioeducating.update',$socioeducating->id) }}" method="POST" enctype="multipart/form-data">
 @csrf
 @method('PUT')

 <label>Foto</label>
 <input type="file" name="photo">
 @if($socioeducating->photo_path)
   <img src="{{ asset('storage/'.$socioeducating->photo_path) }}" width="100">
 @endif

 <label>Nome completo</label>
 <input type="text" name="full_name" value="{{ $socioeducating->full_name }}">

 <label>Nome social</label>
 <input type="text" name="social_name" value="{{ $socioeducating->social_name }}">

 <label>Data nascimento</label>
 <input type="date" name="birth_date" value="{{ $socioeducating->birth_date }}">

 <label>Documento identificação</label>
 <input type="text" name="document_id" value="{{ $socioeducating->document_id }}">

 <!-- demais campos -->

 <button type="submit">Atualizar</button>
 <a href="{{ route('socioeducating.index') }}">Cancelar</a>
</form>
