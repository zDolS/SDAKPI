




	<?php
$serverName = "10.71.200.19";
$connectionOptions = array(
    "Database" => "Servicedesk64"
    
);
//Establishes the connection
mb_internal_encoding("UTF-8");
$conn = sqlsrv_connect($serverName, $connectionOptions);




function seconds2times($seconds)
{
    $times = array();
    
    // считать нули в значениях
    $count_zero = false;
    
    // количество секунд в году не учитывает високосный год
    // поэтому функция считает что в году 365 дней
    // секунд в минуте|часе|сутках|году
    $periods = array(60, 3600, 86400000);
    
    for ($i = 3; $i >= 0; $i--)
    {
        $period = floor($seconds/$periods[$i]);
        if (($period > 0) || ($period == 0 && $count_zero))
        {
            $times[$i+1] = $period;
            $seconds -= $period * $periods[$i];
            
            $count_zero = true;
        }
    }
    
    $times[0] = $seconds;
    return $times;
}



function toFixed($number, $round=2)

{

$tempd = $number*pow(10,$round);

$tempd1 = round($tempd);

$number = $tempd1/pow(10,$round);

return $number;

}



sqlsrv_free_stmt($getResults1);
function FormatErrors( $errors )  
{  
   
    echo "Error information: <br/>";  
  
    foreach ( $errors as $error )  
    {  
        echo "SQLSTATE: ".$error['SQLSTATE']."<br/>";  
        echo "Code: ".$error['code']."<br/>";  
        echo "Message: ".$error['message']."<br/>";  
    }  
}  




 //$DolgushevTime = seconds2times($Time);
	 
  
  
 // $file = 'C:\SDAKPI\array.txt';
// Новый человек, которого нужно добавить в файл

// Пишем содержимое в файл,
// используя флаг FILE_APPEND для дописывания содержимого в конец файла
// и флаг LOCK_EX для предотвращения записи данного файла кем-нибудь другим в данное время
//file_put_contents($file,$getResults1);
  
  

