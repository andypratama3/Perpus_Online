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

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadmin');

    }
    public function index()
    {
        return view('dashboard.pengaturan.user.index');
    }
    public function data_table()
    {

        $query = User::select(['name', 'email','avatar', 'slug'])->orderBy('name', 'asc');

        return DataTables::eloquent($query)
            ->addColumn('options', function ($row) {
                return '
                    <a href="' . route('dashboard.pengaturan.user.show', $row->slug) . '" class="btn btn-sm btn-warning"><i class="mdi mdi-eye"></i></a>
                    <a href="' . route('dashboard.pengaturan.user.edit', $row->slug) . '" class="btn btn-sm btn-primary"><i class="mdi mdi-pen"></i></a>
                    <button data-id="' . $row['slug'] . '" class="btn btn-sm btn-danger" id="btn-delete"><i class="mdi mdi-delete"></i></button>
                ';
            })
            ->rawColumns(['options'])
            ->addIndexColumn()
            ->make(true);
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
    public function destroy(DeleteUserAction $deleteUserAction, User $user )
    {
        $deleteUserAction->execute($user);

    }

}
