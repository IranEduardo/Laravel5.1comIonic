<?php

namespace CodeDelivery\Http\Requests;

use CodeDelivery\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class AdminClientRequest extends Request
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
        $userId = $this->input('userID');
        $email_validation = 'required|email|unique:users,email';
        if (isset($userId))
            $email_validation = 'required|email|unique:users,email,' . $userId;

        return [
            'user.email'   => $email_validation,
            'user.name'    => 'required|min:3',
            'phone'        => 'required|min:3',
            'address'      => 'required|min:3',
            'city'         => 'required',
            'state'        => 'required',
            'zipcode'      => 'required',
        ];
    }
}
