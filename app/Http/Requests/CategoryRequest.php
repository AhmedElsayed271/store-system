<?php

namespace App\Http\Requests;

use App\Rules\Filter;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $id = $this->route('category');
        return [
            "name" => "required|unique:categories,name,$id",
            // "name" => "filter:html,css,js", //new Filter(),
            // function ($attribute,$value,$fails) {
            //     if ($value == "laravel") {
            //         $fails("The Name can't be laravel");
            //     }
            // },
            "parent_id" => "nullable|int|exists:categories,id",
            "photo" => "required|image|mimes:png,jpg",
            "status"=> "required|in:active,archived,inactive"
        ];
    }
}
