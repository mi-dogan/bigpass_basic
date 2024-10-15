<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Facades\Image;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "";
    }

    public function showQrPage($qrCode = "")
    {
//        dd([$deviceCode, $qrCode]);
        $device = Device::where(["qr_code" => $qrCode])->first();

        return view("front.pages.qr_code.show", [
            "device" => $device,
            "employee" => auth()->user()
        ]);
    }

    /**
     * Get qr image.
     */
    public function show($deviceCode)
    {
        $device = Device::where(["device_code" => $deviceCode])->first();

        return view("front.pages.qr_code.random_show", [
            "device" => $device,
        ]);
    }

    public function generateRaw($code = "")
    {
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

        $randomCode = $code != "" ? $code : uniqid();
        $imageName = 'QR' . $randomCode;
        $ext = ".png";
        $image = QrCode::size(128)
            ->margin(1)
            ->style('round')
            ->eye('circle')
            ->eyeColor(0, 39, 106, 162, 0, 0, 0)
            ->eyeColor(1, 39, 106, 162, 0, 0, 0)
            ->eyeColor(2, 39, 106, 162, 0, 0, 0)
//            ->gradient(73, 147, 209, 39, 106, 162,'radial')
            ->errorCorrection('M')
            ->format('png')
            ->merge('/public/backend/media/logos/mihmandar-vector.jpg', .20)
            ->generate(url("qr/{$imageName}/show"));

        return $image;
    }

    public function generate(){
        $randomCode = uniqid();
        $imageName = 'QR' . $randomCode;
        $ext = ".png";
        $image = $this->generateRaw($randomCode);
        $outputFile = 'qr-codes/' . $imageName.$ext;
        Storage::disk('public')->put($outputFile, $image);
        $imageUrl = asset(Storage::disk('public')->url($outputFile));

        return ["status" => true, "code" => $imageName, "file_name" => $imageName.$ext, "file_url" => $imageUrl];
    }

    public function generateRandom(Request $request){
        if($request->device_id && $request->device_id != ""){
            $randomCode = uniqid();
            $imageName = 'QR' . $randomCode;

            $device = Device::where("device_id", $request->device_id)->firstOrFail();
            $device->qr_code = $imageName;
            $device->save();

            $manager = new ImageManager(Driver::class);
            $image = $this->generateRaw($randomCode);
            $image = $manager->read(base64_encode($image));
            $imageJPG = $image->toJpeg(75);
//            $imageJPG = $manager->make(base64_encode($image))->encode('jpeg', 60)->response("jpeg");

//            header('Content-Type: image/jpeg');
//            return $imageJPG;
            $response = response()->make($imageJPG, 200);
            $response->header('Content-Type', 'image/jpeg');
            return $response;
        }else{
            return "Cihaz bulunamadı";
        }
    }
}
