
       <script>
        var data_ss1=[], data_ss2=[], data_ss3 = [], data_ss4=[];
        var temp1 = new Array();
        //var data_ss1 , data_ss2, data_ss3, data_ss4;
        function forEach(array, action){
          for(var i = 0; i < array.length; i++)
            action(array[i]);
        }

        function xulyDulieu(data){
            
        }

        jQuery(document).ready(function($) {
            "use strict"; 

            $.ajax({
                url: "{{route('get-data-home')}}",
                type: 'POST',
                //cache: false,
                data: {
                    '_token': '{{ csrf_token() }}',
                    'id': 1
                },
                success: function(data){
                    //var getData = $.parseJSON(data);
                    //console.log(data[0].ss1);
                    var i = 0, data_temp = [];
                    
                    forEach(data, function(value){
                        data_ss1[i] = value.ss1;
                        data_ss2[i] = value.ss2;
                        data_ss3[i] = value.ss3;
                        data_ss4[i] = value.ss4;
                        ++i;
                    });
                    drawChart();
                },
                error: function (){
                    alert('Có lỗi xảy ra');
                }
            });





            // FUNCTION VE DO THI, 
            function drawChart(){

            // Traffic Chart using chartist
            if ($('#traffic-chart-1').length) {
                var chart = new Chartist.Line('#traffic-chart-1', {
                  //labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [
                  data_ss1
                 // [0, 33000, 15000,  20000,  15000,  300]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            //22222222222222222222222222222222222222222222222222222222222//
            if ($('#traffic-chart-2').length) {
                var chart = new Chartist.Line('#traffic-chart-2', {
                  //labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [[],
                  data_ss2
                 // [0, 33000, 15000,  20000,  15000,  300]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }

            //3333333333333333333333333333333333333333333333333333333333333//
            if ($('#traffic-chart-3').length) {
                var chart = new Chartist.Line('#traffic-chart-3', {
                  //labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [[],[],
                  data_ss3
                 // [0, 33000, 15000,  20000,  15000,  300]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            //4444444444444444444444444444444444444444444444444444444444//
            if ($('#traffic-chart-4').length) {
                var chart = new Chartist.Line('#traffic-chart-4', {
                  //labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [[],[],[],
                  data_ss4
                 // [0, 33000, 15000,  20000,  15000,  300]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }


        }
            
        }); 

// TIME PICKER
    </script>
