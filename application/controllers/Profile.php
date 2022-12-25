<?php

class Profile extends CI_Controller
{
    public function __construct(){
        date_default_timezone_set('Asia/Taipei');
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_account');
    }

    public function index(){
        $id = $this->session->user_id;
        $data['menu'] = "Profile";
        $data['profile'] = $this->m_account->getUser($id);
        $this->load->view('template/topbar',$data);
        $this->load->view('template/sidebar');
        $this->load->view('profile/index');
        $this->load->view('template/footer');
    }

    public function edit_profile(){
        $data = array(
			'name' => $_POST['name'], 
			'email' => $_POST['email']
        );
        $id = $_POST['user_id'];
        $this->m_account->edit_profile($data,$id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Edit Data success!
            </div>');
        redirect(base_url('profile'));
    }

    public function edit_password(){
        if(md5($_POST['last_password']) == $_POST['pass']){
            $data = array(
                'pass' => md5($_POST['new_password'])
            );
            $id = $_POST['user_id'];
            $this->m_account->edit_password($data,$id);
            $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Edit Data success!
                </div>');
            redirect(base_url('profile'));
        }else{
            $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Failed!</h4>
                Edit Password Fail! Your last password is wrong!
                </div>');
            redirect(base_url('profile'));
        }
    }
}
