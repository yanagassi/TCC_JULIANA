<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Data', 'Umidade', 'Temperatura','Velocidade_vento'],
            <?php
                foreach ($parametro as $key) {
                    echo("['". date_format(date_create($key["Data"]),"d/m/y - H:i")  ."',". $key["Umidade"] .",". $key["Temperatura"] .",". $key["Velocidade_vento"] ."],\n");
                }
            ?>
        ]);

        var options = {
          title: '<?=$parametro[0]['Municipio']?>',
          hAxis: {title: 'Data',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 100%; height: 500px;"></div>
  </body>
</html>
