<?php
$row=$info->row();
$name = $row->name;
$lokasi = $row->lokasi;
$photo = $row->photo;
?>
<html>
  <head>
  	<title>Welcome to Cloud Idol</title>
	<link rel="shortcut icon" href="<?php print base_url().'images/logo cloud idol.png';?>" />
    <script type="text/javascript" src="<?php print base_url().'js/jquery-1.4.js';?>"></script>
    <script type="text/javascript" src="<?php print base_url().'js/jquery.equalizecols.js';?>"></script>
    <script type="text/javascript" src="<?php print base_url().'js/jquery.watermark.min.js';?>"></script>
    <script type="text/javascript" src="<?php print base_url().'js/jquery.corner.js';?>"></script>
    <script type="text/javascript" src="<?php print base_url().'js/app.js';?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php print base_url().'css/ddsmoothmenu.css';?>" />
	<link rel="stylesheet" type="text/css" href="<?php print base_url().'css/mynotes.css';?>" />
	
    <script type="text/javascript">
      $(document).ready(function(){      
          $("#kiri, #kanan").equalizeCols();
          $("#search").watermark("Search").corner("tl bl 5px");          
      	  $("#search_button").corner("tr br 10px");
      	  $("#profil_wrapper").corner("tl tr 10px");
      	  $("#upload_wrapper, #tombol").corner("10px");
      	  //load('wall/base','#wall');
      	  //update_status();
      	  $("#share").click(function(){
	  		var status=$("#status_textarea").val();
	  		$.ajax({
	  			type:"POST",
	  			url:site+"/wall/status/",
	  			data:"status="+status,
	  			success:function(data){
	  				$("#status_list").html(data);
	  			}
	  		});
	  	});
      });
      /*function load(page,div){
    	var image_load = "<div class='ajax_loading'><img src='"+loading_image_large+"' /></div>";
    	$.ajax({
        	url: site+"/"+page,
        	beforeSend: function(){
            $(div).html(image_load);
        	},
        	success: function(response){
            $(div).html(response);
        	},
        	dataType:"html"  		
    	});
    	return false;
	  }
	  function update_status()
	  {
	  	$("#share").click(function(){
	  		var status=$("#status_textarea").val();
	  		$.ajax({
	  			type:"POST",
	  			url:site+"/wall/status/",
	  			data:"status="+status,
	  			success:function(data){
	  				$("#status_list").html(data);
	  			}
	  		});
	  	});
	  }
	  function switch_tab(obj)
	  {
    	$(".tabs > a:not(.dummy_tab)").attr("class", "tab");
    	$(obj).attr("class", "current_tab");
    	$('#search_option').slideUp();
    	$('.dummy_tab').hide();
	  }
	  function show_old_post()
	  {
    	var showed = $('#num_showed_post').val();
    	$('#num_showed_post').val(parseFloat(visible_post)+parseFloat(showed));
    	load_small("wall/index/"+showed,"#status_list",".loading_more","append");
	  }*/
	  var site = "<?php print site_url()?>";
	  var loading_image_large = "<?php print base_url().'images/loading_large.gif';?>";
      </script>
      <style type="text/css">
      body{
      	margin: 0px auto;
      }
      #search_box{
      	float:right;
      	margin: 0px;
      	padding: 0px;
      }
      #search{
      	width:300px;
      }
      #container_wrapper{
      }
      #header_wrapper {
          height:70px;
          background-color:#000;
      }
      #header{
      	width:1200px;
      	height:70px;
      	margin: 0px auto;
      	text-align:center;
      	color:white;
      }
      #logo{
      	height:50px;
      	width: 90px;
      	float:left;
      	margin-top:5px;
      	margin-left:45px;
      }
      #menu{
      	height:30px;
      	width: 800px;
      	float:right;
      	padding-top:5px;
      	margin-top:20px;
      	margin-left:10px;
      	text-align: left;
      }
      #content_wrapper{
      	width:1200px;
      	margin: 0px auto;
      }
      #header_content{
      	  background-color:#ccc;
      	  height:30px;
      	  font-weight:bold;
      	  padding-top:5px;
      	  padding-bottom:0px;
      	  margin:0px;
      	  padding-left:300px;
      }
      #footer_content{
      	  background-color:#ccc;
      	  height:30px;
      	  float:left;
      	  width:1200px;
      }
      #kiri {
          float:left;
          width:300px;
          background-color:#ccc;
      }
      #tengah {
          float:left;
          width:550px;
          background-color:white;
      }
      #header_tengah {
          width:450px;
          margin:0px auto;
          background-color:white;
      }
      #center{
      	width:500px;
      	margin:10px auto;
      	padding:0px 10px 10px;
      }
      #kanan {
          float:right;
          width:350px;
          background-color:#ccc;
      }
      #footer_wrapper {
      	width:1200px;
      	margin: 10px auto;  
      	clear:both;        
      }
      #footer{
      	text-align:center;
      }
      #top_text{
      	
      }
      .footer_link {
      	text-decoration:none;
      	color:black;
      	margin:7px;
      }
      .footer_link:hover {
      	text-decoration:underline;
      	color:blue;
      }
      .menu_link {
      	text-decoration:none;
      	color:white;
      	margin:7px;
      }
      .menu_link:hover {
      	color:black;
      	background-color: white;
      }
      #bottom_text{
      	font-size: 11px;
      }
      #profil_wrapper{
      	background-color: #999;
     	width:230px;
     	height:120px;
     	margin: 0px 40px;
     	padding:0px;
      }
      #foto{
      	height:100px;
      	margin: 0px;
      	padding: 4px;
      	text-align:center;
      	font-weight: bold;
      }
      #foto img{
		width:45%;
		height:auto;
		float:left;
	  }
	  #photo{
      	height:250px;
      	width:250px;
      	margin: 0px;
      	padding: 4px;
      	text-align:center;
      	font-weight: bold;
      }
      #photo img{
		width:100%;
		height:auto;
		float:left;
	  }
      #navigasi_wrapper{
      	background-color: #999;
     	width:230px;
     	height:120px;
     	margin: 10px 40px;
     	padding:0px;
      }
     #upload_wrapper{
      	background-color: #999;
     	width:230px;
     	height:50px;
     	margin: 30px 40px 0px;
     	padding:0px;
      }
      .menu_kiri{
      	font-weight:bold;
      	background-color:#ccc;
      }
      #sponsor_wrapper{
      	background-color: #ccc;
     	width:300px;
     	//height:220px;
     	margin: 0px 10px 10px;
     	padding:0px;
     	border:solid #999 1px;
      }
      #entertainment_wrapper{
      	background-color: #ccc;
     	width:300px;
     	//height:220px;
     	margin: 10px;
     	padding:0px;
     	border:solid #999 1px;
      }
      #header_menu{
      }
      .menu_kanan{
      	float:left;
      	font-weight:bold;
      	background-color:#999;
      	width:300px;
      }
      #boxnav{
      	border:solid #999 1px;
      }
      #list{
      	padding:0px;
      	margin:0px;
      	float:right;
      }
      .list{
      	font-weight:normal;
      	color:white;
      	text-decoration: none;
      }
      .list:hover{
      	font-weight:normal;
      	color:black;
      	text-decoration: underline;
      }
      	.tab  {  
			padding: 4px 10px;  
			font-weight: bold;
			font-size:13px;
			color:blue;
			margin-right: .0001px;   
	 	}  
	 	.tab:hover  {  
			text-decoration: none;
			color:black;
			font-weight:bold; 
	 	}
	 	.current_tab{
			font-size:13px;
			text-decoration: none;
			color:black;
			font-weight:bold;
		}
		#tombol {
			cursor:pointer;
			background-color: #00CC00;
			text-transform:uppercase;
			color:#FFFFFF;
			font-family:"Courier New", Courier, monospace;
			font-size:14px;
			font-weight:bold;
			text-align:center;
			height:30px;
		}
		#share {
			cursor:pointer;
			background-color: #00CC00;
			color:#FFFFFF;
			font-family:"Courier New", Courier, monospace;
			font-size:14px;
			font-weight:bold;
			text-align:center;
			height:30px;
		}
		.panah{
			cursor:pointer;
		}
      </style>
      </head>
      <body>
      	<div id="container_wrapper">
      		<div id="header_wrapper">
          		<div id="header">
          			<div id="logo">
          				<img src="<?php print base_url().'images/logo cloud idol.png';?>">
          			</div>
          			<div id="menu">
          				<a class="menu_link" href="#">Home</a>
          				<a class="menu_link" href="#">Profile</a>
          				<a class="menu_link" href="#">Friends</a>
          				<a class="menu_link" href="#">Account</a>
          				<?php print anchor('face/logout','Sign out','class="menu_link"');?>      			
          				<div id="search_box">
          					<table>
          						<tr>
          							<td><input type="text" id="search" /></td>
          							<td><input type="image" src="<?php print base_url().'images/search.jpg';?>" id="search_button" /></td>
          						</tr>
          					</table>
          				</div>
          			</div>
          		</div>
      		</div>
      		<div id="content_wrapper">
      			<div id="header_content">Information</div>
          			<div id="kiri">
          				<div id="profil_wrapper">
          					<div id="foto">
          						<img src="<?php print $photo;?>" />
          						<p>
          							<?php print $name;?>
          							<br>
          							<?php print $lokasi;?>
          						</p>
          						<p>
          							<input type="submit" name="setting" value="Setting" id="tombol" onclick='load("wall/setting","#center");switch_tab(this);'/>
          					    </p>
          					</div>
          				</div>
          				<div id="navigasi_wrapper">
          					<div class="menu_kiri">LINKS</div>
          					<div class="ddsmoothmenu">
          						<ul>
          							<li><a id="boxnav" href="#">Friends</a></li>
          							<li><a id="boxnav" href="#">Event</a></li>
          							<li><a id="boxnav" href="#">List of Songs</a></li>
          						</ul>
          					</div>
          				</div>
          				<div id="upload_wrapper">
          					<div class="menu_kiri">UPLOAD YOUR SONG</div>
          						<?php
									print form_open_multipart('setting/song');
									$data='size="7"';
									print form_upload('userfile','',$data);
									print form_submit('song','Upload','class="panah"');
									print form_close();
								?>
          				</div>	
          			</div>
          			
          			<div id="tengah">
          				<div id="header_tengah">
          					<div class="tabs">
          						<a class="tab dummy_tab" style="display: none"> Search Result</a>
          						<a class="current_tab" href="javascript:void(0);" onclick='load("wall/base","#center");switch_tab(this);'> Status of Song</a>
          						<a class="tab" href="#" onclick="switch_tab(this);"> Top 10 Cloud Idol</a>
          						<a class="tab" href="#" onclick="switch_tab(this);"> My History Song</a>
          					</div>
          				</div>	
          				<div id="center">
          					
          				</div>
          			</div>
          			
          			<div id="kanan">
          				<div id="sponsor_wrapper">
          					<div id="header_menu">
          						<div class="menu_kanan">Sponsored
          							<div id="list">
          								<a class="list"href="#">Lihat Semua</a>
          							</div>
          						</div>
          					</div>     		
          					<center>
          						<br>
          						<p>Aqua</p>
          						<p>Sosro</p>
          						<p>Nutrisari</p>
          						<p>Beng-beng</p>
          						<p>Aqua</p>
          						<p>Sosro</p>
          						<p>Nutrisari</p>
          						<p>Beng-beng</p>
          					</center>
          				</div>
          				<div id="entertainment_wrapper">
          					<div id="header_menu">
          						<div class="menu_kanan">Entertainment
          							<div id="list">
          								<a class="list"href="#">Lihat Semua</a>
          							</div>
          						</div>
          					</div>	
          					<center>
          						<br>
          						<p>Scrabble</p>
          						<p>Snake Elder</p>
          						<p>Cloud Hunter</p>
          						<p>Hocus Pocus</p>
          						<p>Scrabble</p>
          						<p>Snake Elder</p>
          						<p>Cloud Hunter</p>
          						<p>Hocus Pocus</p>
          						<p>Cloud Hunter</p>
          						<p>Hocus Pocus</p>
          					</center>
          				</div>
          			</div>
      			<!--<div id="footer_content"></div>-->
      		</div>
      		<div id="footer_wrapper">
          		<div id="footer">
          			<div id="top_text">
          				<a class="footer_link" href="#">About</a>
          				<a class="footer_link" href="#">Developers</a>
          				<a class="footer_link" href="#">Privacy</a>
          				<a class="footer_link" href="#">Terms</a>
          				<a class="footer_link" href="#">Contact</a>
          				<a class="footer_link" href="#">Help</a>
          			</div>
          			<div id="bottom_text">
          				<center>Tuna Server &copy; 2011 | Developed by <a href="http://www.behance.net/okakzai" title="Freelance Web Developer">Zainal Abidin</a></center>
          			</div>
          		</div>
      		</div>
      	</div>
      </body>
</html>
