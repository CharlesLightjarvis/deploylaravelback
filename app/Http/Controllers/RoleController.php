<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return response()->json(['roles' => $roles], 200);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name'
        ]);


        $role = Role::create(['name' => $request->name]);


        return response()->json(['role' => $role], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::findById($id);
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }
        return response()->json(['role' => $role], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $id
        ]);


        $role = Role::findById($id);
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }


        $role->name = $request->name;
        $role->save();


        return response()->json(['role' => $role], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::findById($id);
        if (!$role) {
            return response()->json(['message' => 'Role not found'], 404);
        }


        $role->delete();


        return response()->json(['message' => 'Role deleted successfully'], 200);
    }
}
