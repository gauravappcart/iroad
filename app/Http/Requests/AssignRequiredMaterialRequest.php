<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignRequiredMaterialRequest extends FormRequest
{
    public function rules()
    {
        return [
            'assign_quantity' => 'required|integer|min:1',
        ];
    }
}
