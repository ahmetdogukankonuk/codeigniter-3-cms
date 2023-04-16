<?php 

function get_user_email_by_id($id) {
    $t =& get_instance();
    $t->load->model('users_model');
    $user = $t->users_model->get_user_by_id($id);
    return $user->email;
}

function send_email($toEmail, $subject, $message)
{
    $t =& get_instance();
    $t->load->library('email');
    $t->load->model("email_model");

    $email_settings = $t->email_model->get(array("isActive" => 1));
    
    $config['protocol'] = $email_settings->protocol;
    $config['smtp_host'] = $email_settings->host;
    $config['smtp_user'] = $email_settings->user;
    $config['smtp_pass'] = $email_settings->password;
    $config['smtp_crypto'] = $email_settings->crypto;
    $config['smtp_port'] = $email_settings->port;
    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';
    $config['newline'] = '\r\n';

    $t->email->initialize($config);

    $t->email->from($email_settings->user, 'CMS');
    $t->email->to($toEmail);
    $t->email->subject($subject);
    $t->email->message($message);

    if ($t->email->send()) {
        return true;
    } else {
        return false;
    }
}

?>