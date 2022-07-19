<?php

namespace App\Http\Requests\Lent;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\LentFrequencyType;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function validationData()
    {
        $params = $this->all();
        if (isset($params['interval'])) {
            $params['interval'] = (int)$params['interval'];
        }
        return $params;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'lend_money' => 'required|integer|max:10000',
            'interval' => 'enum_value:' . LentFrequencyType::class,
        ];
    }
}
