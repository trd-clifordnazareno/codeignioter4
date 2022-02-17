<?php

namespace App\Models;

use CodeIgniter\CodeIgniter;

class Task_model extends \CodeIgniter\Model
{
    public $db;
    protected $table = "users";
    protected $allowedFields = ['firstname', 'id', 'lastname'];
    protected $useTimestamps = true;
    protected $validationRules = array(
        'firstname' => 'required|numeric',
        'lastname' => 'required|numeric'
    );
    protected $validationMessages = array(
        'firstname' => array(
            'required' => 'please enter a firstname'
        ),
        'lastname' => array(
            'required' => 'please enter a lastname'
        )
    );

    public function get()
    {
        $this->db = \Config\Database::connect();
    }
    


    public function sample(){
        $db      = \Config\Database::connect();
        $builder = $db->table('users');
        $query   = $builder->get();
        return $query->getResult();


        /*
        $db      = \Config\Database::connect();
        $builder = $db->query('select * from users');
        $query   = $builder;
        return $query->getResult();
        */
    }


    function updatedata($data, $id){
        return $this->db->table('users')->update($data, ['id', $id]);
    }
    public function disablelastnamevalidation(){
        unset($this->validationRules['lastname']);
    }
    public function skipvalidate(){// pwede para ma skip ang validation sa tanang fields
       $this->skipValidation(true)// para maskipan ang validation
            ->protect(false);// mainsert bisan wala sa allowed fields
    }
    public function show_all_users(){
        return $this->where(['firstname!='=> 'qwert'])
             ->orderBy('firstname')
             ->paginate(5);
    }
}
