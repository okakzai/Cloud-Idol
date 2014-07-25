<table>
<tr>
	<td align="left">
		<?php print "Selamat Datang, ".$this->session->userdata('username')."!";?>
	</td>
	<td align="right">
		<?php print form_open('login/proses_logout');?>
		<input type="submit" name="logout" value="Logout" />
	</td>
</tr>
</table>