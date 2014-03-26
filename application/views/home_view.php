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

<div class="page secondary with-sidebar shadow">
    <div class="grid">
        <div class="row">
    <div class="span-sparate"></div>
    <div class="span12">
<div class="page-sidebar bg-flower bg-color-blue">
            <div style="height: 340px; overflow: hidden"><img src="<?php echo base_url()?>assets/images/Lecturer1.png" /></div>
        </div>

		 <div class="page-region" style="height: 100%;">
            <div class="page-region-content" >
                <div class="grid">
                   
                   <div class="row">
                       <div class="span9">
                           
                           <div class="tile shadow-three fives selected">
                                    <div class="tile-content">
                                        <div class="span2-1" style="margin: 15px 6px 0px 0px;">
                                            <img style="height: 230px; width: 200px; border: 1px #2b5797 solid;" src="<?php echo base_url()?>assets/images/no-photo.png" class="place-left"/>

                                        </div>
                                        <div class="span6" style="margin: 0px 0px 0px 0px;">
                                            <div class="page-control span6" data-role="page-control">
                                                <span class="menu-pull "></span>
                                                <div class="menu-pull-bar "></div>
                                                <ul class="bg-flower bg-color-blue">
                                                    <li class="active bg-flower bg-color-blue"><a href="#profil" class="fg-color-white">Welcome <?php echo $username; ?>!</a></li>
													<li class="bg-flower bg-color-blue"><a href="#experts" class="fg-color-white">Experts</a></li>
													<li class="bg-flower bg-color-blue"><a href="#publications" class="fg-color-white">Publications</a></li>
													<li class="bg-flower bg-color-blue"><a href="#logout" class="fg-color-white">Logout</a></li>
                                                </ul>
                                                
                                                <div class="frames">
												<div class="frame " id="logout">
													
                                                        <div class="span5-3"></div>
                                                            <div class="grid">
                                                                <div class="row">
                                                                    <div class="span5-3 left-span">
																	Sebelum anda keluar, pastikan proses indexing sudah selesai.
																	</div>
                                                                </div>
																<div class="row">
                                                                    <div class="span5-3 left-span">
																	Anda yakin ingin keluar?
																	</div>
                                                                </div>
                                                                    <div style="hight:15px;"></div>
																<div class="row">
                                                                    <div class="span5-3 left-span"> <a href="home/logout">
																		<input type="submit" class="shadow-two fg-color-white bg-color-blue bg-flower" style="width: 100px;" value="Logout"/></a>
																	</div>
                                                                </div>
																
                                                                
                                                            </div>
                                                    </div>
                                                    <div class="frame active" id="profil">
													
                                                        <div class="span5-3"></div>
                                                            <div class="grid">
																
                                                                <div class="row">
                                                                    <div class="span5-3 left-span">Pada Sistem Informasi Resources ITS ini menggunakan
																	beberapa file index, file index tersebut tersimpan pada folder lokal aplikasi
																	(application/search/nama_index). Dalam pengelolaan sistem ini,
																	index tersebut harus diperbarui pada periode tertentu agar data yang ditampilkan sesuai dengan database terbaru. 
																	</div>
                                                                </div>
																<div class="row">
                                                                    <div class="span5-3 left-span">
																	Terdapat 2 file index, experts dan publications.
																	</div>
                                                                </div>
																<div class="row">
                                                                    <div class="span5-3 left-span">
																		Add Index : Menambah data baru dari database ke index yang sudah ada.
																	</div>
                                                                </div>
																<div class="row">
                                                                    <div class="span5-3 left-span">
																		Re-Index  : Membuat index baru
																	</div>
                                                                </div>
                                                                
                                                               
                                                                
                                                                
                                                            </div>
                                                    </div>
													<div class="frame" id="experts">
													<div class="span5-3 center-span bg-flower bg-color-blue" style="border: 1px #ccc solid;">
                                                            <div class="span5-3" >
                                                            <h2 class="fg-color-white">&nbsp;Experts Index</h2>
                                                            </div>
                                                        </div>
                                                        <div class="span5-3"></div>
                                                            <div class="grid">
																<div class="row">
                                                                    <div class="span1-1 left-span">Rows of Lucene </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span"><?php echo $countexperts; ?></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span5-3 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
																<div class="row">
                                                                    <div class="span1-1 left-span">Rows of DB </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span"><?php echo $countexpertsdb; ?></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span5-3 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
																<div class="row">
                                                                    <div class="span1-1 left-span">Last Updated </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span"><?php echo $lastexperts; ?></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span5-3 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span1-1 left-span">Action </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span">
																		<div class="input-control select" >
                                                                            <select name="action">
                                                                                <option value="add">Add Index</option>
																				<option value="re">Re-Index</option>
                                                                            </select>
                                                                        </div>
																	</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span5-3 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span1-1 left-span" ><a href="coba/reindex_exp"><input type="submit" class="shadow-two fg-color-white bg-color-blue bg-flower" style="width: 100px;" value="Execute"/></a></div>
                                                                    <div class="span-sparate"></div>
                                                                    <div class="span3 left-span"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span5-3 bg-color-blueDark " style="float: right;" ></div>
                                                                </div>
																<div class="row">
                                                                    <div class="span1-1 left-span" >Status </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span"><?php echo $stexp; ?></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span5-3 bg-color-blueDark " style="float: right;" ></div>
                                                                </div>
                                                               
                                                                 <div class="row">
                                                                    <div class="span1-1 left-span"></div>
                                                                    <div class="span-sparate"></div>
                                                                    <div class="span3 left-span"></div>
                                                                </div>
                                                                
                                                            </div>
														<div class="span5-3 center-span bg-flower bg-color-blue" style="border: 1px #ccc solid;">
                                                            <div class="span5-3" >
                                                            <h2 class="fg-color-white">&nbsp;Histories</h2>
                                                            </div>
                                                        </div>
                                                        <div class="span5-3"></div>
														  <div class="grid">
																<?php foreach($exphistories as $rows){ ?>
																<div class="row">
                                                                    <div class="span1-1 left-span"><?php echo $rows->count; ?></div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span"><?php echo $rows->date; ?></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span5-3 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
																<?php }?>
															</div>
														
                                                    </div>
													<div class="frame" id="publications">
													
														<div class="span5-3 center-span bg-flower bg-color-blue" style="border: 1px #ccc solid;">
                                                            <div class="span5-3" >
                                                            <h2 class="fg-color-white">&nbsp;Publications Index</h2>
                                                            </div>
                                                        </div>
                                                        <div class="span5-3"></div>
														<div class="grid">
																<div class="row">
                                                                    <div class="span1-1 left-span"><label for="username">Rows of Lucene</label> </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span"><?php echo $countpubs; ?></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span5-3 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
																<div class="row">
                                                                    <div class="span1-1 left-span"><label for="username">Rows of DB</label> </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span"><?php echo $countpubsdb; ?></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span5-3 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
																<div class="row">
                                                                    <div class="span1-1 left-span">Last Updated </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span"><?php echo $lastpubs; ?></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span5-3 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span1-1 left-span"><label for="username">Action</label> </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span">
																		<div class="input-control select" >
                                                                            <select name="action">
                                                                                <option value="add">Add Index</option>
																				<option value="re">Re-Index</option>
                                                                            </select>
                                                                        </div>
																	</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span5-3 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span1-1 left-span" ><a href="coba/reindex_pub"><input type="submit" class="shadow-two fg-color-white bg-color-blue bg-flower" style="width: 100px;" value="Execute"/></a></div>
                                                                    <div class="span-sparate"></div>
                                                                    <div class="span3 left-span"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span5-3 bg-color-blueDark " style="float: right;" ></div>
                                                                </div>
																<div class="row">
                                                                    <div class="span1-1 left-span" >Status </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span"><?php echo $stpub; ?></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span5-3 bg-color-blueDark " style="float: right;" ></div>
                                                                </div>
                                                               
                                                                 <div class="row">
                                                                    <div class="span1-1 left-span"></div>
                                                                    <div class="span-sparate"></div>
                                                                    <div class="span3 left-span"></div>
                                                                </div>
                                                                
                                                            </div>
															<div class="span5-3 center-span bg-flower bg-color-blue" style="border: 1px #ccc solid;">
                                                            <div class="span5-3" >
                                                            <h2 class="fg-color-white">&nbsp;Histories</h2>
                                                            </div>
                                                        </div>
                                                        <div class="span5-3"></div>
														  <div class="grid">
																<?php foreach($pubshistories as $rows){ ?>
																<div class="row">
                                                                    <div class="span1-1 left-span"><?php echo $rows->count; ?></div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span"><?php echo $rows->date; ?></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span5-3 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
																<?php }?>
															</div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                                    
                                        </div>
                                        
                                    </div>
                               
                                </div>
                       </div>
                    </div>
                </div>
        </div>
    </div>

        <div class="span-sparate" ></div>
            </div>
        
        </div>
    </div>
	
   
   
    <div class="page shadow" >
        <div class="nav-bar bg-flower bg-color-blueDark-2">
            <div class="nav-bar-inner padding15">
                <div id="footer" class="fg-color-white">Helpdesk | PABX : 1132 | Phone : (031) 5947270 | Fax : (031) 5922947 | Email : btsi[at]its.ac.id</div>
             
                <div id="footer" class="fg-color-white">Head Office Badan TSI - ITS  | Email : kabtsi[at]its.ac.id </div>
               
                <div id="footer" class="fg-color-white">Pusat Pengelolaan dan Pelayanan TSI - ITS  |  	Email : kapusyantsi[at]its.ac.id</div>
                <br/>
                 <div id="footer" class="fg-color-white">
                      

<?php echo date("Y"); ?>, RESITS &copy; by <a class="fg-color-white" href="">BTSI</a>
                 </div>
            </div>
        </div>
    </div>

    
   
    </body>
</html>
   
  

