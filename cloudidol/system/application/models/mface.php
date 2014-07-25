<?php
class Mface extends Model
{
	function Mface()
	{
		parent::Model();
	}
	function update_reg()
	{
		$nama_depan=$this->input->post('nama_depan');
		$nama_belakang=$this->input->post('nama_belakang');
		$name=$nama_depan.' '.$nama_belakang;
		$email=$this->input->post('email');
		/*$tgl=$this->input->post('tgl');
		$bln=$this->input->post('bln');
		$thn=$this->input->post('thn');
		*/
		$tanggal=$this->input->post('tanggal');  
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$account=array
		(
			'name'=>$name,
			'email'=>$email,
			'username'=>$username,
			'password'=>$password
		);
		$this->db->insert('account',$account);
		/*$profile=array
		(
			'username'=>$username,
			'tgl'=>$tgl,
			'bln'=>$bln,
			'thn'=>$thn
		);
		*/
		$profile=array
		(
			'username'=>$username,
			'tanggal'=>$tanggal
		);
		$this->db->insert('profile',$profile);		
	}
	function cek($username,$password)
	{
		$data=array('username'=>$username,'password'=>$password);
		$query=$this->db->get_where('account',$data,1,0);
		if ($query->num_rows()>0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
?>