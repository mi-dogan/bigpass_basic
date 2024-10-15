<?php

namespace App\Http\Controllers\Back;

use App\Models\City;
use App\Models\Branch;
use App\Models\Companys;
use App\Models\Position;
use App\Models\Department;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Back\EmployeeStoreRequest;
use App\Http\Requests\Back\EmployeeUpdateRequest;
use App\Models\Employee;
use App\Models\EmployeeCard;
use App\Models\EmployeeInformation;
use App\Models\EmployeeUrgent;
use App\Models\Shift;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::byCompany()->department()->with('department')->orderBy('id', 'desc')->get();
        return view('back.pages.employee.index', compact('employees'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companyId = auth()->user()->company_id;
        $EmployeeCount = Employee::where('company_id', $companyId)->count();
        $currentCompany = Companys::query()->where('id', $companyId)->first();
        $EmployeeLimit = $currentCompany->Employee_limit;
        if ($EmployeeLimit == 0) {
            $data['branchs'] = Branch::byCompany()->get();
            $data['departments'] = Department::byCompany()->get();
            $data['positions'] = Position::byCompany()->get();
            $data['cities'] = City::query()->get();
            $data['shifts'] = Shift::byCompany()->where('status', true)->get();
            return view('back.pages.employee.create', $data);
        } else if ($EmployeeCount >= $EmployeeLimit) {
            return response()->json(['limitReached' => true]);
        } else {
            $data['branchs'] = Branch::byCompany()->get();
            $data['departments'] = Department::byCompany()->get();
            $data['positions'] = Position::byCompany()->get();
            $data['cities'] = City::query()->get();
            $data['shifts'] = Shift::byCompany()->where('status', true)->get();
            return view('back.pages.employee.create', $data);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequest $request)
    {
        $image = null;
        if ($request->file('profile_image')) {
            if ($image) {
                if (Storage::exists($image)) {
                    Storage::delete($image);
                }
            }
            $file = $request->file('profile_image');
            $path = 'profiles/' . Str::slug($request->user()->account->name ?? 'root');
            $image_name = Str::slug($request->name, '-') . '-' . now()->format('Y-m-d_h-i-s') . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs($path, $file, $image_name);
            $image = $path . '/' . $image_name;
        }

        $employee = Employee::query()->create([
            'company_id' => auth()->user()->company_id,
            'profile_image' => $image,
            'name' => $request->name,
            'degree' => $request->degree,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
            'position_id' => $request->position_id,
            'department_id' => $request->department_id ?? Auth::user()->department_id,
            'shift_id' => $request->shift_id
        ]);

        EmployeeInformation::query()->create([
            'company_id' => auth()->user()->company_id,
            'adress' => $request->adress,
            'marital_status' => $request->marital_status,
            'obstacle_rating' => $request->obstacle_rating,
            'child_count' => $request->child_count,
            'educational_level' => $request->educational_level,
            'employee_id' => $employee->id
        ]);

        EmployeeUrgent::query()->create([
            'company_id' => auth()->user()->company_id,
            'name' => $request->urgent_name,
            'proximity' => $request->proximity,
            'phone' => $request->urgent_phone,
            'employee_id' => $employee->id
        ]);

        EmployeeCard::query()->create([
            'company_id' => auth()->user()->company_id,
            'registration_number' => $request->registration_number,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'birthdate' => $request->birthdate,
            'volume_number' => $request->volume_number,
            'serial_number' => $request->serial_number,
            'family_serial_number' => $request->family_serial_number,
            'identification_number' => $request->identification_number,
            'retired_registration_number' => $request->retired_registration_number,
            'neighbourhood' => $request->neighbourhood,
            'blood_group' => $request->blood_group,
            'card_no' => $request->card_no,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'birth_city_id' => $request->birth_city_id,
            'birth_district_id' => $request->birth_district_id,
            'department_id' => $request->department_id ?? Auth::user()->department_id,
            'employee_id' => $employee->id
        ]);

        return redirect()->route('calisanlar.index')->with(['success' => 'Çalışan başarıyla eklendi.']);
    }


    public function edit(string $id)
    {
        $employee = Employee::query()->where('id', $id)->firstOrFail();
        $data['departments'] = Department::all();
        $data['positions'] = Position::all();
        $data['cities'] = City::all();
        $data['employee'] = $employee;
        $data['shifts'] = Shift::query()->where('status', true)->get();
        return view('back.pages.employee.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeUpdateRequest $request, string $id)
    {
        $employee = Employee::query()->where('id', $id)->firstOrFail();

        $image = null;
        if ($request->file('profile_image')) {
            if ($image) {
                if (Storage::exists($image)) {
                    Storage::delete($image);
                }
            }
            $file = $request->file('profile_image');
            $path = 'profiles/' . Str::slug($request->user()->account->name ?? 'root');
            $image_name = Str::slug($request->name, '-') . '-' . now()->format('Y-m-d_h-i-s') . '.' . $file->getClientOriginalExtension();
            Storage::putFileAs($path, $file, $image_name);
            $image = $path . '/' . $image_name;
        }

        $information = EmployeeInformation::query()->where('employee_id', $employee->id)->firstOrCreate();
        $urgent = EmployeeUrgent::query()->where('employee_id', $employee->id)->firstOrCreate();
        $card = EmployeeCard::query()->where('employee_id', $employee->id)->firstOrCreate();

        $employee->update([
            'profile_image' => $image,
            'name' => $request->name,
            'degree' => $request->degree,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $employee->password,
            'phone' => $request->phone,
            'position_id' => $request->position_id,
            'department_id' => $request->department_id ?? Auth::user()->department_id,
            'shift_id' => $request->shift_id
        ]);

        $information->update([
            'adress' => $request->adress,
            'marital_status' => $request->marital_status,
            'obstacle_rating' => $request->obstacle_rating,
            'child_count' => $request->child_count,
            'educational_level' => $request->educational_level,
        ]);

        $urgent->update([
            'name' => $request->urgent_name,
            'proximity' => $request->proximity,
            'phone' => $request->urgent_phone,
        ]);

        $card->update([
            'registration_number' => $request->registration_number,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'birthdate' => $request->birthdate,
            'volume_number' => $request->volume_number,
            'serial_number' => $request->serial_number,
            'family_serial_number' => $request->family_serial_number,
            'identification_number' => $request->identification_number,
            'retired_registration_number' => $request->retired_registration_number,
            'neighbourhood' => $request->neighbourhood,
            'blood_group' => $request->blood_group,
            'card_no' => $request->card_no,
            'city_id' => $request->city_id,
            'district_id' => $request->district_id,
            'birth_city_id' => $request->birth_city_id,
            'birth_district_id' => $request->birth_district_id,
            'department_id' => $request->department_id ?? Auth::user()->department_id,
        ]);

        return redirect()->route('calisanlar.index')->with(['success' => 'Çalışan başarıyla güncellendi.']);
    }

    /**
     * All the specified resource from storage.
     */

    public function employees(string $id)
    {
        $employees = Employee::with('department')->get();

        return response()->json([
            'employees' => $employees
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::query()->where('id', $id)->firstOrFail();
        $employee->delete();

        return redirect()->back()->with(['success' => 'Çalışan başarıyla silindi.']);
    }
}
