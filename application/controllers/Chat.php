<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Home controller class
 * This is only viewable to those members that are logged in
 */
class Chat extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('Chat_model','chat');
        $this->check_isvalidated();
    }

    public function index(){

        $this->load->view('template/header');
        $this->load->view('chat/chat');
        $this->load->view('template/footer');
    }

    private function check_isvalidated(){


        if(! $this->session->userdata('validated')){
            redirect('login');
        }
    }

    public function sendMessage(){

        $data = array(

            'username'=>  $this->session->userdata('username'),
            'message'=> $this->input->post('message'),
            'chat_date_time'=>time(),
            'reply_id' => 0
        );
        $this->chat->sendMessage($data);

        $query=  $this->chat->showAll();
        if($query){
            $result['users']  = $this->chat->showAll();
        }
        echo json_encode($result);
    }


    public function showAll(){
        $query=  $this->chat->showAll();
        if($query){
            $result['users']  = $this->chat->showAll();
        }
        echo json_encode($result);
    }
}
?>