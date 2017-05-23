var containers=document.getElementById("containers");
var header=document.getElementById("header").offsetHeight*2;
var heru=document.documentElement.clientHeight;
containers.style.height=(heru-header)+"px";

var quhuyt;
var quhuyts;
var hjk;
var hjks;
var xd=document.getElementById("xd");
var xd_li=xd.getElementsByTagName("li")
var sd=document.getElementById("sd");
var sd_li=sd.getElementsByTagName("li")
for (var i = 0; i < xd_li.length; i++) {
	(function(i) {
		xd_li[i].onclick = function() {
			quhuyt = i;
			xuanhup(this);
		}
	})(i)
}
function xuanhup(_this){

	hjk=_this.getAttribute('data');
	// console.log(hjk)

	if(hjk==hjks){
		for (var i = 0; i < xd_li.length; i++) {
			xd_li[i].classList.remove("active");
			sd_li[i].classList.remove("active");
		}
		xd_li[quhuyt].classList.add("active");

		return;
	}
	for (var i = 0; i < xd_li.length; i++) {
		xd_li[i].classList.remove("active");
	}
	xd_li[quhuyt].classList.add("active");

	sdcu()
}


for (var i = 0; i < sd_li.length; i++) {
	(function(i) {
		sd_li[i].onclick = function() {
			quhuyts = i;
			xuanhups(this);
		}
	})(i)
}


function xuanhups(_this){
	hjks=_this.getAttribute('data');

	if(hjk==hjks){
		for (var i = 0; i < sd_li.length; i++) {
			sd_li[i].classList.remove("active");
			xd_li[i].classList.remove("active");
		}
		sd_li[quhuyts].classList.add("active");

		return;
	}

	for (var i = 0; i < sd_li.length; i++) {
		sd_li[i].classList.remove("active");
	}
	sd_li[quhuyts].classList.add("active");
	console.log(quhuyt)
	console.log(quhuyts)
	sdcu()
}
function sdcu(){
	if (hjk && hjks) {
		chuangf();
	}
}
function chuangf(){
	var butnkd=document.getElementById("butnkd");
	butnkd.setAttribute('data',hjk);
	butnkd.setAttribute('datas',hjks);

}
