<?php

namespace App\Http\Controllers\Auth;


use App\Http\Requests\Auth\ForgotRequest;
use App\User;
use App\Http\Services\MailService;
use System\Session\Session;

class ForgotController{

    private $redirectTo='/home';

    public function view(){
        return view('auth.forgot');
    }

    public function forgot(){

        if (Session::get('forgot.time')!=false && Session::get('forgot.time')>time()){
            error('forgot','please wait 2 min and try again');
            return back();
        }
        else{

            Session::set('forgot.time',time()+120);
            $request=new ForgotRequest();
            $input=$request->all();
            $user=User::where('email',$input['email'])->get();
            if (empty($user)){
                error('forgot','user does not exist');
                return back();
            }
            $user=$user[0];
            $user->remember_token=generateToken();
            $user->remember_token_expire=date("Y-m-d H:i:s",strtotime(' + 10 min'));
            $user->save();

            $message='
            <h2>  بازیابی رمز عبور   </h2>
            <p>برای بازیابی رمز عبور خود روی لینک زیر کلیک کنید</p>
            <p style="text-align: center">
                <a href="'.route('auth.reset-password.view',[$user->remember_token]).'"> بازیابی رمز عبور </a>
            </p>
             
        ';

            $mailService=new MailService();
            $mailService->send($input['email'],' بازیابی رمز عبور',$message);
            flash('forgot','email send success');
            return redirect($this->redirectTo);

        }
    }

}