$Summa= "SELECT wo.WORKORDERID AS State 
FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
LEFT JOIN AaaUser ti ON td.USERID=ti.USER_ID 
LEFT JOIN LevelDefinition lvd ON wos.LEVELID=lvd.LEVELID 
LEFT JOIN StatusDefinition std ON wos.STATUSID=std.STATUSID 
LEFT JOIN WorkOrder_Queue woq ON wo.WORKORDERID=woq.WORKORDERID 
LEFT JOIN QueueDefinition qd ON woq.QUEUEID=qd.QUEUEID WHERE  ((((((((qd.QUEUENAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Mail group') 
OR (qd.QUEUENAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Net & Phone')) OR (qd.QUEUENAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'PRTG')) 
OR (qd.QUEUENAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Support')) AND (((std.Statusid = 901) 
OR (std.Statusid = 3)) OR (std.Statusid = 4))) 
AND ((((((((((((((((((((((ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Akulenko Fedor') OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Badyl Aleksandr')) 
OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Barkovskiy Mikhail')) OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Dolgushev Aleksandr')) 
OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Duvakin Ivan')) OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Egorkin Yuriy V.')) 
OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Grigorev Yaroslav')) OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Kozlovtsev Sergey')) 
OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Maksutov Akvar')) OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Moiseev Aleksandr')) 
OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Nepov Pavel')) OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Nikitin Sergey')) 
OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Nikolaev Igor')) OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Oleshko Aleksey')) 
OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Prilipko Andrey')) OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Robakidze Tornike')) 
OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Rubtsov Aleksandr')) OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Shchulepov Yuriy')) 
OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Shilin Evgeniy')) OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Gavrilov Vitaliy')) 
OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Tretyakov Ivan')) OR (ti.FIRST_NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Uvarov Aleksey'))) 
AND ((lvd.LEVELID != 301) OR (lvd.LEVELNAME COLLATE SQL_Latin1_General_CP1_CI_AS IS NULL))) 
AND (((wo.RESOLVEDTIME >= 1561924800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1569873599000) 
AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Summa);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));

 
$Sum = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Sum++;
}


/*


<?php
foreach ($AdminSD as $key => $value) {
    // $arr[3] будет перезаписываться значениями $arr при каждой итерации цикла
    echo "{$key} => {$value} ";
    print_r($arr['spec']);
}

?>




  
  	<script language="JavaScript">
 // создадим javascript функцию
 function openWin(url) {
   myWin= open(url);
 }
 </script>
  
  
  
  
  <?php
	

echo '<pre>'.print_r($TestCall, true).'</pre>';
$v = var_export($TestCall, true);
echo $v; 
//foreach ($result as $key => $value) {
    // $arr[3] будет перезаписываться значениями $arr при каждой итерации цикла
//    echo "{$key} => {$value} ";
  //  print_r($result);
//}
	
	print_r ($needleCall);
	
	?>
	
	
	
<?php
foreach ($AdminSD as $key => $value) {
    // $arr[3] будет перезаписываться значениями $arr при каждой итерации цикла
    echo "{$key} => {$value} ";
    print_r($AdminSD);
}
?>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <script src="http://d3js.org/d3.v3.min.js"> </script>
		<script>	
				
				$(function(){
    $(".empty").each(hideCellIfEmpty);
});

function hideCellIfEmpty(){
    var theCell = $(this);
    if(theCell.html().length == 0){
        theCell.hide();
    }           
}
				
				
				
				
				
				
				
				
				$('td.profit').each(function(){

				var x = $(this).text();

				if (x < 5) $(this).css({backgroundColor: 'salmon'});
				if ( x >= 5) $(this).css({backgroundColor: 'yellow'});
				if ( x >= 6) $(this).css({backgroundColor: 'LawnGreen'});
				if ( x >= 9) $(this).css({backgroundColor: 'Cyan'});
				});

				$('td.time').each(function(){

				var y = $(this).text();

				if (y > 0) $(this).css({color: 'red'});
			
				});
		
		</script>



	<script src="/script.js"></script>	
	<script src="/packed.js"></script>


  
  
  
 <script src="http://d3js.org/d3.v3.min.js"> </script> 

	
	<script type='text/javascript'>
function week(){
 var start, now, difference, even_or_odd, info, board;
 start = new Date("January 1, 2019 00:00:01");
 now = new Date();
 difference = (now-start)/604800000; // comment: 604800000=1000millisec*60sec*60min*24hour*7day
 difference%2 ? odd_or_even = 'odd' : odd_or_even = 'even';
 info='Now is a '+Math.ceil(difference)+' week ('+odd_or_even+')';
 board=document.getElementById('n1');
 board.innerHTML=info+'<br/>'+now;
}
</script>
</head>
<body onload='week();'>
<div id='n1' style=' left:100px; top:100px; background-color:#DDF; border:1px solid #55A; padding:2px'></div>
</body>



	$Dolgushev= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Dolgushev Aleksandr'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";
 
$getResults= sqlsrv_query($conn, $Dolgushev);

if ($getResults == FALSE)
    die(FormatErrors(sqlsrv_errors()));
 
 
 $Dol = 0;
 while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
	$Dol++;
}

$SDol = 100* $Dol / $Sum ;


$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Dolgushev Aleksandr'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Dol;
 $DolgushevTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$DolgushevTime =  $DolgushevTime . $times[$i] . ' ' . $times_values[$i] . ' ';
    }
 




$Barkovskiy= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Barkovskiy Mikhail'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Barkovskiy);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));

 
$Bar = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Bar++;
}
$SBar = 100* $Bar / $Sum ;


$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Barkovskiy Mikhail'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Bar;
 $BarkovskiyTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$BarkovskiyTime =  $BarkovskiyTime . $times[$i] . ' ' . $times_values[$i] . ' ';
    }







$Titov= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Gavrilov Vitaliy'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Titov);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));




 
 
$Tit = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Tit++;
}
$STit = 100* $Tit / $Sum ;



$Titov= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Uvarov Aleksey'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Titov);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));




 
 
$Uvarov = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Uvarov++;
}
$SUvarov = 100* $Uvarov / $Sum ;







$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Gavrilov Vitaliy'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Tit;
 $TitovTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$TitovTime =  $TitovTime . $times[$i] . ' ' . $times_values[$i] . ' ';
    }







$Robakidze= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Robakidze Tornike'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Robakidze);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));




 
 
$Rob = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Rob++;
}
$SRob = 100* $Rob / $Sum ;

$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Robakidze Tornike'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Rob;
 $RobakidzeTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$RobakidzeTime =  $RobakidzeTime . $times[$i] . ' ' . $times_values[$i] . ' ';
    }








$Nikitin= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Nikitin Sergey'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Nikitin);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));



 
 
$Nik = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Nik++;
}

$SNik = 100* $Nik / $Sum ;

$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Nikitin Sergey'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Nik;
 $NikitinTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$NikitinTime =  $NikitinTime . $times[$i] . ' ' . $times_values[$i] . ' ';
    }











$Tretyakov= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Tretyakov Ivan'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Tretyakov);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));




 
$Tre = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Tre++;
}
$STre = 100* $Tre / $Sum ;


$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Tretyakov Ivan'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Tre;
 $TretyakovTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$TretyakovTime =  $TretyakovTime . $times[$i] . ' ' . $times_values[$i] . ' ';
    }

	
	
	
	
	
	
$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Uvarov Aleksey'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
	
	
 $Time = round($Time * 0.001);
 $Time = $Time/$Tre;
 $UvarovTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$UvarovTime =  $UvarovTime . $times[$i] . ' ' . $times_values[$i] . ' ';
    }








$Shilin= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Shilin Evgeniy'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Shilin);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));




 
$Shi = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Shi++;
}
$SShi = 100* $Shi / $Sum ;


$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Shilin Evgeniy'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Shi;
 $ShilinTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$ShilinTime =  $ShilinTime . $times[$i] . ' ' . $times_values[$i] . ' ';
    }









$Shchulepov= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Shchulepov Yuriy'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Shchulepov);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));




 
 
$Shc = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Shc++;
}
$SShc = 100* $Shc / $Sum ;

$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Shchulepov Yuriy'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Shc;
 $ShchulepovTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$ShchulepovTime  =  $ShchulepovTime  . $times[$i] . ' ' . $times_values[$i] . ' ';
    }














$Egorkin= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Egorkin Yuriy'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Egorkin);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));



 
 
$Ego = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Ego++;
}
$SEgo = 100* $Ego / $Sum ;

$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Egorkin Yuriy'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Ego;
 $EgorkinTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$EgorkinTime  =  $EgorkinTime  . $times[$i] . ' ' . $times_values[$i] . ' ';
    }









$Maksutov= "	select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Maksutov Akvar'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Maksutov);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));

 
$Mak = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Mak++;
}
$SMak = 100* $Mak / $Sum ;

$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Maksutov Akvar'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Mak;
 $MaksutovTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$MaksutovTime  =  $MaksutovTime  . $times[$i] . ' ' . $times_values[$i] . ' ';
    }





$Nepov= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Nepov Pavel'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Nepov);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));

 
$Nep = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Nep++;
}
$SNep = 100* $Nep / $Sum ;
 

$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Nepov Pavel'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Nep;
 $NepovTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$NepovTime  =  $NepovTime  . $times[$i] . ' ' . $times_values[$i] . ' ';
    }
 
 
 
 








$Grigorev= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Grigorev Yaroslav'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Grigorev);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));

 
$Gri = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Gri++;

}
$SGri = 100* $Gri / $Sum ;


$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Grigorev Yaroslav'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Gri;
 $GrigorevTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$GrigorevTime  =  $GrigorevTime  . $times[$i] . ' ' . $times_values[$i] . ' ';
    }
 











$Moiseev= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Moiseev Aleksandr'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Moiseev);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));

 
$Moisee = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Moisee++;
}
$SMoisee = 100* $Moisee / $Sum ;



$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Moiseev Aleksandr'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Moisee;
 $MoiseevvTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$MoiseevvTimeTime  =  $MoiseevvTimeTime  . $times[$i] . ' ' . $times_values[$i] . ' ';
    }
 







$Rubtsov= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Rubtsov Aleksandr'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Rubtsov);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));


 
$Rub = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Rub++;
}
$SRub = 100* $Rub / $Sum ;

$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Rubtsov Aleksandr'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Rub;
 $RubtsovTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$RubtsovTime  =  $RubtsovTime  . $times[$i] . ' ' . $times_values[$i] . ' ';
    }







$Duvakin= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Duvakin Ivan'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Duvakin);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));

 
$Duv = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Duv++;
	
}
$SDuv = 100* $Duv / $Sum ;

$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Duvakin Ivan'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Duv;
 $DuvakinTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$DuvakinTime  =  $DuvakinTime  . $times[$i] . ' ' . $times_values[$i] . ' ';
    }











$Prilipko= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Prilipko Andrey'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Prilipko);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));


 
$Pri = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Pri++;
}
$SPri = 100* $Pri / $Sum ;

$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Prilipko Andrey'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Pri;
 $PrilipkoTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$PrilipkoTime  =  $PrilipkoTime  . $times[$i] . ' ' . $times_values[$i] . ' ';
    }









$Oleshko= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Oleshko Aleksey'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults2= sqlsrv_query($conn, $Oleshko);

if ($getResults2 == FALSE)
    die(FormatErrors(sqlsrv_errors()));




 
$Ol = 0;
 while ($row = sqlsrv_fetch_array($getResults2, SQLSRV_FETCH_ASSOC)) {
	$Ol++;
}

$SOl = 100* $Ol / $Sum ;

$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Oleshko Aleksey'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Ol;
 $OleshkoTime = '';
 $times_values = array('сек.','мин.','час','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$OleshkoTime  =  $OleshkoTime  . $times[$i] . ' ' . $times_values[$i] . ' ';
    }



	
	
	
	
	
	
	
	
	
	$Nikolaev = "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Nikolaev Igor'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults2= sqlsrv_query($conn, $Nikolaev);

if ($getResults2 == FALSE)
    die(FormatErrors(sqlsrv_errors()));




 
$Ni = 0;
 while ($row = sqlsrv_fetch_array($getResults2, SQLSRV_FETCH_ASSOC)) {
	$Ni++;
}

$SNi = 100* $Ni / $Sum ;

$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Nikolaev Igor'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Ni;
 $NiTime = '';
 $times_values = array('сек.','мин.','час','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$NiTime  =  $NiTime  . $times[$i] . ' ' . $times_values[$i] . ' ';
    }
	
	
	
	
	
	
	
	
$AdminSD= "SELECT  distinct  ti.FIRST_NAME   as  spec
FROM WorkOrder wo LEFT JOIN SiteDefinition siteDef ON wo.SITEID=siteDef.SITEID LEFT JOIN SDOrganization sdo 
ON siteDef.SITEID=sdo.ORG_ID LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID LEFT JOIN SDUser td 
ON wos.OWNERID=td.USERID LEFT JOIN AaaUser ti ON td.USERID=ti.USER_ID LEFT JOIN LevelDefinition lvd 
ON wos.LEVELID=lvd.LEVELID LEFT JOIN StatusDefinition std ON wos.STATUSID=std.STATUSID 
WHERE  (((((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901)) AND ((lvd.LEVELID != 301) 
OR (lvd.LEVELNAME COLLATE SQL_Latin1_General_CP1_CI_AS IS NULL))) AND (sdo.NAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'helpdesk')) 
AND (((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $AdminSD);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));

	








$Akulenko1= "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Akulenko Fedor'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1530388800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1538337599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Akulenko1);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));

 
$Ak1 = 0;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	$Ak1++;
}
$SAk = 100* $Ak1 / $Sum ;

$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'Akulenko Fedor'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1530388800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1538337599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults1= sqlsrv_query($conn, $SumTime);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults1,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
	 
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Ak1;
 $AkulenkoTime = '';
 $times_values = array('сек.','мин.','час.','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$AkulenkoTime  =  $AkulenkoTime  . $times[$i] . ' ' . $times_values[$i] . ' ';
    }






?>

<script>
	var $Bar = <?php echo $Bar; ?>;
	var $Ak1 = <?php echo $Ak1; ?>;
	var $Ol = <?php echo $Ol; ?>;
	var $Nik = <?php echo $Nik; ?>;
	var $Tre = <?php echo $Tre; ?>;
	var $Shc = <?php echo $Shc; ?>;
	var $Rob = <?php echo $Rob; ?>;
	var $Moisee = <?php echo $Moisee; ?>;
	var $Duv = <?php echo $Duv; ?>;
	var $Tit = <?php echo $Tit; ?>;
	var $Ego = <?php echo $Ego; ?>;
	var $Rub = <?php echo $Rub; ?>;
	var $Gri = <?php echo $Gri; ?>;
	var $Pri = <?php echo $Pri; ?>;
	var $Nep = <?php echo $Nep; ?>;
	var $Mak = <?php echo $Mak; ?>;
	var $Dol = <?php echo $Dol; ?>;
	var $Shc = <?php echo $Shc; ?>;
	var $Shi= <?php echo $Shi; ?>;
	var $Duv = <?php echo $Duv; ?>;	
	
	

</script>
<?php
$fp = fopen("data.php", 'a'); //????????? ???? ? ?????? ??????
ftruncate($fp, 0) // ??????? ????
?>
<?php
$fp = fopen("C:\SDAKPI\data.php", "a"); // ????????? ???? ? ?????? ?????? 
$mytext = "letter	frequency\r\n
Bar	.$Bar\r\n
Oleshko	.$Ol\r\n
Tretyak	.$Tre\r\n
Nikitin	.$Nik\r\n
Shc	.$Shc\r\n

Moiseev	.$Moisee\r\n


Egorkin	.$Ego\r\n
Rubtsov	.$Rub\r\n
Grigorev	.$Gri\r\n

Nepov	.$Nep\r\n
Maksutov	.$Mak\r\n
Nepov	.$Nep\r\n
Dol	.$Dol\r\n
Shilin	.$Shi\r\n
Duvakin	.$Duv\r\n"; // ???????? ??????
$test = fwrite($fp, $mytext); // ?????? ? ????

fclose($fp); //???????? ?????
?>

<?php
   //------------------------------------------------------------
// Функция парсера CSV-файла
//------------------------------------------------------------
// На входе: $file_name - имя файла для парсинга
//           $separator - разделитель полей, по умолчанию ';'
//           $quote - ограничитель строк, по умолчанию '"'
// На выходе: массив значений всего файла
//------------------------------------------------------------
function csv($file_name, $separator=',', $quote='') {
    $file_name = ('c:\sdakpi\call3.csv');
	// Загружаем файл в память целиком
    $f=fopen($file_name,'r');
    $str=fread($f,filesize($file_name));
    fclose($f);
 
    // Убираем символ возврата каретки
    $str=trim(str_replace("\r",'',$str))."\n";
 
    $parsed=Array();    // Массив всех строк
    $i=0;               // Текущая позиция в файле
    $quote_flag=false;  // Флаг кавычки
    $line=Array();      // Массив данных одной строки
    $varr='';           // Текущее значение
 
    while($i<=strlen($str)) {
        // Окончание значения поля
        if ($str[$i]==$separator && !$quote_flag) {
            $varr=str_replace("\n","\r\n",$varr);
            $line[]=$varr;
            $varr='';
        }
        // Окончание строки
        elseif ($str[$i]=="\n" && !$quote_flag) {
            $varr=str_replace("\n","\r\n",$varr);
            $line[]=$varr;
            $varr='';
            $parsed[]=$line;
            $line=Array();
        }
        // Начало строки с кавычкой
        elseif ($str[$i]==$quote && !$quote_flag) {
            $quote_flag=true;
        }
        // Кавычка в строке с кавычкой
        elseif ($str[$i]==$quote && $str[($i+1)]==$quote && $quote_flag) {
            $varr.=$str[$i];
            $i++;
        }
        // Конец строки с кавычкой
        elseif ($str[$i]==$quote && $str[($i+1)]!=$quote && $quote_flag) {
            $quote_flag=false;
        }
        else {
            $varr.=$str[$i];
        }
        $i++;
    }
		
		
	$parsed = array_diff($parsed, array(''));
		
		
		foreach ($parsed as $key => $value) {
    // $arr[3] будет перезаписываться значениями $arr при каждой итерации цикла
    echo "{$key} => {$value} ";
    print_r($parsed[5][4]);
	$DuvCall = $parsed[5][4];
	
	
	
    return $parsed;
	
	

}
}



$call = csv();
$DuvCall = $call[6][4];
$MoiseevCall = $call[6][4];
$RobakidzeCall = $call[7][4];
$ShilinCall = $call[8][4];
$GrigorevCall = $call[9][4]; 
$ShchulepovCall = $call[10][4]; 
$adminCall = $call[11][4]; 
$AkulenkoCall  = $call[12][4]; 
$BarkovskiyCall  = $call[13][4]; 
$NepovCall = $call[15][4]; 
$DolgushevCall = $call[16][4]; 
$EgirkinCall = $call[17][4]; 
$PrilipkoCall = $call[18][4]; 
$MaksutovCall	    = $call[22][4]; 
$TretyakovCall		 = $call[26][4]; 
$NikitinCall		  = $call[29][4]; 
$OleshkoCall		  = $call[27][4];
$UvarovCall		  = $call[30][4];
$RubtsovCall		  = $call[25][4];







	$needle = "700710 - 710 Ivan Duvakin";

//Собственно поиск
$result = array_filter($call, function($innerArray){
    global $needle;
    return in_array($needle, $innerArray);    //Поиск по всему массиву
    //return ($innerArray[0] == $needle); //Поиск по первому значению
});

//Результат
//echo '<pre>'.print_r($result, true).'</pre>';
$TestCall  = $result[6][5];



$needleCall = array('700711 - 711 Aleksandr Moiseev', '700710 - 710 Ivan Duvakin', '700715 - 715 Yuriy Shchulepov', '700721 - 602 Aleksandr Dolgushev');

foreach ($needleCall as &$value) {
    $result = array_filter($call, function($innerArray){
    global $needle;
    return in_array($needle, $innerArray);    //Поиск по всему массиву
    //return ($innerArray[0] == $needle); //Поиск по первому значению
});

	$value = $result[6][5];
	
}
unset($value);

*/

?>
