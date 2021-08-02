<?php

class Sklibrfnc {

    function _fSETDatInd($_oDat) {
        $_oArrMon = array("", "JAN", "FEB", "MAR", "APR", "MEI", "JUN", "JUL", "AGS", "SEP", "OKT", "NOV", "DES");

        $_oTgl = substr($_oDat, 6, 2);
        $_oBln = substr($_oDat, 4, 2);
        $_oThn = substr($_oDat, 0, 4);

        $_oRsl = $_oTgl . "/" . $_oArrMon[(int) $_oBln] . "/" . $_oThn;
        return($_oRsl);
    }

    function _fSETTglBln($_oDat) {
        $_oArrMon = array("", "JAN", "FEB", "MAR", "APR", "MEI", "JUN", "JUL", "AGS", "SEP", "OKT", "NOV", "DES");

        $_oBln = substr($_oDat, 0, 2);

        $_oRsl = $_oArrMon[(int) $_oBln];
        return($_oRsl);
    }

    function _fSETDatEng($_oDat) {
        $_oArrMon = array("", "JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC");

        $_oTgl = substr($_oDat, 6, 2);
        $_oBln = substr($_oDat, 4, 2);
        $_oThn = substr($_oDat, 0, 4);

        $_oRsl = $_oTgl . "/" . $_oArrMon[(int) $_oBln] . "/" . $_oThn;
        return($_oRsl);
    }

    function _fSETDteFrmEng($_oDat) {

        $_oTgl = substr($_oDat, 6, 2);
        $_oBln = substr($_oDat, 4, 2);
        $_oThn = substr($_oDat, 0, 4);

        $_oRsl = $_oBln . "/" . $_oTgl . "/" . $_oThn;
        return($_oRsl);
    }

    function _fSETDteIndPjg($_oMon) {
        $_oArrMon = array("", "JANUARI", "FEBRUARI", "MARET", "APRIL", "MEI", "JUNI", "JULI", "AGUSTUS", "SEPTEMBER", "OKTOBER", "NOVEMBER", "DESEMBER");

        $_oBln = $_oMon;

        $_oRsl = $_oArrMon[(int) $_oBln];
        return($_oRsl);
    }

    function _fSETDteInd($_oDat) {
        $_oArrMon = array("", "JAN", "FEB", "MAR", "APR", "MEI", "JUN", "JUL", "AGS", "SEP", "OKT", "NOV", "DES");

        $_oTgl = substr($_oDat, 6, 2);
        $_oBln = substr($_oDat, 4, 2);
        $_oThn = substr($_oDat, 0, 4);

        $_oRsl = $_oTgl . "-" . $_oArrMon[(int) $_oBln] . "-" . $_oThn;
        return($_oRsl);
    }

    function _fSETDteMlt($_oDte) {

        $_sDte = explode("/", $_oDte);

        $_oTgl = $_sDte[0];
        $_oBln = trim(strtolower($_sDte[1]));
        $_oThn = $_sDte[2];

        switch ($_oBln) {
            case "jan" : {
                    $_oBln = "01";
                }
                break;
            case "feb" : {
                    $_oBln = "02";
                }
                break;
            case "mar" : {
                    $_oBln = "03";
                }
                break;
            case "apr" : {
                    $_oBln = "04";
                }
                break;
            case "may" :
            case "mei" : {
                    $_oBln = "05";
                }
                break;
            case "jun" : {
                    $_oBln = "06";
                }
                break;
            case "jul" : {
                    $_oBln = "07";
                }
                break;
            case "aug" :
            case "ags" : {
                    $_oBln = "08";
                }
                break;
            case "sep" : {
                    $_oBln = "09";
                }
                break;
            case "oct" :
            case "okt": {
                    $_oBln = "10";
                }
                break;
            case "nov" : {
                    $_oBln = "11";
                }
                break;
            case "dec" :
            case "des" : {
                    $_oBln = "12";
                }
                break;
        }

        $_oRsl = $_oThn . $_oBln . $_oTgl;
        return($_oRsl);
    }

