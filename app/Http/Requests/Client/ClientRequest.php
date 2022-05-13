<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'title'=>'required'
        ];

        return $rules;
    }

    public function data(){
        
        
        $inputs=[
            'sector_id'               => $this->get('sector_id'),
            'title' => $this->get('title'),
            'position'=> $this->get('position'),
            'company'=> $this->get('company'),
            'content'   => $this->get('content'),
            'is_published' => ($this->get('is_published') ? $this->get('is_published') : '') == 'on' ? '1' : '0',
            'is_status' => ($this->get('is_status') ? $this->get('is_status') : '') == 'on' ? '1' : '0',
            'is_featured' => ($this->get('is_featured') ? $this->get('is_featured') : '') == 'on' ? '1' : '0'

        ];
      
        if ($this->has('publish')) {
            $inputs['is_published'] = 1;
        }

        return $inputs;
    }
}
