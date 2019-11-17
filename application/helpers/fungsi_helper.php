<?php

function addExtraZero($data, $len) {
	$y = $len - strlen($data);
	while(strlen($x) < $y) {
		$x .= "0";
	}
	return $x . $data;
}

function tanggalIndo($waktu, $format) { //{tanggalIndoTiga tgl=0000-00-00 00:00:00 format="l, d/m/Y H:i:s"}
	if($waktu == "0000-00-00" || !$waktu || $waktu == "0000-00-00 00:00:00") {
		$rep = "";
	} else {

		if(preg_match("/-/", $waktu)) {
			$tahun = substr($waktu,0,4);
			$bulan = substr($waktu,5,2);
			$tanggal = substr($waktu,8,2);
		} else {
			$tahun = substr($waktu,0,4);
			$bulan = substr($waktu,4,2);
			$tanggal = substr($waktu,6,2);
		}

		$jam = substr($waktu,11,2);
		$menit= substr($waktu,14,2);
		$detik = substr($waktu,17,2);
		$hari_en = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
		$hari_id = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu");
		$bulan_en = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		$bulan_id = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

		if ($tanggal != '00') {
				$ret = @date($format, @mktime($jam, $menit, $detik, $bulan, $tanggal, $tahun));
		} else {
				$ret = @date($format, @mktime($bulan, $tahun));
		}

		$replace_hari = str_replace($hari_en, $hari_id, $ret);
		$rep = str_replace($bulan_en, $bulan_id, $replace_hari);
		$rep = nl2br($rep);
	}

	return $rep;
}

function bulanIndo($waktu, $format) {
	if(!$waktu) {
		$waktu = date("m");
	}
	$tahun = date("Y");
	$bulan_en = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

	$bulan_id = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	$ret = date($format, mktime(1, 1, 1, $waktu, 1, $tahun));
	$replace_bulan = str_replace($bulan_en, $bulan_id, $ret);

	return $replace_bulan;
}

function tahun()
{
    $now = array();
    $start = array();
    $start['mktime'] = strtotime("-1 day");
    $start['year'] = date("Y", $start['mktime']);
    $now['year'] = date("Y")+1;
    $now['year_start'] = date("Y")-10;
    for($i=$now['year_start'];$i<=$now['year'];$i++)
    {
        $hasil[$i] = $i;
    }

    return $hasil;
}

function datediff($interval, $date1, $date2) {
	$interval = strtolower($interval);
	// Function roughly equivalent to the ASP "DateDiff" function

	//convert the dates into timestamps
	$date1 = strtotime($date1);
	$date2 = strtotime($date2);
	$seconds = $date2 - $date1;

	//if $date1 > $date2
	//change substraction order
	//convert the diff to +ve integer
	if ($seconds < 0)
	{
		$tmp = $date1;
		$date1 = $date2;
		$date2 = $tmp;
		$seconds = 0-$seconds;
	}

	//reconvert the timestamps into dates
	if ($interval =='y' || $interval=='m') {
		$date1 = @date("Y-m-d h:i:s", $date1);
		$date2=  @date("Y-m-d h:i:s", $date2);
	}

	switch($interval) {
		case "y":
			list($year1, $month1, $day1) = split('-', $date1);
			list($year2, $month2, $day2) = split('-', $date2);
			$time1 = (date('H',$date1)*3600) + (date('i',$date1)*60) + (date('s',$date1));
			$time2 = (date('H',$date2)*3600) + (date('i',$date2)*60) + (date('s',$date2));
			$diff = $year2 - $year1;

			if($month1 > $month2) {
				$diff -= 1;
			} elseif($month1 == $month2) {
				if($day1 > $day2) {
				$diff -= 1;
				} elseif($day1 == $day2) {
					if($time1 > $time2) {
						$diff -= 1;
					}
				}
			}
		break;
		case "m":
			list($year1, $month1, $day1) = split('-', $date1);
			list($year2, $month2, $day2) = split('-',$date2);
			$time1 = (date('H',$date1)*3600) + (date('i',$date1)*60) + (date('s',$date1));
			$time2 = (date('H',$date2)*3600) + (date('i',$date2)*60) + (date('s',$date2));
			$diff = ($year2 * 12 + $month2) - ($year1 * 12 + $month1);
			if($day1 > $day2) {
				$diff -= 1;
			} elseif($day1 == $day2) {
				if($time1 > $time2) {
					$diff -= 1;
				}
			}
		break;
		case "w":
			// Only simple seconds calculation needed from here on
			$diff = floor($seconds / 604800);
		break;
		case "d":
			$diff = floor($seconds / 86400);
		break;
		case "h":
			$diff = floor($seconds / 3600);
		break;
		case "i":
			$diff = floor($seconds / 60);
		break;
		case "s":
			$diff = $seconds;
		break;
	}
	return $diff;
}

