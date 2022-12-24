<?php

class M_moni extends CI_Model
{
    public function get(){
        return $this->db->query('SELECT * FROM temp a JOIN dormitory b ON a.id_dorm=b.id_dorm ORDER BY a.created_at DESC')->result_array();
    }

    public function get_last($id_dorm){
        return $this->db->query('SELECT * FROM temp a JOIN dormitory b ON a.id_dorm=b.id_dorm WHERE a.id_dorm='.$id_dorm.' AND DAY(created_at)=DAY(NOW()) AND MONTH(created_at)=MONTH(NOW()) AND YEAR(created_at)=YEAR(NOW()) ORDER BY created_at DESC LIMIT 1')->result_array();
    }

    public function get_smoke(){
        return $this->db->query('SELECT * FROM temp a JOIN dormitory b ON a.id_dorm=b.id_dorm WHERE smoke_lvl>=300 AND DAY(created_at)=DAY(NOW()) AND MONTH(created_at)=MONTH(NOW()) AND YEAR(created_at)=YEAR(NOW()) ORDER BY a.created_at DESC')->result_array();
    }

    public function count_smoke(){
        return $this->db->query('SELECT * FROM temp a JOIN dormitory b ON a.id_dorm=b.id_dorm WHERE smoke_lvl>=300 AND DAY(created_at)=DAY(NOW()) AND MONTH(created_at)=MONTH(NOW()) AND YEAR(created_at)=YEAR(NOW()) ORDER BY a.created_at DESC')->num_rows();
    }

    public function get_grafik($id_dorm){
        $query = $this->db->query("SELECT * FROM temp a JOIN dormitory b ON a.id_dorm=b.id_dorm WHERE a.id_dorm='$id_dorm' ORDER BY a.created_at DESC");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function get_time(){
        $query = $this->db->query("SELECT created_at FROM temp a JOIN dormitory b ON a.id_dorm=b.id_dorm ORDER BY a.created_at DESC");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function add($data){
        $this->db->insert('smoke',$data);
    }

}
