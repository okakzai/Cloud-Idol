<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to Cloud Idol</title>
<link href="<?php print base_url().'images/logo cloud idol.png';?>" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="<?php print base_url().'js/jquery-ui/themes/base/ui.all.css';?>" />
<link rel="stylesheet" type="text/css" href="<?php print base_url().'js/jquery-tools/css/tips-form.css';?>" />

<script type="text/javascript" src="<?php print base_url().'js/jquery-1.4.js';?>"></script>
<script type="text/javascript" src="<?php print base_url().'js/jquery-tools/jquery.tools.min.js';?>"></script>
<script type="text/javascript" src="<?php print base_url().'js/jquery.watermark.min.js';?>"></script>
<script type="text/javascript" src="<?php print base_url().'js/jquery.corner.js';?>"></script>
<script type="text/javascript" src="<?php print base_url().'js/jquery-ui/ui/ui.core.js';?>"></script>
<script type="text/javascript" src="<?php print base_url().'js/jquery-ui/ui/ui.datepicker.js';?>"></script>
 
<script type="text/javascript">
	$(document).ready(function() {
		$("#username_login").watermark("Username").corner("5px");
	    $("#password_login").watermark("Password").corner("5px");
		$("#nama_depan").tooltip({ position: "center right",offset: [-2, 10],tip: '.tooltip'})
		$("#nama_depan").watermark("Nama Depan").corner("5px");
		$("#nama_belakang").tooltip({ position: "center right",offset: [-2, 10],tip: '.tooltip'})
		$("#nama_belakang").watermark("Nama Belakang").corner("5px");
		$("#email").tooltip({ position: "center right",offset: [-2, 10],tip: '.tooltip'})
		$("#email").watermark("Email").corner("5px");
		$("#konfirmasi_email").tooltip({ position: "center right",offset: [-2, 10],tip: '.tooltip'})
		$("#konfirmasi_email").watermark("Konfirmasi Email").corner("5px");
		$("#tanggal").watermark("Tanggal Lahir").corner("5px");
		$("#tanggal").datepicker();
		$("#username").tooltip({ position: "center right",offset: [-2, 10],tip: '.tooltip'})
		$("#username").watermark("Username").corner("5px");
		$("#password").tooltip({ position: "center right",offset: [-2, 10],tip: '.tooltip'})
		$("#password").watermark("Password").corner("5px");
		$("#konfirmasi_password").tooltip({ position: "center right",offset: [-2, 10],tip: '.tooltip'})
		$("#konfirmasi_password").watermark("Konfirmasi Password").corner("5px");
    	$("#sukses").corner();
    	$("#gagal").corner();
    	$("#tombollogin").corner();
		$("#tombolgabung").corner();	
	});
</script>
<style type="text/css">
body {
	background-image:url(<?php print base_url().'images/bodyBg.jpg';?>);
	background-repeat:repeat-x;
}
#container{
	float: none;
	width: 730px;
	text-align: center;
	background-color: transparant;
	margin: 0 auto;
}
#header {
	height: 50px;
	width: auto;
}
#logotext { 
	text-align:center;
	font-weight: bold;
}
#login {
	height: 30px;
	width: 300px;
	float: right;
	margin-top:10px;
	margin-right:60px;
}
#logo {
	height: 30px;
	width: 300px;
	float:left;
	margin-top:0px;
}
#tombollogin {
	background-color: #00CC00;
	text-transform:uppercase;
	color:#FFFFFF;
	font-family:"Courier New", Courier, monospace;
	font-size:14px;
	font-weight:bold;
	text-align:center;
}
#tombolgabung {
	background-color: #00CC00;
	text-transform:uppercase;
	color:#FFFFFF;
	font-family:"Courier New", Courier, monospace;
	font-size:14px;
	font-weight:bold;
	text-align:center;
	height:30px;
}

