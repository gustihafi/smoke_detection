<?php
defined('BASEPATH') or exit('No direct script access allowed');
 
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
//ini wajib dipanggil paling atas
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//ini sesuaikan foldernya ke file 3 ini
require_once("PHPMailer/src/PHPMailer.php");
require_once("PHPMailer/src/SMTP.php");
require_once("PHPMailer/src/Exception.php");
 
class Test extends CI_Controller
{
 
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('login/test');
    }
 
    public function kirim_proses()
    {
        if (isset($_POST['submit'])) {
            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);
 
            $no_invoice         = $this->input->post('pesan');
            $nama_pengirim      = $this->input->post('judul');
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
            $mail->setFrom('email@gmail.com', 'Gilacoding.com');
            $mail->addAddress($email, $nama_pengirim);     // Add a recipient
 
            // $mail->addReplyTo('asalemailPengirim');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
 
            // Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Konfirmasi Pembayaran dari Localhost dengan Codeigniter';
            $mail->Body    = '<h1>Halo, Admin.</h1> <p>Ada pesanan baru dengan nomor invoice ' . $no_invoice . '</p> ';
 
            if ($mail->send()) {
                echo 'Konfirmasi pembayaran telah berhasil';
            } else {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Tekan dulu tombolnya bos";
        }
    }
}