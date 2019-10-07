<?php 
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->model('login_model');

	}

	public function index()
	{
		$this->load->view('header');
		$this->form_validation->set_rules('uname','Username','trim|required');
		$this->form_validation->set_rules('login_pass','Password','trim|required');
		if($this->form_validation->run()==true)
		{
			$uname=$this->input->post('uname');
			$login_pass=$this->input->post('login_pass');

			$data=$this->login_model->checkEmail($uname);

			if($data)
			{
				if(password_verify(login_pass,$data->password))
				{
					if($data->status=='active')
					{
						$this->session->set_userdata("logintrue",$data->token);
						redirect(base_url."user");
					}
					else
					{
						$this->session->set_tempdata("error",'Sorry your account is not active please contact to admin',2);
						redirect(current_url());
					}
				}
				else
				{
					$this->session->set_tempdata("error",'Sorry password does not match',2);
						redirect(current_url());
				}
			}
			else
			{
				$this->session->set_tempdata("error",'Sorry email does not exist',2);
						redirect(current_url());
			}
		}
		else
		{
			$this->load->view('login_view');
		}
		$this->load->view('footer');
	}
}
?>