<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_permissions extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "user_permissions_v";

    }

    public function index()
	{
        
        if(!get_active_user()){
            redirect(base_url("login"));
        }
        
	    $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}
}
