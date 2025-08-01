<div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{route("users.store")}}" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="newUserModalLabel">Novo usuário</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('POST')

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" name="name" id="name" class="form-control" value="{{old("name")}}"/>
                        <label class="form-label" for="name">Nome</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" name="email" id="email" class="form-control" value="{{old("email")}}"/>
                        <label class="form-label" for="email">Email</label>
                    </div>
                
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" name="password" id="password" class="form-control" />
                        <label class="form-label"  for="password">Senha</label>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
                        <label class="form-label" for="password_confirmation">Confirmar Senha</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Voltar</button>
                    <button type="submit" class="btn btn-primary" data-mdb-ripple-init>Criar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    
</script>