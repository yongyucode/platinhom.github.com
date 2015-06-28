// logic is set by indicating order of USE -- default is HTML5 for this test page, though
//var use = " HTML5" // HTML5 WEBGL IMAGE  are all otions
var jmolApplet0; //define the applet var.
var s = document.location.search;
Jmol.debugCode = (s.indexOf("debugcode") >= 0);

// Define function
function initJmol(inmol,winsize){
	    //var  script_run = 'load ../jsmol/test.pdb;cartoon only;color cartoons structure; spin on;';//load data/caffeine.mol;
    var  script_run = 'load '+inmol+'; cartoon only; color cartoons structure;';
    var Info0 = {
      width: winsize,
      height: winsize,
      color: "black",
      serverURL: "https://undergrad-ed.chemistry.ohio-state./jsmol/php/jsmol.php",
      use: "HTML5",
      jarPath: "../jsmol/java",
      j2sPath: "../jsmol/j2s",
      //console: "JmolApplet0_Console.jar",
      //jarFile: "../jsmol/java/JmolApplet0",
      script: script_run,//The command defined before.
      disableInitialConsole: true
    }
      Jmol.getApplet("jmolApplet0", Info0)//use applet name and info.
      Jmol.script(jmolApplet0,'set antialiasDisplay false');
      Jmol.script(jmolApplet0,'set platformSpeed 5');
      Jmol.script(jmolApplet0,'font echo 20 serif;fsize=20;set echo top center;echo MBIPB');
      Jmol.script(jmolApplet0,'set echo bottom left;font echo 16 bolditalic;color echo green;echo Powered by Jmol-14.2');
      Jmol.jmolCommandInput(jmolApplet0, "Enter"); 
}

function showMolAs(){
  var showas=document.getElementById("selMolShow").value
  if (showas=="ballstick"){
    Jmol.script(jmolApplet0,'wireframe only; wireframe 0.15;spacefill 23%');
  }
  else {
    Jmol.script(jmolApplet0,showas+" only");
  }

  showMolAsColor();
}

function showMolAsColor(){
  var showas=document.getElementById("selColorSel").value
  if (showas=="structure"){
    Jmol.script(jmolApplet0,'color structure');
  }
  else if (showas=="partialCharge"){
    Jmol.script(jmolApplet0,'color partialCharge');
  }
  Jmol.script(jmolApplet0,'color '+showas);
}

function SelJmolsurface(){
	var showas=document.getElementById("selJmolSurface").value
	Jmol.script(jmolApplet0,'isosurface s1 '+showas);
	SurfaceTranslucent();
	SelSurfaceColor();
}

function SurfaceTranslucent(){
  var showas=document.getElementById("selTranslucent").value
  Jmol.script(jmolApplet0,'isosurface s1 translucent '+showas);
}

function SelSurfaceColor(){
	var showas=document.getElementById("selSurfaceColor").value
	if (showas=='rwb' || showas=='bwr' || showas=='rgb'){
		Jmol.script(jmolApplet0,'isosurface s1 colorscheme '+showas);
	}
	else if (showas=='roygb' || showas=='low' || showas=='high'){
		Jmol.script(jmolApplet0,'isosurface s1 colorscheme '+showas);
	}
	else {
		Jmol.script(jmolApplet0,'color $s1 '+showas);
	}
}

function SetESPRange(Relay){
	//Relay when change by scroller
	if (Relay){
		setTimeout("SetESPRange()", 100)
		return
	}
	var showas=document.getElementById("selSurfaceColor").value
	if (showas=='rwb' || showas=='bwr' || showas=='rgb' || showas=='roygb' || showas=='low' || showas=='high'){
		Jmol.script(jmolApplet0,'color $s1 "'+showas+'" range '+document.getElementById("espmin").value+" "+document.getElementById("espmax").value);
	}
}


function LoadResultSurface(){
	//var stype=document.getElementByName["SURFACE_METHOD"].value

	var chkObjs = document.getElementsByName("SURFACE_METHOD");
    for(var i=0;i<chkObjs.length;i++){
        if(chkObjs[i].checked){
            stype=chkObjs[i].value;
            break;
        }
    }
    /* //jquery
		if($("input[name='SURFACE_METHOD']:checked").val()=="zzx"){
		  alert("got it");
		}
    */
	if (stype=="ESES"){
		Jmol.script(jmolApplet0,"isosurface s1 OBJ 'MC_result.obj'")
	}else{
		Jmol.script(jmolApplet0,"isosurface s1 MSMS '1ajj2.vert'")
	}
}


