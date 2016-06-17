<div id="chart_div" style="width: 100%; height: 100%"></div>

<script>
    google.charts.load('current', {packages: ['corechart', 'line']});
    google.charts.setOnLoadCallback(drawBasic);
    
    function drawBasic() {
    
        var data = new google.visualization.DataTable();
        data.addColumn('number', 'X');
        data.addColumn('number', '{{Lang::get('driverprofile.AverageSpeed')}}');
    
        data.addRows([
          @foreach($driver_profile as $key => $value)
          [{{$key}}, {{$value->speed}}],
          @endforeach
        ]);
    
        var options = {
          hAxis: {
            title: '{{Lang::get('driverprofile.MeasurementNumber')}}'
          },
          vAxis: {
            title: '{{Lang::get('driverprofile.AverageSpeed')}}'
          }
        };
    
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }

    if (window.addEventListener) {
        window.addEventListener('resize', drawBasic);
    }
	else {
		window.attachEvent('onresize', drawBasic);
	}

    $('a[href="#tab1"]').on('click',function(){
    	setTimeout(
    	  function() 
		  {
        	drawBasic();        
    	  }, 2);
 	});

</script>