<html>
    <head>
        <title>timer</title>
        
        <?php
        $var = 20 ;
        ?>
        <script>
            /* This script and many more are available free online at
The JavaScript Source :: http://www.javascriptsource.com
Created by: Neill Broderick :: http://www.bespoke-software-solutions.co.uk/downloads/downjs.php */
//var tt = <?php echo(json_encode($var)); ?>;
var mins;
var secs;
var tt = <?php echo $var; ?>;

function cd5() {
 	mins = 1 * m("5"); // change minutes here
 	secs = 0 + s(":01"); // change seconds here (always add an additional second to your total)
 	redo();
}
function cd10() {
 	mins = 1 * m("10"); // change minutes here
 	secs = 0 + s(":01"); // change seconds here (always add an additional second to your total)
 	redo();
}
function cd20() {
 	mins = 1 * m("20"); // change minutes here
 	secs = 0 + s(":01"); // change seconds here (always add an additional second to your total)
 	redo();
}
function cd30() {
 	mins = 1 * m("30"); // change minutes here
 	secs = 0 + s(":01"); // change seconds here (always add an additional second to your total)
 	redo();
}
function cd40() {
 	mins = 1 * m("40"); // change minutes here
 	secs = 0 + s(":01"); // change seconds here (always add an additional second to your total)
 	redo();
}
function cd50() {
 	mins = 1 * m("50"); // change minutes here
 	secs = 0 + s(":01"); // change seconds here (always add an additional second to your total)
 	redo();
}
function cd60() {
 	mins = 1 * m("60"); // change minutes here
 	secs = 0 + s(":01"); // change seconds here (always add an additional second to your total)
 	redo();
}
function cd90() {
 	mins = 1 * m("90"); // change minutes here
 	secs = 0 + s(":01"); // change seconds here (always add an additional second to your total)
 	redo();
}
function cd120() {
 	mins = 1 * m("120"); // change minutes here
 	secs = 0 + s(":01"); // change seconds here (always add an additional second to your total)
 	redo();
}


function m(obj) {
 	for(var i = 0; i < obj.length; i++) {
  		if(obj.substring(i, i + 1) == ":")
  		break;
 	}
 	return(obj.substring(0, i));
}

function s(obj) {
 	for(var i = 0; i < obj.length; i++) {
  		if(obj.substring(i, i + 1) == ":")
  		break;
 	}
 	return(obj.substring(i + 1, obj.length));
}

function dis(mins,secs) {
 	var disp;
 	if(mins <= 9) {
  		disp = " 0";
 	} else {
  		disp = " ";
 	}
 	disp += mins + ":";
 	if(secs <= 9) {
  		disp += "0" + secs;
 	} else {
  		disp += secs;
 	}
 	return(disp);
}

function redo() {
 	secs--;
 	if(secs == -1) {
  		secs = 59;
  		mins--;
 	}
 	document.cd.disp.value = dis(mins,secs); // setup additional displays here.
 	if((mins == 0) && (secs == 0)) {
  		window.alert("Time is up. Press OK to continue."); // change timeout message as required
  		//window.location = "index.php" // redirects to specified page once timer ends and ok button is pressed
 	} else {
 		cd = setTimeout("redo()",1000);
 	}
}
if ( tt == 8) {

function init() {
  cd5();
} }

else if (tt == 10){

function init() {
  cd10();
} }

else if (tt == 20){

function init() {
  cd20();
} }
else if (tt == 30){

function init() {
  cd30();
} }
else if (tt == 40){

function init() {
  cd40();
} }
else if (tt == 50){

function init() {
  cd50();
} }
else if (tt == 60){

function init() {
  cd60();
} }
else if (tt == 90){

function init() {
  cd90();
} }
else if (tt == 120){

function init() {
  cd120();
} }
window.onload = init;
        </script>
        <style>
            #txt {
  border:none;
  font-family:verdana;
  font-size:12pt;
  font-weight:bold;
  border-right-color:#FFFFFF;
  display: inline;
  
}
        </style>
    </head>
    <body>        
<form name="cd">
   <label for="disp">Time Remaining: </label> 
<input id="txt" readonly="true" type="text" value="7:00" border="0" name="disp">
</form>
    </body>
</html>