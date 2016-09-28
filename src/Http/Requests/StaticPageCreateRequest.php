<?php

namespace Ourgarage\StaticPages\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Notifications;

class StaticPageCreateRequest extends FormRequest
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
        if(is_null($this->route('id'))){
            $rules = [
                'title' => 'required|unique:static_pages',
                'content' => 'required|unique:static_pages',
                'slug' => 'required|unique:static_pages',
                'meta_keywords' => 'required',
                'meta_description' => 'required',
                'meta_title' => 'required',
            ];
        } else {
            $rules = [
                'title' => 'required|unique:static_pages,title,'.$this->route('id'),
                'content' => 'required|unique:static_pages,content,'.$this->route('id'),
                'slug' => 'required|unique:static_pages,slug,'.$this->route('id'),
                'meta_keywords' => 'required',
                'meta_description' => 'required',
                'meta_title' => 'required',
            ];
        }

        return $rules;
    }

    public function response(Array $errors)
    {
        return redirect()->back()->withInput();
    }


    protected function formatErrors(Validator $validator)
    {
        foreach ($validator->errors()->all() as $error) {
            Notifications::danger($error, 'page');
        }

        return $validator->errors()->getMessages();
    }
}
