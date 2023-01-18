<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends MY_Controller {

    public $viewFolder = "";

    public function __construct(){

        parent::__construct();

        $this->viewFolder = "portfolio_v";

        $this->load->model("portfolio_model");
        $this->load->model("portfolio_images_model");

    }

    /* Index function is the index page of the URL request */
    public function index(){
    
        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to see this module, if not we send them to base url */
        if(!isAllowedViewModule()){
            redirect(base_url());
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

    /* New Record Page */
    public function new_form(){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to add new record to this module, if not we send them back */
        if(!isAllowedWriteModule()){
            redirect(base_url("portfolio"));
        }

        $viewData = new stdClass();

        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }


    public function add_project(){

        /* Here we check if the user logged in is allowed to add new record to this module, if not we send them back */
        if(!isAllowedWriteModule()){
            redirect(base_url("portfolio"));
        }

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
                    "title" => $this->lang->line('operation-is-succesfull-message'),
                    "text" => $this->lang->line('record-added-text'),
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => $this->lang->line('operation-is-unsuccesfull-message'),
                    "text" => $this->lang->line('record-could-not-added-text'),
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

    /* Update Record Page */
    public function update_form($id){

        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("portfolio"));
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

    /* Here we update the specific record by id */
    public function update_project($id){

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            redirect(base_url("portfolio"));
        }

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
                    "title" => $this->lang->line('operation-is-succesfull-message'),
                    "text"  => $this->lang->line('record-updated-text'),
                    "type"  => "success"
                );

            } else {

                $alert = array(
                    "title" => $this->lang->line('operation-is-unsuccesfull-message'),
                    "text"  => $this->lang->line('record-could-not-updated-text'),
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

    /* Portfolio Images Page */
    public function image_form($id){
        
        /* Here we check if there is a user logged in or not, if not we send them to login page */
        if(!get_active_user()){
            redirect(base_url("login"));
        }

        if(!isAllowedViewModule()){
            redirect(base_url("portfolio"));
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

    /* Activity Setter */
    public function isActiveSetter($id){

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            die();
        }
        
        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->portfolio_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }

    }

    /* On Home Page Setter */
    public function isOnMainSetter($id){

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            die();
        }

        if($id){

            $isOnMain = ($this->input->post("data") === "true") ? 1 : 0;

            $this->portfolio_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isOnMain"  => $isOnMain
                )
            );
        }
    }

    /* Suggested Record Setter */
    public function isSuggestedSetter($id){

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            die();
        }

        if($id){

            $isSuggested = ($this->input->post("data") === "true") ? 1 : 0;

            $this->portfolio_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isSuggested"  => $isSuggested
                )
            );
        }
    }

    /* Activity Setter */
    public function imageIsActiveSetter($id){

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            die();
        }

        if($id){

            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->portfolio_images_model->update(
                array(
                    "id"    => $id
                ),
                array(
                    "isActive"  => $isActive
                )
            );
        }
    }

    /* Cover Photo Setter */
    public function isCoverSetter($id, $parent_id){

        /* Here we check if the user logged in is allowed to update the module, if not we dont give permisson to update this record */
        if(!isAllowedUpdateModule()){
            die();
        }

        if($id && $parent_id){

            $isCover = ($this->input->post("data") === "true") ? 1 : 0;

            $this->portfolio_images_model->update(
                array(
                    "id"        => $id,
                    "portfolioID" => $parent_id
                ),
                array(
                    "isCover"   => $isCover
                )
            );

            $this->portfolio_images_model->update(
                array(
                    "id !="     => $id,
                    "portfolioID" => $parent_id
                ),
                array(
                    "isCover"   => 0
                )
            );

            $viewData = new stdClass();

            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "image";

            $viewData->item_images = $this->portfolio_images_model->get_all(
                array(
                    "portfolioID"    => $parent_id
                ), "rank ASC"
            );

            $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);

            echo $render_html;

        }
    }

    /* Deleting specific record by its id */
    public function delete($id){

        /* Here we check if the user logged in is allowed to delete the module, if not we dont give permisson to delete this record */
        if(!isAllowedDeleteModule()){
            redirect(base_url("portfolio"));
        }

        $delete = $this->portfolio_model->delete(
            array(
                "id"    => $id
            )
        );

        if($delete){

            $alert = array(
                "title" => $this->lang->line('operation-is-succesfull-message'),
                "text"  => $this->lang->line('record-deleted-text'),
                "type"  => "success"
            );

        } else {

            $alert = array(
                "title" => $this->lang->line('operation-is-succesfull-message'),
                "text"  => $this->lang->line('record-could-not-deleted-text'),
                "type"  => "error"
            );

        }

        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("portfolio"));

    }

    /* Deleting specific record by its id */
    public function imageDelete($id, $parent_id){
        
        /* Here we check if the user logged in is allowed to delete the module, if not we dont give permisson to delete this record */
        if(!isAllowedDeleteModule()){
            redirect(base_url("portfolio"));
        }

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
