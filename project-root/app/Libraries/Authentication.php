<?php

namespace App\Libraries;

class Authentication
{
    public function login($fname, $password){
        $model = new \App\Models\Signupmodel;
        //pwede ra $login = $model->where(['fname'=> $fname, 'password_hash'=> $password])->first();
        $login = $model->login($fname, $password);
        if($login === null){
            return false;
        }


        if(! $login->is_active){
            return false;
        }
        $session = session();
        $session->regenerate();
        $session->set('user_name', $login->fname);
        return true;

    }
    public function logout(){
        $data = session()->has('user_name');
        session()->remove($data);
        session()->destroy();
        //or
        //session()->destroy();
    }
    public function get_current_user(){
        if(!session()->has('user_name')){
            return null;
        }
        $model = new \App\Models\Signupmodel;
        return $model->where(['fname'=> session()->get('user_name')])->first();
    }
    public function isLoggedIn(){
        if(session()->has('user_name')){
            return true;
        }else{
            return null;
        }
    }
}