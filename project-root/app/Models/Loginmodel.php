<?php

namespace App\Models;

use CodeIgniter\CodeIgniter;
use CodeIgniter\Entity;


class Loginmodel extends \CodeIgniter\Model
{
    public $db;
    protected $table = "signup";
    protected $allowedFields = ['fname', 'password_hash'];
    
    protected $validationRules = [
        'fname' => 'required',
        'password_hash' =>'required'
        ///'email' => required|valid_email|is_unique[signup.email]
    ];
    protected $validationMessages = [
        'fname' => [
            'required' => 'please input fname'
        ],
        'password_hash' => [
            'required' => 'please input password'
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
    
    
}
