<?php

class MY_Model extends CI_Model
{

    public $tableName;

    public function __construct()
    {
        parent::__construct();
    }

    public function get($where = array())
    {
        return $this->db->where($where)->get($this->tableName)->row();
    }
    
    public function get_all($where = array(), $order = "id DESC")
    {
        return $this->db->where($where)->order_by($order)->get($this->tableName)->result();
    }

    public function add($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }

    public function register_admin($data = array())
    {
        return $this->db->insert($this->tableName, $data);
    }

    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->tableName, $data);
    }

    public function delete($where = array())
    {
        return $this->db->where($where)->delete($this->tableName);
    }

}