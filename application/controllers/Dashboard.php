<?php
class Dashboard extends CI_Controller
{
    public function __construct(){
        date_default_timezone_set('Asia/Taipei');
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('');
    }

    public function index(){
        $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        $this->load->view('dashboard/index');
    }
}
