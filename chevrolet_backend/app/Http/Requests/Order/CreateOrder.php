<?php

namespace App\Http\Requests\Order;

use App\Enums\OrderStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateOrder extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'user_id' => 'required|numeric',
            'client_id' => 'sometimes|numeric',
            'start_time' => 'sometimes|date',
            'end_time' => 'sometimes|date',
            'vin_code' => 'sometimes|string',
            'description' => 'required|string',
            'completed_work' => 'sometimes|string',
            'status' => ['required', Rule::in(OrderStatus::STATUS)]

        ];
    }
}
