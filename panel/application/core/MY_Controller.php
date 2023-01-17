<?php

class MY_Controller extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        /* Here we check if the user logged in is allowed to see this module, if not we send them to base url */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        if(!isAllowedViewModule()){
            redirect(base_url());
        }

        if(!$this->session->userdata('lang')){
            $dil=$this->session->set_userdata('lang', 'en');
        }

        $dil=$this->session->userdata('lang');
        
        $this->lang->load($dil,$dil);
    }

}