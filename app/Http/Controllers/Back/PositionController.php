<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\PositionStoreRequest;
use App\Http\Requests\Back\PositionUpdateRequest;
use App\Models\Companys;
use App\Models\Position;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PostInc;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $positions = Position::byCompany()->withCount('employees')->get();
        $modals = ['create' => ['name'], 'edit' => ['update_name']];
        return view('back.pages.position.index', compact('positions', 'modals'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PositionStoreRequest $request)
    {
        Position::query()->create([
            'name' => $request->name,
            'company_id' => auth()->user()->company_id
        ]);
        return redirect()->back()->with(['success' => 'Pozisyon başarıyla eklendi.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $companyId = auth()->user()->company_id;
        $PositionCount = Position::where('company_id', $companyId)->count();
        $currentCompany = Companys::query()->where('id', $companyId)->first();
        $PositionLimit = $currentCompany->position_limit;
        if ($PositionLimit == 0) {
            $position = Position::query()->where('id', $id)->first();
            return response()->json([
                // 'company_id' => auth()->user()->company_id,
                'position' => $position
            ], 200);
        } else if ($PositionCount >= $PositionLimit) {
            return response()->json(['limitReached' => true], 200);
        } else {
            $position = Position::query()->where('id', $id)->first();
            return response()->json([
                // 'company_id' => auth()->user()->company_id,
                'position' => $position
            ], 200);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PositionUpdateRequest $request, string $id)
    {
        $position = Position::query()->where('id', $id)->firstOrFail();
        $position->update([
            'name' => $request->update_name
        ]);

        return redirect()->back()->with(['success' => 'Pozisyon başarıyla eklendi.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $position = Position::query()->where('id', $id)->firstOrFail();
        $position->delete();
        return redirect()->back()->with(['success' => 'Pozisyon başarıyla silindi.']);
    }
}
