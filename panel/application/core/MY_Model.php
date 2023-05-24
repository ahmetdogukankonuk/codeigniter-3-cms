<?php

class MY_Model extends CI_Model
{

    public $tableName;

    public function __construct()
    {
        parent::__construct();
    }

    /* Getting the specific records data by id (GET) */
    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }

    /* Getting the all records data in the table (GET) */
    public function get_all($where = array(), $order = "id DESC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }

    /* Add record to the table (POST) */
    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }
    
    /* Update a specific record by its id (PUT) */
    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }

    /* Delete a specific record by its id (DELETE) */
    public function delete($where = array())
    {
        return $this->db->where($where)->delete($this->tableName);
    }

    /* Add record to the table (POST) */
    public function register_admin($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }

    /* Get User Info by ID */
    public function get_user_by_id($id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }

    /* Get Categories Info List */
    public function get_categories() {
        $this->db->select('id, rank, title, title_tr, isOnMain, isActive');
        $this->db->order_by('rank', 'ASC');
        $query = $this->db->get('product_categories');
        return $query->result();
    }

    public function get_active_categories() {
        $this->db->select('id, rank, title, title_tr, isOnMain, isActive');
        $this->db->where('isActive', 1);
        $this->db->order_by('rank', 'ASC');
        $query = $this->db->get('product_categories');
        return $query->result();
    }

    /* Get Products Info List */
    public function get_products() {
        $this->db->select('id, categoryID, title, title_tr, isSuggested, isOnMain, isActive');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('products');
        return $query->result();
    }

    /* Get Orders Info List */
    public function get_orders() {
        $this->db->select('id, userID, name, surname, createdAt, orderSituation');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('orders');
        return $query->result();
    }

    /* Get Orders Info List */
    public function get_completed_orders() {
        $this->db->select('id, userID, name, surname, createdAt, orderSituation');
        $this->db->where('orderSituation', 'Order Completed');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('orders');
        return $query->result();
    }

    /* Get Orders Info List */
    public function get_incomplete_orders() {
        $this->db->select('id, userID, name, surname, createdAt, orderSituation');
        $this->db->where('orderSituation', 'Order is On Progress');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('orders');
        return $query->result();
    }
    
    /* Get Orders Info List */
    public function get_cancelled_orders() {
        $this->db->select('id, userID, name, surname, createdAt, orderSituation');
        $this->db->where('orderSituation', 'Order Has Been Cancelled');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('orders');
        return $query->result();
    }

    /* Get Categories Info List */
    public function get_posts() {
        $this->db->select('id, title, title_tr, imgUrl, isOnMain, isActive');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('blog');
        return $query->result();
    }

    /* Get Categories Info List */
    public function get_blog_comments() {
        $this->db->select('id, postID, userID, title, isActive');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('blog_comments');
        return $query->result();
    }

    /* Get Categories Info List */
    public function get_sliders() {
        $this->db->select('id, title, imgUrl, isActive');
        $this->db->order_by('rank', 'ASC');
        $query = $this->db->get('sliders');
        return $query->result();
    }

    /* Get Portfolio Info List */
    public function get_portfolio() {
        $this->db->select('id, title, title_tr, isSuggested, isOnMain, isActive');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('portfolio');
        return $query->result();
    }

    /* Get Users Info List */
    public function get_users() {
        $this->db->select('id, userRoleID, name, surname, email, isAuthority, isActive');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('users');
        return $query->result();
    }

    /* Get Users Info List */
    public function get_authorized_users() {
        $this->db->select('id, userRoleID, name, surname, email, isAuthority, isActive');
        $this->db->where('isAuthority', 1);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('users');
        return $query->result();
    }

    /* Get Users Info List */
    public function get_user_roles() {
        $this->db->select('id, title, isActive');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('user_roles');
        return $query->result();
    }

    /* Get Users Info List */
    public function get_all_users_email() {
        $this->db->select('id, email, isActive');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('users');
        return $query->result();
    }

    /* Get Users Info List */
    public function get_all_newstellers_email() {
        $this->db->select('id, email');
        $this->db->order_by('id', 'ASC');
        $query = $this->db->get('newsteller');
        return $query->result();
    }
}