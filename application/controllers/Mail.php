<?php

class Mail extends CI_Controller {
    
    private $model; 
    
    function __construct() {
        parent::__construct();
        $this->load->model('MailModel');
        $this->model = new MailModel();
    }
    
    function mailSeller(){
        $mail = new stdClass();
        $mail->mail_sender_id = $this->input->post('sender-id');
        $mail->mail_receiver_id = $this->input->post('receiver-id');
        $mail->mail_content = $this->input->post('content');
        $mail->mail_date_sent = $this->penguin->getTime();
        $mail->mail_sender_name = $this->input->post('sender-name');
        $mail->mail_sender_email = $this->input->post('sender-email');
        $mail->mail_sender_phone = $this->input->post('sender-phone');
        $mail->mail_product_id = $this->input->post('product-id');
        echo $this->model->insertMail($mail);
    }
    
    function deleteMail(){
        $id = $this->input->post('mail-id');
        echo $this->model->deleteMail($id);
    }
    
    
}
