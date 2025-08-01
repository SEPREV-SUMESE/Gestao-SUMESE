<div class="modal fade" id="viewUser{{$user->id}}Modal" tabindex="-1" aria-labelledby="viewUser{{$user->id}}ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewUser{{$user->id}}Modal">Detalhes do usuário - {{$user->name}}</h5>
                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-outline mb-4">
                    <label class="form-label" for="name">Nome</label>
                    <input type="text" id="view_name{{$user->id}}" class="form-control" value="{{$user->name}}" readonly />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="view_email{{$user->id}}">Email</label>
                    <input type="email" id="view_email{{$user->id}}" class="form-control" value="{{$user->email}}" readonly />
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="view_created_at{{$user->id}}">Criado em</label>
                    <input type="text" id="view_created_at{{$user->id}}" class="form-control" value="{{$user->created_at}}" readonly />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
