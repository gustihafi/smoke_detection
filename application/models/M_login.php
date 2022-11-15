<?php

class M_login extends CI_Model
{
    public function cek_user($tabel,$email){
        return $this->db->select('*')
                ->from($tabel)
                ->where('email',$email)
                ->get();
    }

    function edit_user($where, $data)
	{
		$this->db->where($where);
		return $this->db->update('users', $data);
	}
}
