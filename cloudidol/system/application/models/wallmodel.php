<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
Class Wallmodel extends Model
{
	function Wallmodel()
	{
		parent::Model();
	}
	function get_newest_status()
	{
		$this->db->from('wall');
		$this->db->where('wall_deleted',0);
		$this->db->where('wall_contain_media',0);
		$this->db->limit(1);
		$this->db->order_by('wall_time','desc');
		return $this->db->get();
	}
	function insert($post,$extra)
	{
		$time = time();
		$data = array(
			'wall_id'=>'',
			'wall_content'=>$post,
			'wall_time'=>$time,
			'wall_ip'=>get_ip()
			);
		$data = array_merge($data,$extra);
		$this->db->insert('wall',$data);
		$this->db->select('wall_id as id');
		$this->db->from('wall');
		$this->db->where('wall_deleted',0);
		$this->db->where('wall_time',$time);
		$this->db->order_by('wall_time','desc');
		$last = $this->db->get();
		if($last->num_rows()==0) return false;
		$row = $last->row();
		return $row->id;
	}
	//function get_status($limit,$showed,$view='')
	function get_status()
	{
		$this->db->from('wall');
		$this->db->where('wall_deleted',0);
		/*
		$this->db->limit($limit,$showed);
		if($view != '')
		{
			$this->db->where('wall_contain_media',1);
			$this->db->like('wall_media_info',$view.'^^^');
		}
		*/
		$this->db->order_by('wall_time','desc');
		return $this->db->get();
		
	}
	function get_comments($id,$all=false)
	{
		$this->db->from('wall_comment');
		$this->db->where('comm_deleted',0);
		$this->db->where('comm_wall_id',$id);
		if(!$all)
			$this->db->limit(2);
		$this->db->order_by('comm_time','desc');
		$res = $this->db->get();
		$data = array();
		foreach($res->result() as $row)
		{
			$data[] = array('id'		=>$row->comm_id,
					'author'	=>$row->comm_author,
					'time'		=>$row->comm_time,
					'web'		=>$row->comm_web,
					'content'	=>$row->comm_content,
					'email'		=>$row->comm_email
			);
		}
		if(!$all)
		{
			$this->db->from('wall_comment');
			$this->db->where('comm_deleted',0);
			$this->db->where('comm_wall_id',$id);
			$num = $this->db->count_all_results();
		}
		else
		{
			$num = 0;
		}
		return array('num'=>$num,'data'=>array_reverse($data));
	}
	function save_comment($data)
	{
		$data['comm_time'] = time();
		$data['comm_ip'] = get_ip();
		$this->db->insert('wall_comment',$data);
	}
	function delete_post($id)
	{
		$this->db->where('wall_id',$id);
		$this->db->update('wall',array('wall_deleted'=>1));
	}
	function delete_comment($id)
	{
		$this->db->where('comm_id',$id);
		$this->db->update('wall_comment',array('comm_deleted'=>1));
	}
	/*
	function update_status($user)
	{
		$status=$this->input->post('status_textarea');
		$data=array('username'=>$user,'status'=>$status);
		$this->db->insert('status',$data);
	}
	*/
}
