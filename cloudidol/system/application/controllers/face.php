<?php
class Face extends Controller
{
	function Face()
	{
		parent::Controller();
		$this->load->model('Mface');
	}
	function index()
	{
		if ($this->session->userdata('facelogin')==TRUE)
		{
			redirect('myhome');
		}
		else
		{
			$this->load->view('vlogin');
		}
	}
	
	function login()
	{
		$username=$this->input->post('username_login');
		$password=$this->input->post('password_login');
		if($this->Mface->cek($username,$password)==TRUE)
		{
			$data=array('username'=>$username,'password'=>$password,'facelogin'=>TRUE);
			$this->session->set_userdata($data);
			redirect('myhome');
		}
		else
		{
			redirect('face/index');
		}
	}
	
	function do_login()
	{
		//restrict(true);
		/*
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_captcha_check');
		if ($this->form_validation->run() == FALSE)
		{
			echo warning('Maaf, capctha yang anda masukkan salah...','home');
		}
		else
		{
		*/
			$this->load->library('auth');
			$login = array('username'=>$this->input->post('username_login'),
				       'password'=>$this->input->post('password_login')
			);
			$return = $this->auth->do_login($login);
			if($return)
			{
				//echo warning('Selamat datang, '.from_session('nama'),'home');
				redirect('myhome');
			}
			else
			{
				//echo warning('Maaf, username atau password yang Anda masukkan salah...','home');
				redirect('face/index');
			}
		//}
	}
	function logout()
	{
		$this->session->sess_destroy();
		redirect('face');
	}
	function reg()
	{
		if($this->form_validation->run()==TRUE)
		{
			$this->Mface->update_reg();
			$this->session->set_flashdata('message','<p id="sukses">Registrasi berhasil. Silahkan Login!</p>');
			redirect('face/index');
		}
		else
		{
			$this->session->set_flashdata('message','<p id="gagal">Registrasi gagal. Silahkan registrasi ulang!</p>');
			$this->load->view('vlogin');
		}
	}
}
?>