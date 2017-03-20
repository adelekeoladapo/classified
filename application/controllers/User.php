<?php

class User extends CI_Controller {
    
    private $model;
    
    private $product_model;
    
    private $category_model;
    
    private $mail_model;
    
    private $advert_model;
    
    private $payment_model;
    
    function __construct() {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('ProductModel');
        $this->load->model('CategoryModel');
        $this->load->model('MailModel');
        $this->load->model('AdvertModel');
        $this->load->model('LocationModel');
        $this->load->model('PaymentModel');
        $this->model = new UserModel();
        $this->product_model = new ProductModel();
        $this->category_model = new CategoryModel();
        $this->mail_model = new MailModel();
        $this->advert_model = new AdvertModel();
        $this->payment_model = new PaymentModel();
    }
    
    function registerUser(){
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_error_delimiters('<div class="ci-error help-block smk-error-msg">', '</div>');
        
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Address','trim|required|is_unique[user.user_email]',
            array(
                    'required'      => 'You have not provided %s.',
                    'is_unique'     => 'This %s already exists.'
            )
        );
        $this->form_validation->set_rules('username', 'Username','trim|required|is_unique[user.user_username]',
            array(
                    'required'      => 'You have not provided %s.',
                    'is_unique'     => 'This %s already exists.'
            )
        );
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[40]');
        $this->form_validation->set_rules('terms', 'Terms & Conditions', 'trim|required');
        
