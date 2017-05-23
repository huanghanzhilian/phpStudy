var containers=document.getElementById("containers");
var header=document.getElementById("header").offsetHeight*2;
var heru=document.documentElement.clientHeight;
containers.style.height=(heru-header)+"px";


var hjk;
var hjks;
var xd=document.getElementById("xd");
var xd_li=xd.getElementsByTagName("li")
for (var i = 0; i < xd_li.length; i++) {
	xd_li[i].onclick=function(){
		xuanhup(this);
	}
}
function xuanhup(_this){
	hjk=_this.getAttribute('data');
	if(hjk==hjks){
		return;
	}
	for (var i = 0; i < xd_li.length; i++) {
		xd_li[i].classList.remove("active");
	}
	_this.classList.add("active");
	sdcu()
}

var sd=document.getElementById("sd");
var sd_li=sd.getElementsByTagName("li")
for (var i = 0; i < sd_li.length; i++) {
	sd_li[i].onclick=function(){
		xuanhups(this);
	}
}


function xuanhups(_this){
	hjks=_this.getAttribute('data');
	if(hjk==hjks){
		return;
	}
	for (var i = 0; i < sd_li.length; i++) {
		sd_li[i].classList.remove("active");
	}
	_this.classList.add("active");
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
