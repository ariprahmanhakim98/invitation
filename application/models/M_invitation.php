<?php
class M_invitation extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function insert($tables,$data){
        $dbarif = $this->load->database('default', TRUE);
        $dbarif->insert($tables, $data);
    }
  
    function delete($table, $data)
    {
        $dbarif = $this->load->database('default', TRUE);
        return  $dbarif->where($data)->delete($table);
    }
  
    function updates($data, $where)
    {
        $dbarif = $this->load->database('default', TRUE);
        return  $dbarif->where($where)->update($this->table, $data);
    }

    public function list($tbl)
    {
        $dbarif = $this->load->database('default', TRUE);
        return  $dbarif->get($tbl);
    }

	function getlist($gettable, $where)
    {
        $dbarif = $this->load->database('default', TRUE);
        return $dbarif->select('*')->from($gettable)->where($where)->get();
    }

}
