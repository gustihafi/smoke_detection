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
        $data['smoke'] = $this->m_moni->get_smoke();
        $data['count'] = $this->m_moni->count_smoke();
        $this->load->view('template/topbar',$data);
        $this->load->view('template/sidebar');
        $this->load->view('monitoring/index');
        $this->load->view('template/footer');
    }

    public function add(){
        $data = array(
			'id_dorm' => $_POST['id_dorm'] ,
			'temp_lvl' => $_POST['temperature'], 
			'hum_val' => $_POST['humidity'],
			'smoke_lvl' => $_POST['smoke']
		);
        if($this->m_moni->add($data)){
            echo "New record created successfully";
        }else {
            $this->db->_error_message();
         }
    }

    public function telegram(){
        $apiToken = "5456917539:AAGMN3qHs2oWUkzfAgtyuXoTpO4jroX-VT0";

        $string = '<b>bold</b>, <strong>bold</strong>
        <i>italic</i>, <em>italic</em>
        <u>underline</u>, <ins>underline</ins>
        <s>strikethrough</s>, <strike>strikethrough</strike>, <del>strikethrough</del>
        <span class="tg-spoiler">spoiler</span>, <tg-spoiler>spoiler</tg-spoiler>
        <b>bold <i>italic bold <s>italic bold strikethrough <span class="tg-spoiler">italic bold strikethrough spoiler</span></s> <u>underline italic bold</u></i> bold</b>
        <a href="http://www.example.com/">inline URL</a>
        <a href="tg://user?id=123456789">inline mention of a user</a>
        <code>inline fixed-width code</code>
        <pre>pre-formatted fixed-width code block</pre>
        <pre><code class="language-python">pre-formatted fixed-width code block written in the Python programming language</code></pre>';
    
        $data = [
            'chat_id' => '1470184033',
            'text' => $string,
            'parse_mode' => "html"
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );
    
        echo '<pre>';
        print_r(json_decode($response));
        die();
    }

    public function email(){

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

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
        $mail->addAddress('gustiahmadhafiii@gmail.com', ' ');     // Add a recipient

        // $mail->addReplyTo('asalemailPengirim');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Reset Password';
        $mail->Body    = '<strong>Hai, You received this email because there was a request to reset your password.</strong><br><strong>Silakan klik link ini:</strong>';

        if ($mail->send()) {
            echo "Send email successfully";
        } else {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
