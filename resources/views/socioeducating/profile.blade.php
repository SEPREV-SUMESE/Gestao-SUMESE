@extends('layouts.main')

@section('title', 'Perfil de ' . $socioeducando->full_name)

@section('css')
<style>
    .profile-header {
        display: flex;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }
    .profile-info {
        flex-grow: 1;
    }
    .profile-name {
        font-size: 1.5rem;
        font-weight: bold;
        color: #333;
    }
    .profile-meta {
        color: #6c757d;
        font-size: 0.9rem;
        margin-bottom: 0.2rem;
    }
    .action-buttons {
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-self: flex-start;
    }
    .action-buttons .btn {
        border-radius: 46px; 
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        padding: 8px 20px;
        font-weight: 500;
        min-width: 120px;
    }
    .nav-tabs {
        border-bottom: 2px solid #dee2e6;
        margin-top: 2rem;
    }
    .nav-tabs .nav-link {
        color: #6c757d;
        border: none;
        border-bottom: 2px solid transparent;
        transition: all 0.3s ease;
        padding: 0.5rem 1rem;
    }
    .nav-tabs .nav-link.active {
        color: #007bff;
        border-bottom-color: #007bff;
        font-weight: 500;
    }
    .transfer-card, .document-card {
        border: 1px solid #e9ecef;
        border-radius: 0.75rem;
        padding: 1.5rem;
        margin-top: 1.5rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        display: flex;
        flex-direction: column;
        gap: 1rem;
        background-color: #fff;
    }
    .transfer-card .status {
        font-weight: bold;
    }
    .transfer-card .status.em-aberto {
        color: #ffc107;
    }
    .transfer-card .status.autorizada {
        color: #28a745;
    }
    .breadcrumb-item + .breadcrumb-item::before {
        content: ">" !important;
    }
    .profile-container {
        border: 1px solid #e9ecef;
        border-radius: 0.75rem;
        padding: 2rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        background-color: #fff;
    }
    .profile-image {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #fff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .profile-info .badge {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.7rem;
        background-color: #6c757d;
        color: #fff;
    }
    .profile-info .d-flex.align-items-center {
        gap: 10px;
    }
</style>
@endsection

@section('container')
 

<div class="profile-container d-flex justify-content-between align-items-start mb-4">
    <div class="profile-header">
        <img src="{{ $socioeducando->photo_path ? asset('storage/'.$socioeducando->photo_path) : asset('assets/img/default.svg') }}" alt="Foto de Perfil" class="profile-image">
        <div class="profile-info">
            <div class="d-flex align-items-center mb-1">
                <h3 class="profile-name mb-0 me-2">{{ $socioeducando->full_name }} <span class="initials_name">• {{ $socioeducando->initials }}</span></h3>
            </div>
            <p class="profile-meta mb-0">{{ $socioeducando->birth_date->age }} anos</p>
            <p class="profile-meta mb-0">{{ 'Entrada em ' . (optional($socioeducando->documents)->entry_date?->format('d/m/Y') ?? '') }}</p>
            <p class="profile-meta mb-0">{{ $socioeducando->current_unit }}</p>
        </div>
    </div>
    <div class="action-buttons">
        <button type="button" class="btn btn-primary" data-mdb-toggle="tooltip" title="Editar">
            <i class="fas fa-edit"></i> Editar
        </button>
        <button type="button" class="btn btn-outline-primary" data-mdb-toggle="tooltip" title="Sobre">
            <i class="fas fa-info-circle"></i> Sobre
        </button>
        <button type="button" class="btn btn-outline-danger" data-mdb-toggle="tooltip" title="Desligar">
            <i class="fas fa-power-off"></i> Desligar
        </button>
    </div>
</div>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="transferencias-tab" data-mdb-toggle="tab" href="#transferencias" role="tab" aria-controls="transferencias" aria-selected="true">Transferências</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="documentos-tab" data-mdb-toggle="tab" href="#documentos" role="tab" aria-controls="documentos" aria-selected="false">Documentos</a>
    </li>
</ul>

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="transferencias" role="tabpanel" aria-labelledby="transferencias-tab">
        <div class="transfer-card">
            <div class="d-flex justify-content-between align-items-center">
                <div class="transfer-info">
                    <span class="d-block">UIPM Capital → Complexo SUMESE <span class="badge bg-info">7 VAGAS</span></span>
                    <small class="text-muted">Solicitado em 30/05/2025</small>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="status em-aberto">Em Aberto</span>
                    <button class="btn btn-sm btn-outline-secondary">Revisar</button>
                </div>
            </div>
        </div>
        <div class="transfer-card">
            <div class="d-flex justify-content-between align-items-center">
                <div class="transfer-info">
                    <span class="d-block">Uma Unidade → Outra Unidade</span>
                    <small class="text-muted">Solicitado em 30/05/2025</small>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="status autorizada">Autorizada</span>
                    <button class="btn btn-sm btn-outline-secondary">Revisar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="documentos" role="tabpanel" aria-labelledby="documentos-tab">
        <div class="row g-4 mt-3">
            @if(optional($socioeducando->documents))
                <div class="col-md-6">
                    <div class="card p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fs-6 text-primary">Guia CNJ</span>
                            <div class="d-flex gap-2">
                                <a href="#" class="text-primary"><i class="fas fa-eye"></i></a>
                                <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                        <small class="text-muted">{{ optional($socioeducando->documents)->cnj_guide_path ? '2 MB' : 'Arquivo não carregado' }}</small>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection