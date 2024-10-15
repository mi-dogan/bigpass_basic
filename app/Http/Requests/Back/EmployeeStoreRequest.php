<?php

namespace App\Http\Requests\Back;

use App\Models\City;
use App\Models\District;
use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'profile_img' => 'nullable|image|mimes:png,jpg,jpeg',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:employees,email',
            'phone' => 'required|regex:/05[0,3,4,5,6][0-9]\d\d\d\d\d\d\d$/',
            'shift_id' => 'exists:shifts,id',
            'degree' => 'required|max:255',
            //'position_id' => 'required|exists:positions,id',
            'department_id' => 'exists:departments,id',
            'adress' => 'nullable|string',
            'marital_status' => 'nullable|integer',
            'obstacle_rating' => 'nullable|integer',
            'child_count' => 'nullable|integer',
            'educational_level' => 'nullable|integer',
            'urgent_name' => 'nullable|max:255',
            'proximity' => 'nullable|between:0,3',
            'urgent_phone' => 'nullable|regex:/05[0,3,4,5,6][0-9]\d\d\d\d\d\d\d$/',
            'degree' => 'required|max:255',
            'registration_number' => 'required|string|max:20',
            'father_name' => 'nullable|max:255',
            'mother_name' => 'nullable|max:255',
            //'birthdate' => 'date',
            'volume_number' => 'nullable|max:12',
            'serial_number' => 'nullable|max:6',
            'family_serial_number' => 'nullable|max:12',
            'identification_number' => 'nullable|regex:/^[1-9]{1}[0-9]{9}[02468]{1}$/',
            'retired_registration_number' => 'nullable|max:12',
            'neighbourhood' => 'nullable|max:255',
            'blood_group' => 'nullable|integer',
            'card_no' => 'required|string|max:255',
            'city_id' => 'nullable|exists:cities,id',
            'district_id' => 'nullable|exists:districts,id',
            'birth_city_id' => 'nullable|integer',
            'birth_district_id' => 'nullable|integer',
        ];
    }


    public function messages(): array
    {
        return [
            'profile_img' => 'nullable|image|mimes:png,jpg,jpeg',
            'name.required' => 'Ad soyad boş bırakılamaz.',
            'name.max' => 'Ad soyad en fazla 255 karakter olmalıdır.',
            'email.required' => 'E-posta adresi boş bırakılamaz.',
            'email.email' => 'Lütfen geçerli bir e-posta adresi giriniz.',
            'email.max' => 'E-posta adresi en fazla 255 karakter olmalıdır.',
            'email.unique' => 'E-posta adresi sistemde kayıtlı.',
            'phone.required' => 'Telefon numarası boş bırakılamaz.',
            'phone.regex' => 'Lütfen geçerli bir telefon numarası giriniz.',
            'phone.unique' => 'Telefon numarası sistemde kayıtlı.',
            'shift_id.required' => 'Vardiya boş bırakılamaz.',
            'shift_id.exists' => 'Vardiya bulunamadı.',
            'degree.required' => 'Ünvan boş bırakılamaz.',
            'degree.max' => 'Ünvan en fazla 255 karakter olmalıdır.',
            'role_id.required' => 'Erişim türü boş bırakılamaz.',
            'role_id.exists' => 'Erişim Türü bulunamadı.',
            'position_id.required' => 'Pozisyon boş bırakılamaz.',
            'position_id.exists' => 'Pozisyon bulunamadı.',
            'branch_id.required' => 'Şube boş bırakılamaz.',
            'branch_id.exists' => 'Şube bulunamadı.',
            'department_id.required' =>  'Departman boş bırakılamaz.',
            'password.required' => 'Şifre boş bırakılamaz.',
            'password.min' => 'Şifre en az 6 karakter olmalıdır.',
            'password.max' => 'Şifre en fazla 255 karakter olmalıdır.',
            'password.confirmation' => 'Şifreler uyuşmuyor.',

            'urgent_name.required' => 'Ad soyad boş bırakılamaz.',
            'urgent_name.max' => 'Ad soyad en fazla 255 karakter olmalıdır.',
            'proximity.required' => 'Yakınlık derecesi boş bırakılamaz.',
            'proximity.integer' => 'Lütfen geçerli bir yakınlık derecesi seçiniz.',
            'urgent_phone.required' => 'Telefon numarası boş bırakılamaz.',
            'urgent_phone.regex' => 'Lütfen geçerli bir telefon numarası giriniz.',

            'registration_number.required' => 'Sicil no boş bırakılamaz.',
            'registration_number.max' => 'Sicil no en fazla 20 karakter olmalıdır.',
            'identification_number.required' => 'TC kimlik numarası boş bırakılamaz.',
            'identification_number.regex' => 'Lütfen geçerli bir tc kimlik numarası giriniz.',
            'city_id.required' => 'Lütfen bir il seçiniz.',
            'city_id.exists' => 'Lütfen geçerli bir il seçiniz.',
            'district_id.required' => 'Lütfen bir ilçe seçiniz.',
            'district_id.exists' => 'Lütfen geçerli bir ilçe seçiniz.',
            'father_name.required' => 'Baba adı boş bırakılamaz.',
            'father_name.max' => 'Baba adı en fazla 255 karakter olmalıdır.',
            'mother_name.required' => 'Anne adı boş bırakılamaz.',
            'mother_name.max' => 'Anne adı en fazla 255 karakter olmalıdır.',
            'birthdate.required' => 'Doğum tarihi boş bırakılamaz.',
            'birthdate.date' => 'Lütfen geçerli bir tarih giriniz.',
            'birth_city_id.required' => 'Doğum yeri il boş bırakılamaz.',
            'birth_city_id.integer' => 'Lütfen geçerli bir il seçiniz.',
            'birth_district_id.required' => 'Doğum yeri ilçe boş bırakılamaz.',
            'birth_district_id.integer' => 'Lütfen geçerli bir ilçe seçiniz.',
            'volume_number.required' => 'Cilt no boş bırakılamaz.',
            'volume_number.max' => 'Cilt en fazla 12 karakter olmalıdır.',
            'serial_number.required' => 'Sıra no boş bırakılamaz.',
            'serial_number.max' => 'Sıra no en fazla 6 karakter olmalıdır.',
            'family_serial_number.required' => 'Aile sıra no en fazla 12 karakter olmalıdır.',
            'card_no.required' => 'Kart no boş bırakılamaz.',
            'card_no.max' => 'Kart no en fazla 255 karakter olmalıdır.',
            'blood_group.required' => 'Lütfen bir kan gurubu seçiniz.',
            'blood_group.integer' => 'Lütfen geçerli bir kan gurubu seçiniz.',
            'retired_registration_number.reqıired' => 'Emekli sicil no boş bırakılamaz.',
            'retired_registration_number.max' => 'Emekli sicil no en fazla 12 karakter olmalıdır.',
        ];
    }

    public function withValidator($validator)
    {
        if ($validator->fails()) {
            $city = City::query()->where('id', $this->city_id)->first();
            $birth_city = City::query()->where('id', $this->birth_city_id)->first();
            if ($city && $birth_city) {
                $birth_districts = District::query()->where('city_id', $birth_city->id)->get();
                $districts = District::query()->where('city_id', $city->id)->get();
                return redirect()->back()->with(['districts' => $districts, 'birth_districts' => $birth_districts]);
            }
        }
    }
}
