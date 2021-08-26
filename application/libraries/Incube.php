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
}
