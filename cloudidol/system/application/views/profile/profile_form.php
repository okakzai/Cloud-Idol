<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
$arr_bulan=array('Bulan','Januari','Februari','Maret','April','Mei','Juni','Juli',
'Agustus','September','Oktober','November','Desember');
$arr_gender=array('None','Laki-laki','Perempuan');
$arr_im=array('None','AIM','Google Talk','Skype','Yahoo! Messenger','Gadu-Gadu','ICQ','Yahoo Jepang','QQ','NateOn',
'Twitter','Hyves','Orkut','Cyworld','mixi','QIP','Rediff Bol','Vkontakte','eBuddy','Mail.ru Agent');
?>

<link rel="stylesheet" type="text/css" href="<?php print base_url().'js/jquery-ui/themes/base/ui.all.css';?>" />
<script type="text/javascript" src="<?php print base_url().'js/jquery-1.4.js';?>"></script>
<script type="text/javascript" src="<?php print base_url().'js/jquery-tools/jquery.tools.min.js';?>"></script>
<script type="text/javascript" src="<?php print base_url().'js/jquery.watermark.min.js';?>"></script>
<script type="text/javascript" src="<?php print base_url().'js/jquery.corner.js';?>"></script>
<script type="text/javascript" src="<?php print base_url().'js/jquery-ui/ui/ui.core.js';?>"></script>
<script type="text/javascript" src="<?php print base_url().'js/jquery-ui/ui/ui.datepicker.js';?>"></script>

<script type='text/javascript'>
    function edit_info()
    {
        $('.about_static').hide();
        $('.about_textarea').show();
		$('.textarea').show();
        $('.b_left').show();
        $('.about_textarea').elastic();
        $('.about_textarea').focus();
		$('.textarea').elastic();
        $('.textarea').focus();
    }
    $(document).ready(function() {
    	$("#tanggal").datepicker();
	});
</script>
<?php
    if($info->num_rows()==0)
    {
        $perusahaan = "";
		$univ = "";
		$sma = "";
		$smp = "";
		$musik = "";
		$buku = "";
		$film = "";
		$tv = "";
		$game = "";
		$domisili = "";
		$asal = "";
		$gender = "";
		$about = "";
		$tgl = "";
		$bln = "";
		$thn = "";
		$telp = "";
		$alamat = "";
		$kota = "";
		$kodepos = "";
		$web = "";
		$id_im = "";
		$name_im = "";	
		$telp = "";
		$alamat = "";
		$kota = "";
		$kodepos = "";
		$web = "";
		$id_im = "";
		$name_im = "";	
		$tanggal="";
	}
    else
    {
        $row = $info->row(); 
		$perusahaan = $row->perusahaan;
		$univ = $row->univ;
		$sma = $row->sma;
		$smp = $row->smp;
		$musik = $row->musik;
		$buku = $row->buku;
		$film = $row->film;
		$tv = $row->tv;
		$game = $row->game;
		$domisili = $row->domisili;
		$asal = $row->asal;
		$gender = $row->gender;
		$about = $row->about;
		$tgl = $row->tgl;
		$bln = $row->bln;
		$thn = $row->thn; 
		$telp = $row->telp;
		$alamat = $row->alamat;
		$kota = $row->kota;
		$kodepos = $row->kodepos;
		$web = $row->web;
		$id_im = $row->id_im;
		$name_im = $row->name_im;
		$tanggal=$row->tanggal;
	}
