<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LeadStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['string', 'required'],
            'email' => ['email', 'required'],
            'phone' => ['int', 'required'],
            'price' => ['int', 'required'],
            'spent_30_sec' => 'required'
        ];
    }
}
