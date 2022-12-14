<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_account extends CI_Model
{
    public function getUser($id){
        return $this->db->query('SELECT * FROM users WHERE user_id='.$id)->result_array();
    }

    public function getUserInfo($id){
        $q = $this->db->get_where('users', array('user_id' => $id), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        } else {
            error_log('no user found getUserInfo(' . $id . ')');
            return false;
        }
    }

    public function edit_profile($data,$id){
        $this->db->where('user_id',$id);
		$this->db->update('users',$data);
    }

    public function edit_password($data,$id){
        $this->db->where('user_id',$id);
		$this->db->update('users',$data);
    }

    public function getUserInfoByEmail($email)
    {
        $q = $this->db->get_where('users', array('email' => $email), 1);
        if ($this->db->affected_rows() > 0) {
            $row = $q->row();
            return $row;
        }
    }

    public function insertToken($user_id)
    {
        $token = substr(sha1(rand()), 0, 30);
        $date = date('Y-m-d');

        $string = array(
            'token' => $token,
            'user_id' => $user_id,
            'created' => $date
        );
        $query = $this->db->insert_string('tokens', $string);
        $this->db->query($query);
        return $token . $user_id;
    }

    public function isTokenValid($token)
    {
        $tkn = substr($token, 0, 30);
        $uid = substr($token, 30);

        $q = $this->db->get_where('tokens', array(
            'tokens.token' => $tkn,
            'tokens.user_id' => $uid
        ), 1);

        if ($this->db->affected_rows() > 0) {
            $row = $q->row();

            $created = $row->created;
            $createdTS = strtotime($created);
            $today = date('Y-m-d');
            $todayTS = strtotime($today);

            if ($createdTS != $todayTS) {
                return false;
            }

            $user_info = $this->getUserInfo($row->user_id);
            return $user_info;
        } else {
            return false;
        }
    }

    public function updatePassword($email,$pass)
    {
        $this->db->where('email', $email);
        $this->db->update('users', array('pass' => $pass));
        return true;
    }
}
