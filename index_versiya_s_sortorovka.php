    <?php require 'file.php'; ?>	

<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>SDAKPI</title>
  

  <style>
    


td:empty {
  visibility: hidden;
}

 
table.empty {
  width: 350px;
  border-collapse: collapse;
  empty-cells: hide;
}
td.empty {
  border-style: solid;
  border-width: 1px;
  border-color: blue;
}
td:empty {
  visibility: hidden;
}
	
	
	th {
      cursor: pointer;
    }
	th.small {width: 5%;}
    th:hover {
      background: yellow;
    }
	th.nosort {width: 25%;}
	th.time {width: 30%;}
	td {font-family: arial, verdana, sans-serif; font-weight: bold;}
	
	table {
		width: auto;
		
	}
    table {
        border-spacing: 0px; // removes spaces between empty cells
        border: 1px solid black;
    }
    tr, td {
        border-style: none; // see note below
        padding: 0px; // removes spaces between empty cells
        line-height: 2em; // give the text some space inside its cell
        height: 0px; // set the size of empty cells to 0
    }
	
 caption
{
font-family: arial, verdana, sans-serif; font-weight: bold;
    }
 
	
	
body {
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  
  width: auto;
  link="green" alink="#ff0000" vlink="#ffff00"
}

.axis text {
  font: 10px sans-serif;
}

.axis path,
.axis line {
  fill: none;
  stroke: #000;
  shape-rendering: crispEdges;
}

.bar {
  fill: steelblue;
  fill-opacity: .9;
}

.x.axis path {
  display: none;
}

