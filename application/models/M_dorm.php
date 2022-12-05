<?php

class M_dorm extends CI_Model
{
    public function get(){
        return $this->db->get('dormitory')->result_array();
    }

    public function add($data){
        $this->db->insert('dormitory',$data);
    }

    public function edit($data,$id){
        $this->db->where('id_dorm',$id);
		$this->db->update('dormitory',$data);
    }

    public function hapus($id){
        $where = array(
			'id_dorm' => $id
			);
		$this->db->where($where);
		$this->db->delete('dormitory');
    }
}
