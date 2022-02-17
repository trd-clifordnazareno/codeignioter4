<?php

namespace App\Controllers;
use \App\Models\Task_model;


class Task extends BaseController
{
    private $model;
    public function __construct(){
        $this->model = new Task_model();///saa update ra ne gegamit
    }
    public function index()
    {
        $data = new \App\Models\Task_model();
        $model = $data->findAll();
        echo view('pages/include/header');
        echo view("pages/task/task", ['task' => $model] );
        echo view('pages/include/footer');
    }
    public function page1(){
        return view('pages/task/task');
    }
    public function showuser($id){
        $taskmodel = new \App\Models\Task_model();
        $model = $taskmodel->find($id);


        if($model === null){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("$id was not found");
        }


        return view("pages/task/showtask",['task' => $model] );

    }
    public function insert(){
        $taskmodel = new Task_model();
        ///other insert
        $array = [
            'firstname' => $this->request->getPost('fname') ///pwede pang insert pero dile magamit ang id
        ];
        ///$insert = $taskmodel->save($array);
        ///other insert
        
        $data = [
            'firstname' => $this->request->getPost('fname'), ///insert magamit ang id
            'lastname' => $this->request->getPost('lname')
        ];
        $insert = $taskmodel->insert($data);
        if($insert === false) :
            
            return redirect()->back()
                             ->with('errors', $taskmodel->errors())
                             ->with('warning', 'Invalid data')
                             ->withInput();
            //dd($taskmodel);
            else :
                
                return redirect()->to("/task/showuser/$insert")
                                ->with('info', 'Task inserted successfully');
                //dd($insert);
            endif;       
    }
    public function show(){
        $taskmodel = new Task_model();
        $data['res'] = $taskmodel->sample();
        return view("pages/task/show", $data);
    }
    public function viewedit($id){
        $taskmodel = new \App\Models\Task_model();
        $model['task'] = $taskmodel->find($id);


        return view("pages/task/edit", $model );
    }
    public function update($id){
        
        $data = array(
            'firstname' => $this->request->getPost('fname'),
            'lastname' => $this->request->getPost('lname')
        );
        //$this->model->disablelastnamevalidation();
        //unset($data['lastname']);//to unset lastname not tested
        
        $update = $this->model->update($id, $data);
            
        if($update){
            return redirect()->to("/task/showuser/$id")
                            ->with('info', 'Task updated successfully');
        }else{
           return redirect()->back()
                            ->with('errors', $this->model->errors())
                            ->with('warning', 'Invalid data')
                            ->withInput();
        }
    }
    public function delete($id){
        
        $model = $this->model->find($id);
        if($this->request->getMethod() === "post"){
            $this->model->delete($id);
            return redirect()->to('/task')
                             ->with('info', 'Task deleted');
        }
        if($model === null){
             throw new \CodeIgniter\Exceptions\PageNotFoundException("$id was not found");
        }
        return view("pages/task//delete", array('task'=>$model));

    }
    public function show_all_users(){
        
        $login = $this->model->show_all_users();// pagination
        foreach($login as $log){
            echo $log['firstname'] . "<br>";
        }
        echo $this->model->pager->links();
    }
}