// scroller.js gives simple div-based scroll
// Bob Hanson 9:22 PM 7/21/2005
// VERY simple div-based scroller.
// body needs onload=initScrollers()
//   then, somewhere: document.write(newScroller())
//   with optional parameters: newScroller(name,caption,fCallback,width,x,y,isvertical,minvalue,maxvalue,initialvalue,factor)
// fCallback must be string form of function, using _n, _v, _p (name, value, position)
// For example, "newChart(Chart,'_n','_v','_p')
// to set a scroller value from code, use resetScroller()

Scrollers={}
isScrollerInitialized=false

var thisMin = "-5";
var thisMax = "5";

function doScroll(name, value) {
	// callback from the scroller
	var v = parseInt(value)
	if (name == "min") {
		if (v == thisMin)return
		thisMin = v
	} else {
		if (v == thisMax)return
		thisMax = v
	}
	document.getElementById("espmin").value = thisMin
	document.getElementById("espmax").value = thisMax
	SetESPRange();
}

function checkScroll(name){
	var pos=0
	var value=0
	var d=0
	var S=Scrollers[name]
	d=document.getElementById("scr_"+name)
	pos=(S.isvertical?d.scrollTop:d.scrollLeft)
	if(pos!=S.pos){
		S.pos=pos //0 to 20*width
		S.value=value=scrollValue(name)
		setScrollCaption(name)
		if(S.isinitialized)setTimeout(strScrollValues(S,S.callback),10)
	}
}

function initScrollers(){
	setTimeout('resetScroller("",-1)',100)
}

function newScroller(name,caption,fCallback,width,x,y,isvertical,minvalue,maxvalue,initialvalue,factor,fmouseup){
	if(!name)name="scroll-test"
	//if(!caption)caption="testing: pos=_p value=_v"
	if(!fCallback)fCallback="testScroll"
	if(!width)width=300
	if(isNaN(x))x=100
	if(isNaN(y))y=100
	if(!isvertical)isvertical=0
	if(!minvalue)minvalue=0
	if(!maxvalue)maxvalue=100
	if(isNaN(initialvalue))initialvalue=(maxvalue + minvalue)/2
	if(!factor)factor=4

	var s=""
	var sout=""
	var S=Scrollers[name]={}
	S.name=name
	S.caption=caption
	S.width=width
	S.x=x
	S.y=y
	S.isvertical=isvertical
	S.maxvalue=maxvalue
	S.minvalue=minvalue
	S.callback=fCallback
	S.value=initialvalue
	S.factor=factor
	S.initialvalue=initialvalue
	// slimmed down version for the APBS application
	var pos = (x < 0 ? "" : "position:absolute:left:" +  (isvertical ? (x-20) + ";top:" + y : x+";top:"+(y-40)))
	sout="\n<div id='scr_"+name+"'  onscroll=\"checkScroll('"+name+"')\" style='font-size:2pt;height:25px;width:"+width+"px;overflow:auto'>"
		+"<img src='transp.gif' height=1 width="+(width*(factor+1))+">"
		+"</div>"
	S.div=sout
	return sout
}

function resetScroller(which,value){
	for(var name in Scrollers){if(!which||name==which){
			Scrollers[name].isinitialized=false
			setScrollValue(name,0)
			setScrollValue(name,(value>=0?value:Scrollers[name].initialvalue),1)
			Scrollers[name].isinitialized=true
	}}
}

function scrollValue(name){
	var S=Scrollers[name]
	var value=S.pos/(S.width*S.factor)*(S.maxvalue - S.minvalue) + S.minvalue
	if(S.magnitude>1)value=Math.floor(value)
	if(S.magnitude==1)value=Math.floor(value*100)/100
	return value
}

function setScrollCaption(name){
	var caption=""
	var S=Scrollers[name]
	if(S.caption.indexOf("_")>=0){
		caption=strScrollValues(S,S.caption)
		//document.title=name+" "+caption
		document.getElementById("scr_"+name+"_caption").innerHTML=caption
	}
}

function setScrollPosition(name,pos){
	var d=0
	var S=Scrollers[name]
	d=document.getElementById("scr_"+name)
	if(S.isvertical){
		d.scrollTop=pos
	}else{
		d.scrollLeft=pos
	}
	S.pos=pos
	S.value=scrollValue(name)
	setScrollCaption(name)
}

function setScrollValue(name,value,dotrigger){
	var S=Scrollers[name]
	var pos=Math.floor((value - S.minvalue)/(S.maxvalue - S.minvalue)*S.width*S.factor)
	S.pos=pos
	S.value=scrollValue(name)
	setScrollPosition(name,pos)
	//	if(dotrigger)checkScroll(name)
}

function strScrollValues(S,what){
	return (what + "('_n',_v,_p)").replace(/\_n/,S.name).replace(/\_p/,S.pos).replace(/\_v/,S.value)
}

function testScroll(name,value,position){
	document.title="this is function testScroll('"+name+"',"+value+","+position+")"
}