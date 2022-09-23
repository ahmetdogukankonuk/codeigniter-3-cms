<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "portfolio_v";

        $this->load->model("portfolio_model");
        $this->load->model("portfolio_images_model");

    }

    public function index()
	{
    
        if(!get_active_user()){
            redirect(base_url("login"));
        }

	    $viewData = new stdClass();

        $items = $this->portfolio_model->get_all(
            array(), "id DESC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}
    
    public function image_form($id){
        
        if(!get_active_user()){
            redirect(base_url("login"));
        }
        
        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item = $this->portfolio_model->get(
            array(
                "id"    => $id
            )
        );

        $viewData->item_images = $this->portfolio_images_model->get_all(
            array(
                "portfolioID"    => $id
            ), "rank ASC"
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }
}
