
function _funTIMEZZ() {

    var _objNOW = new Date();
    var _seqMON = ['01','02','03','04','05','06','07','08','09','10','11','12'];
    var _objYEA = _objNOW.getFullYear();
    var _objMON = _objNOW.getMonth();
    var _objDTE = _objNOW.getDate();
    var _objHOU = _objNOW.getHours();
    var _objMIN = _objNOW.getMinutes();
    var _objSEC = _objNOW.getSeconds();

    
    //if (_objHOU < 10)
    //    _objHOU = "0" + _objHOU;
    //if (_objMIN < 10)
    //    _objMIN = "0" + _objMIN;
    //if (_objSEC < 10)
    //    _objSEC = "0" + _objSEC;

    _objHOU = checkTime(_objHOU);
    _objMIN = checkTime(_objMIN);
    _objSEC = checkTime(_objSEC);
    _objDTE = checkTime(_objDTE);
    
    document.getElementById('_objTMEUSR').value = _objYEA + _seqMON[_objMON] + _objDTE + _objHOU + ":" + _objMIN + ":" + _objSEC;
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
setInterval(_funTIMEZZ, 500);         