<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookValidation extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:2',
            'author' => 'required|min:2',
            'content'=> 'required',
            'image'=> 'required',
            'year'=> 'required',
            'quantity'=> 'required',
        ];
    }
    public function messages(){
        return [
            'name.required'=>'ban chua nhap ten sach',
            'name.min'=>'ten sach toi thieu 2 ky tu',
            'author.required' => 'ban chua nhap ten tac gia',
            'author.min' => ' ten tac gia chua toi thieu 2 ky tu',
            'content.required'=> 'ban chua nhap noi dung',
            'image.required'=> 'ban chua nhap hinh anh',
            'year.required'=> 'ban chua nhap nam xuat ban',
            'quantity.required'=> 'ban chua ban so luong',
        ];
    }
}
