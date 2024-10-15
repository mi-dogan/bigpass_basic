<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\DepartmentStoreRequest;
use App\Http\Requests\Back\DepartmentUpdateRequest;
use App\Models\Branch;
use App\Models\Companys;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departments = Department::byCompany()->with('branch')->withCount('employees')->orderBy('id', 'desc')->get();
        $branchs = Branch::byCompany()->get();
        $modals = ['create' => ['name', 'branch_id'], 'edit' => ['update_name', 'update_branch_id']];
        return view('back.pages.department.index', compact('departments', 'branchs', 'modals'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentStoreRequest $request)
    {
        Department::query()->create([
            'name' => $request->name,
            'company_id' => auth()->user()->company_id,
            'branch_id' => $request->branch_id,
            //'monday' => $request->monday ?? false,
            //'tuesday' => $request->tuesday ?? false,
            //'wednesday' => $request->wednesday ?? false,
            //'thursday' => $request->thursday ?? false,
            //'friday' => $request->friday ?? false,
            //'saturday' => $request->saturday ?? false,
            //'sunday' => $request->sunday ?? false
        ]);

        return redirect()->back()->with(['success' => 'Departman başarıyla eklendi.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $companyId = auth()->user()->company_id;
        $departmentCount = Department::where('company_id', $companyId)->count();
        $currentCompany = Companys::query()->where('id', $companyId)->first();
        $departmentLimit = $currentCompany->department_limit;
        if ($departmentLimit == 0) {
            $department = Department::query()->where('id', $id)->first();
            return response()->json([
                'department' => $department
            ], 200);
        } else if ($departmentCount >= $departmentLimit) {
            return response()->json(['limitReached' => true], 200);
        } else {
            $department = Department::query()->where('id', $id)->first();
            return response()->json([
                'department' => $department
            ], 200);
        }


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentUpdateRequest $request, string $id)
    {
        $department = Department::query()->where('id', $id)->firstOrFail();
        $department->update([
            'name' => $request->update_name,
            'branch_id' => $request->update_branch_id,
            //'monday' => $request->monday ?? false,
            //'tuesday' => $request->tuesday ?? false,
            //'wednesday' => $request->wednesday ?? false,
            //'thursday' => $request->thursday ?? false,
            //'friday' => $request->friday ?? false,
            //'saturday' => $request->saturday ?? false,
            //'sunday' => $request->sunday ?? false
        ]);

        return redirect()->back()->with(['success' => 'Departman başarıyla güncellendi.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $department = Department::query()->where('id', $id)->firstOrFail();

        if ($department->primary) {
            return redirect()->back()->withErrors(['warning' => 'Merkez Departman Silinemez.']);
        }

        $department->delete();
        return redirect()->back()->with(['success' => 'Departman başarıyla silindi.']);
    }
}
