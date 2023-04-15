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

}