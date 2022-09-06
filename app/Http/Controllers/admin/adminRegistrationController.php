<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;

/**
 *
 */
class adminRegistrationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function registrationAction(){
        return view('adminRegistration');
    }

    /**
     * @param RegistrationRequest $registrationRequest
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function registrAction(RegistrationRequest $registrationRequest){
        $data = $registrationRequest->only([ 'nickname', 'email', 'phone_number', 'address','access']);
        $data['password'] = $registrationRequest->getPasswordHash();
        $data['is_admin']=1;
        if (!User::checkUser($data)) {

            User::create($data);
            $user_id = User::getUserId($registrationRequest->only(['email']));
            request()->session()->put('user_id',$user_id[0]->user_id);
//            if(User::userAccess($registrationRequest->only('email'))) {
//                Auth::guard('admin');
//            }
            return view('adminMainPage');

        }else{

            echo 'Введите правильные данные';
            return view('adminRegistration');
        }
    }


}
