<?php
class Chat_model extends CI_Model{


    public function showAll(){
        $this->db->select('id, username, message,FROM_UNIXTIME(chat_date_time) as chat_date_time ,reply_id');
        $query = $this->db->get('chat_messages');
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function userLogin($data){
        $query =  $this->db->select( 'username' )
            ->where('username', $data['username'])
            ->where('password', $data['password'])
            ->get('users')
            ->result();
        if(count( $query ) > 0){
            return $data['username'];
        }else{
            return false;
        }
    }


    public function addUser($data){
        return $this->db->insert('users', $data);
    }

    public function sendMessage($data){

        $this->db->insert('chat_messages', $data);

    }




}
?>