<div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-5 border-0 shadow-lg">
            <form action="{{route("users.store")}}" method="POST">
                <div class="modal-header border-0 pb-0 pt-4 px-4">
                    <h5 class="modal-title fs-5 fw-bold" id="newUserModalLabel">Novo Usuário</h5>
                    <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method('POST')

                    <div class="row gx-3 mb-3">
                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" name="name" id="name" class="form-control" value="Maria Silva"/>
                                <label class="form-label" for="name">Nome</label>
                            </div>
                        </div>
                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <input type="text" name="role" id="role" class="form-control" value="Saúde"/>
                                <label class="form-label" for="role">Role</label>
                            </div>
                        </div>
                    </div>

                    <div data-mdb-input-init class="form-outline mb-3">
                        <input type="email" name="email" id="email" class="form-control" value="mariasilva@gmail.com"/>
                        <label class="form-label" for="email">Email</label>
                    </div>
                
                    <div class="row gx-3 mb-4">
                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <input type="password" name="password" id="password" class="form-control" value="••••••"/>
                                <label class="form-label" for="password">Senha</label>
                            </div>
                        </div>
                        <div class="col">
                            <div data-mdb-input-init class="form-outline">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="••••••"/>
                                <label class="form-label" for="password_confirmation">Repita a Senha</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer border-0 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary py-2 px-4 fw-bold" data-mdb-ripple-init>Criar Usuário</button>
                </div>
            </form>
        </div>
    </div>
</div>