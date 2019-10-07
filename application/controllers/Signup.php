<?php
class Signup extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->database();
		$this->load->model('signup_model');
		$this->load->library('session');

	}

	public function index()
	{
		$this->load->view('header');

		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('mobile','Mobile','required|trim');
		$this->form_validation->set_rules('pass','Password','required|trim');
		$this->form_validation->set_rules('cpass','Confirm Password','required|trim|matches[pass]');

		if($this->form_validation->run()==true)
		{
			$name=$this->input->post('name');
			$email=$this->input->post('email');
			$mobile=$this->input->post('mobile');
			$pass=$this->input->post('pass');
			$pass=password_hash($pass, PASSWORD_DEFAULT);
			$token=md5(str_shuffle($name.$email.$mobile.$pass));


			$data=$this->signup_model->saveData($name,$email,$mobile,$pass,$token);
			if($data==true)
			{
				$this->session->set_tempdata("success",'Account created successfully',2);
				redirect(current_url());
			}
			else
			{
				$this->session->set_tempdata("error",'Unable to create account please try again',2);
				redirect(current_url());
			}
		}
		else
		{
			$this->load->view('signup_view');
		}

		$this->load->view('footer');
	}
	

}
?>