function getYMD($date) {
	//$date = dd/mm/yy
    if(!$date) return '';
		$arr = explode("/", $date);

		return @date("Y-m-d", @mktime(1, 1, 1, $arr[1], $arr[0], $arr[2]));
}

function uangIndo($uang) {
    return number_format($uang, 2, '.', ',');
}

function terbilang($x) {
  $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return Terbilang($x - 10) . "Belas";
  elseif ($x < 100)
    return Terbilang($x / 10) . " Puluh" . terbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . Terbilang($x - 100);
  elseif ($x < 1000)
    return Terbilang($x / 100) . " Ratus" . terbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . Terbilang($x - 1000);
  elseif ($x < 1000000)
    return Terbilang($x / 1000) . " Ribu" . terbilang($x % 1000);
  elseif ($x < 1000000000)
    return Terbilang($x / 1000000) . " Juta" . terbilang($x % 1000000);
}

function timeNow()
{
    return date('Y-m-d H:i:s');
}

function bulan()
{
    for($i=1;$i<13;$i++) :
        $tmpid = (strlen($i)==1) ? "0".$i : $i;
        $hasil[$tmpid] = bulanIndo($i, "F");
    endfor;

		return $hasil;
}


function clean($string) {
   	$string = str_replace(' ', '', $string); // Replaces all spaces with hyphens.
		$string = str_replace('/', '-', $string);
		$string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);

	 	return preg_replace('/\s+/', '', $string); // Removes special chars.
}

function getUser($id_user) {
		$CI =& get_instance();
		$profile = $CI->db->where('id_user', $id_user)->get('tb_user')->row_array();

		return $profile;
}

function convertDateMysql($date) {
		// dd-mm-yyyy
		$temp = explode('/', $date);
		// yyyy-mm-dd
		$new_date = $temp[2].'-'.$temp[1].'-'.$temp[0];

		return $new_date;
}

function convertInputMask($date) {
		//$date = yyyy-mm-dd
    if(!$date) return '';
    //strip the time
    $curr = current(explode(" ", $date));
		$arr = explode("-", $curr);

		return $arr[2] . '/' . $arr[1] . '/' . $arr[0];
}

function getPeriod($period) {
		$temp = explode('-', $period);

		$period = bulanIndo($temp[1], "F").' '.$temp[0];

		return $period;
}

function empty_course($dosen_id, $shift_id, $date) {
		$CI =& get_instance();
		$CI->db->where('dosen_id', $dosen_id);
		$CI->db->where('shift_start', $shift_id);
		$CI->db->where('date_start', $date);
		$empty = $CI->db->get('tb_schedule_restriction');

		return $empty;
}

function setting_display() {
		$CI =& get_instance();
		$val = $CI->db->get('apps_display')->row_array();

		return $val;
}

function date_indo($date){
    if (($date != null)||($date != '')) {
        $tanggal = date('d', strtotime($date));
        $bulan = date('m', strtotime($date));
        $tahun = date('Y', strtotime($date));
        $index_bulan = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        );
        $bulan_indo = $index_bulan[$bulan];

        $result = $tanggal ." ". $bulan_indo ." ". $tahun;
    } else {
        $result = '(empty)';
    }

    return $result;
}

function get_day($date) {
		if (($date != null)||($date != '')) {
				$hari = date('N', strtotime($date));
				$index_hari = array(
						'1' => 'Senin',
						'2' => 'Selasa',
						'3' => 'Rabu',
						'4' => 'Kamis',
						'5' => 'Jumat',
						'6' => 'Sabtu',
						'7' => 'Minggu',
				);
				$hari_indo = $index_hari[$hari];

				$result = $hari_indo;
		} else {
				$result = '(empty)';
		}

		return $result;
}
