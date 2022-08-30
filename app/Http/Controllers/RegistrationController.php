<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function indexAction()
    {
        return view('registration');
    }

    public function registrationAction(RegistrationRequest $registrationRequest)
    {
        //User::registrationUser();
        $re =
        $data = $registrationRequest->only(['login', 'nickname', 'email', 'phone_number', 'address']);
        $data['password'] = $registrationRequest->getPasswordHash();
        if (!User::checkUser($data)) {

                User::create($data);
                $user_id = User::getUserId($registrationRequest->only(['email']));
                request()->session()->setId($user_id[0]->user_id);
                return view('mainMenu');

        }else{

            echo 'Введите правильные данные';
            return view('registration');
        }
    }
}
