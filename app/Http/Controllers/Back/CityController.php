<?php

namespace App\Http\Controllers\Back;

use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function district(Request $request)
    {
        $districts = District::where('city_id', $request->id)->get();
        return response()->json([
            'districts' => $districts
        ], 200);
    }
}
