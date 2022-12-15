<?php
class Monitoring extends CI_Controller
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
        $data['menu'] = "Monitoring";
        $data['moni'] = $this->m_moni->get();
        $this->load->view('template/topbar',$data);
        $this->load->view('template/sidebar');
        $this->load->view('monitoring/index');
        $this->load->view('template/footer');
    }
}
