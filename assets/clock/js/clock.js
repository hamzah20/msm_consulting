
function clock() {
	var digital = new Date();
	var hours = digital.getHours();
	var minutes = digital.getMinutes();
	var dn="PM";
	if (hours<12) dn="AM";
			
	var seconds = digital.getSeconds();
	if (hours <= 9) hours = "0" + hours;
	if (minutes <= 9) minutes = "0" + minutes;
	if (seconds <= 9) seconds = "0" + seconds;
	dispTime = hours + ":" + minutes + ":" + seconds;

	var basicclock1 = document.getElementById('_objTMENOW');
	basicclock1.innerHTML = dispTime;
	setTimeout("clock()", 1000);
}
clock();