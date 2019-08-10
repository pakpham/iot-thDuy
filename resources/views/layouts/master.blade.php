<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ela Admin - HTML5 Admin Template</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../images/favicon.png">
    <link rel="shortcut icon" href="../images/favicon.png">

    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/pe-icon-7-filled.css">

    <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/pe-icon-7-filled.css">

    <link href="../assets/weather/css/weather-icons.css" rel="stylesheet" />
    <link href="../assets/calendar/fullcalendar.css" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../assets/css/charts/chartist.min.css" rel="stylesheet"> 
    <link href="../assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet"> 


    {{-- TIMER PICKER --}}
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
    <script src="../admin_asset/assets/js/lib/moment/moment.js"></script>
    <script src="../admin_asset/assets/calendar/fullcalendar.min.js"></script>
    <script src="../admin_asset/assets/calendar/fullcalendar-init.js"></script>
    <link href="../admin_asset/assets/calendar/fullcalendar.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />


    <style>
    #weatherWidget .currentDesc {
        color: #ffffff!important;
    }
        .traffic-chart { 
            min-height: 335px; 
        }
        #flotPie1  {
            height: 150px;
        } 
        #flotPie1 td {
            padding:3px;
        }
        #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
        }
        .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        #flotLine5  {
             height: 105px;
        } 

        #flotBarChart {
            height: 150px;
        }
        #cellPaiChart{
            height: 160px;
        }

    </style>
</head>


<body>
    <!-- Left Panel --> 
   @include("layouts.left-panel")
    <!-- /#left-panel --> 

    <!-- Right Panel --> 
   <div id="right-panel" class="right-panel">
      @include("layouts.header")
      @yield('content')
      <div class="clearfix"></div>
      @include("layouts.footer")
   </div><!-- /#right-panel -->

    <script src="../assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/plugins.js"></script>
    <script src="../assets/js/main.js"></script>

    <script src="../assets/js/lib/chart-js/Chart.bundle.js"></script>


    <!--Chartist Chart-->
    <script src="../assets/js/lib/chartist/chartist.min.js"></script>
    <script src="../assets/js/lib/chartist/chartist-plugin-legend.js"></script> 
../
    
    <script src="../assets/js/lib/flot-chart/jquery.flot.js"></script>
    <script src="../assets/js/lib/flot-chart/jquery.flot.pie.js"></script>
    <script src="../assets/js/lib/flot-chart/jquery.flot.spline.js"></script>


    <script src="../assets/weather/js/jquery.simpleWeather.min.js"></script>
    <script src="../assets/weather/js/weather-init.js"></script>


    <script src="../assets/js/lib/moment/moment.js"></script>
    <script src="../assets/calendar/fullcalendar.min.js"></script>
    <script src="../assets/calendar/fullcalendar-init.js"></script>

    @include ('layouts.script')

<div id="container">
</div>
</body>
</html>
