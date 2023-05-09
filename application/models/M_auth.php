<?php
class M_auth extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function insert($tables,$data){
        $dbarif = $this->load->database('default', TRUE);
        $dbarif->insert($tables, $data);
    }

	function cek_login($table, $where){	
		$dbarif = $this->load->database('default', TRUE);	
        return $dbarif->select('*')->from($table)->where($where)->get();
	}	

}
