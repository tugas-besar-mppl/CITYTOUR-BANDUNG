<script src="plugins/highcharts/js/highstock.js"></script>
<script src="plugins/highcharts/js/modules/exporting.js"></script>
		<script type="text/javascript">
		function requestData() {
			jQuery.ajax({
				url: 'models/dashboard/get_grafik.php', 
				success: function(point) {
					//alert(point);
					if (point != "null")
					{
						var series = chartppdb.series[0];					
						var x = eval(point);
						//alert(x);
						chartppdb.xAxis[0].categories = [];
						jQuery.each(x, function(key, val) {
							szVal = val.toString().split(",");
							chartppdb.xAxis[0].categories.push(szVal[0]);
						  });					
						chartppdb.series[0].setData(eval( '(' + point + ')' ));
						setTimeout(requestData, 60000);
					}
				},
				cache: false
			});						
		}	
		
		jQuery(function () {
		
		chartppdb = new Highcharts.Chart({
				chart: {
					type: 'bar',
					renderTo: 'grafik',
					defaultSeriesType: 'spline',
					marginRight: 10,
					events: {
						load: requestData
					}
				},
				title: {
					text: 'Grafik Penggunaan Mobil'
				},
				xAxis: {
					//reversed:true,
					labels: {
                    rotation: 0,
                    align: 'right',
                    style: {
                        fontSize: '12px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                	},
					title: {
                    	text: 'Status'
                	}				
				},
				yAxis: {
					title: {
						text: 'Jumlah Data',
						align: 'high',
						margin: 20
					},
					labels: {
						overflow: 'justify'
					}
				},
				plotOptions: {
					bar: {
						dataLabels: {
							enabled: true
						}
					}
				},				
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'top',
					x: -40,
					y: 100,
					floating: true,
					borderWidth: 1,
					backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor || '#FFFFFF'),
					shadow: true
				},
				credits: {
					enabled: false
				},
				series: [{
					name: 'Status',
					data: []
				}]
			});		       
    });
    

		</script>
	</head>
	<body>

<div id="grafik" style="min-width: 310px; max-width: 1200px; height: 400px; margin: 0 auto"></div>
    