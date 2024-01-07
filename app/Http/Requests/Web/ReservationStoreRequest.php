<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'phone' => 'required|min:9',
            'barber' => 'required|exists:admins,id',
            'service' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required|numeric|min:0|max:24',
        ];
    }

    public function messages(): array
    {
        return [
            'time.required' => 'Vyplňte prosím čas návštěvy',
            'time.numeric' => 'Čas návštěvy není správně vyplněno',
            'time.min' => 'Čas návštěvy není správně vyplněno',
            'time.max' => 'Čas návštěvy není správně vyplněno',
            'date.required' => 'Vyplňte prosím datum návštěvy',
            'date.date' => 'Nesprávný formát data návštěvy',
            'barber.exists' => 'Požadovaného holiče se nám nepodařilo najít',
            'barber.required' => 'Musíte zvolit holiče',
            'service.exists' => 'Požadovanou službu se nám nepodařilo najít',
            'service.required' => 'Musíte zvolit službu',
            'phone.required' => 'Vyplňte prosím telefon',
            'phone.min' => 'Telefon musí mít minimálně 9 znaků',
            'email.required' => 'Vyplňte prosím svůj email',
            'email.email' => 'Email není ve správném tvaru',
            'name.required' => 'Vyplňte prosím svoje jméno',
            'name.min' => 'Jméno musí mít minimálně 3 znaky',
        ];
    }


}
