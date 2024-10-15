<?php

namespace App\Http\Requests\Back;

use App\Models\CardError;
use App\Models\EmployeeCard;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ActivityStoreRequest extends FormRequest
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
//        return [
//            'card_no' => 'required|exists:employee_cards,card_no',
//            'device_id' => 'required|exists:devices,device_id'
//        ];

        $rules = [
            'device_id' => 'required|exists:devices,device_id'
        ];

        // request_type varsa ve belirli bir durumu karşılıyorsa card_no kuralını pasif yap
        if ($this->has('request_type') && $this->input('request_type') == 'qr') {
            $rules['card_no'] = 'nullable'; // card_no kuralını pasif yap
        } else {
            $cardNo = $this->input('card_no');
            if(strlen($this->input('card_no')) < 10){
                $cardNo = str_pad($this->input('card_no'), 10, "0", STR_PAD_LEFT);
                $this->merge(["card_no" => $cardNo]);
            }

            $employeeCard = EmployeeCard::query()->where('card_no', $this->input('card_no'))->first();

            if (!$employeeCard) {
                CardError::create([
                    "card_no" => strtoupper($this->input('card_no')),
                    "device_id" => $this->input('device_id'),
                ]);
            }

            $rules['card_no'] = 'required|exists:employee_cards,card_no';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'card_no.required' => 'card_no boş bırakılamaz.',
            'card_no.exists' => 'card_no sistemde kayıtlı değil.',
            'device_id.required' => 'device_id boş bırakılamaz.',
            'device_id.exists' => 'device_id bulunamadı.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => $validator->errors()->first()
        ]));
    }
}
