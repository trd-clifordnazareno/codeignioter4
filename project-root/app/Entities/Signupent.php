<?php

namespace App\Entities;


class Signupent extends \CodeIgniter\Entity{
    public function startActivation(){
        // for email activation
        $this->token = bin2hex(random_bytes(16));
        $this->activation_hash = hash_hmac('sha256', $this->token, $_ENV['hash_secret_key']);
        // end for email activation
    }
}