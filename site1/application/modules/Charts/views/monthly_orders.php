<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
			    	<div id="monthly_order_div" style="height:300px; width:100%;">
	<script>
					  	 	$( document ).ready(function() {
					  	 		$('#monthly_order_div').highcharts({
					  	 			 chart: {
            								type: 'area'
            								
      								  },
							        title: {
							            text: 'Monthly Orders',
							            x: -20 //center
							        },
							        xAxis: {
							            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
							                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
							        },
							        yAxis: {
							            title: {
							                text: 'Orders',
							                style: {
								                color: '#797979'
								            }
							            },
							            plotLines: [{
							                value: 0,
							                width: 1,
							                color: '#797979'
							            }]
							        },
							        legend: {
							            layout: 'vertical',
							            align: 'right',
							            verticalAlign: 'middle',
							            borderWidth: 0
							        },
							        series: <?php echo $series_data; ?>
							   }); 
						});



						</script>
						</div>