<?php

namespace App\Controllers;

class Signup extends BaseController
{
    public function index(){
        helper('userdetails');
        return $this->new();
    }
    public function new()
    {
        return view('pages/signup/signup');
    }
    public function signup(){
        $new = new \App\Entities\Signupent($this->request->getPost());
        $model = new \App\Models\Signupmodel;

        // for email activation
        $new->startActivation();
        // end for email activation

        $insert = $model->insert($new);
        if($insert){
            $this->sendactivationemail($new);
            echo "ok";
        }else{
            return redirect()->to('Signup/new')->with('errors', $model->errors())->with('warning', 'invalid data')->withInput();
        }
        
    }
    public function loginpage(){
        return view('pages/signup/login');
    }
    public function home(){
        helper('userdetails');
        echo view('pages/signup/home');
    }
    public function login(){
        
        if(session()->has('user_name')){
            // $model = new \App\Models\Signupmodel;
            // $login['username'] = $model->where(['fname'=> session()->get('user_name')])->first();
            // echo view('pages/signup/home', $login);



            //pwede helper('userdetails');
            //echo view('pages/signup/home');


            return redirect()->to('Signup/home');
        }else{
            $fname = $this->request->getPost('fname');
            $password_hash =$this->request->getPost('password_hash');

            //pwede  $auth = new \App\Libraries\Authentication;
            $auth = service('auth');
            if($auth->login($fname, $password_hash)){
                $redirect_url = session('redirect_url') ?? '/Signup/home'; // redirect to the original requested page that hasnt login
                unset($_SESSION['redirect_url']); // redirect to the original requested page that hasnt login
                return redirect()->to($redirect_url)
                             ->with('loginsuccessful', 'login successful')
                             ->withInput();
            }else{
                return redirect()->to('Signup/loginpage')
                             ->with('warning', 'incorrect details')
                             ->withInput();
            }

            
        }
        
    }
    public function login_manual(){
        
        if(session()->has('user_name')){
            // $model = new \App\Models\Signupmodel;
            // $login['username'] = $model->where(['fname'=> session()->get('user_name')])->first();
            // echo view('pages/signup/home', $login);
            echo view('pages/signup/home');
        }else{
            $fname = $this->request->getPost('fname');
            $password_hash =$this->request->getPost('password_hash');
            $model = new \App\Models\Signupmodel;
            $login = $model->where(['fname'=> $fname, 'password_hash'=> $password_hash])->first();
            if($login === null){
                return redirect()->to('Signup/loginpage')
                             ->with('warning', 'incorrect details')
                             ->withInput();
            }else{
                $session = session();
                $session->regenerate();
                $session->set('user_name', $login->fname);
                return redirect()->to('Signup/home')
                             ->with('loginsuccessful', 'login successful')
                             ->withInput();


            // $model = new \App\Models\Signupmodel;
            // $login['username'] = $model->where(['fname'=> session()->get('user_name') or $login->fname])->first();
            // echo view('pages/signup/home', $login);
            }
        }
        
    }
    public function logout(){
        $data = session()->has('user_name');
        session()->remove($data);
        session()->destroy();
        //or session()->destroy();
        return redirect()->to('Signup/logoutmessage');
    }
    public function logoutmessage(){
        return redirect()->to('Signup/loginpage')->with('info', 'logout successfully');
    }
    public function fil(){
        echo 1;
    }
    public function notallowediflogin(){
        echo "forbidden not allowed to access the page right now";
    }
    public function sendactivationemail($user){echo $user->token;
        $email = \Config\Services::email();

        $email->setFrom('trd.clifordnazareno@gmail.com', 'cliford nazareno');
        $email->setTo('clifordnazareno@yahoo.com');

        $email->setSubject('Email Test');
        $site_url = site_url("/signup/activated/$user->token");
        $email->setMessage("<a href=$site_url>activate</a>");

        if($email->send()){
            echo "send";
        }else{
            echo $email->printDebugger();
        }
    }
    
}
