<?php

function convertToSEO($text)
{

    $turkce = array("ç", "Ç", "ğ", "Ğ", "ü", "Ü", "ö", "Ö", "ı", "İ", "ş", "Ş", ".", ",", "!", "'", "\"", " ", "?", "*", "_", "|", "=", "(", ")", "[", "]", "{", "}", "^", "+", "%", "&");
    $convert = array("c", "c", "g", "g", "u", "u", "o", "o", "i", "i", "s", "s", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-", "-");

    return strtolower(str_replace($turkce, $convert, $text));
    
}

function get_category_title($categoryID = 0){

    $t = &get_instance();

    $t->load->model("product_categories_model");

    $category = $t->product_categories_model->get(
        array(
            "id"    => $categoryID
        )
    );

    if($category)
        return $category->title;
    else
        return "<b style='color:red'>Not Defined</b>";

}


function get_user_name($userID = 0){

    $t = &get_instance();

    $t->load->model("users_model");

    $user = $t->users_model->get(
        array(
            "id"    => $userID
        )
    );

    if($user)
        return $user->name;
    else
        return "<b style='color:red'>Not Defined</b>";

}

function get_user_surname($userID = 0){

    $t = &get_instance();

    $t->load->model("users_model");

    $user = $t->users_model->get(
        array(
            "id"    => $userID
        )
    );

    if($user)
        return $user->surname;
    else
        return "<b style='color:red'>Not Defined</b>";

}

function get_user_role($userRoleID = 0){

    $t = &get_instance();

    $t->load->model("user_roles_model");

    $category = $t->user_roles_model->get(
        array(
            "id"    => $userRoleID
        )
    );

    if($category)
        return $category->title;
    else
        return "<b style='color:red'>The Role Is Not Defined</b>";

}

function get_active_user(){

    $t = &get_instance();

    $user = $t->session->userdata("user");

    if($user)
        return $user;
    else
        return false;

}

function getControllerList(){

    $t = &get_instance();

    $controllers = array();
    $t->load->helper("file");

    $files = get_dir_file_info(APPPATH. "controllers", FALSE);

    foreach (array_keys($files) as $file){
        if($file !== "index.html"){
            $controllers[] = strtolower(str_replace(".php", '', $file));
        }
    }

    return $controllers;
    
}

function get_user_roles(){

    $t = &get_instance();
    return $t->session->userdata("user_roles");
}

function setUserRoles(){

    $t = &get_instance();

    $t->load->model("user_roles_model");

    $user_roles = $t->user_roles_model->get_all(
        array(
            "isActive"  => 1
        )
    );

    $roles = [];
    foreach ($user_roles as $role){
        $roles[$role->id] = $role->permissions;
    }
    $t->session->set_userdata("user_roles", $roles);

}

?>