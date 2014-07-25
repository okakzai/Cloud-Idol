<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
Class Mset extends Model
{
	function Mset()
	{
		parent::Model();
	}
	function get_account($user)
	{
		return $this->db->get_where('account',array('username'=>$user),1,0);
	}
	function update_account($user)
	{
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$bahasa = $this->input->post('bahasa');
		$link = $this->input->post('link');
		
		$num = $this->db->count_all('account');
		$data=array
		(
			'name'=>$name,
			'email'=>$email,
			'username'=>$username,
			'password'=>$password,
			'bahasa'=>$bahasa,
			'link'=>$link
		);
		$this->db->where('username',$user);
		if($num==0)
		{
			$this->db->insert('account',$data);
		}
		else
		{
			$this->db->update('account',$data);
		}
	}
	function get_profile($user)
	{
		return $this->db->get_where('profile',array('username'=>$user),1,0);
	}
	function update_profile($user)
	{
		$perusahaan = $this->input->post('perusahaan');
		$univ = $this->input->post('univ');
		$sma = $this->input->post('sma');
		$smp = $this->input->post('smp');
		$musik = $this->input->post('musik');
		$buku = $this->input->post('buku');
		$film = $this->input->post('film');
		$tv = $this->input->post('tv');
		$game = $this->input->post('game');
		$domisili = $this->input->post('domisili');
		$asal = $this->input->post('asal');
		$gender = $this->input->post('gender');
		$tgl = $this->input->post('tgl');
		$bln = $this->input->post('bln');
		$thn = $this->input->post('thn');
		$about = $this->input->post('about');
		$telp = $this->input->post('telp');
		$alamat = $this->input->post('alamat');
		$kota = $this->input->post('kota');
		$kodepos = $this->input->post('kodepos');
		$web = $this->input->post('web');
		$id_im = $this->input->post('id_im');
		$name_im = $this->input->post('name_im');
		$tanggal = $this->input->post('tanggal');
		
		$num = $this->db->count_all('profile');
		$data=array
		(
			'username'=>$user,
			'perusahaan'=>$perusahaan,
			'univ'=>$univ,
			'sma'=>$sma,
			'smp'=>$smp,
			'musik'=>$musik,
			'buku'=>$buku,
			'film'=>$film,
			'tv'=>$tv,
			'game'=>$game,
			'domisili'=>$domisili,
			'asal'=>$asal,
			'gender'=>$gender,
			'about'=>$about,
			'tgl'=>$tgl,
			'bln'=>$bln,
			'thn'=>$thn,
			'telp'=>$telp,
			'alamat'=>$alamat,
			'kota'=>$kota,
			'kodepos'=>$kodepos,
			'web'=>$web,
			'id_im'=>$id_im,
			'name_im'=>$name_im,
			'tanggal'=>$tanggal
		);
		$this->db->where('username',$user);
		if($num==0)
		{
			$this->db->insert('profile',$data);
		}
		else
		{
			$this->db->update('profile',$data);
		}
	}
	function get_photo($user)
	{
		return $this->db->get_where('account',array('username'=>$user),1,0);
	}
	function update_photo($user)
	{
		$url=base_url().'uploads/photo/';	
		$filename=$_FILES['userfile']['name'];
		$num = $this->db->count_all('account');
		$data=array('photo'=>$url.$filename);
		$this->db->where('username',$user);
		if($num==0)
		{
			$this->db->insert('account',$data);
		}
		else
		{
			$this->db->update('account',$data);
		}
	}
	function update_song($user)
	{
		$url=base_url().'uploads/song/';	
		$filename=$_FILES['userfile']['name'];
		$data=array('username'=>$user,'song'=>$url.$filename);
		$this->db->insert('song',$data);
	}
	function do_upload_photo()
	{
		$config=array(
		'allowed_types'=>'jpg|jpeg|gif|png',
		'upload_path'=>'./uploads/photo/',
		'max_size'=>2000);
		$this->load->library('upload',$config);
		$this->upload->do_upload();
		$image_data=$this->upload->data();
	}
	function do_upload_song()
	{
		$config=array(
		'allowed_types'=>'mp3|avi|mp4|mov',
		'upload_path'=>'./uploads/song/');
		$this->load->library('upload',$config);
		$this->upload->do_upload();
		$image_data=$this->upload->data();
	}
}
