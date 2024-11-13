<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use App\Models\Department;
use App\Models\UserDepartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Back\UserStoreRequest;
use App\Http\Requests\Back\UserUpdateRequest;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::byCompany()->with('departments')->notIm()->orderBy('id', 'desc')->get();
        $departments = Department::byCompany()->with('branch')->get();
        $modals = ['create' => ['name', 'email', 'branch_id', 'password'], 'edit' => ['update_name', 'update_email', 'update_branch_id', 'update_password', 'update_admin']];
        return view('back.pages.user.index', compact('users', 'departments', 'modals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::query()->create([
            'name' => $request->name,
            'company_id' => auth()->user()->company_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'email_verified_at' => Carbon::now(),
        ]);

        if (count($request->department_id) > 0) {
            foreach ($request->department_id as $departmentID) {
                UserDepartment::create([
                    'company_id' => auth()->user()->company_id,
                    "user_id" => $user->id,
                    "department_id" => $departmentID
                ]);
            }
        }

        $user->syncRoles('admin');

        return redirect()->back()->with(['success' => 'Kullanıcı başarıyla eklendi.']);
    }


    public function show(string $id)
    {
        $user = User::query()->where('id', $id)->with('roles')->with('departments')->first();
        return response()->json([
            'user' => $user
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        $user = User::query()->where('id', $id)->firstOrFail();
        $user->update([
            'name' => $request->update_name,
            'email' => $request->update_email,
            'password' => $request->update_password ? bcrypt($request->update_password) : $user->password,
        ]);

        UserDepartment::where('user_id', $id)->delete();
        if (count($request->update_department_id ?? []) > 0) {
            foreach ($request->update_department_id as $departmentID) {
                UserDepartment::create([
                    "user_id" => $id,
                    "department_id" => $departmentID
                ]);
            }
        }

        if ($request->update_admin) {
            $user->syncRoles('admin');
        } else {
            $user->syncRoles('personal');
        }

        return redirect()->back()->with(['success' => 'Kullanıcı başarıyla güncellendi.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::query()->where('id', $id)->firstOrFail();
        $user->delete();
        return redirect()->back()->with(['success' => 'Kullanıcı başarıyla silindi.']);
    }
}
