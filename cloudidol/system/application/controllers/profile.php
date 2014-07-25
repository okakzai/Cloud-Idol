<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends Controller {

	function Profile()
	{
		parent::Controller();
		$this->load->model('mset');
	}	
	function index()
	{
		$user=$this->session->userdata('username');
		$data['info'] = $this->mset->get_profile($user);
		$this->load->view('profile/profile_form',$data);
	}
	function save()
	{
		$user=$this->session->userdata('username');
		$this->mset->update_profile($user);
		$this->index();
	}
}

/* End of file info.php */
/* Location: ./system/application/controllers/info.php */