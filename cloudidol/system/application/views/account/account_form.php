<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?
$arr_bahasa=array('None','Bahasa Indonesia','English');
$arr_link=array('None','Windows Live Messenger','Yahoo!','Gmail','Facebook');
?>
<script type='text/javascript'>
    function edit_info()
    {
        $('.about_static').hide();
        $('.about_textarea').show();
        $('.b_left').show();
        $('.about_textarea').elastic();
        $('.about_textarea').focus();
    }
</script>
<?php
    if($info->num_rows()==0)
    {
        $name = "";
		$email = "";
		$username = "";
		$password = "";
		$bahasa = "";
		$link = "";
	}
    else
    {
        $row = $info->row(); 
		$name = $row->name;
        $email = $row->email;
		$username = $row->username;
		$password = $row->password;
		$bahasa = $row->bahasa;
		$link = $row->link;
	}
?>
<div class='page_canvas'>
    <div class='sub_title'>
        <div class='title title_about semibig bold'>Account</div>
        <div class='edit_link'>
            <span class='edit just_edit'></span>
			<a class='blue98 link1' href='javascript:void(0)' onclick='edit_info()'>Setting</a>
        </div>
        
    </div>
    <div class='clear'></div>
    <div class='info'>
		<form name='accountform' onsubmit='return false' method='post'>
		<table>
			<tr>
				<td class='account'>Name</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($name);?></span></td>
				<td><input class='about_textarea' name="name" value="<?php echo $name;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>Email</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($email);?></span></td>
				<td><input class='about_textarea' name="email" value="<?php echo $email;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>Username</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($username);?></span></td>
				<td><input class='about_textarea' name="username" value="<?php echo $username;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>Password</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($password);?></span></td>
				<td><input type='password' class='about_textarea' name="password" value="<?php echo $password;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>Language</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($arr_bahasa[$bahasa]);?></span></td>
				<td>
					<select class='about_textarea' name='bahasa' style='display:none'>
						<?php
						for ($b=0;$b<=2;$b++)
						{
							if ($b==$bahasa) {$cek='selected';}
							else {$cek='';}
						print "<option value='$b' $cek>$arr_bahasa[$b]</option>";		
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td class='account'>Linked Account</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($arr_link[$link]);?></span></td>
				<td>
					<select class='about_textarea' name='link' style='display:none'>
						<?php
						for ($l=0;$l<=4;$l++)
						{
							if ($l==$link) {$cek='selected';}
							else {$cek='';}
						print "<option value='$l' $cek>$arr_link[$l]</option>";		
						}
						?>
					</select>
				</td>
			</tr>
		</table>
		<div class='b_left' style='display:none'>
			<a class='button buttonblue smallbtn' href='javascript:void(0);' onclick='send_form(document.accountform,"account/save/","#main_view")' >Simpan Perubahan</a>
			<a class='button buttonwhite smallbtn' href='javascript:void(0);' onclick='load_no_loading("account","#main_view");' >Batalkan</a>
		</div>
	</div>
</div>
