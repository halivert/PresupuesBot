<?php

namespace App\Http\Requests;

use App\Models\Card;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Card::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'string|required',
            'closing_date' => 'integer|required|min:1|max:28',
            'payment_due_date' => [
                'integer',
                'nullable',
                'max:28',
                "min:$this->closing_date",
            ],
            'credit_limit' => 'integer|nullable',
        ];
    }
}
