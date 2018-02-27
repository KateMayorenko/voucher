<?header('Content-Type: text/html; charset=utf-8');
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

include 'vcClass.php';

$ob = new vcFunctions();

//$ob->CreatedTables();

 include 'send.php';

 //echo '<pre>';print_r($Params);echo'</pre>';
?>

<html>
<head>
<!--Styles-->
	<link rel="stylesheet" href="main.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
<!--Styles-->

</head>
<body>
<?include 'index.html';?>
 </body>

 <footer>
<!--SCRIPTS-->
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
     <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="ajaxForm.js"></script>
    <script type="text/javascript" src="cookies.js"></script>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<!--Counter-->
<script>
    jQuery('.statistic-counter').counterUp({
         delay: 10,
         time: 2000
    });
</script>
<!--Code generator-->
<script>
function password(length, special) {
 var iteration = 0;
 var password = "";
 var randomNumber;
 if(special == undefined){
 var special = false;
 }
 while(iteration < length){
 randomNumber = (Math.floor((Math.random() * 100)) % 67) + 33;
 if(!special){
 if ((randomNumber >=33) && (randomNumber <=47)) { continue; }
 if ((randomNumber >=58) && (randomNumber <=64)) { continue; }
 if ((randomNumber >=91) && (randomNumber <=96)) { continue; }
 if ((randomNumber >=123) && (randomNumber <=126)) { continue; }
 }
 iteration++;
 password += String.fromCharCode(randomNumber);
 }
 document.getElementById('myPassword').innerHTML=password;
    writeCookie("password", password, 5 * 365);
}
</script>
<!--SCRIPTS-->
</footer>
</html>
