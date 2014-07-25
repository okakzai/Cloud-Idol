<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<script type='text/javascript'>
    $(function(){
        <?php if(!is_logged_in()):?>
        $('.delete_links').hide();
        <?php endif;?>
        $('.hidden_content').hide();
    });
    function show_hidden_content(id)
    {
        var real_content = $('.hc_'+id).text();
        $('.vc_'+id).html(real_content);
    }
    function show_hidden_comment(id)
    {
        var real_content = $('.hcom_'+id).text();
        $('.vcom_'+id).html(real_content);
    }
</script>
<div class='status'>
    <div class='s_foto'><img src='<?php echo base_url();?>images/profile.gif' /></div>
    <div class='s_desc'>
        <a class='link1 semibig bold blue98' href='<?php echo $user['web'];?>'><?php echo $user['nama'];?></a> 
        <span class='ns_desc'>
            <?php
                $content = $post['content'];
                echo split_content($content,$id);
                if($post['contain_media']==1)
                {
                    $trace = explode('^^^',$post['media']);
                    echo '<div class="media">';
                    switch($trace[0])
                    {
                        case 'image'    : echo "<a href='".$trace[3]."' target='_blank'><img src='".$trace[3]."' width='".$trace[1]."' height='".$trace[2]."' /></a>";break;
                        case 'youtube'  : echo youtube($trace[1]);break;
                        // otherwise just link
                        case 'link'     : echo "<a target='_blank' class='link1 blue98' href='".$trace[1]."'>".$trace[1]."</a>";break;
                        default         : die;
                    }
                    echo '</div>';                    
                }
            ?>
        </span>
        <div class='s_time'><span class='medium dark99'><?php echo $this->fungsi->fixtime($post['time']);?></span> - <a class='link1 medium blue98' href='javascript:void(0)' onclick='hide_dummy("<?php echo $id;?>");$(".upmost_<?php echo $id;?>").show();'>Komentari</a><span class='delete_links'> - <a class='link1 medium blue98' href='javascript:void(0)' onclick='delete_post(<?php echo $id;?>)'>Hapus</a></span></div>
        
        <div class='comment_list_for_post_<?php echo $id;?>'>
        <?php
		/*
        if($include_comments)
        {
            $data['comments'] = $this->wallmodel->get_comments($id);
            $this->load->view('wall/wall_comment_list',$data);
        }
		*/
        ?>
        </div>
    </div>
</div>

<div class='clear'></div>
<div class='spacer'></div>