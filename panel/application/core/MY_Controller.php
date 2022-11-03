<?php

class MY_Controller extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        /* Here we check if the user logged in is allowed to see this module, if not we send them to base url */
        if(!isAllowedViewModule()){
            redirect(base_url());
        }
    }

}