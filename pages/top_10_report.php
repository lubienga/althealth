<?php 
include'../includes/connection.php';
?>
<html>
  <head>
       <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['CLIENT', 'FREQUENCY'],
          <?php
		  $sql = "SELECT concat(tblclientinfo.C_name,'',tblclientinfo.C_surname) AS CLIENT, 
COUNT(tblclientinfo.Client_ID) As FREQUENCY FROM tblinv_info INNER JOIN tblclientinfo ON tblinv_info.Client_ID=tblclientinfo.Client_ID 
WHERE (SELECT SUBSTRING(Inv_paid_date,1,4)>=2018) AND (SELECT SUBSTRING(Inv_paid_date,1,4)>=19) GROUP BY tblclientinfo.Client_ID ORDER BY 
COUNT(tblclientinfo.Client_ID)DESC LIMIT 10";
          $fire = mysqli_query($db,$sql);
		  while ($result = mysqli_fetch_assoc($fire)){
			  echo "['".$result['CLIENT']."',".$result['FREQUENCY']."],";
		  }
		  ?>
        ]);

       var options = {
          chart: {
            title: 'Top 10 clients for 2018 and 2019 ',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
     <body>
    <div id="columnchart_material" style="width: 800px; height: 400px;"></div>
  </body>
  </body>
</html>