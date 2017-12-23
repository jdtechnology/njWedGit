"use strict";
(function () {
	
	window.jd = window.jd || {};
}());

jd.vars = {
	guest1toggleOn: false,
	isTaken: 0,
	isMicrosoft: false,
	rotateInterval: 0,
	rotateCount: 1,
	rsvpError: false,
	imageList: ["home_1.jpeg", "home_2.jpg", "home_4.jpg", "home_5.jpg"],
};

jd.temp = {
	errors: [] //[Name, Message]
};

jd.funcs = {
	errorMessage: function(msg, name) {
		if(jd.vars.rsvpError) {
			//Code to draw attention to errror div
		} else {
			var warning = document.createElement('div');
			warning.appendChild(document.createTextNode(msg));
			warning.setAttribute('name', name);
			warning.setAttribute('id', 'error');
			warning.setAttribute('onclick', 'jd.funcs.clearMessageFeed()');
			document.getElementById("messageFeed").appendChild(warning);
			jd.temp.errors.push([name,msg]);
			jd.vars.rsvpError = true;
			return "Error successfully created";
		}
	},
	clearMessageFeed: function() {
		var elemen = document.getElementById('messageFeed');
		while(elemen.firstChild){
			elemen.removeChild(elemen.firstChild);
		}
		jd.vars.rsvpError = false;
		return "Success";
	},
	addGuest: function(gnum) {
		document.getElementById("guest1").classList.toggle("showguest");
		if(!jd.vars.guest1toggleOn) {
			document.getElementById("guest1toggle").innerHTML = "I don't want to add a guest"
			jd.vars.guest1toggleOn = true;
		} else {
			document.getElementById("guest1toggle").innerHTML = "Add a guest"
			jd.vars.guest1toggleOn = false;
		}
	},
	validateEmail: function() {
		var emailad = document.getElementById("email1");
		var emailaddr = emailad.value;
		var rsvpform = document.forms.rsvp; // Or document.forms['login']
		//var emailaddr = rsvpform.elements.email.value;
		//var isTaken = 0;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				jd.vars.isTaken = this.responseText;
				if (jd.vars.isTaken > 0) {
					jd.funcs.errorMessage("This email address is already in use. Please enter a different email", "emailinuse");
					window.setTimeout(function () { document.getElementById('email1').focus(); }, 0); 
					document.getElementById("rsvp_submit").disabled = true;
				} else {
					jd.funcs.clearMessageFeed();
					document.getElementById("rsvp_submit").disabled = false;
				}
			}
		};
		xhttp.open("GET", "check_email.php?email="+emailaddr, true);
		xhttp.send();
		
	},
	slideOut: function() {
		document.getElementById("shareImg").classList.toggle("shareout");
		document.getElementById("shareContent").classList.toggle("shareContentShow");
		window.onclick = function(event) {
			if (!event.target.matches('#shareContent')) {
				if(document.getElementById("shareContent").classList.contains('shareContentShow')) {
					document.getElementById("shareImg").classList.toggle("shareout");
					document.getElementById("shareContent").classList.toggle("shareContentShow");
				}
			}
		};
	},
	newImg: function() {
		if(jd.vars.rotateCount >= jd.vars.imageList.length) {
			jd.vars.rotateCount = 0;
		} 
		var constr = "includes/images/" + jd.vars.imageList[jd.vars.rotateCount];
		jd.vars.rotateCount += 1;
		return constr;
	},
	imageRotate: function() {
		if(document.getElementById("mainimg") !== null) {
			var imgHolder = document.getElementById("mainimg");
			imgHolder.setAttribute("src", jd.funcs.newImg());
		}
	},
	dropdownMenu: function() {
		document.getElementById("myDropdown").classList.toggle("show");
		window.onclick = function(event) {
			if (!event.target.matches('.dropbtn')) {
				var dropdowns = document.getElementsByClassName("dropdown-content");
				var i;
				for (i = 0; i < dropdowns.length; i++) {
					var openDropdown = dropdowns[i];
					if (openDropdown.classList.contains('show')) {
					openDropdown.classList.remove('show');
					}
				}
			}
		};
	}
};

jd.cookies = { //To DO
};

jd.init = function() { //Modify to rediect to "app"
	if(getDeviceType() > 1) {
		window.location = "/natalie/App/0.0.1/";
	}
	document.getElementById("dropdown").addEventListener("mouseover", jd.funcs.dropdownMenu);
	document.getElementById("shareImg").addEventListener("mouseover", jd.funcs.slideOut);
	if(document.getElementById("guest1toggle") !== null) {
		document.getElementById("guest1toggle").addEventListener("click", jd.funcs.addGuest);
		document.getElementById("email1").addEventListener("blur", jd.funcs.validateEmail);
	}
	if((document.getElementById("microsoft_placehold1") !== null) && (document.getElementById("microsoft_placehold2") !== null)) {
		// detect IE8 and above, and edge
		if (document.documentMode || /Edge/.test(navigator.userAgent)) {
			jd.vars.isMicrosoft = true;
			document.getElementById("microsoft_placehold1").innerHTML = "<br><br><br><br>";
			document.getElementById("microsoft_placehold2").innerHTML = "<br><br><br><br>";
		}
	}
	if(document.getElementById("mainimg") !== null) {
		setInterval(jd.funcs.imageRotate, 3000);
	}
	initializeClock('clockdiv', deadline);
};

/**Countdown clock temp**/
function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) { //Modify to use css sizing instead of "&nbsp; etc."
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    daysSpan.innerHTML = t.days + "<br> &nbsp; Days  &nbsp;  ";
    hoursSpan.innerHTML = ('0' + t.hours).slice(-2) + "<br>  &thinsp; Hours &thinsp; ";
    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2) + "<br> Minutes";
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2) + "<br> Seconds";

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

var deadline = new Date(2018,3,21,15,0,0,0); //y,m,d,h,m,s,m
//initializeClock('clockdiv', deadline);
/**END**/


var funcCalled = 0;
(function () {
	if (document.addEventListener) {
		document.addEventListener("DOMContentLoaded", function () {
			jd.init();
		}, !1);
	} else {
		if (document.all && !window.opera) {
			document.write('<script type="text/javascript" id="contentLoadTest" defer="defer" src="javascript:void(0)"><\/script>'), document.getElementById("contentLoadTest").onreadystatechange = function () {
				"complete" == this.readyState && jd.init();
			}
		} else {
			if (/Safari/i.test(navigator.userAgent)) {
				var a = setInterval(function () {
					/loaded|complete/.test(document.readyState) && (clearInterval(a), jd.init())
				}, 10)
			} else {
			window.onload = function () {
		setTimeout("if (!funcCalled) jd.init()", 0);
	};
}
		}
	}
	return;
})();