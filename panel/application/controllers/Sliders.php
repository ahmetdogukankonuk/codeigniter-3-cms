<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends CI_Controller {

    public $viewFolder = "";

    public function __construct(){

        parent::__construct();

        $this->viewFolder = "sliders_v";

        $this->load->model("sliders_model");

    }


    public function index(){
        
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        if(!isAllowedViewModule()){
            redirect(base_url());
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


    public function new_form(){

        if(!get_active_user()){
            redirect(base_url("login"));
        }

        if(!isAllowedWriteModule()){
            redirect(base_url("sliders"));
        }

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }


    public function add_slider(){

        if(!isAllowedWriteModule()){
            redirect(base_url("sliders"));
        }
        
        $this->load->library("form_validation");
        $this->load->helper("tools");

        if($_FILES["imgUrl"]["name"] == ""){

            $alert = array(
                "title" => "Operation is Unsuccessful!",
                "text"  => "Please select an image",
                "type"  => "error"
            );

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("sliders/new"));

            die();
        }
        
        $this->form_validation->set_rules("title", "Category Name English", "required|trim");

        $validate = $this->form_validation->run();

        if($validate){

            $file_name = convertToSEO(pathinfo($_FILES["imgUrl"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["imgUrl"]["name"], PATHINFO_EXTENSION);

            $config["allowed_types"] = "jpg|jpeg|png";
            $config["upload_path"]   = "uploads/$this->viewFolder/";
            $config["file_name"] = $file_name;

            $this->load->library("upload", $config);

            $upload = $this->upload->do_upload("imgUrl");

            if($upload){

                $uploaded_file = $this->upload->data("file_name");

                $insert = $this->sliders_model->add(
                    array(
                        "title"                 => $this->input->post("title"),
                        "buttonTitle"           => $this->input->post("buttonTitle"),
                        "buttonLink"            => $this->input->post("buttonLink"),
                        "imgUrl"                => $uploaded_file,
                        "rank"                  => 0,
                        "isActive"              => 1,
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
                        "title" => "Operation is Unsuccessful!",
                        "text"  => "There was a problem while adding the record",
                        "type"  => "error"
                    );
                    
                }

            } else {

                $alert = array(
                    "title" => "Operation is Unsuccessful!",
                    "text"  => "There was a problem while adding the record",
                    "type"  => "error"
                );

                $this->session->set_flashdata("alert", $alert);

                redirect(base_url("sliders/new"));

                die();

            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("sliders"));

        } else {

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }

    }


    public function update_form($id){

        if(!get_active_user()){
            redirect(base_url("login"));
        }

        if(!isAllowedUpdateModule()){
            redirect(base_url("sliders"));
        }

        $viewData = new stdClass();

        $item = $this->sliders_model->get(
            array(
                "id"    => $id,
            )
        );
        
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }


    public function update_slider($id){

        if(!isAllowedUpdateModule()){
            redirect(base_url("sliders"));
        }

        $this->load->library("form_validation");
        $this->load->helper("tools");
        
        $this->form_validation->set_rules("title", "Slider Title", "required|trim");
        
        $validate = $this->form_validation->run();

        if($validate){

            if($_FILES["imgUrl"]["name"] !== "") {

                $file_name = convertToSEO(pathinfo($_FILES["imgUrl"]["name"], PATHINFO_FILENAME)) . "." . pathinfo($_FILES["imgUrl"]["name"], PATHINFO_EXTENSION);

                $config["allowed_types"] = "jpg|jpeg|png";
                $config["upload_path"] = "uploads/$this->viewFolder/";
                $config["file_name"] = $file_name;

                $this->load->library("upload", $config);

                $upload = $this->upload->do_upload("imgUrl");

                if ($upload) {

                    $uploaded_file = $this->upload->data("file_name");

                    $data = array(
                        "title"                 => $this->input->post("title"),
                        "buttonTitle"           => $this->input->post("buttonTitle"),
                        "buttonLink"            => $this->input->post("buttonLink"),
                        "imgUrl"                => $uploaded_file,
                        "updatedAt"             => date("Y-m-d H:i:s")
                    );

                } else {

                    $alert = array(
                        "title" => "Operation is Unsuccessful!",
                        "text"  => "There was a problem while adding data",
                        "type"  => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);

                    redirect(base_url("sliders/update/$id"));

                    die();

                }

            } else {

                $data = array(
                    "title"                 => $this->input->post("title"),
                    "buttonTitle"           => $this->input->post("buttonTitle"),
                    "buttonLink"            => $this->input->post("buttonLink"),
                    "updatedAt"             => date("Y-m-d H:i:s")
                );

            }

            $update = $this->sliders_model->update(array("id" => $id), $data);

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

            redirect(base_url("sliders"));

        } else {

            $viewData = new stdClass();
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;

            $viewData->item = $this->sliders_model->get(
                array(
                    "id"    => $id,
                )
            );

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

        }

    }

    
    public function isActiveSetter($id){

        if(!isAllowedUpdateModule()){
            die();
        }
        
        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->sliders_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }

    }


    public function delete($id){

        if(!isAllowedDeleteModule()){
            redirect(base_url("sliders"));
        }

        $delete = $this->sliders_model->delete(
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
        redirect(base_url("sliders"));

    }
}
