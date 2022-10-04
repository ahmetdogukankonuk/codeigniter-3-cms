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

    public function new_form(){

        if(!get_active_user()){
            redirect(base_url("login"));
        }

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function add_project(){

        $this->load->library("form_validation");

        $this->form_validation->set_rules("title", "Product Name English", "required|trim");
        
        $validate = $this->form_validation->run();

        if($validate){

            $insert = $this->portfolio_model->add(
                array(
                    "title"                 => $this->input->post("title"),
                    "title_tr"              => $this->input->post("title_tr"),
                    "description"           => $this->input->post("description"),
                    "description_tr"        => $this->input->post("description_tr"),
                    "video"                 => $this->input->post("video"),
                    "companyName"           => $this->input->post("companyName"),
                    "companyWebsite"        => $this->input->post("companyWebsite"),
                    "companyPhone"          => $this->input->post("companyPhone"),
                    "companyMail"           => $this->input->post("companyMail"),
                    "date"                  => $this->input->post("date"),
                    "isActive"              => 1,
                    "isOnMain"              => 0,
                    "isSuggested"           => 0,
                    "createdAt"             => date("Y-m-d H:i:s"),
                    "updatedAt"             => date("Y-m-d H:i:s")
                )
            );

            if($insert){

                $alert = array(
                    "title" => "Operation is Successful!",
                    "text"  => "The record was added successfully",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "Operation is not Successful!",
                    "text"  => "There was a problem while adding data",
                    "type"  => "error"
                );
                
            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("portfolio"));

        } else {

            $viewData = new stdClass();
            $viewData->viewFolder       = $this->viewFolder;
            $viewData->subViewFolder    = "add";
            $viewData->form_error       = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
            
        }

    }

    public function update_form($id){

        if(!get_active_user()){
            redirect(base_url("login"));
        }

        $viewData = new stdClass();

        $item = $this->portfolio_model->get(
            array(
                "id"    => $id,
            )
        );

        $this->load->helper("tools");

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function update_project($id){

        $this->load->library("form_validation");
        
        $this->form_validation->set_rules("title", "Product Name English", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            $update = $this->portfolio_model->update(
                array(
                        "id" => $id
                ),
                array(
                    "title"                 => $this->input->post("title"),
                    "title_tr"              => $this->input->post("title_tr"),
                    "description"           => $this->input->post("description"),
                    "description_tr"        => $this->input->post("description_tr"),
                    "video"                 => $this->input->post("video"),
                    "companyName"           => $this->input->post("companyName"),
                    "companyWebsite"        => $this->input->post("companyWebsite"),
                    "companyPhone"          => $this->input->post("companyPhone"),
                    "companyMail"           => $this->input->post("companyMail"),
                    "date"                  => $this->input->post("date"),
                    "updatedAt"             => date("Y-m-d H:i:s")
                )
            );

            if($update){

                $alert = array(
                    "title" => "Operation is Successful!",
                    "text"  => "The record was updated successfully",
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => "Operation is Unsuccessful!",
                    "text"  => "There was a problem while updating the record",
                    "type"  => "error"
                );
            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("portfolio"));

        } else {

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            
            $viewData->item = $this->portfolio_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }

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

    public function delete($id){

        $delete = $this->portfolio_model->delete(
            array(
                "id"    => $id
            )
        );

        if($delete){

            $alert = array(
                "title" => "Operation is Successful!",
                "text"  => "The record was successfully deleted",
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => "Operation is Successful!",
                "text"  => "There was a problem while deleting the record",
                "type"  => "error"
            );

        }

        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("portfolio"));

    }

    public function imageDelete($id, $parent_id){
        
        $fileName = $this->portfolio_images_model->get(
            array(
                "id"    => $id
            )
        );

        $delete = $this->portfolio_images_model->delete(
            array(
                "id"    => $id
            )
        );

        if($delete){
            
            unlink("uploads/{$this->viewFolder}/$fileName->img_url");

            redirect(base_url("portfolio/images/$parent_id"));

        } else {

            redirect(base_url("portfolio/images/$parent_id"));
            
        }
        
    }
}
