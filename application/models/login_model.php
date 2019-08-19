<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function validate(){
        // grab user input
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('username'));
        $data = array(
            'username'=> $this->security->xss_clean($this->input->post('username')),
            'password'=> $this->security->xss_clean($this->input->post('username'))
        );

        // Run the query
        $this->db->insert('users', $data);
        // Let's check if there are any results
        if($this->db->affected_rows() > 0)
        {
            $data['validated'] = true;
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }
}
?>