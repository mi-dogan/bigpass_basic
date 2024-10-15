<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\RoleStoreRequest;
use App\Http\Requests\Back\RoleUpdateRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        $modals = ['create' => ['name'], 'edit' => ['update_name']];
        return view('back.pages.role.index', compact('roles', 'modals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleStoreRequest $request)
    {
        Role::query()->create([

            'name' => $request->name,
        ]);

        return redirect()->back()->with(['success' => 'Rol başarıyla eklendi.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = Role::query()->where('id', $id)->first();
        return response()->json([
            'role' => $role
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUpdateRequest $request, string $id)
    {
        $role = Role::query()->where('id', $id)->firstOrFail();
        $role->update([
            'name' => $request->update_name
        ]);

        return redirect()->back()->with(['success' => 'Rol başarıyla güncellendi.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::query()->where('id', $id)->firstOrFail();
        $role->delete();

        return redirect()->back()->with(['success' => 'Rol başarıyla silindi.']);
    }
}
