<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="Resources ITS">
    <meta name="author" content="BTSI ITS">
    <meta name="keywords" content="ITS, Resource, windows 8, modern style, Metro UI, style, modern, css, framework">

    <link href="<?php echo base_url()?>assets/css/private.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/css/modern.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/css/modern-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/site.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/css/jquery.autocomplete.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>assets/css/jquery.ui.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url()?>assets/js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">
  

    <script type="text/javascript" src="<?php echo base_url()?>assets/js/assets/jquery-1.10.1.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/assets/jquery.autocomplete.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/assets/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/assets/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/assets/jquery.mousewheel.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/assets/moment.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/assets/moment_langs.js"></script>

    <script type="text/javascript" src="<?php echo base_url()?>assets/js/modern/dropdown.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/modern/accordion.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/modern/buttonset.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/modern/carousel.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/modern/input-control.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/modern/pagecontrol.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/modern/rating.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/modern/slider.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/modern/tile-slider.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/modern/tile-drag.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/modern/calendar.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/highcharts/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/highcharts/highcharts.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/highcharts/modules/exporting.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/highcharts/themes/dark-green.js"></script>
    <script type="text/javascript">
    jQuery(function(){
            new Highcharts.Chart({
                     chart: {
	        polar: true,
	        type: 'line'
	    },
	    
	    title: {
	        text: 'Budget vs spending',
	        x: -80
	    },
	    
	    pane: {
	    	size: '80%'
	    },
	    
	    xAxis: {
	        categories: ['Sales', 'Marketing', 'Development', 'Customer Support', 
	                'Information Technology', 'Administration'],
	        tickmarkPlacement: 'on',
	        lineWidth: 0
	    },
	        
	    yAxis: {
	        gridLineInterpolation: 'polygon',
	        lineWidth: 0,
	        min: 0
	    },
	    
	    tooltip: {
	    	shared: true,
	        pointFormat: '<span style="color:{series.color}">{series.name}: <b>${point.y:,.0f}</b><br/>'
	    },
	    
	    legend: {
	        align: 'right',
	        verticalAlign: 'top',
	        y: 100,
	        layout: 'vertical'
	    },
	    
	    series: [{
	        name: 'Allocated Budget',
	        data: [43000, 19000, 60000, 35000, 17000, 10000],
	        pointPlacement: 'on'
	    }, {
	        name: 'Actual Spending',
	        data: [50000, 39000, 42000, 31000, 26000, 14000],
	        pointPlacement: 'on'
	    }]
            });
    }); 
    </script>
    
    <script>
    var site = "<?php echo site_url();?>";
    $(document).ready(function(){
      $( "#autocomplete" ).autocomplete({
                source: function(request, response) {
                    $.ajax({
                        url: "<?php echo site_url('welcome/suggestions'); ?>",
                        data: { name: $("#autocomplete").val()},
                        dataType: "json",
                        type: "POST",
                        success: function(data){
                            response(data);
                        }   
                    });
                }
            });
            
      $("#mipa").click(function(){
        $("#dashboard").text("  Hello world!");
      });
      $("#btn2").click(function(){
        $("#test2").html("<b>Hello world!</b>");
      });
      $("#btn3").click(function(){
        $("#test3").val("Dolly Duck");
      });
      
    });
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/assets/jquery-1.4.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/assets/jquery-1.8.js"></script>
    
    
    <title>Resources ITS</title>
</head>

<body class="metrouicss bg-flower">
<div class="header shadow">
    <div class="nav-bar" style="background: #003399 url('<?php echo base_url()?>assets/images/flowers.png')">
    <div class="nav-bar-inner padding20">
        <div class="offset2">
        <a href="<?php echo base_url()?>">
                <img src="<?php echo base_url()?>assets/images/logo32-its.png" style="height: 80px; width: 184px;" />
        </a>
        </div>
    </div>
</div>
</div>
