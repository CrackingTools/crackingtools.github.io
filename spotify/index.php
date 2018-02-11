<!DOCTYPE HTML>
<html lang="en">
	<head>
	
	<!-- META -->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Check your Spotify accounts for free! Just add the accounts and it will say if it's working or not!">
<meta name="keywords" content="spotify checker, spotify, account checker, spotify check, check spotify accounts, check premium accounts, check accounts spotify, spotify check online">

<title>
	Spotify Checker
</title>

<script src="js/clipboard.js"></script>
	<!-- STYLE -->
<link rel="stylesheet" href="css/equinox.css" />
<link rel="stylesheet" href="css/equinox.min.css" />
<style>
* {
font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
   font-weight: 300;
}
textarea {
text-align: center;
font-size: 15px;
padding-left: 100px;
padding-right: 90px;
padding-bottom: 50px;
padding-top: 50px;
}
</style>
	</head>
	
	<!-- BODY -->
	<body>
<br/>
<center>
	<h1 style="line-height:10px; font-size: 40px;">Spotify Checker
	</h1>
	
	<p style="font-size:14px;">Made By: <a href="http://twitter.com/AeroPwn" target="_blank" style="text-decoration:none;">AeroPwn</a>
	 &amp 
	<a href="http://twitter.com/VesVesely" target="_blank" style="text-decoration:none;">M4R3K</a>
	</p>
	<p style="font-size:14px;">Hosted By: <a href="http://twitter.com/DoggoC3" target="_blank" style="text-decoration:none;">DoggoC3</a>
	<br>
	(aka the owner of CrackingTools)
	</p>

	
<br/>
<br/>


<div class="alert alert-success" hidden="" id="done_div"></div>

<br id="lol"/><br id="lol"/><br id="lol"/>


<h3>Check:</h3>
<textarea class="form-control" col="95" id="tocheck_acc" placeholder="Example: username:password" rows="5" style="resize: none;vertical-align:middle;" required></textarea>
<br/>

<h3>Working:</h3>
<textarea class="form-control" col="95" id="live_acc" rows="5" style="resize: none;vertical-align:middle;"></textarea>
<br/>

<h3>Dead:</h3>
<textarea class="form-control" col="95" id="dead_acc" rows="5" style="resize: none;vertical-align:middle;"></textarea>
<br/><br/><br/>


<button class="btn btn-info" onclick="parse_accounts();" type="button">Check</button>
<button class="btn btn-dark" onclick="copied();" type="button" id="cpy" data-clipboard-target="#live_acc" hidden>
Copy to clipboard
</button>
<br/><br/><br/>
</center>

<!-- jQuery  -->
<script src="js/jquery.min.js"></script>


<script type="text/javascript">
var clipboard = new Clipboard('.cpy');
    function parse_accounts(){
        var accounts = $("#tocheck_acc")[0].value;
        accounts = accounts.split("\n");
        accounts.forEach(check);
        $("#done_div")[0].hidden = false;
        $("#done_div")[0].innerHTML = "<strong>Check done</strong>";
		$("#cpy")[0].hidden = false;
		$("#lol")[0].hidden = true;
    }
	var d = new Date();
var d = new Date(dateString);
var d = new Date(year, month, day, hours, minutes, seconds);
    function check(account){
        var account = account.split(":");
        var username = account[0];
        var password = account[1];
        $.get( "api/index.php?u=" + username + "&p=" + password, function( data ) {
            var result_decoded = JSON.parse(data);
            if(result_decoded.status == "success") {
                $("#live_acc")[0].value = $("#live_acc")[0].value +  username + ":" + password + "  |  " + result_decoded.subscription +  " | " + result_decoded.Validuntil + " | " + result_decoded.Country + "\n";
  $("#live_acc")[0].value +  " Checked on " + d        } else {
                $("#dead_acc")[0].value = $("#dead_acc")[0].value +  username + ":" + password + "\n";
            }
        });
    }
</script>

<script>
function copied() {
	window.alert("Copied to Clipboard!");
}
</script>


</body>
</html>
