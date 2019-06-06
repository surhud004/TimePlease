<!DOCTYPE html>
<html>
<head>
	<title>Sherlock Ipsum</title>
	<link rel="icon" type="image/png" href="assets/logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/pageone.css">
</head>
<style>
div.texta, div.textb, div.textc {
	text-align: center;
    font-size:4vw;
}

div.bottom-right {
    font-size:1vw;
}

h1, h2, p {
	font-family: 'Sherlock', Gadget, sans-serif;
	font-weight:normal;
	font-style:normal;
	color: white;
}

input[type=text] {
	width: 8vw;
	height: 8vh;
	text-align: center;
	font-size:6vw;
	font-family: 'Sherlock';
    padding: 2vw 1px;
	background-color: #00000000;
    color: white;
	border: 3px solid white;
	border-radius: 25px;
	margin-right: 10px;
	text-transform: uppercase;
}
input[type=text]:focus {
	border-radius: 25px;
    border: 6px solid white;
}

</style>
<body>
<div class="centered">
<div class = "texta">
<h1>I AM</h1>
</div>
<div class = "textb">
<input type="text" name="s" id="s" maxlength="1" size="1" autofocus onblur="checkTextInputS(this);">
<input type="text" name="h" id="h" maxlength="1" size="1" onblur="checkTextInputH(this);">
<input type="text" name="e" id="e" maxlength="1" size="1" onblur="checkTextInputE(this);">
<input type="text" name="r" id="r" maxlength="1" size="1" onkeyup="checkTextInputR(this);"><!-- because last element remains focused so can't use onblur -->
</div>
<div class = "textc">
<h1>LOCKED</h1>
</div>
</div>

<div class="bottom-right">
<p style="color: gray;">created by: Surhud004 on FRIDAY the 13TH JULY 2018 copyrights reserved <a href="credits.html"> CREDITS </a></p>
</div>

<script>
var flag = 0;
var container = document.getElementsByClassName("textb")[0];
container.onkeyup = function(e) {
    var target = e.target;
    var maxLength = parseInt(target.attributes["maxlength"].value, 10);//10 is the base or radix
    var myLength = target.value.length;//whatever text entered till now (cursor position) - that's length
    if (myLength >= maxLength) {
        var next = target;
        while (next = next.nextElementSibling) {//returns the element immediately following the specified element, in the same tree level.
            if (next == null)
				break;
            if (next.tagName.toLowerCase() == "input") {
                next.focus();
                break;
            }
        }
    }
}

//nextSibling - returns the next sibling node as an element node, a text node(h1 or p tags) or a comment node(html comments).
//nextElementSibling - ignores text node / comment node(thus returns next input text box in above while loop).

function checkTextInputS(field) {
  if(field.value === "s")
	field.style.borderColor = "white";
  else
	field.style.borderColor = "red";
}
function checkTextInputH(field) {
  if(field.value === "h")
	field.style.borderColor = "white";
  else
	field.style.borderColor = "red";
}
function checkTextInputE(field) {
  if(field.value === "e")
	field.style.borderColor = "white";
  else
	field.style.borderColor = "red";
}
function checkTextInputR(field) {
  if(field.value === "r")
  {
	var sher = "";
	sher += document.getElementById("s").value;
	sher += document.getElementById("h").value;
	sher += document.getElementById("e").value;
	sher += document.getElementById("r").value;
	//alert("YOU ARE SHERLOCKED !!");
	if(sher == "sher")
	{
		window.location.href = "main.php";
	}
  }
  else
	field.style.borderColor = "red";
}
</script>

</body>
</html>
