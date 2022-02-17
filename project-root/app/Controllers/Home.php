<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function page1(){
        return view('pages/page1');
    }
    public function testemail(){
        $email = \Config\Services::email();
        $email = service('email');//use this instead of $email->

        $email->setFrom('trd.clifordnazareno@gmail.com', 'cliford nazareno');
        $email->setTo('clifordnazareno@yahoo.com');

        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class one.');

        if($email->send()){
            echo "send";
        }else{
            echo $email->printDebugger();
        }
    }


    public function sendactivationemail(){
        $email = \Config\Services::email();

        $email->setFrom('trd.clifordnazareno@gmail.com', 'cliford nazareno');
        $email->setTo('clifordnazareno@yahoo.com');

        $email->setSubject('Email Test');
        $email->setMessage('Testing the email class one.' );

        if($email->send()){
            echo "send";
        }else{
            echo $email->printDebugger();
        }
    }
    
}
