<?php
class Dashboard extends CI_Controller
{
    public function __construct(){
        date_default_timezone_set('Asia/Taipei');
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_moni');
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
        $data['menu'] = "Dashboard";
        $data['dorm1'] = $this->m_moni->get_last(1);
        $data['dorm2'] = $this->m_moni->get_last(2);
        $data['dorm3'] = $this->m_moni->get_last(3);
        $this->load->view('template/topbar');
        $this->load->view('template/sidebar',$data);
        $this->load->view('dashboard/index');
        $this->load->view('template/footer');
    }
}
