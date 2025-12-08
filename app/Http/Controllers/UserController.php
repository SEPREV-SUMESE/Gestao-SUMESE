<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
     /**
     * Listar usuários
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $users = User::query();

        $search ??= $request->search;
        $status_filter ??= $request->status_filter;

        $users->filter($status_filter);
        $users->search($search);

        $users = $users->paginate(9);
        $users->appends(['search' => $search, 'status_filter' => $status_filter]);
        return view("auth.users.index", compact("users", "search", "status_filter"));
    }

    /**
     * Criar usuário
     * @param \App\Http\Requests\UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();

        User::create($data);

        return redirect()->back()->with("success", "Usuário registrado com sucesso");
    }

    /**
     * Atualizar usuário
     * @param \App\Http\Requests\UsuárioRequest $request
     * @param User|Model|string $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->back()->with("success", "Usuário atualizado com sucesso");
    }

    /**
     * Deletar usuário (Logicamente)
     * @param User|Model|string $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, User $user): RedirectResponse
    {
        $user->delete();

        return redirect()->back()->with("success", "Usuário deletado com sucesso!");
    }

    /**
     * Exportar lista de usuários (em csv)
     * @return Download
     */
    public function export_csv(Request $request)
    {   
        $filename =  date("d_m_Y_h_i_s") . '_export_users';
        return response()->stream(function() use($request){
            $users = User::query();

            $search ??= $request->search;
            $status_filter ??= $request->status_filter;

            $users->filter($status_filter);
            $users->search($search);

            $users = $users->get(["name", "email", "created_at"])->toArray();

            foreach($users as $key => $user){
                echo $key+1 . ";" . implode(";", array_values($user)) . "\n";
            }
        }, 200, [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
        ]);
    }
}
