<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('chat_model');
        $this->load->model('login_model');

    }
    public function index(){
        $this->load->view('template/header');
        $this->load->view('chat/login');
        $this->load->view('template/footer');
    }

    public function showAll(){
        $query=  $this->chat_model->showAll();
        if($query){
            $result['users']  = $this->chat_model->showAll();
        }
        echo json_encode($result);
    }


    public function addUser(){
        $config = array(
            array('field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required'
            ),
            array('field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required'
            ),

        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $result['error'] = true;
            $result['msg'] = array(
                'username'=>form_error('username'),
                'password'=>form_error('password'),

            );

        }else{
            $data = array(
                'username'=> $this->input->post('username'),
                'password'=> $this->input->post('password')
            );


            if($this->chat_model->addUser($data)){
                $result['error'] = false;
                $result['msg'] ='User added successfully';
            }

        }
        echo json_encode($result);


    }




    public function process(){
        // Load the model
        $this->load->model('login_model');
        // Validate the user can login
        $result = $this->login_model->validate();
        // Now we verify the result


        if(! $result){
            // If user did not validate, then show them login page again
            $msg = '<font color=red>Invalid username and/or password.</font><br />';
            $this->index($msg);
        }else{

            return true;
        }
    }


}

