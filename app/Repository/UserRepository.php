<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRepository extends BaseRepository
{

    public function __construct(User $user)
    {
        $this->currobject = $user;
    }

    public function store(Request $request)
    {
        $user = $this->currobject::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'created_by' => Auth::id(),
        ]);
        $user->assignRole($request->input('roles'));
        $user->save();

    }

    public function update(Request $request, $id)
    {
//        $request->validate([
//            'name' => 'required|string|max:255',
//            'email' => 'required|email|max:255|exists:users,email',
//            'password' => 'required|min:6|max:255',
//            'role_id' => 'required|integer|exists:roles,id',
//        ]);

        $user = $this->findByIdSingle($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'updated_by' => Auth::id(),

        ]);
        $role = Role::find($request->input('role_id'));

        $user->syncRoles([$role->name]);
        $user->save();
    }
}
