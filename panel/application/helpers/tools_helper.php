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

function get_brand_title($brandID = 0){

    $t = &get_instance();

    $t->load->model("brands_model");

    $brand = $t->brands_model->get(
        array(
            "id"    => $brandID
        )
    );

    if($brand)
        return $brand->title;
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

function get_orders_sum() {
    $t =& get_instance();
    $t->db->select_sum('orderTotal');
    $query = $t->db->get('orders');
    return $query->row()->orderTotal;
}

function get_on_main_products_count() {
    $t =& get_instance();
    $t->db->from('products');
    $t->db->where('isOnMain', 1);
    return $t->db->count_all_results();
}

function get_suggested_products_count() {
    $t =& get_instance();
    $t->db->from('products');
    $t->db->where('isSuggested', 1);
    return $t->db->count_all_results();
}

function get_inactive_products_count() {
    $t =& get_instance();
    $t->db->from('products');
    $t->db->where('isActive', 0);
    return $t->db->count_all_results();
}

function get_active_products_count() {
    $t =& get_instance();
    $t->db->from('products');
    $t->db->where('isActive', 1);
    return $t->db->count_all_results();
}

function get_products_count() {
    $t =& get_instance();
    $t->db->from('products');
    return $t->db->count_all_results();
}

function get_active_users_count() {
    $t =& get_instance();
    $t->db->from('users');
    $t->db->where('isActive', 1);
    return $t->db->count_all_results();
}

function get_users_count() {
    $t =& get_instance();
    $t->db->from('users');
    return $t->db->count_all_results();
}

function get_cancelled_orders_count() {
    $t =& get_instance();
    $t->db->from('orders');
    $t->db->where('orderSituation', "Order Has Been Cancelled");
    return $t->db->count_all_results();
}

function get_incomplete_orders_count() {
    $t =& get_instance();
    $t->db->from('orders');
    $t->db->where('orderSituation', "Order is On Progress");
    return $t->db->count_all_results();
}

function get_completed_orders_count() {
    $t =& get_instance();
    $t->db->from('orders');
    $t->db->where('orderSituation', "Order Completed");
    return $t->db->count_all_results();
}

function get_orders_count() {
    $t =& get_instance();
    $t->db->from('orders');
    return $t->db->count_all_results();
}

function get_mac_address() {
    ob_start();
    system('ipconfig /all');
    $result = ob_get_contents();
    ob_clean();
    $result = strstr($result, "Physical");
    preg_match("/([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})/", $result, $mac);
    return $mac[0];
}


?>