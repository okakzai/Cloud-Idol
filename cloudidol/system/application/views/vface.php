<?php
$arr_bulan=array('','Januari','Februari','Maret','April','Mei','Juni','Juli',
'Agustus','September','Oktober','November','Desember');
?>
<html>
<head>
	<title>welcome to net.idol</title>
	<link rel="shortcut icon" href="<?php print base_url().'images/alpha.ico';?>" />
	<style type="text/css">
		@import url("<?php print base_url().'css/face.css';?>");
	</style>
</head>
<body>
<div id='container'>
	<div id='header'>
		<div id='header_wrapper'>
            <div id='logo'>
				net.idol
			</div>
			<div id='top_bar'>
				<div id='login'>
					<?php print form_open('face/login')?>
                    <?php 
					$data=array('name'=>'username_login','id'=>'form','size'=>'9');
					print form_input($data);
					?>
					&nbsp;
					<?php 
					$data=array('name'=>'password_login','id'=>'form','size'=>'9');
					print form_password($data);
					?>
					&nbsp;
					<?php print form_submit('login','Login')?>
					<?php print form_close()?>
                </div>
			</div>
        </div>
    </div>
	<div id='content'>
		<table align='center'>
			<tr>
				<td bgcolor="#99FF66" width='500' height='500'>
					<?php print form_open('face/reg')?>
					<table align="center">
						<tr>
							<td>
								<?php
								$message=$this->session->flashdata('message');
								print $message==''?'':'<p align="center" id="sukses">'.$message.'</p>';
								?>
							</td>
						</tr>
						</table>
						<table bgcolor="#99FF66" width="500" height="450">
							<tr>
								<td>
									<center>
										<h3>Ikutan Gabung Yuk!</h3>
									</center>
									<table align="center" width="430">
										<tr>
											<td width="150">Nama Depan</td><td>:</td>
											<td align="center">
												<?php 
												$data=array('name'=>'nama_depan','id'=>'form','size'=>'33');
												print form_input($data);
												?>
											</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td align="center"><?php print form_error('nama_depan','<p id="message">','</p>')?></td>
										</tr>
										<tr>
											<td width="150">Nama Belakang</td><td>:</td>
											<td align="center">
												<?php 
												$data=array('name'=>'nama_belakang','id'=>'form','size'=>'33');
												print form_input($data);
												?>
											</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td align="center"><?php print form_error('nama_belakang','<p id="message">','</p>')?></td>
										</tr>
										<tr>
											<td width="150">Email</td><td>:</td>
											<td align="center">
												<?php 
												$data=array('name'=>'email','id'=>'form','size'=>'33');
												print form_input($data);
												?>
											</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td align="center"><?php print form_error('email','<p id="message">','</p>')?></td>
										</tr>
										<tr>
											<td width="150">Konfirmasi Email</td><td>:</td>
											<td align="center">
												<?php 
												$data=array('name'=>'konfirmasi_email','id'=>'form','size'=>'33');
												print form_input($data);
												?>
											</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td align="center">
											<?php print form_error('konfirmasi_email','<p id="message">','</p>')?></td>
										</tr>
										<tr>
											<td width="150">Tanggal Lahir</td><td>:</td>
											<td align="center">
												<select name="tgl">
													<?php
													print "<option value='1' 'selected'>Tanggal</option>";
													for ($tgl=1;$tgl<=31;$tgl++)
													{ print "<option value='$tgl'>$tgl</option>";}
													?>
												</select> 
												<select name="bln">
													<?php
													print "<option value='1' 'selected'>Bulan</option>";
													for ($bln=1;$bln<=12;$bln++)
													{ print "<option value='$bln'>$arr_bulan[$bln]</option>";}
													?>
												</select> 
												<select name="thn">
													<?php
													print "<option value='1' 'selected'>Tahun</option>";
													for ($thn=1980;$thn<=2000;$thn++)
													{ print "<option value='$thn'>$thn</option>";}
													?>
												</select>
											</td>
										</tr>
									</table>
									<br>
									<table align="center" width="430">
										<tr>
											<td width="150">Username</td><td>:</td>
											<td align="center">
												<?php 
												$data=array('name'=>'username','id'=>'form','size'=>'33');
												print form_input($data);
												?>
											</td>
										</tr>	
										<tr>
											<td></td>
											<td></td>
											<td align="center"><?php print form_error('username','<p id="message">','</p>')?></td>
										</tr>
										<tr>
											<td width="150">Password</td><td>:</td>
											<td align="center">
												<?php 
												$data=array('name'=>'password','id'=>'form','size'=>'33');
												print form_password($data);
												?>
											</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td align="center"><?php print form_error('password','<p id="message">','</p>')?></td>
										</tr>
										<tr>
											<td width="150">Konfirmasi Password</td><td>:</td>
											<td align="center">
												<?php 
												$data=array('name'=>'konfirmasi_password','id'=>'form','size'=>'33');
												print form_password($data);
												?>
											</td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td align="center"><?php print form_error('konfirmasi_password','<p id="message">','</p>')?></td>
										</tr>
									</table>
									<br>
									<table align="center" width="430">
										<tr>
											<td align="center">
												<?php print form_submit('gabung','Gabung')?>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<?php print form_close()?>
				</td>
				<td id='border' width='500' height='500'>
					<center>
						<h2>Sorry!!!</h2>
						<h5>This section is under construction.</h5>
					</center>
				</td>
			</tr>
		</table>
	</div>
	<div id='footer'>
        Tuna Server &copy; <?php echo date('Y');?>
    </div>
</div>
</body>
</html>