<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
    {

        parent::__construct();

        $this->viewFolder = "orders_v";

        $this->load->model("orders_model");

    }

    public function index()
	{
       
	    $viewData = new stdClass();

        $items = $this->orders_model->get_all(
            array(), "id DESC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}

    public function completed_orders()
	{
       
	    $viewData = new stdClass();

        $items = $this->orders_model->get_all(
            array(
                "orderSituation"    => "Order Completed",
            ), "id DESC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "completed";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}

    public function incomplete_orders()
	{
       
	    $viewData = new stdClass();

        $items = $this->orders_model->get_all(
            array(
                "orderSituation"    => "Order is On Progress",
            ), "id DESC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "incomplete";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}

    public function cancelled_orders()
	{
       
	    $viewData = new stdClass();

        $items = $this->orders_model->get_all(
            array(
                "orderSituation"    => "Order Has Been Cancelled",
            ), "id DESC"
        );

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "cancelled";
        $viewData->items = $items;

		$this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        
	}
}
