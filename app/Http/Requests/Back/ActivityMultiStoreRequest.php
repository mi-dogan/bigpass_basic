<?php

namespace App\Http\Requests\Back;

use App\Models\CardError;
use App\Models\Device;
use App\Models\Employee;
use App\Models\EmployeeCard;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ActivityMultiStoreRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        // Gelen isteğin doğrudan bir dizi olduğunu belirterek `entries` anahtarına taşıyoruz.
        $this->merge([
            'entries' => $this->all()
        ]);
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $rules = [
            'entries' => 'required|array',
            'entries.*.device_id' => 'required|exists:devices,device_id',
            'entries.*.cardNo' => 'required|exists:employee_cards,card_no',
            'entries.*.request_type' => 'nullable|string',
            'entries.*.entryTime' => 'required|integer'
        ];

        $entries = $this->input('entries', []);
        foreach ($entries as $index => &$entry) {
            // Ensure each entry is an array before processing
            if (!is_array($entry)) {
                continue; // Skip this entry if it's not an array
            }

            if (isset($entry['request_type']) && $entry['request_type'] === 'qr') {
                $rules["entries.$index.cardNo"] = 'nullable';
            } else {
                $card_no = $entry['cardNo'] ?? '';
                if (strlen($card_no) < 10) {
                    $card_no = str_pad($card_no, 10, "0", STR_PAD_LEFT);
                    $entry['cardNo'] = $card_no;
                }

                $employeeCard = EmployeeCard::query()
                    ->where('card_no', $card_no)
                    ->whereHas('employee', function ($query) {
                        $query->whereNull('deleted_at');
                    })
                    ->first();
                $employee = Employee::query()->where('id', $employeeCard->employee_id)->first();
                if (!$employeeCard) {
                    CardError::create([
                        "card_no" => strtoupper($card_no),
                        "device_id" => $entry['device_id'] ?? null,
                        "comapny_id" => $employee->company_id,
                    ]);
                }
            }
        }

        $this->merge(['entries' => $entries]);

        return $rules;
    }



    public function messages(): array
    {
        return [
            'entries.*.cardNo.required' => 'Kart numarası boş bırakılamaz.', // 'cardNo' kullanıcıdan alınan ad
            'entries.*.cardNo.exists' => 'Kart numarası sistemde kayıtlı değil.', // 'cardNo' kullanıcıdan alınan ad
            'entries.*.device_id.required' => 'Cihaz ID boş bırakılamaz.',
            'entries.*.device_id.exists' => 'Cihaz ID bulunamadı.',
            'entries.*.entryTime.required' => 'Giriş zamanı belirtilmelidir.',
            'entries.*.entryTime.integer' => 'Giriş zamanı geçerli bir sayı olmalıdır.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'message' => $validator->errors()->first(),
        ]));
    }
}
