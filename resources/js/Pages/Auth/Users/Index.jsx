import Layout from "../../Layout";
import { usePage, router } from "@inertiajs/react";
import React, { useState } from "react";
import Modal from "../../../Components/Modal";
import Input from "../../../Components/Input";
import XIcon from "../../../Assets/Icons/XIcon";
import Button from "../../../Components/Button";
import UserPlus from "../../../Assets/Icons/UserPlus";
import TrashSimple from "../../../Assets/Icons/TrashSimple";
import PencilSimple from "../../../Assets/Icons/PencilSimple";

function Users() {
    const [activeModal, setActiveModal] = useState(null);

    function openModal(id) {
        setActiveModal(id);
    }

    function closeModal() {
        setActiveModal(null);
    }

    function openCreateModal() {
        setValues({
            id: null,
            name: "",
            email: "",
            password: "",
            password_confirmation: "",
            role: "",
        });
        setActiveModal("create");
    }

    function openEditModal(user) {
        setValues({
            id: user.id,
            name: user.name,
            email: user.email,
            password: "",
            password_confirmation: "",
            role: user.role,
        });
        setActiveModal("edit");
    }

    const { users, errors } = usePage().props;

    const [values, setValues] = useState({
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
    });

    function handleChange(e) {
        const { id, value } = e.target;
        setValues((prevValues) => ({
            ...prevValues,
            [id]: value,
        }));
    }

    function handleSubmit(e) {
        e.preventDefault();

        if (activeModal === "create") {
            router.post("/users", values, {
                onSuccess: () => closeModal(),
            });
        }

        if (activeModal === "edit") {
            router.put(`/users/${values.id}`, values, {
                onSuccess: () => closeModal(),
            });
        }
    }

    function handleDelete(id) {
        if (confirm("Tem certeza que deseja excluir este usuário?")) {
            router.delete(`/users/${id}`, {
                onSuccess: () => {
                    console.log("Usuário deletado com sucesso");
                },
            });
        }
    }

    return (
        <>
            <div className="page-header">
                <h1>Usuários</h1> {/* Trocar por componente de breadcrumb */}
                <Button variant="secundario" onClick={openCreateModal}><UserPlus /> Novo Usuário</Button>
            </div>
            <Modal open={activeModal === "create" || activeModal === "edit"} onClose={closeModal} size="lg">
                <div className="modal-header">
                    <h2>
                        {activeModal === "create"
                            ? "Novo Usuário"
                            : "Editar Usuário"}
                    </h2>
                    <button onClick={closeModal}><XIcon /></button>
                </div>
                <div className="divisor"></div>
                <form onSubmit={handleSubmit}>
                    <div className="input-column">
                        <div className="input-line">
                            <Input
                                label="Nome"
                                name="name"
                                value={values.name}
                                onChange={handleChange}
                                error={errors.name}
                            />
                            <Input
                                label="Tipo de Usuário"
                                name="role"
                                as="select"
                                value={values.role}
                                onChange={handleChange}
                            >
                                <option hidden value="placeholderOption"></option>
                                <option value="administrativo">Administrativo</option>
                                <option value="unidade">Unidade</option>
                                <option value="saude">Saúde</option>
                                <option value="vagas">Vagas</option>
                                <option value="pedagogico">Pedagógico</option>
                            </Input>
                        </div>
                        <Input
                            label="Email"
                            name="email"
                            type="email"
                            value={values.email}
                            onChange={handleChange}
                            error={errors.email}
                        />
                        {activeModal === "create" && (
                            <div className="input-line">
                                <Input
                                    label="Senha"
                                    name="password"
                                    type="password"
                                    value={values.password}
                                    onChange={handleChange}
                                    error={errors.password}
                                />
                                <Input
                                    label="Confirmação de senha"
                                    name="password_confirmation"
                                    type="password"
                                    value={values.password_confirmation}
                                    onChange={handleChange}
                                />
                            </div>
                        )}
                        <div className="form-buttons">
                            <Button variant="terciario" onClick={closeModal} type="button">Cancelar</Button>
                            <Button variant="primario" type="submit">
                                {activeModal === "create" ? "Criar Usuário" : "Salvar Alterações"}
                            </Button>
                        </div>
                    </div>
                </form>
            </Modal>
            {activeModal?.startsWith("delete-") && (
                <Modal size="sm" open onClose={closeModal}>
                    <div className="modal-header">
                        Tem certeza que deseja excluir o usuário{" "}
                        {users.data.find((u) => "delete-" + u.id === activeModal)?.name}?
                    </div>
                    <div className="dialog-buttons">
                        <Button variant="terciario" onClick={closeModal}>Cancelar</Button>
                        <Button variant="danger"
                            onClick={() =>
                                handleDelete(
                                    activeModal.replace("delete-", "")
                                )
                            }
                        >
                            Confirmar
                        </Button>
                    </div>
                </Modal>
            )}

            <div className="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Tipo de Usuário</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        {users.data.map((user) => (
                            <tr key={user.id}>
                                <td>{user.name}</td>
                                <td>{user.email}</td>
                                <td>{user.role}</td>
                                <td>
                                    <div className="table-actions-cell">
                                        <button onClick={() => openModal("delete-" + user.id)} className="table-delete-button">
                                            <TrashSimple />
                                        </button> 
                                        <button onClick={() => openEditModal(user)} className="table-edit-button">
                                            <PencilSimple />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </>
    );
}

Users.layout = (page) => <Layout children={page} title="Usuários" />;

export default Users;
