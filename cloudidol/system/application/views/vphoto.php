<?php
$row=$info->row();
$photo = $row->photo;
?>
<center>	
	<p>
	<div id="photo">	
		<img src="<? print $photo;?>" />
	</div>
	<?
		print form_open_multipart('setting/photo');
		print form_upload('userfile','','class="panah"');
		print form_submit('photo','Change Photo','class="panah"');
		print form_close();
	?>
	</p>
</center>
