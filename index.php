
<?php
ini_set('display_errors', 1);
ini_set('dislay_startup_errors', 1);
error_reporting(E_ALL);
require 'firebase-t/vendor/autoload.php';
require 'vendor/autoload.php';
include 'users.php';

//cd /var/www/html && watch --interval 10 -- sudo bash executa2.sh

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount\Discoverer;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile('firebase-t/secret/palpita-4e78f-67ee331cce35.json');

$firebase = (new Factory)
   ->withServiceAccount($serviceAccount)
   ->withDatabaseUri('https://my-project.firebaseio.com')
   ->create();
$database = $firebase->getDatabase();


//die(print_r($database));




/* Leitura dos pinos em array
    exec ( "gpio read 0", $p0);  output
    exec ( "gpio read 2", $p2);  Lo-
    exec ( "gpio read 3", $p3);  Lo+
    exec ( "gpio read 25", $p25);  Lo+
    exec ( "gpio read 27", $p27);  Lo+
    exec ( "gpio read 4", $p4);  Lo+
    exec ( "gpio read 5", $p5);  Lo+
    exec ( "gpio read 6", $p6);  Lo+
   Transforma o array em string    
    $p0 = implode("", $p0);
    $p2 = implode("", $p2);
    $p3 = implode("", $p3);
    $p25 = implode("", $p25);
    $p27 = implode("", $p27);
    $p4 = implode("", $p4);
    $p5 = implode("", $p5);
    $p6 = implode("", $p6);
    
    
   
    $pfinal = $p0.$p2.$p3.$p25.$p25.$p4.$p5.$p6;
    
    print($pfinal);
       
 Converte a string em numero
$pfinal = intval($pfinal);
Transforma binario em decimal
$pfinal = bindec($pfinal);
 Printa o resultado    
    print ($pfinal);
    
if ($p3 == '1' || $p2 == '1') {
 print ('!'); 
 }
else {
 print ($p0); 
 }
 
    
 Teste 12-08
*/

exec ('cd /var/www/html 2>&1');
exec ('gpio -x mcp3004:100:0 aread 100', $p0);
$p02 = $p0[0];
print_r ($p02);
if ($p02 > '500') {
print "Valor maior que 500";
}
else {
print "Menor que 500";
}


$sensor = new Sensor();
var_dump($sensor->insert([

'1' => $p02,

]));

//exec ('./executa.sh', $p0);
//exec ('./executa.sh');
//print_r($p0);
//$p0 = intval($p0);
//print_r($p0);


//exec ("rrdtool update teste.rrd ".time().":".$p0[0]."> teste.log",$rodrigo);


//exec ('cat teste.log 2>&1');
//exec ('sh teste.sh 2>&1');
//exec ('sh teste.sh > teste.log 2>&1');
//exec ('rrdtool create teste.rrd --start 1565353931 --step=4 \DS:memory:GAUGE:600:U:U RRA:AVERAGE:0.5:1:300 2>&1');
//exec ('sh teste.log; ls -l teste.rrd 2>&1');
//exec ('rrdtool fetch teste.rrd AVERAGE --start 1272974830 \--end 1272974871 2>&1');
//exec ('rrdtool graph teste.png  \--step=4 \DEF:free_memory=teste.rrd:memory:AVERAGE \LINE2:free_memory#FF0000 \--vertical-label "Pulso" \--title "Free System Memory in Time" \--zoom 1.5 \--x-grid SECOND:1:SECOND:4:SECOND:10:0:%X 2>&1');



//RODAR SE PRECISAR TROCAR A QUANTIDADE DE DADOS
//rrdtool create teste.rrd --step=4 \DS:memory:GAUGE:300:U:U RRA:AVERAGE:0.5:1:86400 2>&1
//rrdtool fetch teste.rrd AVERAGE


//exec ("rrdtool graph teste.png \--start ".(time()-60)." --end ".time()." \--step=4 \DEF:free_memory=teste.rrd:memory:AVERAGE \LINE2:free_memory#FF0000 \--vertical-label 'Pulso' \--title 'Last Minute' \--zoom 1.5 \--x-grid SECOND:1:SECOND:4:SECOND:10:0:%X 2>&1");
//exec ("rrdtool graph teste2.png \--start ".(time()-300)." --end ".time()." \--step=4 \DEF:free_memory=teste.rrd:memory:AVERAGE \LINE2:free_memory#FF0000 \--vertical-label 'Pulso' \--title 'Last 5 Minutes' \--zoom 1.5 \--x-grid SECOND:1:SECOND:4:SECOND:60:0:%X 2>&1");



echo ' 
<html lang="en">
<head>
 <title>Palpita</title>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="refresh" content="10" /> 
<!--===============================================================================================-->
 <link rel="icon" type="image/png" href="images/icons/cardio.ico"/>
<!--===============================================================================================-->
 <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
 <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
 <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
 <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
 <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
 <link rel="stylesheet" type="
text/css" href="css/util.css">
 <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>

<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.3.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.3.0/firebase-analytics.js"></script>

<script>
  // Your web apps Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyB6U5NP7UYz-Xd7a5N039kMzctd03aBZE4",
    authDomain: "palpita-4e78f.firebaseapp.com",
    databaseURL: "https://palpita-4e78f.firebaseio.com",
    projectId: "palpita-4e78f",
    storageBucket: "palpita-4e78f.appspot.com",
    messagingSenderId: "589229743330",
    appId: "1:589229743330:web:01649d5c38f946995892bb",
    measurementId: "G-PCM5347X1W"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>

<body>

 <div class="contact1">
  <div class="container-contact1">
   <div>
    <div class="contact1-pic js-tilt contact1-responsiveHeart" data-tilt style="margin-bottom: 40px; display:block; margin: auto;">
     <img class="contact1-responsiveHeartImg" src="images/cardio.png" alt="IMG">
     <span class="contact1-title">Palpita</span>
    </div>
 
    <div class="contact1-responsiveGraphDiv" style="margin-bottom: 40px;">
     <img class="contact1-responsiveGraph" src="teste.png" title="Graph" />
     <img class="contact1-responsiveGraph" src="teste2.png" title="Graph 2" />
     <img class="contact1-responsiveGraph" src="teste3.png" title="Graph 3" />
     <img class="contact1-responsiveGraph" src="teste4.png" title="Graph 4" />
    </div>
   </div>
   


   <form class="contact1-form validate-form">
    <span class="contact1-form-title">
     Que tal receber  notificações em tempo real?
    </span>

    <div class="wrap-input1 validate-input" data-validate = "Name is required">
     <input class="input1" type="text" name="name" placeholder="Enter heart rate limit">
     <span class="shadow-input1"></span>
    </div>

    <div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
     <input class="input1" type="text" name="email" placeholder="Enter your e-mail">
     <span class="shadow-input1"></span>
    </div>

    <div class="container-contact1-form-btn">
     <button class="contact1-form-btn">
      <span>
       Send Email
       <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
      </span>
     </button>
    </div>
   </form>
  </div>
 </div>
 <div style="font-size: 10px; background-color: #00c6ff;">Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/"             title="Flaticon">www.flaticon.com</a></div>




<!--===============================================================================================-->
 <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
 <script src="vendor/bootstrap/js/popper.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
 <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
 <script src="vendor/tilt/tilt.jquery.min.js"></script>
 <script >
  $(".js-tilt").tilt({
   scale: 1.1
  })
 </script>

<!--===============================================================================================-->
 <script src="js/main.js"></script>

</body>
</html>
';
?>
