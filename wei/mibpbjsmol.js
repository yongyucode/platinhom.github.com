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
      Jmol.script(jmolApplet0,'font echo 20 serif;fsize=20;set echo top center;echo MBIPB - ESES');
      Jmol.jmolCommandInput(jmolApplet0, "Commands");
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

function SurfaceTranslucent(){
  var showas=document.getElementById("selTranslucent").value
  Jmol.script(jmolApplet0,'isosurface translucent '+showas);
}

function SelJmolsurface(){
	var showas=document.getElementById("selJmolSurface").value
	Jmol.script(jmolApplet0,'isosurface s1 '+showas);
	SurfaceTranslucent();
}

function SelSurfaceColor(){
	var showas=document.getElementById("selSurfaceColor").value
	Jmol.script(jmolApplet0,'isosurface s1 colorscheme '+showas);
}
