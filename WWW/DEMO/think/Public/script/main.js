

var containers=document.getElementById("containers");
var header=document.getElementById("header").offsetHeight*2;
var heru=document.documentElement.clientHeight;
containers.style.height=(heru-header)+"px"

var conleft=document.getElementById("con-left");
var conleftlist=conleft.getElementsByTagName("div");
var conright=document.getElementById("con-right");
var conrightlist=conright.getElementsByTagName("li");
for (var i = 0; i < conleftlist.length; i++) {
	!function(i){
		conleftlist[i].onclick=function(){
			tabssdf(i)
		}
	}(i)
};
function tabssdf(index){
	for (var i = 0; i < conleftlist.length; i++) {
		conleftlist[i].classList.remove("active");
		conrightlist[i].style.display="none"
	};
	conleftlist[index].classList.add("active");
	conrightlist[index].style.display="block"
}
var fuhrlopo=document.getElementById("fuhrlopo");
var fuhrlopoli=fuhrlopo.getElementsByTagName("li");
for (var i = 0; i < fuhrlopoli.length; i++) {
	!function(i){
		fuhrlopoli[i].onclick=function(){
			tabssdfa(i,this)
		}
	}(i)
};
function tabssdfa(index,_this){
	for (var i = 0; i < fuhrlopoli.length; i++) {
		fuhrlopoli[i].classList.remove("active");
	};
	fuhrlopoli[index].classList.add("active");
	var data=_this.getAttribute("data");
	if(data=="a"){
		ajaxsdf("a")
	}else if(data=="b"){
		ajaxsdf("b")
	}else if(data=="c"){
		ajaxsdf("c")
	}
}
