<?php
$row=$info->row();
$photo=$row->photo;
?>
<html>
<head>
	<title>welcome to net.idol</title>
	<link rel="shortcut icon" href="<?php print base_url().'images/alpha.ico';?>" />
	<link rel="stylesheet" type="text/css" href="<?php print base_url().'css/css.css';?>" />
	<link rel="stylesheet" type="text/css" href="<?php print base_url().'css/style.css';?>" />
	<link rel="stylesheet" type="text/css" href="<?php print base_url().'css/ddsmoothmenu.css';?>" />
	<script type='text/javascript'>
        var site = "<?php print site_url()?>";
        var loading_image_large = "<?php print base_url().'images/loading_large.gif'?>";
        var loading_image_small = "<?php print base_url().'images/loading.gif'?>";
    </script>
    <script type="text/javascript" src="<?php print base_url().'js/app.js';?>"></script>
</head>
<body>
<div id='container'>
	<div id='header'>
		<div id='header_wrapper'>
			<div id='logo'>
				net.idol
			</div>
			<div id='top_bar'>
			<div id='menu'>
				<?php
				print anchor('myhome','Home');
				print anchor('setting','Setting');
				print anchor('face/logout','Logout');
				?>
			</div>
			</div>
		</div>
	</div>
	<div id='content_wrapper'>
	<div id='content'>
		<div id='left'>
			<div id='foto'>
				<img src="<?php print $photo;?>" />
			</div>
			<div id='navigasi'>
				<div id="smoothmenu1" class="ddsmoothmenu">
					<ul>
						<li><?php print anchor('','Friends');?></li>
						<li><?php print anchor('','Events');?></li>
						<li><?php print anchor('','List of Songs');?></li>
					</ul>
				</div>
			</div>
		</div>
		<div id='center'>
			<div id='title'>
	
			</div>
			<div id='main_view'>
				<?php $this->load->view($main_view);?>
			</div>
		</div>
	</div>
	</div>
	<div id='footer'>
		<center>Tuna Server &copy; 2011 | Developed by <a href="http://www.behance.net/okakzai" title="Freelance Web Developer">Zainal Abidin</a></center>
	</div>	
</div>
</body>
</html>