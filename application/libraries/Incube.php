<?php defined('BASEPATH') or exit('No direct script access allowed');

class Incube
{

    public function __construct()
    {

        $this->CI = &get_instance();
    }

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

   
}
