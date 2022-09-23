<?php

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