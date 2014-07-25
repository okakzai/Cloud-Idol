<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>

<?php
if($status->num_rows()==0)
{
    
}
else
{
    $row = $status->row();
    $user = get_setting_user();
    ?>
    <span class='ns_name'><?php echo $user['nama'];?></span>
    <span class='ns_desc'><?php echo character_limiter($row->wall_content,130);?></span><br />
    <span class='ns_time small dark99'><?php echo $this->fungsi->fixtime($row->wall_time);?></span>
<?php
}
?>