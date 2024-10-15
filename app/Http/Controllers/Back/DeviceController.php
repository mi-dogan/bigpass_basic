<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\DeviceStoreRequest;
use App\Http\Requests\Back\DeviceUpdateRequest;
use App\Models\Device;
use Illuminate\Support\Facades\Storage;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $devices = Device::byCompany()->get();
        $modals = ['create' => ['device_id'], 'edit' => ['update_device_id']];
        return view('back.pages.device.index', compact('modals', 'devices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeviceStoreRequest $request)
    {
        $qrCode = new QrcodeController();
        $qrCode = $qrCode->generate();

        Device::query()->create([
            'company_id' => auth()->user()->company_id,
            'device_id' => $request->device_id,
            'qr_code' => $qrCode["code"],
            'device_code' => uniqid()
        ]);

        return redirect()->back()->with(['success' => 'Cihaz başarıyla eklendi.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $device = Device::query()->where('id', $id)->first();
        $outputFile = 'qr-codes/' . $device->qr_code . ".png";
        if (Storage::disk('public')->missing($outputFile)) {
            $qrCode = new QrcodeController();
            $qrCode = $qrCode->generate();

            $device->update([
                'qr_code' => $qrCode["code"],
            ]);
        }

        $outputFile = 'qr-codes/' . $device->qr_code . ".png";
        $imageUrl = asset(Storage::disk('public')->url($outputFile));

        return response()->json([
            'device' => $device,
            'qr_code_url' => $imageUrl
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeviceUpdateRequest $request, string $id)
    {
        $device = Device::query()->where('id', $id)->firstOrFail();

        if ($device->qr_code == '') {
            $qrCode = new QrcodeController();
            $qrCode = $qrCode->generate();
        }

        $device->update([
            'device_id' => $request->update_device_id,
            'qr_code' => $device->qr_code != "" ? $device->qr_code : $qrCode["code"],
            'device_code' => $device->device_code != "" ? $device->device_code : uniqid()
        ]);

        return redirect()->back()->with(['success' => 'Cihaz başarıyla güncellendi.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $device = Device::query()->where('id', $id)->firstOrFail();
        $device->delete();

        return redirect()->back()->with(['success' => 'Cihaz başarıyla silindi.']);
    }
}
