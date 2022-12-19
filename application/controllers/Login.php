<?php
class Login extends CI_Controller
{
    public function __construct(){
        date_default_timezone_set('Asia/Taipei');
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_login');
    }

    public function index(){
        $this->load->view('login/index');
    }

    public function proses_login(){

        $email = $this->input->post('email');
        $pass = $this->input->post('pass');

        $cek =  $this->M_login->cek_user('users',$email);
        if( $cek->num_rows() != 1){
            $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Failed!</h4>
                This Email have not register!
                </div>');
            redirect(base_url());
        }else {
             
        $md5Pass = md5($pass);
        $isi = $cek->row();
        if($isi->pass == $md5Pass){
            $data_session = array(
                            'user_id' => $isi->user_id,
                            'name' => $isi->name,
                            'image' => $isi->image,
                            'email' => $email,
                            'date_create' => $isi->date_create,
                            'login_date' => $isi->login_date,
                            'status' => "login"
            );

            $this->session->set_userdata($data_session);

            $this->M_login->edit_user(['email' => $email],['login_date' => date('Y-m-d H:i:s')]);

            $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Login success!
                </div>');
            redirect(base_url('dashboard'));

            }else {
                $this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Failed!</h4>
                Username or Password id wrong!
                </div>');
                redirect(base_url());
            }
        }
    }

    public function logout(){
		$this->session->sess_destroy();
		redirect('');
	}
}

?>