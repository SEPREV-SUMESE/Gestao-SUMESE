<div class="modal fade" id="editUser{{$user->id}}Modal" tabindex="-1" aria-labelledby="editUser{{$user->id}}ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route("users.update", [$user->id])}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editUser{{$user->id}}Modal">Editar usuário - {{$user->name}}</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="edit_name{{$user->id}}" name="name" class="form-control" value="{{$user->name}}" required/>
                        <label class="form-label" for="edit_name{{$user->id}}">Nome</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="edit_email{{$user->id}}" name="email" class="form-control" value="{{$user->email}}"/>
                        <label class="form-label" for="edit_email{{$user->id}}">Email</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    
</script>