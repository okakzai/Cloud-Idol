<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<script type='text/javascript'>
    $(function(){
        <?php if(!is_logged_in()):?>
        $('.delete_links').hide();
        <?php endif;?>
        $('.hidden_content').hide();
    });
    function hide_dummy(id)
    {
        $(".dummy_"+id).hide();
        $(".cf_"+id).show();
        $('textarea').elastic();
    }
    function hide_form(id)
    {
        $(".dummy_"+id).show();
        $(".cf_"+id).hide();
    }
</script>

<?php
$num = $comments['num'];
$nums = count($comments['data']);
?>
<div class='s_comments'>
    <ul class='list_comments'>
        <li <?php if($nums==0) echo "style='display:none'";?> class='upmost upmost_<?php echo $id;?>'></li>
        
        <?php if($num > 2):?>
        <li class='all_comments_<?php echo $id;?>'>
            <span class='all_comments'><a href='javascript:void(0)' onclick='load_small("wall/comments/<?php echo $id;?>",".comment_list_for_post_<?php echo $id;?>",".loading_<?php echo $id;?>");' class='medium blue98 link1'>Lihat ke-<?php echo $num;?> komentar</a><span class='loading_<?php echo $id;?>'></span></span>  
        </li>
        <?php endif;?>            
<?php
foreach($comments['data'] as $row):?>
        <li class='comment_id_<?php echo $row['id'];?>'>
            <div class='c_foto'><?php echo $this->fungsi->display_gravatar($row['email']);?></div>
            <div class='c_desc'>
                <a href='<?php echo $row['web'];?>' target='_blank' class='link1 medium bold blue98'><?php echo $row['author'];?></a>
                <span><?php echo split_comment($row['content'],$row['id']);?></span>
                <div class='c_time'><span class='medium dark99'><?php echo $this->fungsi->fixtime($row['time']);?></span><span class='delete_links'> - <a class='link1 medium blue98' href='javascript:void(0)' onclick='delete_comment(<?php echo $row['id'];?>)'>Hapus</a></span></div>
            </div>
            <div class='clear'></div>
        </li>
<?php
endforeach;?>
        <li <?php if($nums==0) echo "style='display:none'";?>class="dummy_<?php echo $id;?>"><input class='dark77 dummy' onfocus='hide_dummy("<?php echo $id;?>");' type='text' value='Tulis komentar...' /></li>
        <li class='comment_form cf_<?php echo $id;?>' style='display:none'>
            <form name='comment_form_<?php echo $id;?>' onsubmit='return false' method='post'>
            <input type='hidden' name='comm_wall_id' value='<?php echo $id;?>' />
            <table style='width:100%'>
            <tr>
                <td width='16%'>Nama</td>
                <td width='80%'><input type='text' name='comm_author'/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type='text' name='comm_email' /></td>
            </tr>
            <tr>
                <td>Web</td>
                <td><input type='text' name='comm_web' /></td>
            </tr>
            <tr>
                <td valign='top'>Komentar</td>
                <td><textarea name='comm_content'></textarea></td>
            </tr>
            </table>
            </form>
            <div class='button_submit'>
                <a href='javascript:void(0)' onclick='send_form(document.comment_form_<?php echo $id;?>,"wall/do_comment",".comment_list_for_post_<?php echo $id;?>");' class='button buttonblue smallbtn'>Komentari</a>
                <a class='button buttonwhite smallbtn' href='javascript:void(0)' onclick='hide_form("<?php echo $id;?>")'>Batalkan</a>
            </div>
        </li>
    </ul>
</div>