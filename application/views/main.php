
<div class="page shadow " id="page-index" >
    <br/>
       
    <div class="page-region " >
        <div class="page-region-content">
           
            <div class="grid" >
                <div class="row">
                    <div class="span-sparate" ></div>
                    <div class="span12 bg-color-blueDark">
                    </div>
                    <div class="span-sparate" ></div>
                </div><br/>
                <div class="row">
                    <div class="span-sparate" ></div>
                    <div class="span12">
                        
                        <div class=" span12 bg-color-blue bg-flower fg-color-white shadow-two">
                            <h2 class="fg-color-white">&nbsp;Search</h2>
                        </div>
                                <form method="get" action="<?php echo base_url() . 'index.php/welcome/search' ?>">
								<input type="hidden" name="search" value="<?php echo $search?>" />
                                <div class=" span12 ">
                                    <div class="grid">
                                    <div class="tile prettyprint  shadow-two" style="width: 100%; height: relative;">
                                        <div class="row">
                                            <div class="span12">
                                                <div class="grid">
                                                    <div class="row">
														<div class="span1"></div>
                                                        <div class="span2" style="margin-top: 10px;">
                                                            <span class="fg-color-darken">Search Option </span>
                                                        </div>
                                                        <div class="span2" style="margin-left: -10px;margin-top: 10px;" >
                                                           <label class="input-control radio">
                                                               <input name="type" value="exp" type="radio" checked="checked">
                                                               <span class="helper">Experts</span>
                                                            </label>
                                                        </div>
                                                        <div class="span2" style="margin-left: 10px;margin-top: 10px;">
                                                           <label class="input-control radio">
                                                               <input name="type" value="pub" type="radio">
                                                               <span class="helper">Publications</span>
                                                            </label>
                                                        </div>
                                                        <div class="span2-1" style="" >
                                                                    <label class="input-control checkbox span3">
                                                                      <input name="name"  type="text" placeholder="Search by Name"/>
                                                                    </label>
																</div>
																<div class="span2" style="margin-left:30px">
																	<button type="submit" class="shadow-two fg-color-white bg-color-blue bg-flower" style="width: 100px; margin-left: 5px;">Search</button>
																</div>
                                                    </div>
													
                                                    <div class="row">
                                                        <div class="span11-1 bg bg-color-darken" ></div>
                                                    </div>
													<div id="toggleOn" class="row">
														<a href="#" onclick="advOn()">Toggle Advanced Options</a>
													</div>
                                                    <div id="advSearch" class="row" style="display:none">
                                                        <div class="span8">
                                                            <div class="row" style="margin-top:20px">
                                                                 <div class="span1"></div>
																 <div class="span3">
                                                                    <label class="input-control">
                                                                       <span class="helper">Expertise Area</span>
                                                                    </label>
                                                                </div>
                                                                <div class="span4" style="margin-left: -10px;">
                                                                    <label class="input-control checkbox span4">
                                                                      <input name="exparea" type="text" />
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="span1"></div>
																 <div class="span3">
                                                                    <label class="input-control ">
                                                                       <span class="helper">Publication Description </span>

                                                                    </label>
                                                                </div>
                                                                <div class="span4" style="margin-left: -10px;">
                                                                    <label class="input-control checkbox span4">
                                                                      <input name="pubdes" type="text" />
                                                                    </label>

                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="span1"></div>
																 <div class="span3">
                                                                    <label class="input-control">
                                                                       <span class="helper">Research Area</span>
                                                                    </label>
                                                                </div>

                                                                <div class="span4" style="margin-left: -10px;">
                                                                    <label class="input-control checkbox span4">
                                                                      <div class="input-control select" >
                                                                            <select name="resarea">
                                                                                <option value="all">All</option>
                                                                                <option value="MATEMATIKA DAN ILMU PENGETAHUAN ALAM">Mathematics and Natural Sciences</option>
                                                                                <option value="TEKNOLOGI INDUSTRI">Industrial Technology</option>
                                                                                <option value="TEKNIK SIPIL DAN PERENCANAAN">Civil Engineering and Planning</option>
                                                                                <option value="TEKNOLOGI KELAUTAN">Marine Technology</option>
                                                                                <option value="TEKNOLOGI INFORMASI">Information Technology</option>
                                                                                <option value="PASCASARJANA">Management Technology</option>
                                                                            </select>
                                                                        </div>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="span4">
                                                            <div class="row" style="margin-top:15px">
                                                                 <div class="span4">
                                                                    <span class="helper">Publication Type</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                            <div class="span4">
                                                                <label class="input-control checkbox">
                                                                   <input id="journals" name="journals" type="checkbox" checked>
                                                                   <span class="helper">Journals</span>
                                                                </label>
                                                            </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="span4">
                                                                    <label class="input-control checkbox">
                                                                       <input id="proceedings" name="proceedings" type="checkbox" checked>
                                                                       <span class="helper">Proceedings </span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="span4">
                                                                    <span class="helper">Publication Date Range</span>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                 <div class="span4">
                                                                    <label class="input-control checkbox">
                                                                       <input name="year" value="all" type="checkbox" checked="checked">
                                                                       <span class="helper">All years</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="span-sparate">
                                                                    <label class="input-control checkbox">
                                                                       <input name="year" value="custom" type="checkbox">
                                                                       <span class="helper"></span>
                                                                    </label>
                                                                </div>
                                                                <div class="span1" style="margin-left: 3px; margin-top: -5px; width: 100px;">
                                                                       <div class="input-control select" >
                                                                             <input name="thawal" placeholder="yyyy"  type="text" />
                                                                        </div>
                                                                </div>
                                                                <div class="span-sparate" style="margin-left: -12px;">
                                                                       <span class="helper">to</span>
                                                                </div>
                                                                <div class="span1" style="margin-left: 7px; margin-top: -5px; width: 100px;">
                                                                       <div class="input-control select" >
                                                                           <input name="thakhir" placeholder="yyyy" type="text" />
                                                                        </div>
                                                                </div>
                                                            </div>
															<div id="toggleOff" style="margin:5px 35px; float:right;">
																<a href="#" onclick="advOff()"><< Hide</a>
															</div>
                                                        </div>
                                                        
                                                        
                                                    </div>
                                            </div>
                                            </div>
                                            
                                     </div>
                                       
                                        </div>
                                        
                                    </div>
                                    </form>
                                </div>
                                <div class="span-sparate"></div>
                        </div>
                          <div class="row">
                            <div class="span-sparate" ></div>
                            <div class="span4 ">
                                <a href="<?php echo base_url()?>index.php/welcome/search/?type=exp">
                                    <div class=" span4 bg-color-blue bg-flower fg-color-white shadow-two">
                                        <img src="<?php echo base_url()?>assets/images/Lecturer3.png" class="place-right" style="margin: 1px; height: 48px; width: 48px;"/>
                                        <h2 class="fg-color-white">&nbsp;Experts</h2>
                                    </div>
                                </a>
                                <div class=" span4 ">
                                        <div class="tile prettyprint  shadow-two bg-color-green bg-flower" style="width: 100%; height: 100%;" >
                                            <div class="carousel" style="height: 250px;" data-role="carousel" data-param-effect="fade" data-param-direction="left" data-param-period="3000" data-param-markers="off">
                                                    <div class="slides">
                                                        
                                            <?php foreach($experts as $rows){ ?>
                                            <div class="slide image" id="slide1" >
                                                 <a href="<?php echo base_url()?>index.php/welcome/exp_detail/<?php 
												 
												 
												 //Enkripsi nip lama
                                                 $CI =& get_instance();
                                                 $encoded_nip = $CI->encryption($rows['Nip_lama'],'MY KEY');
                                                 echo $encoded_nip;
												 //echo $rows['Nip_lama'];
												 ?>">
                                                     <?php 
                                                     { if(file_exists(FCPATH.'assets/images/foto/'.trim($rows['Nip_lama']).'.jpg')){?>
                                                    <img  src="<?php echo base_url()?>assets/images/foto/<?php echo trim($rows['Nip_lama']);?>.jpg" class="place-left"/>
                                                    <?php }
                                                        else{
                                                    ?>
                                                    <img src="<?php echo base_url()?>assets/images/no-photo.png" class="place-left"/>
                                                     <?php 
                                                     } }
                                                    ?>
                                                    <div class="description">
                                                        <h3 class="fg-color-white"><?php echo $rows['Gelar_akademik_depan'].$rows['Nama_dosen'].$rows['Gelar_akademik_belakang'];?></h3>
                                                        <?php echo $rows['Nama_jurusan']?><br>
                                                        #journals :<?php echo $rows['journals']?><br>
                                                        #conferences :<?php echo $rows['conferences']?><br>
                                                    </div>
												 </a>
                                            </div>
                                            <?php }?>
                                        </div>

                                    </div>
                                        </div>
                                 </div>
                                <div class=" span4 bg-color-blue bg-flower fg-color-white shadow-two" style="height: 25px;margin-top: -5px;">
                                    </div>
                            </div>

                            <div class="span4 ">
                                <a href="#">
                                <div class=" span4 bg-color-blue bg-flower fg-color-white shadow-two">
                                    <img src="<?php echo base_url()?>assets/images/Lecturer4.png" class="place-right" style="margin: 1px; height: 48px; width: 48px;"/>
                                    <h2 class="fg-color-white">&nbsp;Qualifications</h2>
                                </div>
                                </a>
                                <div class=" span4 ">
                                    <div class="grid">
                                        <div class="tile prettyprint bg-color-yellow bg-flower  shadow-two" style="width: 100%; height: 288px;" >
                                            <div class="span3-3 bg-color-blue bg-flower" style="width: 100%; height: 250px; padding: 10px;">
                                               <p style="text-align: left;">
											   <style>
												.qualif:hover {
													color: goldenrod !important;
												}
												</style>
											    <a href="<?php echo base_url()?>index.php/welcome/search/?type=exp&exparea=<?php echo $kualifikasi[1]->nama_kualifikasi?>"><span class="qualif font-2 fg-color-white"><?php echo $kualifikasi[1]->nama_kualifikasi?><br /></span></a>
												<a href="<?php echo base_url()?>index.php/welcome/search/?type=exp&exparea=<?php echo $kualifikasi[0]->nama_kualifikasi?>"><span class="qualif font-2 fg-color-white"><?php echo $kualifikasi[0]->nama_kualifikasi?><br /></span></a>
                                                <a href="<?php echo base_url()?>index.php/welcome/search/?type=exp&exparea=<?php echo $kualifikasi[2]->nama_kualifikasi?>"><span class="qualif font-2 fg-color-white"><?php echo $kualifikasi[2]->nama_kualifikasi?><br /></span></a>
                                                <a href="<?php echo base_url()?>index.php/welcome/search/?type=exp&exparea=<?php echo $kualifikasi[3]->nama_kualifikasi?>"><span class="qualif font-2 fg-color-white"><?php echo $kualifikasi[3]->nama_kualifikasi?><br /></span></a>
                                                <a href="<?php echo base_url()?>index.php/welcome/search/?type=exp&exparea=<?php echo $kualifikasi[4]->nama_kualifikasi?>"><span class="qualif font-2 fg-color-white"><?php echo $kualifikasi[4]->nama_kualifikasi?><br /></span></a>
                                                <a href="<?php echo base_url()?>index.php/welcome/search/?type=exp&exparea=<?php echo $kualifikasi[5]->nama_kualifikasi?>"><span class="qualif font-2 fg-color-white"><?php echo $kualifikasi[5]->nama_kualifikasi?><br /></span></a>
                                                <a href="<?php echo base_url()?>index.php/welcome/search/?type=exp&exparea=<?php echo $kualifikasi[6]->nama_kualifikasi?>"><span class="qualif font-2 fg-color-white"><?php echo $kualifikasi[6]->nama_kualifikasi?><br /></span></a>
                                                
												<a href="<?php echo base_url()?>index.php/welcome/search/?type=exp&exparea=<?php echo $kualifikasi[8]->nama_kualifikasi?>"><span class="qualif font-2 fg-color-white"><?php echo $kualifikasi[8]->nama_kualifikasi?><br /></span></a>
                                                <a href="<?php echo base_url()?>index.php/welcome/search/?type=exp&exparea=<?php echo $kualifikasi[9]->nama_kualifikasi?>"><span class="qualif font-2 fg-color-white"><?php echo $kualifikasi[9]->nama_kualifikasi?><br /></span></a>
												<a href="<?php echo base_url()?>index.php/welcome/search/?type=exp&exparea=<?php echo $kualifikasi[7]->nama_kualifikasi?>"><span class="qualif font-2 fg-color-white"><?php echo $kualifikasi[7]->nama_kualifikasi?><br /></span></a>
												<!--<a href="<?php echo base_url()?>index.php/welcome/search/?type=exp&exparea=<?php echo $kualifikasi[10]->nama_kualifikasi?>"><span class="font-2 fg-color-white"><?php echo "11. ".$kualifikasi[10]->nama_kualifikasi?><br /></span></a>
                                                <a href="<?php echo base_url()?>index.php/welcome/search/?type=exp&exparea=<?php echo $kualifikasi[11]->nama_kualifikasi?>"><span class="font-2 fg-color-white"><?php echo "12. ".$kualifikasi[11]->nama_kualifikasi?><br /></span></a>
                                                -->
                                               </p>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                                <div class=" span4 bg-color-blue bg-flower fg-color-white shadow-two" style="height: 25px;margin-top: -10px;">
                                    </div>
                            </div>
                            <div class="span4 ">
                                <a href="<?php echo base_url()?>index.php/welcome/search/?type=pub">
                                <div class=" span4 bg-color-blue bg-flower fg-color-white shadow-two">
                                    <img src="<?php echo base_url()?>assets/images/Lecturer7.png" class="place-right" style="margin: 1px; height: 48px; width: 48px;"/>
                                    <h2 class="fg-color-white">&nbsp;Latest Publications</h2>
                                </div>
                                </a>
                                <div class=" span4 ">
                                    <div class="grid">
                                        <div class="tile prettyprint bg-color-purple bg-flower  shadow-two" style="width: 100%; height: 288px;" >
                                            <div class="row">
                                                <div class=" span3-3 ">
                                                     <div class="tile double bg-color-blue bg-flower" style="width: 100%; height: 250px;" data-role="tile-slider" data-param-period="2500">

                                                         <?php foreach($publications as $rows){ ?>   
                                                         <div class="tile-content ">
                                                             <a href="<?php echo base_url()?>index.php/welcome/pub_detail/<?php 
															 
															 //Enkripsi nip lama
															$CI =& get_instance();
															$encoded = $CI->encryption($rows->Kode_publikasi_dosen_tetap,'MY KEY');
															echo $encoded;
															//echo $rows->Kode_publikasi_dosen_tetap; 
															 
															 ?>">
                                                                <div class="icon">
                                                                    <?php if($rows->media_publikasi==' '||$rows->media_publikasi=='E'||$rows->media_publikasi=='F'||$rows->media_publikasi=='G') {?>
                                                                    <img src="<?php echo base_url()?>assets/images/User-Files-icon-3.png" style="height: 80px;width: 80px;" />
                                                                    <?php } else if($rows->media_publikasi=='B'||$rows->media_publikasi=='C'||$rows->media_publikasi=='D') {?>
                                                                    <img src="<?php echo base_url()?>assets/images/User-Files-icon.png" style="height: 80px;width: 80px;" />
                                                                    <?php } else { ?>
																	<img src="<?php echo base_url()?>assets/images/User-Files-icon.png" style="height: 80px;width: 80px;" />
																	<?php } ?>
                                                                    <h5><?php echo $rows->Nama_jurusan;?></h5>
                                                                </div>
                                                                <p>
                                                                       <span class="font-4 fg-color-white"><?php echo $rows->Gelar_akademik_depan.' '. $rows->Nama_dosen.' '.$rows->Gelar_akademik_belakang;?> </span>
                                                                </p>
                                                                <p style="text-align: left;">
                                                                       <span class="font-1 fg-color-white"><?php echo trim($rows->Pengarang).", "."<i class=\"fg-color-white\">".$rows->Judul_penelitian."</i>".", ".substr($rows->Periode_penelitian,0,4);?>
                                                                </p>
                                                             </a>
                                                            </div>
                                                         <?php }?>


                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <div class=" span4 bg-color-blue bg-flower fg-color-white shadow-two" style="height: 25px;margin-top: -10px;">
                                    </div>
                                 </div>
                            <div class="span-sparate" ></div>
                    </div>
                   
                    </div>
                    </div>
                </div>
                </div>
				
				<script>
					function advOn()
					{
					
						document.getElementById("advSearch").style.display = 'inline';
						document.getElementById("toggleOn").style.display = 'none';
						document.getElementById("toggleOff").style.display = 'inline';
					}
					
					function advOff()
					{
						document.getElementById("advSearch").style.display = 'none';
						document.getElementById("toggleOn").style.display = 'inline';
						document.getElementById("toggleOff").style.display = 'none';
					}
				</script>
           