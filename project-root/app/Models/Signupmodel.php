<?php

namespace App\Models;

use CodeIgniter\CodeIgniter;
use CodeIgniter\Entity;


class Signupmodel extends \CodeIgniter\Model
{
    public $db;
    protected $table = "signup";
    protected $allowedFields = ['fname', 'lname', 'age', 'number', 'password_hash', 'activation_hash'];
    
    protected $returnType = 'App\Entities\Signupent';
    protected $validationRules = [
        'fname' => 'required',
        'lname' => 'required',
        'password_hash' =>'required|min_length[9]',
        'password_confirmation' =>'required|matches[password_hash]',
        'age' => 'required',
        'number' => 'required'
        ///'email' => required|valid_email|is_unique[signup.email]
    ];
    protected $validationMessages = [
        'password_confirmation' => [
            'required' => 'please confirm the password',
            'matches' => 'please enter the matched password'
        ],
        'password_hash' => [
            'required' => 'password field is empty',
            'min_length' => '9 charactes are only allowed'
        ]
    ];

    //protected $beforeInsert = ['hashPassword'];
    protected function hashPassword(array $data){
        if(isset($data['data']['password'])){
            $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
            unset($data['data']['password']);
        }
        return $data;
    }
    public function login($fname, $password){
        //pwede return $this->table('signup')->where(['fname'=> $fname, 'password_hash'=> $password])->first();
        return $this->where(['fname'=> $fname, 'password_hash'=> $password])->first();
    }
    public function other_login($fname, $password){
        //pwede return $this->table('signup')->where(['fname'=> $fname, 'password_hash'=> $password])->first();
        return $this->where(['fname'=> $fname, 'password_hash'=> $password]) //multiple queries
                    ->where(['is_admin'=> 1])
                    ->first();
    }
    
    
}
