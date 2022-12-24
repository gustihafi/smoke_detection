<?php
class Dormitory extends CI_Controller
{
    public function __construct(){
        date_default_timezone_set('Asia/Taipei');
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model(array('m_dorm','m_moni'));
        if($this->session->userdata('status') != 'login'){
            $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Failed!</h4>
                Harus Login!
                </div>');
            redirect('');
        }
    }

    public function index(){
        $data['menu'] = "Dormitory";
        $data['dorm'] = $this->m_dorm->get();
        $data['smoke'] = $this->m_moni->get_smoke();
        $data['count'] = $this->m_moni->count_smoke();
        $this->load->view('template/topbar',$data);
        $this->load->view('template/sidebar');
        $this->load->view('dormitory/index');
        $this->load->view('template/footer');
    }

    public function add(){
		$data = array(
			'id_dorm' => '' ,
			'room' => $_POST['room'], 
			'dorm_type' => $_POST['dorm_type'],
			'longitude' => $_POST['long'],
            'latitude' => $_POST['lat']
		);
        $this->m_dorm->add($data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Add Data success!
            </div>');
        redirect(base_url('dormitory'));
    }

    public function edit(){
        $data = array(
			'room' => $_POST['room'], 
			'dorm_type' => $_POST['dorm_type'],
			'longitude' => $_POST['long'],
            'latitude' => $_POST['lat']
        );
        $id = $_POST['id_dorm'];
        $this->m_dorm->edit($data,$id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Edit Data success!
            </div>');
        redirect(base_url('dormitory'));
    }

    public function hapus($id){
        $this->m_dorm->hapus($id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Delete Data success!
            </div>');
        redirect(base_url('dormitory'));
    }

}
