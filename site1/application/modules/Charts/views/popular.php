<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
			    	<div id="pop_div" style="height: 300px;width:100%; ">
	<script>
					  	 	$( document ).ready(function() {
					  
					  	 	 $('#pop_div').highcharts({
						        chart: {
						            plotBackgroundColor: null,
						            plotBorderWidth: 0,
						            plotShadow: false
	
						        },
						        title: {
						            text: 'Order Staus',
						            align: 'center',
						            verticalAlign: 'middle',
						            y: 40
						        },
						        tooltip: {
						            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
						        },
						        plotOptions: {
						            pie: {
						                dataLabels: {
						                    enabled: true,
						                    distance: -50,
						                    style: {
						                        fontWeight: 'bold',
						                        color: 'white',
						                        textShadow: '0px 1px 2px black'
						                    }
						                },
						                startAngle: -90,
						                endAngle: 90,
						                center: ['50%', '75%']
						            }
						        },
								series: [{
						            type: 'pie',
						            name: 'Order Status',
						            innerSize: '50%',
						            data: <?php echo $series_data; ?>
						        }]
						    });
						});
						</script>
						</div>