?>
<?php print $tanggal;?>
<div class='page_canvas'>
    <div class='sub_title'>
        <div class='title title_about semibig bold'>Profile</div>
        <div class='edit_link'>
            <span class='edit just_edit'></span>
			<a class='blue98 link1' href='javascript:void(0)' onclick='edit_info()'>Setting</a>
        </div>
        
    </div>
    <div class='clear'></div>
    <div class='info'>
	<form name='profileform' onsubmit='return false' method='post'>
	
	<fieldset style='width:500px'>
	<legend>Education and Work</legend>
		<table>
			<tr>
				<td class='account'>Lembaga/Perusahaan</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($perusahaan);?></span></td>
				<td><input class='about_textarea' name="perusahaan" value="<?php echo $perusahaan;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>Perguruan Tinggi/Universitas</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($univ);?></span></td>
				<td><input class='about_textarea' name="univ" value="<?php echo $univ;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>SMA</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($sma);?></span></td>
				<td><input class='about_textarea' name="sma" value="<?php echo $sma;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>SMP</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($smp);?></span></td>
				<td><input class='about_textarea' name="smp" value="<?php echo $smp;?>" style="display:none" /></td>
			</tr>			
		</table>
	</fieldset>
	
	<fieldset style='width:500px'>
	<legend>Art and Entertainment</legend>
		<table>
			<tr>
				<td class='account'>Musik</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($musik);?></span></td>
				<td><input class='about_textarea' name="musik" value="<?php echo $musik;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>Buku</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($buku);?></span></td>
				<td><input class='about_textarea' name="buku" value="<?php echo $buku;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>Film</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($film);?></span></td>
				<td><input class='about_textarea' name="film" value="<?php echo $film;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>Televisi</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($tv);?></span></td>
				<td><input class='about_textarea' name="tv" value="<?php echo $tv;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>Permainan</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($game);?></span></td>
				<td><input class='about_textarea' name="game" value="<?php echo $game;?>" style="display:none" /></td>
			</tr>
		</table>
	</fieldset>
	
	<fieldset style='width:500px'>
	<legend>Basic Information</legend>
		<table>
			<tr>
				<td class='account'>Kota Sekarang</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($domisili);?></span></td>
				<td><input class='about_textarea' name="domisili" value="<?php echo $domisili;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>Kota Asal</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($asal);?></span></td>
				<td><input class='about_textarea' name="asal" value="<?php echo $asal;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>Jenis Kelamin</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($arr_gender[$gender]);?></span></td>
				<td>
					<select class='about_textarea' name='gender' style='display:none'>
						<?php
						for ($g=0;$g<=2;$g++)
						{
							if ($g==$gender) {$cek='selected';}
							else {$cek='';}
						print "<option value='$g' $cek>$arr_gender[$g]</option>";		
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td width='150' class='account'>Tanggal Lahir</td>
				<td width='5'class='account'>:</td>
				<!--<td width='270'><span id='account' class='about_static'><?php print "<p>$tgl $arr_bulan[$bln] $thn</p>";?></span></td>
				<td width='100'>
					<select class='about_textarea' name='tgl' style='display:none'>
						<?php
						for ($t=1;$t<=31;$t++)
						{
							if ($t==$tgl) {$cek='selected';}
							else {$cek='';}
						print "<option value='$t' $cek>$t</option>";		
						}
						?>
					</select>
				</td>
				<td width='100'>
					<select class='about_textarea' name='bln' style='display:none'>
						<?php
						for ($bn=1;$bn<=12;$bn++)
						{
							if ($bn==$bln) {$cek='selected';}
							else {$cek='';}
						print "<option value='$bn' $cek>$arr_bulan[$bn]</option>";		
						}
						?>
					</select>
				</td>
				<td width='100'>
					<select class='about_textarea' name='thn' style='display:none'>
						<?php
						for ($th=1980;$th<=2000;$th++)
						{
							if ($th==$thn) {$cek='selected';}
							else {$cek='';}
						print "<option value='$th' $cek>$th</option>";		
						}
						?>
					</select>
				</td> -->
				<td><span id='tanggal' class='about_static'><?php echo nl2br($tanggal);?></span></td>
				<td colspan='3' width='500'>
					<input class='about_textarea' name="about" style="display:none" value='<?php echo $tanggal;?>' />
				</td>
			</tr>			
			<tr>
				<td width='150' class='account'>Tentang Saya</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($about);?></span></td>
				<td colspan='3' width='500'>
					<input class='about_textarea' name="about" style="display:none" value='<?php echo $about;?>' />
				</td>
			</tr>
		</table>
	</fieldset>
	
	<fieldset style='width:500px'>
	<legend>Basic Contact</legend>
		<table>
			<tr>
				<td class='account'>Telepon</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($telp);?></span></td>
				<td><input class='about_textarea' name="telp" value="<?php echo $telp;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>Alamat</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($alamat);?></span></td>
				<td><input class='about_textarea' name="alamat" value="<?php echo $alamat;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>Kota</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($kota);?></span></td>
				<td><input class='about_textarea' name="kota" value="<?php echo $kota;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>Kode Pos</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($kodepos);?></span></td>
				<td><input class='about_textarea' name="kodepos" value="<?php echo $kodepos;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>Situs Web</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php echo nl2br($web);?></span></td>
				<td><input class='about_textarea' name="web" value="<?php echo $web;?>" style="display:none" /></td>
			</tr>
			<tr>
				<td class='account'>IM</td>
				<td class='account'>:</td>
				<td><span id='account' class='about_static'><?php print "<p>$id_im ($arr_im[$name_im])</p>";?></span></td>
				<td><input class='about_textarea' name="id_im" value="<?php echo $id_im;?>" style="display:none" /></td>
				<td>
					<select class='about_textarea' name='name_im' style='display:none'>
						<?php
						for ($im=0;$im<=19;$im++)
						{
							if ($im==$name_im) {$cek='selected';}
							else {$cek='';}
						print "<option value='$im' $cek>$arr_im[$im]</option>";		
						}
						?>
					</select>
				</td>
			</tr>
		</table>
	</fieldset>
	
	<div class='b_left' style='display:none'>
		<a class='button buttonblue smallbtn' href='javascript:void(0);' onclick='send_form(document.profileform,"profile/save/","#main_view")' >Simpan Perubahan</a>
		<a class='button buttonwhite smallbtn' href='javascript:void(0);' onclick='load_no_loading("profile","#main_view");' >Batalkan</a>
	</div>
	</div>
</div>
