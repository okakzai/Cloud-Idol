<?php
class Setting extends Controller
{
	function Setting()
	{
		parent::Controller();
		$this->load->model('mset');
	}
	function index()
	{
		if ($this->session->userdata('facelogin')==TRUE)
		{
			$user=$this->session->userdata('username');
			$data['info']=$this->mset->get_photo($user);
			$data['main_view']='vphoto';
			$this->load->view('tempsetting',$data);
		}
		else
		{
			redirect('face');
		}
	}
	function photo()
	{
		if ($this->input->post('photo'))
			{
				$user=$this->session->userdata('username');
				$this->mset->do_upload_photo();
				$this->mset->update_photo($user);
			}
		redirect('myhome');
	}
	function song()
	{
		if ($this->input->post('song'))
			{
				$user=$this->session->userdata('username');
				$this->mset->do_upload_song();
				$this->mset->update_song($user);
			}
		redirect('myhome');
	}
}
?>