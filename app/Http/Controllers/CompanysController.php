<?php

namespace App\Http\Controllers;

use App\Http\Requests\Back\CompanysStoreRequest;
use App\Http\Requests\Back\CompanysUpdateRequest;
use App\Models\Companys;
use App\Models\ModelHasRoles;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CompanysController extends Controller
{
    public function index()
    {
        $companys = Companys::all();

        return view('back.pages.companys.index', compact('companys', ));
    }
    public function show(string $id)
    {
        $company = Companys::query()->where('id', $id)->first();
        return response()->json([
            'company' => $company
        ], 200);
    }
    public function store(CompanysStoreRequest $request)
    {
        Companys::query()->create([
            'name' => $request->name,
            'company_admin' => $request->company_admin,
            'admin_email' => $request->admin_email,
            'admin_password' => bcrypt($request->password),
            'licence_end_date' => $request->licence_end_date,
            'branch_limit' => $request->branch_limit,
            'department_limit' => $request->department_limit,
            'position_limit' => $request->position_limit,
            'worker_limit' => $request->worker_limit,
            'shift_limit' => $request->shift_limit,


        ]);
        $company_admin = Companys::where('admin_email', $request->admin_email)->first();
        $currentDateTime = Carbon::now();
        User::query()->create([
            'company_id' => $company_admin->id,
            'name' => $request->company_admin,
            'email' => $request->admin_email,
            'email_verified_at' => $currentDateTime,
            'password' => bcrypt($request->admin_password)
        ]);
        $user_id = User::where('email', $request->admin_email)->first();
        ModelHasRoles::query()->create([
            'role_id' => '2',
            'model_type' => 'App\Models\User',
            'model_id' => $user_id->id
        ]);
        return redirect()->back()->with(['success' => 'Firma başarıyla eklendi.']);
    }
    public function updateCompanyId($id)
    {
        $currentUser = auth()->user();
        $currentUser->update([
            'company_id' => $id
        ]);
        return redirect()->back()->with(['success' => 'Firmaya başarıyla geçiş Yapıldı.']);
    }
    public function update(CompanysUpdateRequest $request, $id)
    {
        // dd($id);
        $company = Companys::where('id', $id)->first();
        // dd($request);
        $company->update([
            'name' => $request->update_name,
            'company_admin' => $request->update_company_admin,
            'admin_email' => $request->update_admin_email,
            'admin_password' => $request->update_admin_password ? bcrypt($request->update_admin_password) : $company->admin_password,
            'licence_end_date' => $request->update_licence_end_date,
            'branch_limit' => $request->update_branch_limit,
            'department_limit' => $request->update_department_limit,
            'position_limit' => $request->update_position_limit,
            'worker_limit' => $request->update_worker_limit,
            'shift_limit' => $request->update_shift_limit,


        ]);
        $company_admin = Companys::where('admin_email', $request->update_admin_email)->first();
        $currentDateTime = Carbon::now();
        // User::query()->update([
        //     'company_id' => $company_admin->id,
        //     'name' => $request->update_company_admin,
        //     'email' => $request->update_admin_email,
        //     'email_verified_at' => $currentDateTime,
        //     'password' => $request->update_admin_password
        // ]);
        $user = User::query()->where('id', $id)->firstOrFail();
        $user->update([
            'company_id' => $company_admin->id,
            'name' => $request->update_company_admin,
            'email' => $request->update_admin_email,
            'email_verified_at' => $currentDateTime,
            'password' => $request->update_admin_password ? bcrypt($request->update_admin_password) : $user->password,
            //            'department_id' => $request->update_department_id,
        ]);
        // User::query()->update([
        //     'company_id' => $company_admin->id,
        //     'name' => $request->update_company_admin,
        //     'email' => $request->update_admin_email,
        //     'email_verified_at' => $currentDateTime,
        //     'password' => $request->update_admin_password
        // ]);
        $user_id = User::where('email', $request->update_admin_email)->first();
        // ModelHasRoles::query()->update([
        //     'role_id' => '2',
        //     'model_type' => 'App\Models\User',
        //     'model_id' => $user_id->id
        // ]);
        // ModelHasRoles::updateOrCreate(
        //     ['model_id' => $company_admin->id],
        //     ['role_id' => '2', 'model_type' => 'App\Models\User']
        // );
        return redirect()->back()->with(['success' => 'Firma bilgileri başarıyla değiştirildi.']);
    }
    public function destroy(string $id)
    {
        $company = Companys::query()->where('id', $id)->firstOrFail();
        $user = User::query()->where('email', $company->admin_email)->firstOrFail();
        $user->forceDelete();
        $company->delete();

        return redirect()->back()->with(['success' => 'Firma başarıyla silindi.']);
    }
}
