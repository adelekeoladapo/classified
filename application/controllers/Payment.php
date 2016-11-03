<?php

class Payment extends CI_Controller {
    
    private $model, $misc_model, $user_model, $mail_model;
    
    function __construct() {
        parent::__construct();
        $this->load->model('PaymentModel');
        $this->load->model('MiscModel');
        $this->load->model('UserModel');
        $this->load->model('MailModel');
        $this->model = new PaymentModel();
        $this->misc_model = new MiscModel();
        $this->user_model = new UserModel();
        $this->mail_model = new MailModel();
    }
    
    function getPayments(){
        echo json_encode($this->model->getPayments());
    }
    
    function getUserPayments(){
        $user_id = $this->input->post('user-id');
        echo json_encode($this->model->getUserPayments($user_id));
    }


    /** This is where VoguePay submits to. The function gets the transaction details from voguepay and keep it in the database **/
    function addPayment(){
        $transaction_id = $this->input->post('transaction_id');
        $json = file_get_contents('https://voguepay.com/?v_transaction_id='.$transaction_id.'&type=json&demo=true');
        $transaction = json_decode($json);
        
        $payment = new stdClass();
        $payment->transaction_id = $transaction->transaction_id;
        $payment->total_price = $transaction->total;
        $payment->amount_paid = $transaction->total_paid_by_buyer;
        $payment->amount_credited = $transaction->total_credited_to_merchant;
        $payment->merchant_ref = $transaction->merchant_ref;
        $payment->status = $transaction->status;
        $payment->date = $transaction->date;
        $payment->method = $transaction->method;
        $payment->user_id = $transaction->merchant_ref;

        $this->model->insertPayment($payment);

        //Approved or Pending or Failed or Disputed
        /*
        if(true){//$payment->status == "Approved"){
            $data['status'] = 'success';
            $data['title'] = "Congratulations! Your payment was successfully approved.";
            $data['content'] = "You will receive an email from us shortly once your account has been setup";
            $this->load->view('info-page', $data);
        }else if($payment->status == "Failed"){
            $data['status'] = 'failed';
            $data['title'] = "Error! Your payment was not successful.";
            $data['content'] = "Please quote your order reference number (".$payment->transaction_id.") if you wish to contact us about this order.";
            $this->load->view('info-page', $data);
        }else{
            redirect(base_url().'my-profile');
        } 
        */

        redirect(base_url());

    }


            
    function addPaymentX(){
        $data = new stdClass();
        $data->payment_user_id = $this->input->post('user_id');
        $data->payment_token = $this->input->post('token');
        $data->payment_amount = $this->input->post('amount');
        $data->payment_date = $this->penguin->getTime();
        $data->payment_code = $this->misc_model->generateID('HB-', 'payment', 'payment_code', 10);
        
        $insert_id = $this->model->insertPayment($data);
        
        if($insert_id){
            echo true;
            
            /** Send Payment Confirmation Mail **/
            $user = $this->user_model->getUser($data->payment_user_id);
            $content = '<tr>
                            <td bgcolor="#30373b" style="padding: 40px 30px 40px 30px;">
                                <b style="color: #fff; font-family: Arial, sans-serif; font-size: 15px; display: block; font-weight: normal; text-align: center;">Hello, '.$user->user_firstname.'</b>

                                    <p style="border: solid 1px #a9adb0; width: 10%; margin: auto; margin-top: 20px; margin-bottom: 20px"></p>

                                    <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; font-weight: normal; text-align: center">
                                            We have received your order and will be processing it shortly.
                                    </p>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#fff" style="border-bottom: solid 1px #eee;">
                                <p style="color: #86888a; font-family: Arial, sans-serif; font-size: 17px; font-weight: normal; text-align: center; line-height: 25px;">
                                    Your Order Information: 
                                    <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; text-align: center; line-height: 25px">
                                            Description: Homebuds Premium Service<br>
                                            Order Code: '.$data->payment_code.' <br>
                                            Amount: '.$data->payment_amount.' <br>
                                            Duration: 1 Year
                                    </p>
                                </p>
                                <p style="color: #86888a; font-family: Arial, sans-serif; font-size: 14px; font-weight: normal; text-align: center; line-height: 22px;">
                                    You will receive an email from us shortly once your account has been setup. <br>
                                    Please quote your order reference number if you wish to contact us about this order.
                                </p>
                                ';

            $this->mail_model->sendEmail('HomeBuds', 'info@homebuds.co.uk', $user->user_email, 'Payment Confirmation', $content);
        }else{
            echo false;
        }
        
    }
    
    
}
