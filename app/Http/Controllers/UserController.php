<?php

namespace App\Http\Controllers;

use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private $user;

    public function __construct(UserRepository $user)
    {
         $this->middleware('permission:Просмотр пользователей', ['only' => ['index']]);
         $this->middleware('permission:Добавить пользователя', ['only' => ['create', 'store']]);
         $this->middleware('permission:Изменить пользователя', ['only' => ['edit', 'update']]);
         $this->middleware('permission:Удалить пользователя', ['only' => ['destroy']]);
        return $this->user = $user;
    }

    public function index()
    {
        $roles = Role::all();
        $users = $this->user->index();
        return view('users/index', compact('users','roles'));
    }

    public function store(Request $request)
    {
        $this->user->store($request);
        return redirect('/users')
            ->with('success','User created successfully');
    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = $this->user->findByIdSingle($id);
        return view('users/edit', compact('user','roles'));
    }

    public function update(Request $request, $id)
    {
        $this->user->update($request, $id);

        return redirect('users')
            ->with('success','User updated successfully');
    }

    public function destroy($id)
    {
        $this->user->deleteID($id);
        return redirect('/users')
            ->with('success','User deleted successfully');
    }
}
