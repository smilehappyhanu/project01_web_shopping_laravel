<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;

class AdminRoleController extends Controller
{
    use DeleteModelTrait;
    private $role;
    private $permission;
    public function __construct(Role $role,Permission $permission) {
        $this->role = $role;
        $this->permission = $permission;
    }
    public function index() {
        $roles = $this->role->paginate(10);
        return view('admin.role.index',compact('roles'));
    }
    public function create () {
        $permissionParents = $this->permission->where('parent_id',0)->get();
        return view ('admin.role.add',compact('permissionParents'));
    }
    public function store (Request $request) {
        $role = $this->role->create([
            'name' => $request->role_name,
            'display_name' => $request->role_description
        ]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('roles.index');
    }
    public function edit ($id) {
        $role = $this->role->find($id);
        $permissionParents = $this->permission->where('parent_id',0)->get();
        $rolePermissions = $role->permissions;
        return view ('admin.role.edit',compact('permissionParents','role','rolePermissions'));
    }
    public function update ($id, Request $request) {
        $this->role->find($id)->update([
            'name' => $request->role_name,
            'display_name' => $request->role_description
        ]);
        $role = $this->role->find($id);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('roles.index');
    }
    public function delete($id) {
        return $this->deleteModelTrait($id,$this->role);
    }
}
