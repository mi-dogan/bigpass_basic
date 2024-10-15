<?php

namespace App\Http\Controllers\AuthEmployee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\SmsLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EmployeeLoginController extends Controller
{
    public function showLoginForm()
    {
        return view("auth_employee.login");
    }

    public function login(Request $request)
    {
        if ($request->login_type == "email") {
            $request->validate([
                "email" => "required|email|exists:employees,email",
                "password" => "required|min:5|max:30"
            ], [
                'email.required' => 'E-posta adresi boş bırakılamaz.',
                'email.exists' => 'E-posta adresi sistemde kayıtlı değil.',
                'password.required' => 'Parola boş bırakılamaz.'
            ]);

            $creds = $request->only("email", "password");
            if (Auth::guard("employee")->attempt($creds)) {
                return redirect()->intended();
            } else {
                return redirect()->route("qr.login")->with("message", "Geçersiz giriş bilgisi");
            }
        } elseif ($request->login_type == "phone") {
            $request->validate([
                "phone" => "required|min:10|exists:employees,phone",
                "sms_code" => $request->session()->has("sms_code_status") ? "required|exists:employees,sms_code" : "",
            ], [
                'phone.required' => 'Telefon numarası boş bırakılamaz.',
                'phone.exists' => 'Telefon numarası sistemde kayıtlı değil.',
                'sms_code.required' => $request->session()->has("sms_code_status") ? 'Doğrulama kodu boş bırakılamaz.' : '',
                'sms_code.exists' => $request->session()->has("sms_code_status") ? 'Doğrulama kodu yanlış.' : '',
            ]);

            if ($request->session()->has("sms_code_status")) {
                $employee = Employee::where(["phone" => $request->phone, "sms_code" => $request->sms_code])->first();

                if ($employee && Auth::guard("employee")->login($employee)) {
                    $request->session()->forget("sms_code_status");
                    return redirect()->intended();
                } else {
                    return redirect()->route("qr.login")->withInput()->with("message", "Geçersiz giriş bilgisi");
                }
            } else {
                $employee = Employee::where("phone", $request->phone)->first();

                $smsCode = rand(pow(10, 5 - 1), pow(10, 6) - 1);
                $smsMessage = "Mihmandar doğrulama kodunuz {$smsCode}";

                $employee->update([
                    "sms_code" => $smsCode
                ]);

                $smsLog = new SmsLog();

                $smsLog->create([
                    "phone" => $employee->phone,
                    "message" => $smsMessage,
                    "code" => $smsCode,
                ]);

                $smsLog->sendSms($smsMessage, $employee->phone);

                $request->session()->put("sms_code_status", "true");

                return redirect()->back()->withInput();
            }
        }


    }

    public function logout()
    {
        //        Auth::guard('employee')->logout();

        session()->flush();

        return redirect()->route('qr.login');
    }

}
