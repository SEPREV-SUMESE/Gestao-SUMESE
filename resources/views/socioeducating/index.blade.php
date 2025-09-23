@extends('layouts.main')

@section('title', 'Socioeducandos')

@section('container')


<div class="d-flex flex-column flex-md-row justify-content-between mb-4 align-items-start align-items-md-center">
    <div class="d-flex align-items-center gap-4 search-div">
        <div class="search-container">
            <form method="GET" action="{{ route('socioeducating.index') }}" class="search-box">
                <i class="fas fa-search search-icon"></i>
                <input type="text" name="search" class="search-input" placeholder="Buscar" value="{{ request('search') }}">
            </form>
        </div>
        <a href="#" class="btn btn-filter rounded-circle">
            <i class="fas fa-filter"></i>
        </a>
    </div>
    <a href="{{ route('socioeducating.register_step_1') }}" class="btn btn-primary btn_normal mt-3 mt-md-0">
        <i class="fas fa-user-plus icon"></i> Cadastrar Socioeducando
    </a>
</div>

<div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-4">
@foreach($socioeducandos as $socio)
<div class="col {{ $socio->status == 0 ? 'inactive' : '' }}">
<a href="{{ route('socioeducating.profile', $socio->id) }}">

<div class="card h-100 {{ $socio->status == 0 ? '' : 'bg-white text-white' }} rounded-4 shadow-3">
@if($socio->status == 0)
<span class="badge bg-secondary position-absolute m-2">Inativo</span>
@endif
<div class="d-flex justify-content-center mt-3">
<img src="{{ $socio->photo_path ? asset('storage/'.$socio->photo_path) : asset('assets/img/default.svg') }}"
class="rounded-circle border border-5 border-white shadow-2" style="width:100px;height:100px;object-fit:cover;">
</div>
<div class="card-body text-center">
<h5 class="card-title fw-bold text-dark">{{ $socio->full_name }}</h5>
@if($socio->birth_date <> '0000-00-00')
<p class="card-text text-muted mb-0">
{{ \Carbon\Carbon::parse($socio->birth_date)->age }} anos
</p>
@endif
<p class="card-text text-muted">
{{ preg_replace('/(\d{3})\d{3}(\d{3})/', '$1***$2', $socio->document_id) }}
</p>
 
</div>
</div>
</a>

</div>

@endforeach
</div>

<div class="mt-4">
{{ $socioeducandos->withQueryString()->links('vendor.pagination.mdb') }}
</div>


@endsection