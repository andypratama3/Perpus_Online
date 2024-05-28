<?php

namespace App\Http\Controllers\Dashboard\Pengaturan;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Actions\Dashboard\User\UserAction;
use App\Http\Requests\Dashboard\UserRequest;
use App\DataTransferObjects\UserSettingsData;
use App\Actions\Dashboard\User\DeleteUserAction;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadmin');

    }
    public function index()
    {
        $limit = 15;
        $users = User::orderBy('name')->paginate($limit);
        $count = $users->count();
        $no = $limit * ($users->currentPage() - 1);
        return view('dashboard.pengaturan.user.index', compact('users', 'count', 'no'));
    }

    public function create()
    {

    }
    public function show(User $user)
    {
        return view('dashboard.pengaturan.user.show', compact('user'));
    }
    public function edit(User $user){

        $roles = Role::select(['id','name','slug'])->get();
        return view('dashboard.pengaturan.user.edit', compact('user','roles'));
    }
    public function update(UserSettingsData $userData, UserAction $userAction, $slug)
    {
        $userAction->execute($userData, $slug);
        return redirect()->route('dashboard.pengaturan.user.index')->with('success','Berhasil Update User!');
    }
    public function destroy(DeleteUserAction $deleteUserAction, $slug )
    {
        $deleteUserAction->execute($slug);
        if ($deleteUserAction) {
            return response()->json(['status' => 'success', 'message' => 'Berhasil Menghapus User']);
        } else {
            return response()->json(['status' => 'failure', 'message' => 'Gagal Menghapus User']);
        }

    }

}
