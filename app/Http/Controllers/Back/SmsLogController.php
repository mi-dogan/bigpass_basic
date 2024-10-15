<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\SmsLog;
use Illuminate\Http\Request;

class SmsLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "phone" => "required",
            "message" => "required",
            "code" => "required",
        ], [
            "phone.required" => "Telefon numarası boş bırakılamaz!",
            "message.required" => "Mesaj boş bırakılamaz!",
            "code.required" => "Doğrulama kodu boş bırakılamaz!",
        ]);

        // $create = SmsLog::create($request->only("phone", "message", "code"));
        $create = SmsLog::create(array_merge(
            $request->only("phone", "message", "code"),
            ['company_id' => auth()->user()->company_id]
        ));


        if ($create) {
            return response()->json([
                "status" => true,
                "message" => "Log kaydedildi.",
            ], 200);
        } else {
            return response()->json([
                "status" => false,
                "message" => "Log kaydedilemedi!",
            ], 403);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(SmsLog $smsLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SmsLog $smsLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SmsLog $smsLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SmsLog $smsLog)
    {
        //
    }
}
