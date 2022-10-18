<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "dashboard_v";

    }

    public function index()
	{

        if(!get_active_user()){
            redirect(base_url("login"));
        }

        if(!isAllowedViewModule()){
            redirect(base_url());
        }
        
	    $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}
}
