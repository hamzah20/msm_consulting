<?php defined('BASEPATH') or exit('No direct script access allowed');

class Incube
{

    public function __construct()
    {

        $this->CI = &get_instance();
    }

    //==============================LOGIN===================================

    public function cek_auth(){
        $this->CI->load->library('session');
        if ($this->CI->session->has_userdata('user_id')) {
            return true;
        }else {
            return false;
        }
    }

    //==============================LOGIN===================================

    public function generateID($length)
    {
        $randomSalt = md5(uniqid(rand(), true));
        $salt = substr($randomSalt, 0, $length);

        return $salt;
    }

    public function checkKTPFormat($ktpArr)
    {
        $ktpRegex = '/^[0-9]{16}$/';
        $ktpMatch = [];
        $counter = 3;

        foreach ($ktpArr as $ktp) {
            $formatCheck = preg_match($ktpRegex, $ktp);

            if ($formatCheck != 1) {
                // $match[] = $id;

                $tmp = array(
                    'counter'   => 'E' . $counter,
                    'val'       => $ktp
                );

                array_push($ktpMatch, $tmp);
            }

            $counter++;
        }

        return $ktpMatch;
    }

    public function checkPajak($field,$type){
         $stps=strpos($field,$type);
            $checked="";
         if ( ($stps!==false)){
              $checked = "checked";
          }
          return $checked;
    }
    public function checkstatus($status){
        //if($field==$type){
            if($status=='TERSEDIA'){
                $status="<small class='text-success'>*TERSEDIA</small>";
            }else{
               
                $status="<small class='text-danger'>*TIDAK TERSEDIA</small>";
            }
       // }
       
        return  $status;
    }

    public function checkGenderFormat($genArr)
    {
        $counter = 3;
        $genderMatch = [];

        foreach ($genArr as $gender) {

            if ($gender != 'Pria' && $gender != 'Wanita') {
                $tmp = array(
                    'counter'   => 'G' . $counter,
                    'val'       => $gender
                );

                array_push($genderMatch, $tmp);
            }

            $counter++;
        }

        return $genderMatch;
    }

    public function checkExpatFormat($eksArr)
    {
        $eksMatch = [];
        $counter = 3;

        foreach ($eksArr as $gender) {

            if ($gender != 'Ekspatriat' && $gender != 'Lokal') {
                $tmp = array(
                    'counter'   => 'J' . $counter,
                    'val'       => $gender
                );

                array_push($eksMatch, $tmp);
            }

            $counter++;
        }

        return $eksMatch;
    }

    public function checkPTKPFormat($dbArr, $ptkpArr)
    {
        $counter = 3;
        $ptkpRes = [];

        foreach ($ptkpArr as $testPtkp) {
            if (!in_array($testPtkp, $dbArr)) {
                $tmp = array(
                    'counter'   => 'I' . $counter,
                    'val'       => $testPtkp
                );

                array_push($ptkpRes, $tmp);
            }

            $counter++;
        }

        return $ptkpRes;
    }

    public function checkCountryFormat($dbArr, $countrypArr)
    {
        $counter = 3;
        $countryRes = [];

        foreach ($countrypArr as $testCountry) {
            if (!in_array($testCountry, $dbArr)) {

                $tmp = array(
                    'counter'   => 'K' . $counter,
                    'val'       => $testCountry
                );

                array_push($countryRes, $tmp);
            }

            $counter++;
        }

        return $countryRes;
    }

    public function checkNPWPFormat($npwpArr)
    {
        $npwpRegex = '/^[0-9]{2}.[0-9]{3}.[0-9]{3}.[0-9]{1}-[0-9]{3}.[0-9]{3}$/';
        $npwpMatch = [];
        $counter = 3;

        foreach ($npwpArr as $id) {

            $formatCheck = preg_match($npwpRegex, $id);

            if ($formatCheck != 1) {
                // $match[] = $id;

                $tmp = array(
                    'counter'   => 'D' . $counter,
                    'val'       => $id
                );

                array_push($npwpMatch, $tmp);
            }

            $counter++;
        }

        return $npwpMatch;
    }