        if($this->form_validation->run() == FALSE){
            $this->load->view('sign-up');
        }else{
            $user = new stdClass();
            $user->user_firstname = $this->input->post('firstname');
            $user->user_lastname = $this->input->post('lastname');
            $user->user_email = $this->input->post('email');
            $user->user_username = $this->input->post('username');
            $user->user_password = $this->encrypt->encode_password($this->input->post('password'));
            $user->user_date_registered = $this->penguin->getTime();
            
            $id = $this->model->insertUser($user);
            
            if($id){
                $content = '<tr>
                                <td bgcolor="#30373b" style="padding: 40px 30px 40px 30px;">
                                    <b style="color: #fff; font-family: Arial, sans-serif; font-size: 15px; display: block; font-weight: normal; text-align: center;">Hello, '.$user->user_firstname.'</b>

                                    <p style="border: solid 1px #a9adb0; width: 10%; margin: auto; margin-top: 20px; margin-bottom: 20px"></p>

                                    <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; font-weight: normal; text-align: center">
                                            Click the button below to activate your account
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#fff" style="border-bottom: solid 1px #eee;">
                                    <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; font-weight: normal; text-align: center; line-height: 25px;">
                                        Your email address: <br> <a href="#">'.$user->user_email.'</a>
                                    </p>
                                    <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; font-weight: normal; text-align: center;     line-height: 30px;">
                                        <a href="'.  base_url()."activate-account/".$this->encrypt->do_encode($id).'" style="background-color: #79b657; border: solid 1px #79b657; padding: 10px 45px; border-radius: 4px; color: #fff; text-decoration: none">Activate my account</a>
                                    </p>';
                
                $this->mail_model->sendEmail('HomeBuds', 'info@homebuds.co.uk', $user->user_email, 'Activate Your Account', $content);
                $encrypted_email = $this->encrypt->do_encode($user->user_email);
                redirect(base_url().'user/registration-successful/'.$encrypted_email);
            }else{
                echo 'An error occurred';
            }
        }
        
    }
    
    
    
    
    function registerUser_(){
        
        $this->load->model('CountryModel');
        $this->load->model('StateModel');
        $data['countries'] = $this->CountryModel->getCountries();
        $data['states'] = $this->StateModel->getCountryStates(1);
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_error_delimiters('<div class="ci-error help-block smk-error-msg">', '</div>');
        
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email Address','trim|required|is_unique[user.user_email]',
            array(
                    'required'      => 'You have not provided %s.',
                    'is_unique'     => 'This %s already exists.'
            )
        );
        $this->form_validation->set_rules('username', 'Username','trim|required|is_unique[user.user_username]',
            array(
                    'required'      => 'You have not provided %s.',
                    'is_unique'     => 'This %s already exists.'
            )
        );
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[40]');
        $this->form_validation->set_rules('terms', 'Terms & Conditions', 'trim|required');
        
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('state', 'State', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('phone', 'Phone No', 'trim|required');
        
        
        if($this->form_validation->run() == FALSE){
            
            
            $this->load->view('sign-up-2', $data);
        }else{
            
            $loc = new stdClass();
            $loc->location_country_id = $this->input->post('country');
            $loc->location_state_id = $this->input->post('state');
            $loc->location_city = $this->input->post('city');
            $loc->location_address = $this->input->post('address');

            $this->load->model('LocationModel');
            $location_id = $this->LocationModel->insertLocation($loc);
            
            
            $user = new stdClass();
            $user->user_firstname = $this->input->post('firstname');
            $user->user_lastname = $this->input->post('lastname');
            $user->user_email = $this->input->post('email');
            $user->user_username = $this->input->post('username');
            $user->user_password = $this->encrypt->encode_password($this->input->post('password'));
            $user->user_date_registered = $this->penguin->getTime();
                    
            
            $user->user_location_id = $location_id;
            $user->user_phone = $this->input->post('phone');
            $user->user_account_type = 1;//$this->input->post('account-type');
            $user->user_status = 1;
            $user->user_date_activated = $this->penguin->getTime();
            
            $id = $this->model->insertUser($user);
            
            if($id){
                $content = '<tr>
                                <td bgcolor="#30373b" style="padding: 40px 30px 40px 30px;">
                                    <b style="color: #fff; font-family: Arial, sans-serif; font-size: 15px; display: block; font-weight: normal; text-align: center;">Hello, '.$user->user_firstname.'</b>

                                    <p style="border: solid 1px #a9adb0; width: 10%; margin: auto; margin-top: 20px; margin-bottom: 20px"></p>

                                    <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; font-weight: normal; text-align: center">
                                            Click the button below to activate your account
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#fff" style="border-bottom: solid 1px #eee;">
                                    <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; font-weight: normal; text-align: center; line-height: 25px;">
                                        Your email address: <br> <a href="#">'.$user->user_email.'</a>
                                    </p>
                                    <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; font-weight: normal; text-align: center;     line-height: 30px;">
                                        <a href="'.  base_url()."activate-account/".$this->encrypt->do_encode($id).'" style="background-color: #79b657; border: solid 1px #79b657; padding: 10px 45px; border-radius: 4px; color: #fff; text-decoration: none">Activate my account</a>
                                    </p>';
                
                $this->mail_model->sendEmail('HomeBuds', 'info@homebuds.co.uk', $user->user_email, 'Activate Your Account', $content);
                $encrypted_email = $this->encrypt->do_encode($user->user_email);
                redirect(base_url().'user/registration-successful/'.$encrypted_email);
            }else{
                echo 'An error occurred';
            }
        }
        
    }
    
    
    
    
    
    
    /*
     * Show successful message after registration
     */
    function show_success_register($encrypted_email){  
        $email = $this->encrypt->do_decode($encrypted_email);
        if($email){
            $data['email'] = $email;
            $this->load->view('registration-successful', $data);
        }else{
            show_404();
        }
    }
    
    /*
     * Activate Account
     */
    function activateAccount($encrypted_id){
        
        $user;
        $this->load->model('CountryModel');
        $this->load->model('StateModel');
        $id = $this->encrypt->do_decode($encrypted_id);
        if($id){
            $user = $this->model->getUser1($id);
            if(!$user){
                show_404();
            }else{
                $this->load->library('form_validation');
                $this->form_validation->set_error_delimiters('<div class="ci-error help-block smk-error-msg">', '</div>');

                $this->form_validation->set_rules('country', 'Country', 'trim|required');
                $this->form_validation->set_rules('state', 'State', 'trim|required');
                $this->form_validation->set_rules('city', 'City', 'trim|required');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('phone', 'Phone No', 'trim|required');
                //$this->form_validation->set_rules('account-type', 'Account Type', 'trim|required');
                
                if($this->form_validation->run() == FALSE){
                    $data['user'] = $user;
                    $data['countries'] = $this->CountryModel->getCountries();
                    $data['states'] = $this->StateModel->getCountryStates(1);
                    $this->load->view('activate-account', $data);
                }else{
                    $loc = new stdClass();
                    $loc->location_country_id = $this->input->post('country');
                    $loc->location_state_id = $this->input->post('state');
                    $loc->location_city = $this->input->post('city');
                    $loc->location_address = $this->input->post('address');
                    
                    $this->load->model('LocationModel');
                    $location_id = $this->LocationModel->insertLocation($loc);
                    
                    $u = new stdClass();
                    $u->user_location_id = $location_id;
                    $u->user_phone = $this->input->post('phone');
                    $u->user_account_type = 1;//$this->input->post('account-type');
                    $u->user_status = 1;
                    $u->user_date_activated = $this->penguin->getTime();
                    $this->model->updateUser($id, $u);
                    
                    /** Send congratulatory mail **/
                    $content = '<tr>
                                    <td bgcolor="#30373b" style="padding: 40px 30px 40px 30px;">
                                        <b style="color: #fff; font-family: Arial, sans-serif; font-size: 15px; display: block; font-weight: normal; text-align: center;">Welcome to HomeBuds, '.$user->user_firstname.'</b>

                                            <p style="border: solid 1px #a9adb0; width: 10%; margin: auto; margin-top: 20px; margin-bottom: 20px"></p>

                                            <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; font-weight: normal; text-align: center">
                                                    Below you will find your account information
                                            </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td bgcolor="#fff" style="border-bottom: solid 1px #eee;">
                                        <p style="color: #86888a; font-family: Arial, sans-serif; font-size: 17px; font-weight: normal; text-align: center; line-height: 25px;">
                                            Your Account Information: 
                                            <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; text-align: center; line-height: 25px">
                                                    Email: <a href="#">'.$user->user_email.'</a> <br>
                                                    Username: '.$user->user_username.' 
                                            </p>
                                        </p>
                                        <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; font-weight: normal; text-align: center; line-height: 30px;">
						<a href="'.base_url().'login" style="background-color: #79b657; border: solid 1px #79b657; padding: 10px 45px; border-radius: 4px; color: #fff; text-decoration: none">Login</a>
					</p>
                                        ';

                    $this->mail_model->sendEmail('HomeBuds', 'info@homebuds.co.uk', $user->user_email, 'Welcome to HomeBuds', $content);
                    
                    $this->load->view('activation-successful');
                }
            }
        }else{
            show_404();
        }
    }
    
    /*
     * Log user in
     */
    function login(){
        $data['error'] = "";
        $this->load->view('login', $data);
    }
    
    function doLogin(){
        $username = $this->input->post('username');
        $password = $this->encrypt->encode_password($this->input->post('password'));
        $id = $this->model->login($username, $password);

        if(!$id){
            $data['error'] = "Invalid username and/or password";
            $this->load->view('login', $data);
        }else {
            $user_status = $this->model->getUserStatus($id);
            if($user_status == 1){
                redirect(base_url().'my-profile');
            }else if($user_status == 2){
                echo 'Your account was deactivated, please contact the administrator';
            }else if($user_status == 0){
                echo 'Your account has not been activated. <br>Please check your email and follow the specified instruction.';
            }
        }
    }
    
    function logout(){
        session_destroy();
        redirect(base_url());
    }
    
    
    /*Manage Ads*/
    function manageAds(){
        $this->model->redirect_if_not_logged_in();
        
        $data['products'] = $this->product_model->getUserProducts($this->session->user_id);
        $data['adverts'] = $this->advert_model->getActivatedAdverts();
        
        $this->load->view('manage-ads', $data);
    }
    
    /** Edit Ad **/
    function editAd($slug_id){
        $this->model->redirect_if_not_logged_in();
        $query = $this->penguin->prepareSlug($slug_id);
        $product = $this->product_model->getProductWithSlugAndID($query->id, $query->slug);
        if(!$product){
            show_404();
            exit();
        }
        $data['product'] = $product;
        $data['base_categories'] = $this->category_model->getBaseCategories();
        $data['sub_categories'] = $this->category_model->getSubCategories($data['product']->category_parent_id);
        $data['category'] = $this->category_model->getCategory($product->category_parent_id);
        $data['products'] = $this->product_model->getUserProducts($this->session->user_id);
        $data['adverts'] = $this->advert_model->getActivatedAdverts();
        
        $this->load->view('edit-ad', $data);
    }
    
    
    /** Delete product **/
    function deleteProduct(){
        $id = $this->input->post('product-id');
        echo $this->product_model->deleteProduct($id);
    }
    
    /** User Mesages **/
    function showMessages(){
        $this->model->redirect_if_not_logged_in();
        $data['messages'] = $this->mail_model->getUserMails($this->session->user_id);
        $data['adverts'] = $this->advert_model->getActivatedAdverts();
        
        $this->load->view('messages', $data);
    }
    
    /** User Message **/
    function showMessage($slug_id){
        $this->model->redirect_if_not_logged_in();
        $query = $this->penguin->prepareSlug($slug_id);
        $mail = $this->mail_model->getMail($query->id);
        if(!$mail){
            show_404();
            exit();
        }
        $this->mail_model->readMail($query->id);
        $data['message'] = $mail;
        $data['adverts'] = $this->advert_model->getActivatedAdverts();
        
        $this->load->view('message', $data);
    }
    
    /** Get Users **/
    function getUsers(){
        echo json_encode($this->model->getUsers());
    }
    
    /** Get User **/
    function getUser(){
        $id = $this->input->post('user-id');
        echo json_encode($this->model->getUser($id));
    }
    
    
    /*
     * Forgot Password
     */
    function forgotPassword(){
        $data['error'] = "";
        $this->load->view('forgot-password', $data);
    }
    
    function doForgotPassword(){
        $email = $this->input->post('email');
        $user = $this->model->getUserByEmail($email);
        if($user){
            $encrypted_id = $this->encrypt->do_encode($user->user_id);
            /** Send password reset mail **/
            $content = '<tr>
                    <td bgcolor="#30373b" style="padding: 40px 30px 40px 30px;">
                            <b style="color: #fff; font-family: Arial, sans-serif; font-size: 15px; display: block; font-weight: normal; text-align: center;">Hello, '.$user->user_firstname.'</b>

                                    <p style="border: solid 1px #a9adb0; width: 10%; margin: auto; margin-top: 20px; margin-bottom: 20px"></p>

                                    <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; font-weight: normal; text-align: center">
                                                    HomeBuds Password Recovery
                                    </p>
                    </td>
            </tr>
            <tr>
                    <td bgcolor="#fff" style="border-bottom: solid 1px #eee;">
                            <p style="color: #86888a; font-family: Arial, sans-serif; font-size: 17px; font-weight: normal; text-align: center; line-height: 25px;">
                                    <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; text-align: center; line-height: 25px">
                                                    Someone recently requested a password change for your Dropbox account. <br>
                                                    If this was you, you can set a new password <a href="'.base_url().'reset-password/'.$encrypted_id.'">here</a>:
                                    </p>
                            </p>
                            <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; font-weight: normal; text-align: center; line-height: 30px;">
                                            <a href="'.base_url().'reset-password/'.$encrypted_id.'" style="background-color: #79b657; border: solid 1px #79b657; padding: 10px 45px; border-radius: 4px; color: #fff; text-decoration: none">Reset Password</a>
                            </p>
                            <p style="color: #86888a; font-family: Arial, sans-serif; font-size: 17px; font-weight: normal; text-align: center; line-height: 25px;">
                                    <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; text-align: center; line-height: 25px">
                                            If you don\'t want to change your password or didn\'t request this, just ignore and delete this message. <br>
                                            To keep your account secure, please don\'t forward this email to anyone. <br><br>
                                            Thank you.
                                    </p>
                            </p>
                                ';

            $this->mail_model->sendEmail('HomeBuds', 'info@homebuds.co.uk', $user->user_email, 'HomeBuds Password Recovery', $content);

            $this->load->view('password-recovery-mail-sent');
            
        }else{
            $data['error'] = "Invalid User";
            $this->load->view('forgot-password', $data);
        }
    }
    
    function resetPassword($encoded_id){
        $id = $this->encrypt->do_decode($encoded_id);
        if($user = $this->model->getUser($id)){
            $data['user'] = $user;
            $data['error'] = '';
            
            $this->load->library('form_validation');

            $this->form_validation->set_rules('new-password', 'Password', 'trim|required|min_length[6]|max_length[40]');
            $this->form_validation->set_rules('retype-password', 'Password Confirmation', 'required|matches[new-password]', array('matches' => 'Passwords do not match'));
            
            if($this->form_validation->run() == FALSE){
                $this->load->view('reset-password', $data);
            }else{
                $pwd = $this->encrypt->encode_password($this->input->post('new-password'));
                $this->model->changePassword($user->user_id, $pwd);
                $this->load->view('password-recovery-successful');
            }
        }else{
            show_404();
        }
    }
    
    
    function myProfile(){
        $this->model->redirect_if_not_logged_in();
        $data['adverts'] = $this->advert_model->getActivatedAdverts();
        $data['user'] = $this->model->getUser($this->session->user_id);
        $this->load->view('my-profile', $data);
    }
    
    function updateUser(){
        $user = new stdClass();
        $id = $this->input->post('user-id');
        $user->user_firstname = $this->input->post('firstname');
        $user->user_lastname = $this->input->post('lastname');
        $user->user_phone = $this->input->post('phone');
        $user->user_email = $this->input->post('email');
        $user->user_account_type = $this->input->post('account_type');
        
        /** Verify Email **/
        $temp = $this->model->getUserByEmail($user->user_email);
        if($temp && $temp->user_id != $id){
            echo json_encode(array('status'=> false, 'message'=> $user->user_email.' has been used by someone else.'));
            return;
        }
        
        $update_id = $this->model->updateUser($id, $user);
        $this->model->setSession($id);
        echo json_encode(array('status'=> true, 'message'=> ''));
    }
    
    function confirmPassword(){
        $user_id = $this->input->post('user-id');
        $password = $this->encrypt->encode_password($this->input->post('password'));
        echo $this->model->confirmPassword($user_id, $password);
    }
    
    function changePassword(){
        $user_id = $this->input->post('user-id');
        $new_password = $this->encrypt->encode_password($this->input->post('password-1'));
        echo $this->model->changePassword($user_id, $new_password);
    }
    
    function boostAccount(){
        $data = new stdClass();
        $data = json_decode(file_get_contents('php://input'));
        $user_id = $data->user_id;
        $payment_code = $data->payment_code;
        
        $payment = $this->payment_model->getPayment2($payment_code);
        
        if($payment && $payment->user_id == $user_id){
            if($payment->used){
                echo json_encode(array('status'=> false, 'message'=> 'The Transaction ID has been used'));
            }else{
                $this->payment_model->usePayment($payment_code);
                $this->model->updateAccoutType($user_id, 2);
                echo json_encode(array('status'=> true, 'message'=> 'Account Boosted Successfully'));
                
                /** Send Premium Activation Mail **/
                $user = $this->model->getUser($user_id);
                $content = '<tr>
                                <td bgcolor="#30373b" style="padding: 40px 30px 40px 30px;">
                                    <b style="color: #fff; font-family: Arial, sans-serif; font-size: 15px; display: block; font-weight: normal; text-align: center;">Hello, '.$user->user_firstname.'</b>

                                        <p style="border: solid 1px #a9adb0; width: 10%; margin: auto; margin-top: 20px; margin-bottom: 20px"></p>

                                        <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; font-weight: normal; text-align: center">
                                                Premium Service Activation 
                                        </p>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#fff" style="border-bottom: solid 1px #eee;">
                                    <p style="color: #86888a; font-family: Arial, sans-serif; font-size: 14px; font-weight: normal; text-align: center; line-height: 22px;">
                                        Your HomeBuds account has been successfully activated. <br>
                                        You will now enjoy our premium services for the period of one year
                                    </p>
                                    ';

                $this->mail_model->sendEmail('HomeBuds', 'info@homebuds.co.uk', $user->user_email, 'Premium Service Activation', $content);
            }
        }else{
            echo json_encode(array('status'=> false, 'message'=> 'Invalid payment code'));
        }
    }


    /** Deactivate User **/
    function deactivateUser(){
        $user_id = $this->input->post('user-id');
        $this->model->UpdateUserStatus($user_id, 2);
        //Notify User via email
    }


    /** Activate User **/
    function activateUser(){
        $user_id = $this->input->post('user-id');
        $this->model->UpdateUserStatus($user_id, 1);
        //Notify user via email
    }
    
}
