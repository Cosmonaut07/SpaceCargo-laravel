<?php

namespace App\Http\Requests;

use App\Models\Package;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePackageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $package = Package::find($this->route('id'));
        return $this->user()->can('update', $package);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'package_code' => ['required', 'unique:packages,package_code,'.$this->route('id')],
            'price' => ['required'],
            'item_count' => ['required'],
            'shop_address' => ['required'],
            'comment' => ['nullable'],
        ];
    }
}
