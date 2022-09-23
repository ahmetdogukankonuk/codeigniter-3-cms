<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "sliders_v";

        $this->load->model("sliders_model");

    }

    public function index()
	{
        
        if(!get_active_user()){
            redirect(base_url("login"));
        }
        
	    $viewData = new stdClass();

        $items = $this->sliders_model->get_all(
            array(), "rank ASC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}
}
