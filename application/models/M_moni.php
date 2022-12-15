<?php

class M_moni extends CI_Model
{
    public function get(){
        return $this->db->query('SELECT * FROM temp a JOIN dormitory b ON a.id_dorm=b.id_dorm ORDER BY a.created_at ASC')->result_array();
    }

    public function get_last($id_dorm){
        return $this->db->query('SELECT * FROM temp WHERE id_dorm='.$id_dorm.' ORDER BY created_at DESC LIMIT 1')->result_array();
    }

}
