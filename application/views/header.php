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
    <link href="<?php echo base_url()?>assets/js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">

    <script type="text/javascript" src="<?php echo base_url()?>assets/js/assets/jquery-1.9.0.min.js"></script>
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
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery-ui.css" type="text/css" media="screen"/>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" media="screen"/>
    
	
	
	
	
	<!--
    <script type="text/javascript">
            
            function fnFormatDetails ( oTable, nTr )
            {
                var aData = oTable.fnGetData( nTr );
                /*var aData= $.map(aDatas, function (value, key) { return value; });*/
               var gelar_depan=''; 
               var gelar_belakang='';
               if(aData.Gelar_akademik_depan!=null)
                 gelar_depan=aData.Gelar_akademik_depan; 
             if(aData.Gelar_akademik_belakang!=null)
                 gelar_belakang=aData.Gelar_akademik_belakang;
                 var sOut = '<ul class="listview image"><li class="span8-3 selected shadow-three">';
                 sOut += '<a href="#">';
                 sOut += '<div class="icon">';
                 sOut += '<img  src="<?php echo base_url(); ?>assets/images/foto/'+$.trim(aData.Nip_lama)+'.jpg" class="place-left"/></div>';
                 sOut += '<div class="data" style="min-height:155px;" >';
                 sOut += '<p>  </p>';
                 sOut += '<p><h4>'+gelar_depan+aData.Nama_dosen+gelar_belakang+'<h4></p>';
                 sOut +=  '<div class="span2-1 bg-color-blueDark"></div>';
                 sOut +=  '<p><span></span></p>';
                 sOut +=  '<p> #journals : </p>';
                 sOut +=   '<p> #conferences   : </p>';
                 sOut +=   '</div>';
                 sOut += '</a>';
                 sOut +=' </li>';
                 sOut +=' </ul>';
                
                
//                var sOut = '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';
//                sOut += '<tr><td>Rendering engine:</td><td>'+aData[1]+' '+aData[2]+'</td></tr>';
//                sOut += '<tr><td>Link to source:</td><td>Could provide a link here</td></tr>';
//                sOut += '<tr><td>Extra info:</td><td>And any further details here (images etc)</td></tr>';
//                sOut += '</table>';

                return sOut;
            }
            $(document).ready(function() { 
           
            
            var nCloneTh = document.createElement( 'th' );
            var nCloneTd = document.createElement( 'td' );
            nCloneTd.innerHTML = '<img src="<?php echo base_url(); ?>assets/images/details_open.png">';
            nCloneTd.className = "center";

            $('#big_table thead tr').each( function () {
                this.insertBefore( nCloneTh, this.childNodes[0] );
            } );

            $('#big_table tbody tr').each( function () {
                this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
            } );
            var oTable = $('#big_table').dataTable( {
                    "bProcessing": true,
                    "bServerSide": true,
                    "sAjaxSource": '<?php echo base_url(); ?>index.php/subscriber/datatable',
                    "bJQueryUI": true,
                    "sPaginationType": "full_numbers",
                    "iDisplayStart ":20,
                    "aoColumns": [
                            { "mData": "Expand" },
                            { "sTitle": "Engine","mData": "Nip_lama","bVisible": false,"sClass": "span3" },
                            { "sTitle": "Browser","mData": "Nama_dosen" },
                            { "sTitle": "Platform","mData": "Gelar_akademik_belakang" },
                            { "sTitle": "Version", "sClass": "center","mData": "Gelar_akademik_depan" },
                            { "sTitle": "Engine","mData": "Nama_jurusan" },
                            { "sTitle": "Grade", "sClass": "center","mData": "Nama_status"},
                            { "sTitle": "Grade", "sClass": "center","mData": "Nama_fakultas" }
                        ],
                    "oLanguage": {
                                    "sProcessing": "<img src='<?php echo base_url(); ?>assets/images/ajax-loader_dark.gif'>"
                                },  
                    "fnInitComplete": function() {
                            oTable.fnAdjustColumnSizing();
                     },
                    'fnServerData': function(sSource, aoData, fnCallback)
                {
                  $.ajax
                  ({
                    'dataType': 'json',
                    'type'    : 'POST',
                    'url'     : sSource,
                    'data'    : aoData,
                    'success' : fnCallback
                  });
                }
            } );
         
        $(document).on("click", '#big_table tbody td img', function (e) 
        {
            var nTr = $(this).parents('tr')[0];
            if ( oTable.fnIsOpen(nTr) )
            {
                
                /* This row is already open - close it */
                this.src = "<?php echo base_url(); ?>assets/images/details_open.png";
                oTable.fnClose( nTr );
            }
            else
            {
                /* Open this row */
                this.src = "<?php echo base_url(); ?>assets/images/details_close.png";
                oTable.fnOpen( nTr, fnFormatDetails(oTable, nTr), 'details' );
            }
        
        });
        
    } );
    </script>
    -->
    <script type="text/javascript">
    $(document).ready(function(){
          $('input:checkbox[name=type]').click(function(){
                Checkbox_to_RadioButton(this);
          });
          $('input:checkbox[name=year]').click(function(){
                Checkbox_to_RadioButton(this);
          });
          $('#pubdes').change(function(){
            if($(this).prop('checked')){
                $('#journals').prop('checked', true);
                $('#proceedings').prop('checked', true);
            }
            else{
                $('#journals').prop('checked', false);
                $('#proceedings').prop('checked', false);
            }
        });
    });
    
    function Checkbox_to_RadioButton(box){
          $('input:checkbox[name=' + box.name + ']').each(function(){
                if (this != box) $(this).attr('checked', false);
          });
    }
    </script> 
    <!--
    <script type="text/javascript">
        jQuery(function(){
                new Highcharts.Chart({
                        chart: {
                                renderTo: 'chart',
                                type: 'pie',
                                polar: true
                        },
                        plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: false
                            },
                            showInLegend: true
                        }
                    },
                        title: {
                                text: 'Pendapatan Tahun 2013',
                                x: -80
                        },
                        pane: {
                            size: '80%'
                        },
                        subtitle: {
                                text: 'http://didanurwanda.blogspot.com',
                                x: -20
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
    -->
	<style>
	linkPub:hover
	{
		color:red !important;
	}
	</style>
    <title>Resources ITS</title>
</head>

<body class="metrouicss bg-flower">
<div class="header shadow">
    <div class="nav-bar bg-flower bg-color-blueDark-2">
        <div class="nav-bar-inner padding20" style="height: 110%;">
        <div class="grid">
        <div class="row">
            <div class="span2"></div>
            <div class="span2">
        <a href="<?php echo base_url()?>">
                <img src="<?php echo base_url()?>assets/images/logo-resits.png" style="height: 80px; width: 184px;" />
        </a>
            </div>
            <div class="span8"></div>
            <div class="span2">
        <a href="http://www.its.ac.id/">
                <img src="<?php echo base_url()?>assets/images/logo-its.png" style="height: 90px; width: 164px;" />
        </a></div>
        </div>
            
        </div>
        
    </div>
</div>
</div>
