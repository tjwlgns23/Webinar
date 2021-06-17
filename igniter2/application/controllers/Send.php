<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Send extends CI_Controller {
    function __construct(){
        parent:: __construct();
    }

    function index() {
        //Load email library
        $this->load->library('email');
        $this->load->library('encrypt');
        
        //SMTP & mail configuration
        $config = array(
                    'protocol' => 'smtp', 
                    'smtp_host' => 'ssl://smtp.gmail.com', 
                    'smtp_port' => 465, 
                    'smtp_user' => 'jih.seo23@gmail.com', 
                    'smtp_pass' => 'password', 
                    'mailtype' => 'html', 
                    'charset' => 'iso-8859-1'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        
        //Email content
        $htmlContent = '<h1>Sending email via Gmail SMTP server</h1>';
        $htmlContent .= '<p>This email has sent via Gmail SMTP server from CodeIgniter application.</p>';
        
        $this->email->to('jih.seo23@gmail.com');
        $this->email->from('jih.seo23@gamil.com','seoji');
        $this->email->subject('How to send email via Gmail SMTP server in CodeIgniter');
        $this->email->message($htmlContent);
        
        //Send email
        $this->email->send();
    }
}

