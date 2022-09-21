<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "products_v";

        $this->load->model("products_model");
        $this->load->model("product_images_model");

    }

    public function index()
	{
       
	    $viewData = new stdClass();

        $items = $this->products_model->get_all(
            array(), "id DESC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}

    public function image_form($id){

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item = $this->products_model->get(
            array(
                "id"    => $id
            )
        );

        $viewData->item_images = $this->product_images_model->get_all(
            array(
                "productID"    => $id
            ), "rank ASC"
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }
}
