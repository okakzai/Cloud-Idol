<?php
class Myhome extends Controller
{
	function Myhome()
	{
		parent::Controller();
		$this->load->model('mset');
	}
	function index()
	{	
		if ($this->session->userdata('facelogin')==TRUE)
		{
			$user=$this->session->userdata('username');
			$data['info']=$this->mset->get_account($user);
			$this->load->view('home/index',$data);
		}
		else
		{
			redirect('face');
		}
	}
}
?>