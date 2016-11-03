<?php

class MailModel extends CI_Model {
    
    function insertMail($mail){
        $this->db->insert('mail', $mail);
        return $this->db->insert_id();
    }
    
    function getMail($id){
        $this->db->select('*');
        $this->db->where('mail_id', $id);
        $query = $this->db->get('mail');
        return ($query->num_rows()) ? $query->row() : null;
    }
    
    function getUserMails($user_id){
        $this->db->select('*');
        $this->db->where('mail_receiver_id', $user_id);
        $this->db->where('mail_deleted', 0);
        $query = $this->db->get('mail');
        return ($query->num_rows()) ? $query->result() : [];
    }
    
    function getUserUnreadMailCount($user_id){
        $this->db->select('*');
        $this->db->where('mail_receiver_id', $user_id);
        $this->db->where('mail_read', 0);
        $query = $this->db->get('mail');
        return ($query->num_rows()) ? $query->num_rows() : 0;
    }
    
    function readMail($id){
        $this->db->where('mail_id', $id);
        return $this->db->update('mail', array('mail_read' => 1));
    }
    
    function deleteMail($id){
        $this->db->where('mail_id', $id);
        return $this->db->update('mail', array('mail_deleted' => 1));
    }
    
    function sendEmail($sender_name, $sender_email, $to, $subject, $content){
        
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';

        $this->email->initialize($config);
        
        $this->email->from($sender_email, $sender_name);
        $this->email->to($to);
        $this->email->bcc('adelekeoladapo@gmail.com');
        $this->email->subject($subject);
        
        $html = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <!-- saved from url=(0041)http://localhost:85/classified/html-email -->
                    <html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

                            <title>'.$subject.'</title>
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        </head>
                        <body style="margin: 0; padding: 0;">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="500" style="border-collapse: collapse; border: solid 1px #e9f4d5;">
                                <tbody>
                                <tr>
                                    <td align="center" bgcolor="#fff" style="padding: 20px 0 20px 0; border: solid 1px #fff;">
                                        <img src="" alt="HomeBuds" width="300" style="display: block;">
                                    </td>
                                </tr>
                                '.$content.'
                                            <div style="border-top: solid 1px #eee; margin: 15px; margin-top: 25px;">
                                            <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; font-weight: normal; text-align: center; line-height: 25px;">
                                                    Looking for anything? <br> Find it here
                                            </p>
                                            <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; font-weight: normal; text-align: center;     line-height: 30px;">
                                                    <input type="text" style="border: solid 1px #bbadb0; border-radius: 4px; width: 45%; padding: 10px;" placeholder="Nokia 3310">
                                            </p>
                                            <p style="color: #a9adb0; font-family: Arial, sans-serif; font-size: 15px; font-weight: normal; text-align: center;     line-height: 30px;">
                                                    <a href="#" style="background-color: #79b657; border: solid 1px #79b657; padding: 10px 45px; border-radius: 4px; color: #fff; text-decoration: none">Find</a>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody></table>
                                    <p style="text-align: center; color: #a9adb0; text-decoration: none; font-size: 12px; font-family: Arial, sans-serif;">
                                            <a href="#" style="text-decoration: none; color: #a9adb0">
                                                    Home
                                            </a>
                                            &nbsp;&nbsp;|&nbsp;&nbsp;
                                            <a href="#" style="text-decoration: none; color: #a9adb0">
                                                    About Us
                                            </a>
                                            &nbsp;&nbsp;|&nbsp;&nbsp;
                                            <a href="#" style="text-decoration: none; color: #a9adb0">
                                                    Terms & Conditions
                                            </a>
                                    </p>
                                    <p style="text-align: center; text-decoration: none; font-size: 10px; font-family: Arial, sans-serif;">
                                            <a href="#" style="text-decoration: none; color: #a9adb0">
                                                    © 2016 HomeBuds. <span>All rights reserved</span>
                                            </a>
                                    </p>

                    </body></html>';
        
        $this->email->message($html);

        $this->email->send();
    }
    
}
