<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
//ini wajib dipanggil paling atas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//ini sesuaikan foldernya ke file 3 ini
require_once("PHPMailer/src/PHPMailer.php");
require_once("PHPMailer/src/SMTP.php");
require_once("PHPMailer/src/Exception.php");

class Forgot_pass extends CI_Controller
{
    public function __construct(){
        date_default_timezone_set('Asia/Taipei');
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_account');
    }

    public function index(){
        $this->load->view('login/forgot'); 
    }

    public function process_token(){
        $email = $this->input->post('email');
        $userInfo = $this->m_account->getUserInfoByEmail($email);

        if (!$userInfo) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Failed!</h4>
                Email address is wrong, try again!
                </div>');
            redirect(site_url('login'), 'refresh');
        }

        $token = $this->m_account->insertToken($userInfo->user_id);
        $qstring = $this->base64url_encode($token);
        $url = site_url() . '/forgot_pass/reset_password/token/' . $qstring;
        $link = '<a href="' . $url . '">' . $url . '</a>';

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
 
        $email              = $this->input->post('email');

        //Server settings
        $mail->SMTPDebug = 3;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'smokedetection.ksu@gmail.com';                     // SMTP username
        $mail->Password   = 'yjsjpxhdcgupvfox';                               // SMTP password
        $mail->SMTPSecure = 'tls';
        // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('smokedetection.ksu@gmail.com', 'Smokedetection.com');
        $mail->addAddress($email, ' ');     // Add a recipient

        // $mail->addReplyTo('asalemailPengirim');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Reset Password';
        $mail->Body    = '<strong>Hai, You received this email because there was a request to reset your password.</strong><br><strong>Silakan klik link ini:</strong>'.$link;

        if ($mail->send()) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                your email is correct. please check your email!
                </div>');
            redirect(site_url('login'));
        } else {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function reset_password()
    {
        $token = $this->base64url_decode($this->uri->segment(4));
        $cleanToken = $this->security->xss_clean($token);

        $user_info = $this->m_account->isTokenValid($cleanToken); //either false or array();          

        if (!$user_info) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-ban"></i> Failed!</h4>
                Tokens is invalid
                </div>');
            redirect(site_url('login'), 'refresh');
        }

        $data = array(
            'title' => 'Reset Password',
            'email' => $user_info->email,
            'token' => $this->base64url_encode($token)
        );

            $this->load->view('login/reset_password', $data);
    }

    public function process_reset_password()
    {
        // $post = $this->input->post(NULL, TRUE);
        // $cleanPost = $this->security->xss_clean($post);
        $hashed = md5($_POST['password']);
        $pass = $hashed;
        $email = $_POST['email'];
        unset($_POST['passconf']);
        if (!$this->m_account->updatePassword($email,$pass)) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Failed!</h4>
            Fail to update password
            </div>');
            redirect(site_url('login'));
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            update password successfully
            </div>');
            redirect(site_url('login'));
        }
    }

    public function base64url_encode($data)
    {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public function base64url_decode($data)
    {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }
}
