var BrowserDetect = {
	init: function () {
		this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
		this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || "an unknown version";
		this.OS = this.searchString(this.dataOS) || "an unknown OS";
		this.deviceModel = this.searchString(this.dataModel) || "other";
		window.isPad = (this.deviceModel == "Pad" || this.OS == "Android") ? true : false;
		window.isIOS = (this.OS == "iPhone/iPod" || this.OS == "iPhone/iPad") ? true : false
	},
	searchString: function (d) {
		for (var a = 0; a < d.length; a++) {
			var b = d[a].string;
			var c = d[a].prop;
			this.versionSearchString = d[a].versionSearch || d[a].identity;
			if (b) {
				if (b.indexOf(d[a].subString) != -1) {
					return d[a].identity
				}
			} else {
				if (c) {
					return d[a].identity
				}
			}
		}
	},
	searchVersion: function (b) {
		var a = b.indexOf(this.versionSearchString);
		if (a == -1) {
			return
		}
		return parseFloat(b.substring(a + this.versionSearchString.length + 1))
	},
	dataBrowser: [{
		string: navigator.userAgent,
		subString: "Chrome",
		identity: "Chrome"
	}, {
		string: navigator.userAgent,
		subString: "Mobile Safari",
		identity: "Safari",
		versionSearch: "Version"
	}, {
		string: navigator.userAgent,
		subString: "Safari",
		identity: "Safari",
		versionSearch: "Version"
	}, {
		string: navigator.userAgent,
		subString: "OmniWeb",
		versionSearch: "OmniWeb/",
		identity: "OmniWeb"
	}, {
		string: navigator.vendor,
		subString: "Apple",
		identity: "Safari",
		versionSearch: "Version"
	}, {
		prop: window.opera,
		identity: "Opera"
	}, {
		string: navigator.vendor,
		subString: "iCab",
		identity: "iCab"
	}, {
		string: navigator.vendor,
		subString: "KDE",
		identity: "Konqueror"
	}, {
		string: navigator.userAgent,
		subString: "Firefox",
		identity: "Firefox"
	}, {
		string: navigator.vendor,
		subString: "Camino",
		identity: "Camino"
	}, {
		string: navigator.userAgent,
		subString: "Netscape",
		identity: "Netscape"
	}, {
		string: navigator.userAgent,
		subString: "MSIE",
		identity: "Explorer",
		versionSearch: "MSIE"
	}, {
		string: navigator.userAgent,
		subString: "Gecko",
		identity: "Mozilla",
		versionSearch: "rv"
	}, {
		string: navigator.userAgent,
		subString: "Mozilla",
		identity: "Netscape",
		versionSearch: "Mozilla"
	}],
	dataOS: [{
		string: navigator.userAgent,
		subString: "Windows CE",
		identity: "WindowsMobile"
	}, {
		string: navigator.userAgent,
		subString: "Windows Phone",
		identity: "WindowsMobile"
	}, {
		string: navigator.platform,
		subString: "Win",
		identity: "Windows"
	}, {
		string: navigator.platform,
		subString: "Mac",
		identity: "Mac"
	}, {
		string: navigator.userAgent,
		subString: "iPhone",
		identity: "iPhone/iPod"
	}, {
		string: navigator.userAgent,
		subString: "iPad",
		identity: "iPhone/iPad"
	}, {
		string: navigator.userAgent,
		subString: "Android",
		identity: "Android"
	}, {
		string: navigator.platform,
		subString: "Linux",
		identity: "Linux"
	}],
	dataModel: [{
		string: navigator.userAgent,
		subString: "GT-P1000",
		identity: "Pad"
	}, {
		string: navigator.userAgent,
		subString: "SHV-E150S",
		identity: "Pad"
	}, {
		string: navigator.userAgent,
		subString: "SGH-T859",
		identity: "Pad"
	}, {
		string: navigator.userAgent,
		subString: "GT-P7510",
		identity: "Pad"
	}, {
		string: navigator.userAgent,
		subString: "GT-P7320",
		identity: "Pad"
	}, {
		string: navigator.userAgent,
		subString: "GT-I9220",
		identity: "Pad"
	}, {
		string: navigator.userAgent,
		subString: "GT-N7000",
		identity: "Pad"
	}, {
		string: navigator.userAgent,
		subString: "SHV-E160S",
		identity: "Pad"
	}, {
		string: navigator.userAgent,
		subString: "SHV-E160K",
		identity: "Pad"
	}, {
		string: navigator.userAgent,
		subString: "SHV-E160L",
		identity: "Pad"
	}, {
		string: navigator.userAgent,
		subString: "iPhone",
		identity: "Pad"
	}, {
		string: navigator.userAgent,
		subString: "iPad",
		identity: "Pad"
	}, {
		string: navigator.userAgent,
		subString: "Android",
		identity: "Phone"
	}]
};
BrowserDetect.init();
var deviceTypeConstant = {
	unknown: 0,
	pc: 1,
	phone: 2,
	pad: 3
};

function getDeviceType() {
	var a = deviceTypeConstant.unknown;
	if (BrowserDetect.deviceModel == "Pad" || BrowserDetect.OS == "Android") {
		a = deviceTypeConstant.pad
	} else {
		a = deviceTypeConstant.pc
	}
	return a
};