<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
                    <div id="dayly_activity_div" style="height: 300px; width:100%;">
    <script>
                            $( document ).ready(function() {
                                $('#dayly_activity_div').highcharts({
                                    chart: {
                                        type: 'bar'
                                    },
                                    title: {
                                        text: 'Daily Stats'
                                    },
                                    xAxis: {
                                        categories: ['New Orders', 'New Customers', 'New Products Added']
                                    },
                                    yAxis: {
                                        min: 0
                                    },
                                    legend: {
                                        reversed: true
                                    },
                                    plotOptions: {
                                        series: {
                                            stacking: 'normal'
                                        }
                                    },
                                     series: [{
                                        name: ' ',
                                        data: <?php echo $series_data; ?>
                                    }]
                                });
                            });

                        </script>
                        </div>