label {
  
  top: 10px;
  right: 10px;
}
 .layer1 {
    float: left; 
	margin: 3%;
   }
    .layer2 {
    
	margin: 5%;
	margin: 5%;
   }

 A:link { 
    text-decoration: none; /* Убирает подчеркивание для ссылок */
   } 
   A:visited { text-decoration: green; } 
   A:active { text-decoration: green; }
   A:hover {
    text-decoration: underline; /* Делает ссылку подчеркнутой при наведении на нее курсора */
    color: green; /* Цвет ссылки */
	

	
	
	
   
  </style>
  
  



	
	</head>
	<body>
	
	 <script src="jquery-1.9.1.js"></script>
	<h2 align="center">Предварительный расчет KPI третий квартал11111111111</h2>
	
 
	

 

<div class="layer1" , "margin-top: 10px;">	


	</div>
	
<table width="400" border="1" cellpadding="5" cellspacing="0" id="mytable">
		<col width="250" valign="top">
		<col width="150" valign="top">
<thead>
      <tr>
        
		
		<th  id="nm">Специалист</th>
        <th  id="sl">Количество заявок</th>
		<th  id="sl">Среднее время выполнения заявок</th>

		
      </tr>
    </thead>
    <tbody>
<?php
        
      // вытаскиваем через запрос список всех админов, ключ по группе    Support, по сути формируем массив spec
       $Admins= "SELECT  distinct  ti.FIRST_NAME   as  spec
FROM WorkOrder wo 
LEFT JOIN SiteDefinition siteDef ON wo.SITEID=siteDef.SITEID 
LEFT JOIN SDOrganization sdo ON siteDef.SITEID=sdo.ORG_ID 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
LEFT JOIN AaaUser ti ON td.USERID=ti.USER_ID LEFT JOIN LevelDefinition lvd ON wos.LEVELID=lvd.LEVELID 
LEFT JOIN StatusDefinition std ON wos.STATUSID=std.STATUSID 
LEFT JOIN WorkOrder_Queue woq ON wo.WORKORDERID=woq.WORKORDERID 
LEFT JOIN QueueDefinition qd ON woq.QUEUEID=qd.QUEUEID
WHERE  (((((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901)) AND ((lvd.LEVELID != 301) 
OR (lvd.LEVELNAME COLLATE SQL_Latin1_General_CP1_CI_AS IS NULL))) AND (qd.QUEUENAME COLLATE SQL_Latin1_General_CP1_CI_AS = N'Support')) 
AND (((wo.RESOLVEDTIME >= 1561924800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1569873599000) 
AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";

$getResults1= sqlsrv_query($conn, $Admins);

if ($getResults1 == FALSE)
    die(FormatErrors(sqlsrv_errors()));

 // тут все просто через эхо выкидываем имена админов в первую колонку таблицы
global  $row;
 while ($row = sqlsrv_fetch_array($getResults1, SQLSRV_FETCH_ASSOC)) {
	?>
                <tr>
                  <td><?php echo $row['spec'];?></td>  
				  
				  <?php
				  
// основной запрос тянуться заявка админов по ключу spec и тупо сумируються все заявки админа. Возможно есть еще более просто запрос, который сразу тянет нужное количество				  
				  $Nikolaev = "select top 50000  ti.FIRST_NAME , wo.WORKORDERID , ti.FIRST_NAME  
	 FROM WorkOrder wo LEFT JOIN WorkOrderStates wos ON wo .WORKORDERID= wos .WORKORDERID 
	LEFT JOIN SDUser td ON wos.OWNERID=td.USERID
	LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
	LEFT JOIN AaaUser ti ON td.USERID= ti.USER_ID 
	LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID WHERE  (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'".$row['spec']."'))
	AND  (((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	AND  ((wo.RESOLVEDTIME >= 1561924800000) AND ((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL))) AND ((wo.RESOLVEDTIME <= 1569873599000) 
	AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)) AND (wo.RESOLVEDTIME != -1)))))  AND wo.ISPARENT='1'  ORDER BY 1";
$getResults2= sqlsrv_query($conn, $Nikolaev);

if ($getResults2 == FALSE)
    die(FormatErrors(sqlsrv_errors()));




 global $Ni36;
  $Ni36 = 0;
 while ($row1 = sqlsrv_fetch_array($getResults2, SQLSRV_FETCH_ASSOC)) {
	$Ni36++;
}
?>
	             
               
					<td><?php 
					// просто вывод суммы заявок кокретного админа
					echo $Ni36  ?></td>
                   
		

				<?php 
//  по ключу spec вытягиваем все количество милисекунд которые админ потратил на все заявки вместе взятые
$SumTime= "  SELECT  wo.RESOLVEDTIME - wo.CREATEDTIME AS AvrTime
   FROM WorkOrder wo 
LEFT JOIN WorkOrderStates wos ON wo.WORKORDERID=wos.WORKORDERID 
 LEFT JOIN SDUser td ON wos.OWNERID=td.USERID 
 LEFT JOIN LevelDefinition lvd ON wos.LEVELID= lvd.LEVELID 
 LEFT JOIN AaaUser ti ON  td.USERID=ti.USER_ID 
 LEFT JOIN StatusDefinition std ON wos.STATUSID= std.STATUSID
 WHERE  
 (((std.Statusid = 3 or std.Statusid = 4 or std.Statusid = 901) AND (ti.FIRST_NAME = N'".$row['spec']."'))  AND 
	(
	 ((lvd.LEVELID != 301) OR (lvd.LEVELID IS NULL)) 
	 AND 
	 (
		 ((wo.RESOLVEDTIME >= 1561924800000) 
		 AND ((wo.RESOLVEDTIME != 0) 
		 AND (wo.RESOLVEDTIME IS NOT NULL))) 
		 AND ((wo.RESOLVEDTIME <= 1569873599000) 
		  AND (((wo.RESOLVEDTIME != 0) AND (wo.RESOLVEDTIME IS NOT NULL)))) 
		  AND  (wo.RESOLVEDTIME != -1)
	  )
	  
	)
	  
  )  AND wo.ISPARENT='1'";

  $getResults3= sqlsrv_query($conn, $SumTime);

if ($getResults3 == FALSE)
    die(FormatErrors(sqlsrv_errors()));
  
  
  
 $Time = 0;
 while ($row = sqlsrv_fetch_array($getResults3,  SQLSRV_FETCH_ASSOC)) {
//	 echo $row['AvrTime'];
// в данном сигменте идет во первых округление с милисекунд до просто секунд а потом подлючаеться внешняя функция 	 seconds2times которая преврашает секунды в дни
	 $Time =  $Time + $row['AvrTime'];
	 }
 
 
 $Time = round($Time * 0.001);
 $Time = $Time/$Ni36;
 $NiTime = '';
 $times_values = array('сек.','мин.','час','д.','лет');
 $times = seconds2times($Time);
    for ($i = count($times)-1; $i >= 1; $i--)
    {
		$NiTime  =  $NiTime  . $times[$i] . ' ' . $times_values[$i] . ' ';
    }
?>


		<td><?php echo $NiTime  ?></td>	

		
		
 </tr>


	<?php	
	
} 
		
		
		
		

     ?>

	</tbody>
</table>	

	


	
	

	

   
    <h2 align="center">Общее количество заявок Support: <td><?php echo $Sum; ?></h2>
	
	
	
=


	
	
	<h2> 
	</h2>
	
	

  <script>
//  sortTable(f,n)
//  f : 1 ascending order, -1 descending order
//  n : n-th child(<td>) of <tr>
function sortTable(f,n){
    var rows = $('#mytable tbody  tr').get();

    rows.sort(function(a, b) {

        var A = getVal(a);
        var B = getVal(b);

        if(A < B) {
            return -1*f;
        }
        if(A > B) {
            return 1*f;
        }
        return 0;
    });

    function getVal(elm){
        var v = $(elm).children('td').eq(n).text().toUpperCase();
        if($.isNumeric(v)){
            v = parseInt(v,10);
        }
        return v;
    }

    $.each(rows, function(index, row) {
        $('#mytable').children('tbody').append(row);
    });
}
var f_sl = 1; // flag to toggle the sorting order
var f_nm = 1; // flag to toggle the sorting order
$("#sl").click(function(){
    f_sl *= -1; // toggle the sorting order
    var n = $(this).prevAll().length;
    sortTable(f_sl,n);
});
$("#nm").click(function(){
    f_nm *= -1; // toggle the sorting order
    var n = $(this).prevAll().length;
    sortTable(f_nm,n);
});
  </script>




</body>

</html>

