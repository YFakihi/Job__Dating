<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRaquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'name'=>'required|min:10|max:255',
                'description'=>'required|string',
                'industry'=>'required|string',
                'size'=>'required|string',
                'location'=>'required|string',
        ];
    }

    public function messages():array{
        return ['title.required' => 'vous devez remplir le champ du titre',
        'title.min' => 'Le titre doit avoir au moins :min caractères.',
        'title.max' => 'Le titre ne doit pas dépasser :max caractères.',
        'author.required' => 'Le champ auteur est requis.',
        'author.string' => 'Le champ auteur doit être une chaîne de caractères.',
        'genre.required' => 'Le champ genre est requis.',
        'genre.string' => 'Le champ genre doit être une chaîne de caractères.',];
}
}
