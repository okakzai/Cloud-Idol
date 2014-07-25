<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fungsi
{
    function Fungsi()
    {
        $this->CI =& get_instance();
    }
    function bulan($input)
    {
        if($input=='1'){$output='Januari';}
        if($input=='2'){$output='Februari';}
        if($input=='3'){$output='Maret';}
        if($input=='4'){$output='April';}
        if($input=='5'){$output='Mei';}
        if($input=='6'){$output='Juni';}
        if($input=='7'){$output='Juli';}
        if($input=='8'){$output='Agustus';}
        if($input=='9'){$output='September';}
        if($input=='10'){$output='Oktober';}
        if($input=='11'){$output='November';}
        if($input=='12'){$output='Desember';}
        return $output;
    }
    function hari($input)
    {
        if($input=='Sun'){$output='Minggu';}
        if($input=='Mon'){$output='Senin';}
        if($input=='Tue'){$output='Selasa';}
        if($input=='Wed'){$output='Rabu';}
        if($input=='Thu'){$output='Kamis';}
        if($input=='Fri'){$output='Jumat';}
        if($input=='Sat'){$output='Sabtu';}
        return $output;
    }
    function hari2($input)
    {
        if($input=='1'){$output='Minggu';}
        if($input=='2'){$output='Senin';}
        if($input=='3'){$output='Selasa';}
        if($input=='4'){$output='Rabu';}
        if($input=='5'){$output='Kamis';}
        if($input=='6'){$output='Jumat';}
        if($input=='7'){$output='Sabtu';}
        return $output;
    }
    function hari3($input)
    {
        if($input=='1'){$output='Sun';}
        if($input=='2'){$output='Mon';}
        if($input=='3'){$output='Tue';}
        if($input=='4'){$output='Wed';}
        if($input=='5'){$output='Thu';}
        if($input=='6'){$output='Fri';}
        if($input=='7'){$output='Sat';}
        return $output;
    }
    function tanggal($in,$time='',$show_time=true)
    {
        $tgl = substr($in,8,2);
        $bln = substr($in,5,2);
        $thn = substr($in,0,4);
        if($time=='')
        {
            $hour = 0;
            $min = 0;
            $sec = 0;
        }
        else
        {
            $hour = substr($time,0,2);
            $min = substr($time,3,2);
            $sec = substr($time,6,2);
        }
        $timestmp = mktime($hour,$min,$sec,$bln,$tgl,$thn);
        $output = $this->hari(date('D',$timestmp)).', '.$tgl.' '.$this->bulan($bln).' '.$thn;
        if($show_time) $output .= ' pukul '.$hour.'.'.$min;
        return $output;
    }
    function tanggal2($timestamp)
    {
        $tgl = date('d',$timestamp);
        $bln = date('n',$timestamp);
        $thn = date('Y',$timestamp);
        $hari = date('D',$timestamp);
        $output = $this->hari($hari).", ".$tgl." ".$this->bulan($bln)." ".$thn." pukul ".date('G:i',$timestamp);
        return $output;
    }
    function tanggal3($in)
    {
        $tgl = substr($in,8,2);
        $bln = substr($in,5,2);
        $thn = substr($in,0,4);
        $output = $tgl.' '.$this->bulan($bln).' '.$thn;
        return $output;
    }
    function complete($in,$max)
    {
        $len = $max;
        $len_in = strlen($in);
        $zero_len = $len - $len_in;
        $zero = "";
        for($i=1;$i<=$zero_len;$i++)
        {
            $zero .= '0';
        }
        return $zero.$in;
    }
    function build_select_time($name,$edit='')
    {
        $select = '<select name="'.$name.'">';
        for($i=0;$i<=23;$i++)
        {
            for($j=0;$j<=30;$j+=30)
            {
                $selected = '';
                $c_hour = $this->complete($i,2);
                $c_min = $this->complete($j,2);
                if($edit!='')
                {
                    if($edit==($c_hour.':'.$c_min.':00'))
                    {
                        $selected = 'selected="selected"';
                    }
                }
                $select .= '<option '.$selected.' value="'.$c_hour.':'.$c_min.'">'.$c_hour.':'.$c_min.'</option>';
            }
        }
        $select .= '</select>';
        return $select;
    }
    function build_select_weekly($name,$edit='')
    {
        $select = '<select name="'.$name.'">';
        $select .= '<option value="">- pilih -</option>';
        for($j=1;$j<=7;$j++)
        {
            $selected = '';
            if($edit!='')
            {
                if($edit==$this->hari3($j))
                {
                    $selected = 'selected="selected"';
                }
            }
            $select .= '<option '.$selected.' value="'.$this->hari3($j).'">'.$this->hari2($j).'</option>';
        }
        $select .= '</select>';
        return $select;
    }
    function build_select_monthly($name,$edit='')
    {
        $select = '<select name="'.$name.'">';
        $select .= '<option value="">- pilih -</option>';
        for($j=1;$j<=31;$j++)
        {
            $selected = '';
            if($edit!='')
            {
                if($edit==$j)
                {
                    $selected = 'selected="selected"';
                }
            }
            $select .= '<option '.$selected.' value="'.$j.'">'.$j.'</option>';
        }
        $select .= '</select>';
        return $select;
    }
    function build_select_common($name,$dbobj,$key,$value,$extra='',$edit='')
    {
        $select = '<select name="'.$name.'" '.$extra.'>';
        foreach($dbobj->result() as $row)
        {
            $selected = '';
            if($edit!='')
            {
                if($edit==$row->$key)
                {
                    $selected = 'selected="selected"';
                }
            }
            $select .= '<option '.$selected.' value="'.$row->$key.'">'.$row->$value.'</option>';
        }
        $select .= '</select>';
        return $select;
    }
    function get_post($keys)
    {
        foreach($keys as $val)
        {
            $inp = $this->CI->input->post($val);
            $inp = trim($inp);
            $data[$val] = $inp;
        }
        return $data;
    }
    function fixtime($time)
    {
        $timespan = timespan($time);
        if(stristr($timespan,'hari'))
        {
            return $this->tanggal2($time);
        }
        return $timespan.' yang lalu';
    }
    function display_gravatar($email)
    {
        $gravatarMd5 = md5($email);
        return '<img src="http://www.gravatar.com/avatar/'.$gravatarMd5.'" alt="" width="35" height="35" />';
    }
    function generate_calendar($year, $month, $days = array(), $day_name_length = 3, $month_href = NULL, $first_day = 0, $pn = array())
    {
	$first_of_month = gmmktime(0,0,0,$month,1,$year);
	#remember that mktime will automatically correct if invalid dates are entered
	# for instance, mktime(0,0,0,12,32,1997) will be the date for Jan 1, 1998
	# this provides a built in "rounding" feature to generate_calendar()

	$day_names = array(); #generate all the day names according to the current locale
	for($n=0,$t=(3+$first_day)*86400; $n<7; $n++,$t+=86400) #January 4, 1970 was a Sunday
		$day_names[$n] = ucfirst(gmstrftime('%A',$t)); #%A means full textual day name

	list($month, $year, $month_name, $weekday) = explode(',',gmstrftime('%m,%Y,%B,%w',$first_of_month));
	$weekday = ($weekday + 7 - $first_day) % 7; #adjust for $first_day
	$title   = htmlentities(ucfirst($month_name)).'&nbsp;'.$year;  #note that some locales don't capitalize month and day names

	#Begin calendar. Uses a real <caption>. See http://diveintomark.org/archives/2002/07/03
	@list($p, $pl) = each($pn); @list($n, $nl) = each($pn); #previous and next links, if applicable
	if($p) $p = '<span class="calendar-prev">'.($pl ? '<a href="'.htmlspecialchars($pl).'">'.$p.'</a>' : $p).'</span>&nbsp;';
	if($n) $n = '&nbsp;<span class="calendar-next">'.($nl ? '<a href="'.htmlspecialchars($nl).'">'.$n.'</a>' : $n).'</span>';
	$calendar = '<div class="calendar"><table class="cal_bottom" style="border-top:1px solid #777777;">'."\n<tr class=day_title>";

	if($day_name_length){ #if the day names should be shown ($day_name_length > 0)
		#if day_name_length is >3, the full name of the day will be printed
		foreach($day_names as $d)
			$calendar .= '<th abbr="'.htmlentities($d).'">'.htmlentities($day_name_length < 4 ? substr($d,0,$day_name_length) : $d).'</th>';
		$calendar .= "</tr>\n<tr class='day'>";
	}

	if($weekday > 0) $calendar .= '<td colspan="'.$weekday.'">&nbsp;</td>'; #initial 'empty' days
	for($day=1,$days_in_month=gmdate('t',$first_of_month); $day<=$days_in_month; $day++,$weekday++){
		if($weekday == 7){
			$weekday   = 0; #start a new week
			$calendar .= "</tr>\n<tr class='day'>";
		}
		if(isset($days[$day]) and is_array($days[$day])){
			@list($link, $classes, $content) = $days[$day];
			if(is_null($content))  $content  = $day;
			$calendar .= '<td'.($classes ? ' class="'.htmlspecialchars($classes).'">' : '>').
				($link ? '<a href="'.htmlspecialchars($link).'">'.$content.'</a>' : $content).'</td>';
		}
		else $calendar .= "<td>$day</td>";
	}
	if($weekday != 7) $calendar .= '<td colspan="'.(7-$weekday).'">&nbsp;</td>'; #remaining "empty" days

	return $calendar."</tr>\n</table></div>\n";
    }
}