    function _fSETTglMlt($_oDte) {

        $_sDte = explode("-", $_oDte);

        $_oTgl = $_sDte[0];
        $_oBln = trim(strtolower($_sDte[1]));
        $_oThn = $_sDte[2];

        switch ($_oBln) {
            case "jan" : {
                    $_oBln = "01";
                }
                break;
            case "feb" : {
                    $_oBln = "02";
                }
                break;
            case "mar" : {
                    $_oBln = "03";
                }
                break;
            case "apr" : {
                    $_oBln = "04";
                }
                break;
            case "may" :
            case "mei" : {
                    $_oBln = "05";
                }
                break;
            case "jun" : {
                    $_oBln = "06";
                }
                break;
            case "jul" : {
                    $_oBln = "07";
                }
                break;
            case "aug" :
            case "ags" : {
                    $_oBln = "08";
                }
                break;
            case "sep" : {
                    $_oBln = "09";
                }
                break;
            case "oct" :
            case "okt": {
                    $_oBln = "10";
                }
                break;
            case "nov" : {
                    $_oBln = "11";
                }
                break;
            case "dec" :
            case "des" : {
                    $_oBln = "12";
                }
                break;
        }

        $_oRsl = $_oThn . $_oBln . $_oTgl;
        return($_oRsl);
    }

    function _fSETDteMlr($_oDte) {

        $_sDte = explode("/", $_oDte);

        $_oTgl = $_sDte[0];
        $_oBln = trim(strtolower($_sDte[1]));
        $_oThn = $_sDte[2];

        switch ($_oBln) {
            case "jan" : {
                    $_oBln = "01";
                }
                break;
            case "feb" : {
                    $_oBln = "02";
                }
                break;
            case "mar" : {
                    $_oBln = "03";
                }
                break;
            case "apr" : {
                    $_oBln = "04";
                }
                break;
            case "may" :
            case "mei" : {
                    $_oBln = "05";
                }
                break;
            case "jun" : {
                    $_oBln = "06";
                }
                break;
            case "jul" : {
                    $_oBln = "07";
                }
                break;
            case "aug" :
            case "ags" : {
                    $_oBln = "08";
                }
                break;
            case "sep" : {
                    $_oBln = "09";
                }
                break;
            case "oct" :
            case "okt": {
                    $_oBln = "10";
                }
                break;
            case "nov" : {
                    $_oBln = "11";
                }
                break;
            case "dec" :
            case "des" : {
                    $_oBln = "12";
                }
                break;
        }

        $_oRsl = $_oThn . "-" . $_oBln . "-" . $_oTgl;
        return($_oRsl);
    }

    function _fSETDayInd($_oDat) {
        $_oDay = date('D', strtotime($_oDat));
        $_oNme = array(
            'Mon' => 'SEN',
            'Tue' => 'SEL',
            'Wed' => 'RAB',
            'Thu' => 'KAM',
            'Fri' => 'JUM',
            'Sat' => 'SAB',
            'Sun' => 'MIN',
        );
        $_oRsl = $_oNme[$_oDay];


        return($_oRsl);
    }

    function _fSETMonInd($_oMon) {
        $_oNme = array(
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
        $_oRsl = $_oNme[$_oMon];


        return($_oRsl);
    }

    function _fGETPREGRP($_varSTRING) {

        $_varINPUTZ = $_varSTRING;
        $_objRESULT = preg_replace('/[^a-zA-Z0-9\@\+\-\;\ \/\(\)\.\,\_\:]/', '', $_varINPUTZ);
        return $_objRESULT;
    }

    function _fGETNumOnl($_varSTRING) {

        $_varINPUTZ = $_varSTRING;
        $_objRESULT = preg_replace('/[^0-9]/', '', $_varINPUTZ);
        return $_objRESULT;
    }

    function _fGETDatTimReq() {
        date_default_timezone_set('Asia/Jakarta');
        $_varDTEREQ = date('YmdH:i:s');

        return $_varDTEREQ;
    }

    function _fGETLstDay($_oDte) {
        $_oDtx = substr($_oDte, 0, 4) . '-' . substr($_oDte, 4, 2);
        $_oRsl = date("Ymt", strtotime($_oDtx));
        return $_oRsl;
    }

    function _fGETConSta() {
        $connected = @fsockopen("www.google.com", 80);
        if ($connected) {
            $is_conn = true;
            fclose($connected);
        } else {
            $is_conn = false;
        }
        return $is_conn;
    }

    function _fGETConSt2() {
        $connected = @fsockopen("www.google.com", 80);
        if ($connected) {
            $is_conn = true;
            fclose($connected);
        } else {
            $is_conn = false;
        }
        return $is_conn;
    }

}

?>
				