<?php

namespace App\Http\Controllers;

use App\Role;
use App\Permission;
use Illuminate\Http\Request;

class AdminRoleController extends Controller
{
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
}
