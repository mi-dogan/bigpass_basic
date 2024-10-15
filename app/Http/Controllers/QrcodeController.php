<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Get qr image.
     */
    public function show($qrCode)
    {
        $device = Device::where(["qr_code" => $qrCode])->get();
        $outputFile = 'qr-codes/' . $device->qr_code . ".png";
        $imageUrl = asset(Storage::disk('public')->url($outputFile));
    }

    public function generate(){
//        $qrCodes = [];
//        $qrCodes['simple'] = QrCode::size(120)->generate('https://www.binaryboxtuts.com/');
//        $qrCodes['changeColor'] = QrCode::size(120)->color(255, 0, 0)->generate('https://www.binaryboxtuts.com/');
//        $qrCodes['changeBgColor'] = QrCode::size(120)->backgroundColor(255, 0, 0)->generate('https://www.binaryboxtuts.com/');
//
//        $qrCodes['styleDot'] = QrCode::size(120)->style('dot')->generate('https://www.binaryboxtuts.com/');
//        $qrCodes['styleSquare'] = QrCode::size(120)->style('square')->generate('https://www.binaryboxtuts.com/');
//        $qrCodes['styleRound'] = QrCode::size(120)->style('round')->generate('https://www.binaryboxtuts.com/');
//
//        $qrCodes['withImage'] = QrCode::size(200)->format('png')->merge('/public/backend/media/logos/logo-small.png', .4)->generate('https://www.binaryboxtuts.com/');
//        dd($qrCodes);

//        return response()->json($qrCodes);

        $randomCode = uniqid();
        $imageName = 'QR' . $randomCode;
        $ext = ".png";
        $image = QrCode::size(128)->format('png')->merge('/public/backend/media/logos/logo-small.png', .15)->generate(url("qr-code/{$imageName}/show"));
        $outputFile = 'qr-codes/' . $imageName.$ext;
        Storage::disk('public')->put($outputFile, $image);
        $imageUrl = asset(Storage::disk('public')->url($outputFile));

        return ["status" => true, "code" => $imageName, "file_name" => $imageName.$ext, "file_url" => $imageUrl];
    }

    public function generateRandom(){
//        $qrCodes = [];
//        $qrCodes['simple'] = QrCode::size(120)->generate('https://www.binaryboxtuts.com/');
//        $qrCodes['changeColor'] = QrCode::size(120)->color(255, 0, 0)->generate('https://www.binaryboxtuts.com/');
//        $qrCodes['changeBgColor'] = QrCode::size(120)->backgroundColor(255, 0, 0)->generate('https://www.binaryboxtuts.com/');
//
//        $qrCodes['styleDot'] = QrCode::size(120)->style('dot')->generate('https://www.binaryboxtuts.com/');
//        $qrCodes['styleSquare'] = QrCode::size(120)->style('square')->generate('https://www.binaryboxtuts.com/');
//        $qrCodes['styleRound'] = QrCode::size(120)->style('round')->generate('https://www.binaryboxtuts.com/');
//
//        $qrCodes['withImage'] = QrCode::size(200)->format('png')->merge('/public/backend/media/logos/logo-small.png', .4)->generate('https://www.binaryboxtuts.com/');
//        dd($qrCodes);

//        return response()->json($qrCodes);

        $image = QrCode::size(200)->format('png')->merge('/public/backend/media/logos/logo-small.png', .15)->generate('https://www.binaryboxtuts.com/');

        header('Content-Type: image/png');
        return $image;
    }
}
