<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Branch;
use App\Models\Account;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Department;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password)
        ]);

        $branch =  Branch::query()->create([
            'name' => 'Merkez Şube',
            'primary' => true
        ]);

        Department::query()->create([
            'name' =>  'Merkez Departman',
            'branch_id' => $branch->id,
            'primary' => true
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verification.notice');
    }
}
