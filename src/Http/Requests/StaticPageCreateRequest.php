<?php

namespace Ourgarage\StaticPages\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Notifications;
use App\Http\Requests\Request;

class StaticPageCreateRequest extends Request
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
        $rules = [
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
            'meta_title' => 'required',
        ];

        return $rules;
    }

    public function response(Array $errors)
    {
        return redirect()->back()->withInput();
    }


    public function formatErrors(Validator $validator)
    {
        foreach ($validator->errors()->all() as $error) {
            Notifications::danger($error, 'page');
        }

        return $validator->errors()->getMessages();
    }
}
