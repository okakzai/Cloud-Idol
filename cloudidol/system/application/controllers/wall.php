<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Wall extends Controller {

    function Wall()
    {
        parent::Controller();
		$this->load->model('mset');
        $this->load->model('wallmodel');
    }
    function index()
    {
      /*
	  $showed = $this->uri->segment(3);
        if(in_array($showed,array('image','link','youtube')))
        {
            $view = $showed;
            $showed = $this->uri->segment(4);
            echo '<div class="spacer2"></div>';
        }
        else
        {
            $view = '';
        }
        if($showed=='' or !is_numeric($showed)) $showed = 0;
        $visible_post = $this->config->item('number_post_visible');
        */
		//$status = $this->wallmodel->get_status($visible_post,$showed,$view);
		$status = $this->wallmodel->get_status();
        foreach($status->result() as $row)
        {
            $id = $row->wall_id;
            $user = get_setting_user();
            //$user=$this->session->userdata('username');
			$data = array('id'=>$id,'user'=>$user,'post'=>array('content'=>$row->wall_content,'time'=>$row->wall_time,'contain_media'=>$row->wall_contain_media,'media'=>$row->wall_media_info),'include_comments'=>true);
            echo "<div class='li status_".$id."'>";
            echo $this->load->view('wall/status_list',$data,true);
            echo "</div>";
        }
		/*
        if($view != '' && $showed == 0)
        {
            ?>
            <div id='status_list'></div>
            <input type='hidden' id='num_showed_post' value='<?php echo $this->config->item('number_post_visible');?>' />
            <div id='status_more_link'><a class='link1 blue98' href='javascript:void(0)' onclick='show_old_post2("<?=$view;?>")' >Kiriman Terdahulu</a> <span class='special2 arrowdown'>&nbsp;</span> <span class='loading_more'></span></div>
            <?php
        }
		*/
    }
    function base()
    {
        $this->load->view('wall/wall');
    }
	function setting()
    {
        $user=$this->session->userdata('username');
		$data['info']=$this->mset->get_photo($user);			
        $this->load->view('vphoto',$data);
    }
    function newest()
    {
        $data['status'] = $this->wallmodel->get_newest_status();
        $this->load->view('wall/newest_status',$data);
    }
    function comments()
    {
        $id = $this->uri->segment(3);
        if($id=='' or !is_numeric($id)) return false;
        $data['id'] = $id;
        $data['comments'] = $this->wallmodel->get_comments($id,true);
        $this->load->view('wall/wall_comment_list',$data);
    }
    function do_post()
    {
        restrict();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|prep_for_form|encode_php_tags');
        if ($this->form_validation->run() == FALSE)
        {
            return false;
        }
        else
        {
            $post = $this->input->post('message');
            $media = get_url($post);
            $wall_contain_media = 0;
            $extra = array();
            if(count($media[0])>0)
            {
                for($i=0;$i<count($media[0]);$i++)
                {
                    $rep[] = '';
                }
                $pure_content = str_replace($media[0],$rep,$post);
                // get info media
                $media = analyze_media($media[0]);
                $wall_contain_media = 1;
                $extra['wall_contain_media'] = $wall_contain_media;
                $extra['wall_media_info'] = $media;
                $post = $pure_content;
            }
            $id = $this->wallmodel->insert($post,$extra);
            if($id == false) return false;
            $user = get_setting_user();
            $data = array('id'=>$id,'user'=>$user,'post'=>array('content'=>$post,'time'=>time(),'contain_media'=>$wall_contain_media,'media'=>$media),'include_comments'=>true);
            echo "<div class='li status_".$id."' style='display:none;'>";
            echo $this->load->view('wall/status_list',$data,true);
            echo "</div>";
        }
    }
    function do_comment()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('comm_wall_id', 'Id', 'trim|required');
        $this->form_validation->set_rules('comm_author', 'Nama', 'trim|required');
        $this->form_validation->set_rules('comm_email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('comm_content', 'Komentar', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            return false;
        }
        else
        {
            $postdata = $_POST;
            $this->wallmodel->save_comment($postdata);
            $id = $postdata['comm_wall_id'];
            $data['comments'] = $this->wallmodel->get_comments($id,true);
            $data['id'] = $id;
            $this->load->view('wall/wall_comment_list',$data);
        }
    }
    function delete_post()
    {
        restrict();
        $id = $this->uri->segment(3);
        if($id=='' or !is_numeric($id)) return false;
        $this->wallmodel->delete_post($id);
    }
    function delete_comment()
    {
        restrict();
        $id = $this->uri->segment(3);
        if($id=='' or !is_numeric($id)) return false;
        $this->wallmodel->delete_comment($id);
    }
	function status()
	{
		$user=$this->session->userdata('username');
		$this->wallmodel->update_status($user);	
		redirect('face/index');		
	}
}

/* End of file wall.php */
/* Location: ./system/application/controllers/wall.php */