<?php

namespace App\Http\Requests\Book;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'            => 'required|string',
            'author'           => 'required|string',
            'isbn'             => 'required|string|unique:books',
            'available_copies' => 'required|integer',
            'book_cover_url'   => 'required|string'
        ];
    }
}
