<?php
class Dormitory extends CI_Controller
{
    public function __construct(){
        date_default_timezone_set('Asia/Taipei');
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_dorm');
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

}
