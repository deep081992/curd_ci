<?php
class Login_model extends CI_Model
{
	public function checkEmail($uname)
	{
		$res=$this->db->query("select * from signup where email='$uname'");
		if($res->num_rows()==1)
		{
			return $res->row();
		}
		else
		{
			return false;
		}
	}
}
?>