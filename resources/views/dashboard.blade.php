@extends('layouts.main')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <h5 class="card-title">Usuários</h5>
                <p class="card-text">120 cadastrados</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Vendas</h5>
                <p class="card-text">R$ 3.450</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title">Notificações</h5>
                <p class="card-text">5 pendentes</p>
            </div>
        </div>
    </div>
</div>
@endsection
