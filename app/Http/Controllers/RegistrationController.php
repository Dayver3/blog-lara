<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 *
 */
class RegistrationController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function indexAction()
    {
        return view('registration');
    }

    /**
     * @param RegistrationRequest $registrationRequest
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function registrationAction(RegistrationRequest $registrationRequest)
    {
        //User::registrationUser();
        $re =
        $data = $registrationRequest->only([ 'nickname', 'email', 'phone_number', 'address','access']);
        $data['password'] = $registrationRequest->getPasswordHash();

        if (!User::checkUser($data)) {

                User::create($data);
                $user_id = User::getUserId($registrationRequest->only(['email']));
                request()->session()->put('user_id',$user_id[0]->user_id);
//            if(User::userAccess($registrationRequest->only('email'))) {
//                Auth::guard('admin');
//            }
                return view('homePage');

        }else{

            echo 'plz use correct info';
            return view('registration');
        }
    }
}
