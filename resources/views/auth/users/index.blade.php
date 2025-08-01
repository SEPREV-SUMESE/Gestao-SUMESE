@extends("layouts.main")

@section("title", "Início")

@section("css")
    <link rel="stylesheet" href="{{asset("assets/css/users.css")}}">
@endsection

@section("container")
<div class="content">
    <div class="container mt-4">
        <div class="header-content row align-items-center">
            <div class="col-12 col-md-6">
                <h4 class="mb-3">Lista de usuários</h4>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-start justify-content-md-end gap-2">
                <a href="{{ route('users.export') . '?search=' . $search . '&status_filter=' . $status_filter }}" class="btn btn-primary">
                    Exportar CSV
                </a>
                <button type="button" class="btn btn-primary" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#newUserModal">
                    Novo usuário
                </button>
            </div>
        </div>
        <div class="container mb-3">
            <form action="{{route("users.index")}}" method="GET">
                <div class="input-group flex-nowrap mt-3">
                    <input type="search" id="search" class="form-control rounded" name="search" placeholder="Buscar pelo nome" value="{{$search}}" aria-label="Search" aria-describedby="search-addon">
                    <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Buscar</button>
                </div>
                <div class="input-group mt-3 d-flex flex-column flex-md-row align-items-md-center justify-content-md-end gap-2">
                    <div class="d-flex flex-wrap justify-content-center gap-2">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_filter" id="status-filter1" value="-1" @if ($status_filter == "-1") checked @endif>
                            <label class="form-check-label" for="status-filter1">Todos</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_filter" id="status-filter2" value="1" @if ($status_filter == "1") checked @endif>
                            <label class="form-check-label" for="status-filter2">Ativos</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status_filter" id="status-filter3" value="0" @if ($status_filter == "0") checked @endif>
                            <label class="form-check-label" for="status-filter3">Deletados</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Filtrar</button>
                </div>
            </form>
        </div>
        <div class="row">
            @forelse ($users as $user)
                @include('auth.users.edit', ["user" => $user])
                @include('auth.users.details', ["user" => $user])
                @include('auth.users.delete', ["user" => $user])
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card user-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $user->name }}</h5>
                            <div class="status-circle"></div>
                        </div>
                        <div class="card-body">
                            <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <strong>Email:</strong> {{ $user->email ?? 'Não Registrado' }} <br>
                            </p>
                            <p class="card-text info-card text-end">
                                <span><strong>Criado em:</strong> {{ $user->created_at }}</span>
                            </p>
                        </div>
                        <div class="card-footer d-flex flex-column flex-md-row gap-2">
                            <button type="button" class="btn btn-primary w-100 w-md-auto" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#viewUser{{$user->id}}Modal">
                                Detalhes
                            </button>
                            <button type="button" class="btn btn-warning w-100 w-md-auto" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#editUser{{$user->id}}Modal">
                                Editar
                            </button>
                            @if (!$user->is_admin)
                                <button type="button" class="btn btn-danger w-100 w-md-auto" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#deleteUser{{$user->id}}Modal">
                                    Deletar
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-secondary text-center d-flex justify-content-center align-items-center">
                    <span>
                        <strong>Não há registros para exibir</strong>
                    </span>
                </div>
            @endforelse
        </div>
        <x-paginate :page="$users"/>
    </div>
</div>

@include('auth.users.create')
@endsection

@section("js")
    
@endsection