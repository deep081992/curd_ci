<?php
class Signup_model extends CI_Model
{
	public function saveData($name,$email,$mobile,$pass,$token)
	{
		$this->db->query("insert into signup(name,email,mobile,password,token) values('$name','$email','$mobile','$pass','$token')");
		if($this->db->affected_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}
?>