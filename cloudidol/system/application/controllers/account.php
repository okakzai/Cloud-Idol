<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends Controller {

	function Account()
	{
		parent::Controller();
		$this->load->model('mset');
	}	
	function index()
	{	
		$user=$this->session->userdata('username');
		$data['info'] = $this->mset->get_account($user);
		$this->load->view('account/account_form',$data);
	}
	function save()
	{
		$user=$this->session->userdata('username');
		$this->mset->update_account($user);
		$this->index();
	}
}

/* End of file info.php */
/* Location: ./system/application/controllers/info.php */