    public function convertMonthName($month)
    {
        switch ($month) {

            case 'Januari':
                $monthDate = '01';
                break;
            case 'Februari':
                $monthDate = '02';
                break;
            case 'Maret':
                $monthDate = '03';
                break;
            case 'April':
                $monthDate = '04';
                break;
            case 'Mei':
                $monthDate = '05';
                break;
            case 'Juni':
                $monthDate = '06';
                break;
            case 'Juli':
                $monthDate = '07';
                break;
            case 'Agustus':
                $monthDate = '08';
                break;
            case 'September':
                $monthDate = '09';
                break;
            case 'Oktober':
                $monthDate = '10';
                break;
            case 'November':
                $monthDate = '11';
                break;
            case 'Desember':
                $monthDate = '12';
                break;
            default:
                $monthDate = null;
                break;
        }

        return $monthDate;
    }

    public function convertMonthNameLP($month)
    {
        switch ($month) {

            case 'Januari':
                $monthDate = '1';
                break;
            case 'Februari':
                $monthDate = '2';
                break;
            case 'Maret':
                $monthDate = '3';
                break;
            case 'April':
                $monthDate = '4';
                break;
            case 'Mei':
                $monthDate = '5';
                break;
            case 'Juni':
                $monthDate = '6';
                break;
            case 'Juli':
                $monthDate = '7';
                break;
            case 'Agustus':
                $monthDate = '8';
                break;
            case 'September':
                $monthDate = '9';
                break;
            case 'Oktober':
                $monthDate = '10';
                break;
            case 'November':
                $monthDate = '11';
                break;
            case 'Desember':
                $monthDate = '12';
                break;
            default:
                $monthDate = null;
                break;
        }

        return $monthDate;
    }

    public function convertMonthNumber($month)
    {
        switch ($month) {

            case '01':
                $monthDate = 'Januari';
                break;
            case '02':
                $monthDate = 'Februari';
                break;
            case '03':
                $monthDate = 'Maret';
                break;
            case '04':
                $monthDate = 'April';
                break;
            case '05':
                $monthDate = 'Mei';
                break;
            case '06':
                $monthDate = 'Juni';
                break;
            case '07':
                $monthDate = 'Juli';
                break;
            case '08':
                $monthDate = 'Agustus';
                break;
            case '09':
                $monthDate = 'September';
                break;
            case '10':
                $monthDate = 'Oktober';
                break;
            case '11':
                $monthDate = 'November';
                break;
            case '12':
                $monthDate = 'Desember';
                break;
            default:
                $monthDate = null;
                break;
        }

        return $monthDate;
    }

    // Rivaldy
    public function calculateDays($date1, $date2)
    {
        $date1_time = strtotime($date1);
        $date2_time = strtotime($date2);
        $datediff = $date2_time - $date1_time;

        return round($datediff / (60 * 60 * 24));
    }

    public function hoursToTime($inputHours) {
        $inputSeconds = $inputHours * 3600;
        $secondsInAMinute = 60;
        $secondsInAnHour = 60 * $secondsInAMinute;
        $secondsInADay = 24 * $secondsInAnHour;

        // Extract days
        $days = floor($inputSeconds / $secondsInADay);

        // Extract hours
        $hourSeconds = $inputSeconds % $secondsInADay;
        $hours = floor($hourSeconds / $secondsInAnHour);

        // Extract minutes
        $minuteSeconds = $hourSeconds % $secondsInAnHour;
        $minutes = floor($minuteSeconds / $secondsInAMinute);

        // Extract the remaining seconds
        $remainingSeconds = $minuteSeconds % $secondsInAMinute;
        $seconds = ceil($remainingSeconds);

        // Format and return
        $timeParts = [];
        $sections = [
            'day' => (int)$days,
            'hour' => (int)$hours,
            'minute' => (int)$minutes,
            'second' => (int)$seconds,
        ];

        foreach ($sections as $name => $value){
            if ($value > 0){
                $timeParts[] = $value. ' '.$name.($value == 1 ? '' : 's');
            }
        }

        return implode(', ', $timeParts);
    }