#username_login{
	width:90px;
}
#password_login{
	width:90px;
}
#nama_depan{
	width:190px;
	border:solid green 1px;
}
#nama_belakang{
	width:190px;
	border:solid green 1px;
}
#email{
	width:190px;
	border:solid green 1px;
}
#konfirmasi_email{
	width:190px;
	border:solid green 1px;
}
#tanggal{
	width:190px;
	border:solid green 1px;
}
#username{
	width:190px;
	border:solid green 1px;
}
#password{
	width:190px;
	border:solid green 1px;
}
#konfirmasi_password{
	width:190px;
	border:solid green 1px;
}
#sukses{
	font-size: 12px;
	font-weight: bold;
	color: blue;
	text-align: center;
}
#gagal{
	font-size: 12px;
	font-weight: bold;
	color: red;
	text-align: center;
}
#content{
	height:450px;
	margin-top:20px;
	margin-bottom:20px;
}
#left{
	float:left;
	margin-left:0px;
}
#right{
	width:500px;
	float:right;
	margin-right:0px;
}
#footer{
	font-size:12px;
	text-align:center;
	float:center;
	border-top:#0033FF 1px solid;
	margin:10px auto;
	color:#0033FF;
}
#message{
	width:250px;
	text-align:left;
	float:right;
	font-size: 12px;
	color: red;
}

</style>
</head>

<body>
<div id="container">
	<div id="header">
		<div id="logo">
			<img src="<?php print base_url().'images/cloud idol.png';?>" />
			<div id="logotext"></div>
		</div>
		<div id="login">
		<?php print form_open('face/login')?>
      		<input type="text" id="username_login" name="username_login"> 
      		<input type="password" id="password_login" name="password_login"> 
      		<input type="submit" name="login" value="Log in" id="tombollogin" />
		<?php print form_close()?>
		</div>	
	</div>
	<div id="content">
		<div id="left">
		</div>
		<div id="right">
			<h3>Ikutan Gabung Yuk!</h3>
			<div class="tooltip"></div>
			<?php print form_open('face/reg')?>
        		<p>
      				<input type="text" id="nama_depan" name="nama_depan" title="Nama Depan harus berupa huruf, minimal 4 karakter, maksimal 30 karakter, tidak boleh ada angka atau spasi.">
      				<?php print form_error('nama_depan','<label id="message">','</label>')?>
      			</p> 
      			<p>
      				<input type="text" id="nama_belakang" name="nama_belakang" title="Nama Belakang harus berupa huruf, minimal 4 karakter, maksimal 30 karakter, tidak boleh ada angka atau spasi.">
      				<?php print form_error('nama_belakang','<label id="message">','</label>')?>
      			</p>
				<p>
					<input type="text" id="email" name="email" title="Email harus mengandung karakter titik (.) dan @.">
					<?php print form_error('email','<label id="message">','</label>')?>
				</p>
				<p>
					<input type="text" id="konfirmasi_email" name="konfirmasi_email" title="Isikan kembali alamat Email Anda.">
					<?php print form_error('konfirmasi_email','<label id="message">','</label>')?>
				</p> 
				<p>
					<input type="text" id="tanggal" name="tanggal">
					<?php print form_error('tanggal','<label id="message">','</label>')?>
				</p> 
				<p>
					<input type="text" id="username" name="username" title="Username harus berupa huruf, tepat 6 karakter, tidak boleh ada angka atau spasi.">
					<?php print form_error('username','<label id="message">','</label>')?>
				</p> 
				<p>
					<input type="password" id="password" name="password" title="Kombinasikan angka dan huruf untuk membuat Password yang sulit ditebak.">
					<?php print form_error('password','<label id="message">','</label>')?>
				</p>
				<p>
					<input type="password" id="konfirmasi_password" name="konfirmasi_password" title="Isikan kembali Password Anda.">
					<?php print form_error('konfirmasi_password','<label id="message">','</label>')?>
				</p>  
      			<p><input type="submit" name="gabung" value="Gabung Sekarang" id="tombolgabung" /></p>
				<?php $message=$this->session->flashdata('message'); print $message==''?'':$message;?>
			</form>
		</div>
	</div>
</div>
<div id="footer">
	<center>Tuna Server &copy; 2011 | Developed by <a href="http://www.behance.net/okakzai" title="Freelance Web Developer">Zainal Abidin</a></center>
</div>
</body>
</html>
