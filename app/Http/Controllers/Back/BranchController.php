<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\BranchStoreRequest;
use App\Http\Requests\Back\BranchUpdateRequest;
use App\Models\Branch;
use App\Models\Companys;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $branchs = Branch::byCompany()->query()->withCount('departments')->orderBy('id', 'desc')->get();
        $branchs = Branch::byCompany()->withCount('departments')->orderBy('id', 'desc')->get();

        $modals = ['create' => ['name', 'department_id'], 'edit' => ['update_name', 'update_department_id']];
        return view('back.pages.branch.index', compact('branchs', 'modals'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(BranchStoreRequest $request)
    {
        Branch::query()->create([
            'name' => $request->name,
            'company_id' => auth()->user()->company_id
        ]);

        return redirect()->back()->with(['success' => 'Şube başarıyla eklendi.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $id = $request->id;
        $companyId = auth()->user()->company_id;
        if ($companyId == 0) {
            $branch = Branch::query()->where('id', $id)->first();
            return response()->json([
                'branch' => $branch
            ], 200);
        }
        $branchCount = Branch::where('company_id', $companyId)->count();
        $currentCompany = Companys::query()->where('id', $companyId)->first();
        $branchLimit = $currentCompany->branch_limit;
        if ($branchLimit == 0) {
            $branch = Branch::query()->where('id', $id)->first();
            return response()->json([
                'branch' => $branch
            ], 200);
        } else if ($branchCount >= $branchLimit) {
            if ($request->method == 'edit') {
                $branch = Branch::query()->where('id', $id)->first();
                return response()->json([
                    'branch' => $branch
                ], 200);
            } else {
                return response()->json(['limitReached' => true], 200);
            }
        } else {
            $branch = Branch::query()->where('id', $id)->first();
            return response()->json([
                'branch' => $branch
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BranchUpdateRequest $request, string $id)
    {
        $branch = Branch::query()->where('id', $id)->firstOrFail();
        $branch->update([
            'name' => $request->update_name,
        ]);

        return redirect()->back()->with(['success' => 'Şube başarıyla eklendi.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $branch = Branch::query()->where('id', $id)->firstOrFail();
        if ($branch->primary) {
            return redirect()->back()->withErrors(['warning' => 'Merkez Şube Silinemez.']);
        }
        $branch->delete();
        return redirect()->back()->with(['success' => 'Şube başarıyla silindi.']);
    }
}