    public function minutesToTime($inputMinutes, $br = false)
    {
        $hours = floor($inputMinutes / 60);

        //Ekstrak Menit
        $menit_dari_jam = $hours * 60;
        $minutes = $inputMinutes - $menit_dari_jam;
        if ($br == true) {
            if ($hours > 0) {
                return $hours . "&nbsp;Hours&nbsp;" . "<br>" .$minutes . "&nbsp;Minutes";
            } else{
                return $minutes . "&nbsp;Minutes";
            }
        }else{
            if ($hours > 0) {
                return $hours . "&nbsp;Hours&nbsp;" . $minutes . "&nbsp;Minutes";
            } else{
                return $minutes . "&nbsp;Minutes";
            }
        }
        
    }

    public function hoursToTime2($inputHours, $int_only = false) 
    {
        $inputSeconds = $inputHours * 3600;
        $secondsInAMinute = 60;
        $secondsInAnHour = 60 * $secondsInAMinute;
        $secondsInADay = 24 * $secondsInAnHour;

        // Extract days
        $days = floor($inputSeconds / $secondsInADay);

        // Extract hours
        $hourSeconds = $inputSeconds % $secondsInADay;
        $hours = floor($hourSeconds / $secondsInAnHour);

        // Extract minutes
        $minuteSeconds = $hourSeconds % $secondsInAnHour;
        $minutes = floor($minuteSeconds / $secondsInAMinute);

        // Extract the remaining seconds
        $remainingSeconds = $minuteSeconds % $secondsInAMinute;
        $seconds = ceil($remainingSeconds);

        // Format and return
        $timeParts = [];
        $sections = [
            'day' => (int)$days,
        ];

        foreach ($sections as $name => $value){
            if ($value > 0){
                $timeParts[] = $value. ' '.$name.($value == 1 ? '' : 's');
            }
        }

        if($int_only){
            return $days;
        } else {
            return implode(', ', $timeParts);
        }
    }

// ============================================================================================================

    function get_working_hours($ini_str,$end_str){
        //config
        $ini_time = [9,0]; //hr, min
        $end_time = [20,0]; //hr, min
        //date objects
        $ini = date_create($ini_str);
        $ini_wk = date_time_set(date_create($ini_str),$ini_time[0],$ini_time[1]);
        $end = date_create($end_str);
        $end_wk = date_time_set(date_create($end_str),$end_time[0],$end_time[1]);
        //days
        $workdays_arr = $this->get_workdays($ini,$end);
        $workdays_count = count($workdays_arr);
        $workday_seconds = (($end_time[0] * 60 + $end_time[1]) - ($ini_time[0] * 60 + $ini_time[1])) * 60;
        //get time difference
        $ini_seconds = 0;
        $end_seconds = 0;
        if(in_array($ini->format('Y-m-d'),$workdays_arr)) $ini_seconds = $ini->format('U') - $ini_wk->format('U');
        if(in_array($end->format('Y-m-d'),$workdays_arr)) $end_seconds = $end_wk->format('U') - $end->format('U');
        $seconds_dif = $ini_seconds > 0 ? $ini_seconds : 0;
        if($end_seconds > 0) $seconds_dif += $end_seconds;
        //final calculations
        $working_seconds = ($workdays_count * $workday_seconds) - $seconds_dif;
        //echo $ini_str.' - '.$end_str.'; Working Hours:'.($working_seconds / 3600);
        return $working_seconds / 3600; //return hrs
    }

    function get_workdays($ini,$end){
        //config
        $skipdays = [6,0]; //saturday:6; sunday:0
        $skipdates = []; //eg: ['2016-10-10'];
        //vars
        $current = clone $ini;
        $current_disp = $current->format('Y-m-d');
        $end_disp = $end->format('Y-m-d');
        $days_arr = [];
        //days range
        while($current_disp <= $end_disp){
            if(!in_array($current->format('w'),$skipdays) && !in_array($current_disp,$skipdates)){
                $days_arr[] = $current_disp;
            }
            $current->add(new DateInterval('P1D')); //adds one day
            $current_disp = $current->format('Y-m-d');
        }
        return $days_arr;
    }

   
}
