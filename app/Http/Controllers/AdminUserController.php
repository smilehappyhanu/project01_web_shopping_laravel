<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Log;
use App\Traits\DeleteModelTrait;

class AdminUserController extends Controller
{
    use DeleteModelTrait;
    private $user;
    private $role;
    public function __construct(User $user,Role $role) {
        $this->user = $user;
        $this->role = $role;
    }
    public function index() {
        $users = $this->user->latest()->paginate(10);
        return view('admin.user.index',compact('users'));
    }
    public function create () {
        $roles = $this->role->all();
        return view('admin.user.add',compact('roles'));
    }
    public function store(Request $request) {
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->user_name,
                'email' => $request->user_email,
                'password' => Hash::make($request->user_password),
            ]);
            $roleIds = $request->user_role_id;
            $user->roles()->attach($roleIds);
            DB::commit();
            return redirect()->route('users.index');
        } catch (Exception $exception) {
            Log::error('Message: '. $exception->getMessage(). 'Line: ' .$exception->getLine());
            DB::rollback();
        }
    }
    public function edit($id) {
        $user = $this->user->find($id);
        $roles = $this->role->all();
        $roleUser = $user->roles;
        return view('admin.user.edit',compact('user','roles','roleUser'));
    }
    public function update($id,Request $request) {
        try {
            DB::beginTransaction();
            $this->user->find($id)->update([
                'name' => $request->user_name,
                'email' => $request->user_email,
                'password' => Hash::make($request->user_password),
            ]);
            $user = $this->user->find($id);
            $roleIds = $request->user_role_id;
            $user->roles()->sync($roleIds);
            DB::commit();
            return redirect()->route('users.index');
        } catch (Exception $exception) {
            Log::error('Message: '. $exception->getMessage(). 'Line: ' .$exception->getLine());
            DB::rollback();
        }
    }
    public function delete($id) {
        return $this->DeleteModelTrait($id,$this->user);
    }
}
