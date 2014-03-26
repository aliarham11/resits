
        <div class="page-region">
            <div class="page-region-content">
			<form method="get" action="<?php echo base_url().'index.php/welcome/search/?';?>" >
                <div class="grid">
                    <div class="row">
                        <div class=" span9 bg-color-blue fg-color-white bg-flower shadow-two">
                            <div class="span9 inner">
                                <div class="span7">
                                <p style="text-align: justify"><?php echo $this->breadcrumb->show(); ?></p>
                                </div>
								<div class="span1" style="text-align: right; margin-top: 8px;">
                                        <input type="hidden" name="type" value="<?php echo $type?>" />
                                        <input value="" style="height: 27px; width: 127px; " name="name" placeholder="Search by name" type="text" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }"/>
                                </div>
                                </div>
                        </div>
                    </div>
                   <div class="row">
                       <div class="span9">
                           
                           <div class="tile shadow-three fives selected">
                                    <div class="tile-content">
                                        <div class="span1-1" style="margin: 15px 6px 0px 0px;">
                                            <?php 
                                            //echo FCPATH .'assets/images/foto/'.trim($detail->Nip_lama).'.jpg'; exit;
                                            if(file_exists(FCPATH.'assets/images/foto/'.trim($detail->Nip_lama).'.jpg')){?>
                                            <img style="height: 150px; width: 120px; border: 1px #2b5797 solid;" src="<?php echo base_url()?>assets/images/foto/<?php echo trim($detail->Nip_lama);?>.jpg" class="place-left"/>
                                            <?php }
                                                else{
                                            ?>
                                            <img style="height: 150px; width: 120px; border: 1px #2b5797 solid;" src="<?php echo base_url()?>assets/images/no-photo.png" class="place-left"/>

                                             <?php 
                                             }
                                            ?>
                                        </div>
                                        <div class="span6-1" style="margin: 0px 0px 0px 0px;">
                                            <div class="page-control span6-1" data-role="page-control">
                                                <span class="menu-pull "></span>
                                                <div class="menu-pull-bar "></div>
                                                <ul class="bg-flower bg-color-blue">
                                                    <li class="active bg-flower bg-color-blue"><a href="#profil" class="fg-color-white"><i class="icon-address-book"></i>Profile</a></li>
                                                   <li class="bg-flower bg-color-blue"><a href="#kegiatan" class="fg-color-white"><i class="icon-history"></i>Activity</a></li>
                                                    <li class="bg-flower bg-color-blue"><a href="#pendidikan" class="fg-color-white"><i class="icon-file"></i>Education</a></li>
                                                </ul>
                                                
                                                <div class="frames">
                                                    <div class="frame active <?php if(trim($detail->Nama_status) == "Pensiun") echo "bg-color-yellow"?>" id="profil">
                                                        <div class="span6 center-span bg-flower bg-color-blue" style="border: 1px #ccc solid;">
                                                            <div class="span5-3" >
                                                            <h2 class="fg-color-white">&nbsp;Personal Data</h2>
                                                            </div>
                                                        </div>
                                                        <div class="span5-3"></div>
                                                            <div class="grid">
                                                                
                                                               
                                                                <div class="row">
                                                                    <div class="span1-1 left-span">Full Name </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span"> <?php echo $detail->Gelar_akademik_depan.' '. $detail->Nama_dosen.' '.$detail->Gelar_akademik_belakang ?></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span6 bg-color-blueDark" style="float: left;"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span1-1 left-span" >Email </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span"> <?php if($detail->Email) echo $detail->Email; else echo '- Not available -' ?></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span6 bg-color-blueDark" style="float: left;"></div>
                                                                </div>
                                                               
                                                                 <div class="row">
                                                                    <div class="span1-1 left-span">#journals </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span">  <?php echo $detail->journals ?></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span6 bg-color-blueDark" style="float: left;"></div>
                                                                </div>
                                                                 <div class="row">
                                                                    <div class="span1-1 left-span">#conferences </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span">  <?php echo $detail->conferences ?></div>
                                                                </div>
																<div class="row">
                                                                    <div class="span6 bg-color-blueDark" style="float: left;"></div>
                                                                </div>
                                                                <div class="row">
                                                                   <!-- <div class="span5-3 bg-color-blueDark" style="float: right;"></div> -->
																	<div class="span1-1 left-span">Expertise</div>
																	<div class="span-sparate">:</div>
																</div>
																<div class="span6 left-span"> 
																<?php
																		$i=0;
																		if($kualifikasi){ foreach($kualifikasi as $rows){ ?>
																		<a href="<?php echo base_url()?>index.php/welcome/search/?type=exp&exparea=<?php echo $rows->nama_kualifikasi;?>">
																		<?php 
																		if($i!=0) echo ", ";
																		echo $rows->nama_kualifikasi;
																		$i++;																		
																		?>
																		</a>
                                                            
																<?php }}?>
																</div>
																
                                                                
                                                                
                                                                
                                                            </div>
                                                    </div>
                                                    
                                                    <div class="frame" id="kegiatan">
                                                        <div class="span6 center-span bg-flower bg-color-blue" style="border: 1px #ccc solid;">
                                                            <div class="span6" >
                                                            <h2 class="fg-color-white">&nbsp;Activities</h2>
                                                            </div>
                                                        </div>
                                                        <div class="grid">
                                                            <?php if($kegiatan){ foreach($kegiatan as $rows){ ?>
                                                                <div class="row">
                                                                    <div class="span1-1 left-span"><?php echo substr($rows->waktumulai, 0, 4); ?> - <?php echo substr($rows->waktuakhir, 0, 4);  ?> </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span"> <?php echo $rows->keterangan; ?></div>
                                                                </div>
                                                            
                                                                <div class="row">
                                                                    <div class="span6 bg-color-blueDark" style="float: left;"></div>
                                                                </div>
                                                            <?php }} else 
                                                            {
                                                            ?>
                                                                 <div class="row">
                                                                    <div class="span5-3" style="text-align: center"> - No activities recorded. -</div>
                                                                </div>
                                                            
                                                                <div class="row">
                                                                    <div class="span6 bg-color-blueDark" style="float: left;"></div>
                                                                </div>
                                                             <?php }
                                                            ?>
                                                            </div>
                                                        
                                                        
                                                    </div>
                                                    <div class="frame" id="pendidikan">
                                                        <div class="span6 center-span bg-flower bg-color-blue" style="border: 1px #ccc solid;">
                                                            <div class="span6" >
                                                            <h2 class="fg-color-white">&nbsp;Educations</h2>
                                                            </div>
                                                        </div>
                                                        <div class="grid">
                                                            <?php if($pendidikan){ foreach($pendidikan as $rows){ ?>
                                                                <div class="row">
                                                                    <div class="span1-1 left-span"><?php echo substr($rows->waktumulai, 0, 4); ?> - <?php echo substr($rows->waktuakhir, 0, 4);  ?> </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span3 left-span"> <?php echo $rows->keterangan; ?></div>
                                                                </div>
                                                            
                                                                <div class="row">
                                                                    <div class="span6 bg-color-blueDark" style="float: left;"></div>
                                                                </div>
                                                            <?php }} else 
                                                            {
                                                            ?>
                                                                 <div class="row">
                                                                    <div class="span5-3" style="text-align: center"> - No educations recorded. -</div>
                                                                </div>
                                                            
                                                                <div class="row">
                                                                    <div class="span6 bg-color-blueDark" style="float: left;"></div>
                                                                </div>
                                                             <?php }
                                                            ?>
                                                            </div>
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                                    
                                        </div>
                                        
                                        <div class="span9">
                                            <div class="page-control span8-1" data-role="page-control">
                                                <span class="menu-pull "></span>
                                                <div class="menu-pull-bar "></div>
												<ul class="bg-flower bg-color-blue">
                                                    <li class="active bg-flower bg-color-blue"><a href="#publikasi" class="fg-color-white"><i class="icon-bookmark-4"></i>Scientific Publications</a></li>
                                                   <!-- <li class=" bg-flower bg-color-blue"><a href="#pengajaran" class="fg-color-white"><i class="icon-printer"></i>Teaching/Materials</a></li> -->
                                                    <li class=" bg-flower bg-color-blue"><a href="#penelitian" class="fg-color-white"><i class="icon-laptop"></i>Research (PPM)</a></li>
                                                    <li class=" bg-flower bg-color-blue"><a href="#penghargaan" class="fg-color-white"><i class="icon-cube fg-color-white"></i>Awards</a></li>
													<li>
														<select id="selectType" onchange="changeType()">
															<option>International</option>
															<option>National</option>
															<option>Accreditation</option>
															<option>Non Accreditation</option>
														</select>
													</li>
												</ul>
                                                
                                                <div class="frames">
                                                    <div class="frame active" id="publikasi">
													
                                                        <div class="grid">          
                                               <div class="page-control span8" data-role="page-control">
                                                <span class="menu-pull "></span>
                                                <div class="menu-pull-bar "></div>
                                                   <ul class="bg-flower bg-color-blue">
                                                    <!--<li class="active bg-flower bg-color-blue"><a href="#intJournals" class="fg-color-white">Int. Journals</a></li>
													<li class="bg-flower bg-color-blue"><a href="#accJournals" class="fg-color-white">Accre. Journals</a></li>
                                                    --><li class="bg-flower bg-color-blue active"><a href="#journals" class="fg-color-white">Journals</a></li>
                                                    <!--<li class=" bg-flower bg-color-blue"><a href="#intConference" class="fg-color-white">Int. Conference</a></li>
													--><li class="bg-flower bg-color-blue"><a href="#conference" class="fg-color-white">Conference</a></li>
                                                    <li class=" bg-flower bg-color-blue"><a href="#magazine" class="fg-color-white">Magazine / Book</a></li>
                                                    <li class=" bg-flower bg-color-blue"><a href="#unknown" class="fg-color-white">Not defined</a></li>
                              
                                                </ul>
                                                
                                                
                                                <div class="frames">
                                                    <div class="frame active" id="journals" >
														<div id="jourNonAccre" style="display:none;">
                                                            <?php $i=1; $found = 0; 
															if($publikasi) 
															foreach($publikasi as $rows){{
                                                                if($rows->Media_publikasi == 'E' || $rows->Media_publikasi == 'F' || $rows->Media_publikasi == 'G') 
																{ 
																	$found = 1;
																	$color = 'black';
																	if($rows->Media_publikasi == 'E') {
																	
                                                                ?>
                                                                 <div class="row">
                                                                    <div class="span0 left-span" ><?php  echo $i++.". ";  ?> </div>
																	<style>
																		.linkPub:hover
																		{
																			color:red !important;
																		}
																	</style>
                                                                    <div class="span6-1 left-span" style=""><a href="<?php echo base_url()?>index.php/welcome/pub_detail/<?php echo $rows->Kode_publikasi_dosen_tetap; ?>"  ><span  class="linkPub" style="color:<?php echo $color;?>;"><?php if($rows->Pengarang) echo $rows->Pengarang.",  ";if($rows->Judul_penelitian) echo "<i class=\"linkpub\">".$rows->Judul_penelitian."</i>"; echo ", ".$rows->Periode_penelitian;?></span></a></div>
                                                                    
                                                                </div> 
                                                            
                                                                
                                                            
                                                            <?php 
																	}
																}
																
																}
                                                            } 
                                                            
                                                           
                                                             if($found == 0) { ?>
                                                            <div class="row">
                                                                    <div class="span7" style="text-align: center"> - No scientific publications recorded. -</div>
                                                                    
                                                                </div>
                                                                
                                                                <?php }
                                                                ?>
                                                         </div> 
														<div id="jourAccre" style="display:none;">
                                                            <?php $i=1; $found = 0; 
															if($publikasi) 
															foreach($publikasi as $rows){{
                                                                if($rows->Media_publikasi == 'E' || $rows->Media_publikasi == 'F' || $rows->Media_publikasi == 'G') 
																{ 
																	$found = 1;
																	$color = 'black';
																	if($rows->Media_publikasi == 'F') {
																	
                                                                ?>
                                                                 <div class="row">
                                                                    <div class="span0 left-span" ><?php  echo $i++.". ";  ?> </div>
                                                                    <div class="span6-1 left-span" style=""><a class="linkPub" href="<?php echo base_url()?>index.php/welcome/pub_detail/<?php echo $rows->Kode_publikasi_dosen_tetap; ?>"  ><span style="color:<?php echo $color;?>;"><?php if($rows->Pengarang) echo $rows->Pengarang.",  ";if($rows->Judul_penelitian) echo "<i>".$rows->Judul_penelitian."</i>"; echo ", ".$rows->Periode_penelitian;?></span></a></div>
                                                                    
                                                                </div> 
                                                            
                                                                
                                                            
                                                            <?php 
																	}
																}
																
																}
                                                            } 
                                                            
                                                           
                                                             if($found == 0) { ?>
                                                            <div class="row">
                                                                    <div class="span7" style="text-align: center"> - No scientific publications recorded. -</div>
                                                                    
                                                                </div>
                                                                
                                                                <?php }
                                                                ?>
                                                         </div> 
														<div id="jourInt" >
                                                            <?php $i=1; $found = 0; 
															if($publikasi) 
															foreach($publikasi as $rows){{
                                                                if($rows->Media_publikasi == 'E' || $rows->Media_publikasi == 'F' || $rows->Media_publikasi == 'G') 
																{ 
																	$found = 1;
																	$color = 'black';
																	if($rows->Media_publikasi == 'G') {
																	
                                                                ?>
                                                                 <div class="row">
                                                                    <div class="span0 left-span" ><?php  echo $i++.". ";  ?> </div>
                                                                    <div class="span6-1 left-span" style=""><a class="linkPub" href="<?php echo base_url()?>index.php/welcome/pub_detail/<?php echo $rows->Kode_publikasi_dosen_tetap; ?>"  ><span style="color:<?php echo $color;?>;"><?php if($rows->Pengarang) echo $rows->Pengarang.",  ";if($rows->Judul_penelitian) echo "<i>".$rows->Judul_penelitian."</i>"; echo ", ".$rows->Periode_penelitian;?></span></a></div>
                                                                    
                                                                </div> 
                                                            
                                                                
                                                            
                                                            <?php 
																	}
																}
																
																}
                                                            } 
                                                            
                                                           
                                                             if($found == 0) { ?>
                                                            <div class="row">
                                                                    <div class="span7" style="text-align: center"> - No scientific publications recorded. -</div>
                                                                    
                                                                </div>
                                                                
                                                                <?php }
                                                                ?>
                                                         </div>       
                                                    </div>
                                                    <div class="frame" id="conference">
                                                        <div id="natConference" style="display:none">
                                                            <?php $i=1; $found = 0; if($publikasi) foreach($publikasi as $rows){{
                                                                if($rows->Media_publikasi == 'B' || $rows->Media_publikasi == 'C' || $rows->Media_publikasi == 'D') {
																	if($rows->Media_publikasi == 'B') {
																$found = 1;
                                                                $color = 'black';
																?>
                                                                 <div class="row">
                                                                    <div class="span0 left-span"><?php  echo $i++.". "; ?> </div>
                                                                    <div class="span6-1 left-span"><a href="<?php echo base_url()?>index.php/welcome/pub_detail/<?php echo $rows->Kode_publikasi_dosen_tetap; ?>"> <span style="color:<?php echo $color;?>"><?php if($rows->Pengarang) echo $rows->Pengarang."  ";if($rows->Judul_penelitian) echo "<i>".$rows->Judul_penelitian."</i>"; echo ", ".$rows->Periode_penelitian;   ?></span></a></div>
                                                                    
                                                                </div>
                                                            
                                                                
                                                            
                                                           <?php 
																		}
																	}
																} 
															}
                                                           
                                                            
                                                              if($found == 0) { ?>
                                                            <div class="row">
                                                                    <div class="span7" style="text-align: center"> - No scientific publications recorded. -</div>
                                                                    
                                                                </div>
                                                                
                                                                <?php }
                                                            ?>
                                                                
                                                        </div> 

														<div id="intConference" >
                                                            <?php $i=1; $found = 0; if($publikasi) foreach($publikasi as $rows){{
                                                                if($rows->Media_publikasi == 'B' || $rows->Media_publikasi == 'C' || $rows->Media_publikasi == 'D') {
																	if($rows->Media_publikasi == 'C') {
																$found = 1;
                                                                $color = 'black';
																?>
                                                                 <div class="row">
                                                                    <div class="span0 left-span"><?php  echo $i++.". "; ?> </div>
                                                                    <div class="span6-1 left-span"><a href="<?php echo base_url()?>index.php/welcome/pub_detail/<?php echo $rows->Kode_publikasi_dosen_tetap; ?>"> <span style="color:<?php echo $color;?>"><?php if($rows->Pengarang) echo $rows->Pengarang."  ";if($rows->Judul_penelitian) echo "<i>".$rows->Judul_penelitian."</i>"; echo ", ".$rows->Periode_penelitian;   ?></span></a></div>
                                                                    
                                                                </div>
                                                            
                                                                
                                                            
                                                           <?php 
																		}
																	}
																} 
															}
                                                           
                                                            
                                                              if($found == 0) { ?>
                                                            <div class="row">
                                                                    <div class="span7" style="text-align: center"> - No scientific publications recorded. -</div>
                                                                    
                                                                </div>
                                                                
                                                                <?php }
                                                            ?>
                                                                
                                                        </div>
														
                                                    </div>
                                                    <div class="frame" id="magazine">
                                                        
                                                            <?php $i=1; $found = 0; if($publikasi) foreach($publikasi as $rows){{
                                                                if($rows->Media_publikasi == 'A') { $found = 1;
                                                                ?>
                                                                 <div class="row">
                                                                    <div class="span0 left-span"><?php  echo $i++.". "; ?> </div>
                                                                    <div class="span6-1 left-span"><a href="<?php echo base_url()?>index.php/welcome/pub_detail/<?php echo $rows->Kode_publikasi_dosen_tetap; ?>"><span style="color:<?php echo $color;?>"> <?php if($rows->Pengarang) echo $rows->Pengarang."  "; if($rows->Judul_penelitian) echo "<i style=\"color:".$color."\">".$rows->Judul_penelitian."</i>"; echo ", ".$rows->Periode_penelitian;   ?></span></a></div>
                                                                    
                                                                </div>
                                                            
                                                              
                                                            
                                                           <?php 
                                                                }
                                                            } }
                                                            
                                                           
                                                             if($found == 0) { ?>
                                                            <div class="row">
                                                                    <div class="span7" style="text-align: center"> - No scientific publications recorded. -</div>
                                                                    
                                                                </div>
                                                                
                                                                <?php }
                                                            ?>
                                                                
                                                            
                                                    </div>
                                                    <div class="frame" id="unknown">
                                                        
                                                            <?php $i=1; $found = 0; if($publikasi) foreach($publikasi as $rows){{
                                                                if(!$rows->Media_publikasi) { 
																$found = 1;
                                                                $color = 'black';
																?>
                                                                 <div class="row">
                                                                    <div class="span0 left-span"><?php  echo $i++.". "; ?> </div>
                                                                    <div class="span6-1 left-span"><a href="<?php echo base_url()?>index.php/welcome/pub_detail/<?php echo $rows->Kode_publikasi_dosen_tetap; ?>"> <span style="color:<?php echo $color;?>"><?php if($rows->Pengarang) echo $rows->Pengarang."  ";if($rows->Judul_penelitian) echo "<i style=\"color:".$color."\">".$rows->Judul_penelitian."</i>"; ?></span></a></div>
                                                                    
                                                                </div>
                                                            
                                                            <?php 
                                                                }
                                                            } }
                                                             if($found == 0) { ?>
                                                            <div class="row">
                                                                    <div class="span7" style="text-align: center"> - No scientific publications recorded. -</div>                
                                                                </div>
                                                                <?php }
                                                            ?>
                                                                
                                                            
                                                    </div>
                                                </div>
                                                    
                                               </div>
                                              </div>
                                                    </div>
                                                    <div class="frame" id="pengajaran">
                                                        <div class="span8 center-span bg-flower bg-color-blue" style="border: 1px #ccc solid;">
                                                            <div class="span8" >
                                                            <h2 class="fg-color-white">&nbsp;Teaching Topics</h2>
                                                            </div>
                                                        </div>
                                                        <div class="grid">
                                                            <?php if($pengajaran) foreach($pengajaran as $rows){{ ?>
                                                                 <div class="row">
                                                                    <div class="span7 left-span"><?php echo $rows->nama_kualifikasi; ?> </div>
                                                                    
                                                                </div>
                                                            
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                            
                                                            <?php } }
                                                            else 
                                                            {
                                                            ?>
                                                                 <div class="row">
                                                                    <div class="span8" style="text-align: center"> - Not defined -</div>
                                                                </div>
                                                            
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                             <?php }
                                                            ?>
                                                                
                                                            </div>
                                                        <div class="span8 center-span bg-flower bg-color-blue" style="border: 1px #ccc solid;">
                                                            <div class="span8" >
                                                            <h2 class="fg-color-white">&nbsp;Materials</h2>
                                                            </div>
                                                        </div>
                                                        <div class="grid">
                                                            <?php if($materi) foreach($materi as $rows){{ ?>
                                                                 <div class="row">
                                                                    <div class="span6"><?php echo $rows->Nama; ?> </div>
                                                                    <div class="span1-1 right-span">
                                                                        <?php if((file_exists(FCPATH.'assets/files/materials/'.$rows->URL.''))&&$rows->Kategori=='m'||$rows->Kategori=='l') {?>
                                                                        <a href="<?php if($rows->Kategori=='l') echo $rows->URL; else {
                                                                            if(file_exists(FCPATH.'assets/files/materials/'.$rows->URL.'')) 
                                                                                    echo base_url().'assets/files/materials/'.$rows->URL; }?> ">
                                                                    Detail</a>
                                                                            <?php } else {?>- File not found -<?php }?>
                                                                    </div>
                                                                </div>
                                                               
                                                            
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                            
                                                            <?php } }
                                                            else 
                                                            {
                                                            ?>
                                                                 <div class="row">
                                                                    <div class="span8" style="text-align: center"> - Material not found -</div>
                                                                </div>
                                                            
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                             <?php }
                                                            ?>
                                                                
                                                            </div>
                                                    </div>
                                                    <div class="frame" id="penelitian">
                                                        
                                                        <div class="span8 center-span bg-flower bg-color-blue" style="border: 1px #ccc solid;">
                                                            <div class="span8" >
                                                            <h2 class="fg-color-white">&nbsp;Research</h2>
                                                            </div>
                                                        </div>
                                                        <div class="grid">
                                                            <?php $i=1; if($penelitian){ foreach($penelitian as $rows){ ?>
                                                                <div class="row">
																<div class="span0 left-span"><?php  echo $i++.". "; ?> </div>
                                                                    <div class="span7 left-span"> <a href="<?php echo base_url()?>index.php/welcome/pub_detail/<?php echo $rows->Kode_publikasi_dosen_tetap; ?>"><?php echo $rows->Judul_penelitian; ?></a></div>
                                                                </div>
                                                            
                                                                
                                                            <?php }} else 
                                                            {
                                                            ?>
                                                                 <div class="row">
                                                                     <div class="span8" style="text-align: center"> - No researchs recorded. -</div>
                                                                </div>
																<div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                               
                                                             <?php }
                                                            ?>
                                                         </div>
                                                        <div class="span8 center-span bg-flower bg-color-blue" style="border: 1px #ccc solid;">
                                                            <div class="span8" >
                                                            <h2 class="fg-color-white">&nbsp;Social Responbility</h2>
                                                            </div>
                                                        </div>
														<div class="grid">      
											
															<div class="page-control span8" data-role="page-control">
											   
															<span class="menu-pull "></span>
																<div class="menu-pull-bar "></div>
																   
																   <ul class="bg-flower bg-color-blue" style = "margin-top: -3px">
																   
																	<li class="active bg-flower bg-color-blue"><a href="#SrMin" class="fg-color-white"><i class="icon-laptop"></i><?php echo " ... - ".$minTahun; ?></a></li>
																	<li class=" bg-flower bg-color-blue"><a href="#RangeSr" class="fg-color-white"><i class="icon-laptop"></i><?php echo $rangeTahun1." - ".$rangeTahun2; ?></a></li>
																	<li class=" bg-flower bg-color-blue"><a href="#SrMax" class="fg-color-white"><i class="icon-laptop"></i><?php echo $maxTahun." - ..."; ?></a></li>
																	<li class=" bg-flower bg-color-blue"><a href="#unknownSr" class="fg-color-white"><i class="icon-laptop"></i>Not defined</a></li>
											  
																</ul>
                                                
                                                
														<div class="frames">
															<div class="frame active" id="SrMin">

                                                            <?php $i=1; $found = 0; if($pengabdian) foreach($pengabdian as $rows){{
                                                                if($rows->tahun && $rows->tahun <= $rangeTahun1) { $found = 1;
                                                                ?>
                                                                 <div class="row">
                                                                    <div class="span0 left-span"><?php  echo $i++.". ";  ?> </div>
                                                                    <div class="span6-1 left-span"><?php if($rows->nama) echo $rows->nama;   ?></a></div>
                                                                    
                                                                </div>
                                                            
                                                                
                                                            
                                                            <?php 
                                                                }
                                                            } }
                                                            
                                                           
                                                             if($found == 0) { ?>
                                                            <div class="row">
                                                                    <div class="span7" style="text-align: center"> - No Social Responsibility Recorded. -</div>
                                                                    
                                                                </div>
                                                                
                                                                <?php }
                                                                ?>
                                                                
                                                    </div>
                                                    <div class="frame" id="RangeSr">
                                                        
                                                            <?php $i=1; $found = 0; if($pengabdian) foreach($pengabdian as $rows){{
                                                                if($rows->tahun && ($rows->tahun >= $rangeTahun1 && $rows->tahun <= $rangeTahun2)) { $found = 1;
                                                                ?>
                                                                 <div class="row">
                                                                    <div class="span0 left-span"><?php  echo $i++.". "; ?> </div>
                                                                    <div class="span6-1 left-span"><?php if($rows->nama) echo $rows->nama; ?></a></div>
                                                                    
                                                                </div>
                                                            
                                                                
                                                            
                                                           <?php 
                                                                }
                                                            } }
                                                           
                                                            
                                                              if($found == 0) { ?>
                                                            <div class="row">
                                                                    <div class="span7" style="text-align: center"> - No Social Responsibility Recorded. -</div>
                                                                    
                                                                </div>
                                                                
                                                                <?php }
                                                            ?>
                                                                
                                                            
                                                    </div>
                                                    <div class="frame" id="SrMax">
                                                        
                                                            <?php $i=1; $found = 0; if($pengabdian) foreach($pengabdian as $rows){{
                                                                if($rows->tahun && $rows->tahun >= $maxTahun) { $found = 1;
                                                                ?>
                                                                 <div class="row">
                                                                    <div class="span0 left-span"><?php  echo $i++.". "; ?> </div>
                                                                    <div class="span6-1 left-span"> <?php if($rows->nama) echo $rows->nama; ?></a></div>
                                                                    
                                                                </div>
                                                            
                                                              
                                                            
                                                           <?php 
                                                                }
                                                            } }
                                                            
                                                           
                                                             if($found == 0) { ?>
                                                            <div class="row">
                                                                    <div class="span7" style="text-align: center"> - No Social Responsibility Recorded. -</div>
                                                                    
                                                                </div>
                                                                
                                                                <?php }
                                                            ?>
                                                                
                                                            
                                                    </div>
                                                    <div class="frame" id="unknownSr">
                                                        
                                                            <?php $i=1; $found = 0; if($pengabdian) foreach($pengabdian as $rows){{
                                                                if(!$rows->tahun) { $found = 1;
                                                                ?>
                                                                 <div class="row">
                                                                    <div class="span0 left-span"><?php  echo $i++.". "; ?> </div>
                                                                    <div class="span6-1 left-span"><?php if($rows->nama) echo $rows->nama; ?></a></div>
                                                                    
                                                                </div>
                                                            
                                                            <?php 
                                                                }
                                                            } }
                                                             if($found == 0) { ?>
                                                            <div class="row">
                                                                    <div class="span7" style="text-align: center"> - No Social Responsibility Recorded. -</div>                
                                                                </div>
                                                                <?php }
                                                            ?>
                                                                
                                                            
                                                    </div>
                                                </div>
                                                    
                                               </div>
                                              </div>
														<!--
                                                        <div class="grid">
                                                            <?php if($pengabdian){ foreach($pengabdian as $rows){ ?>
                                                                <div class="row">
                                                                    <div class="span1-1 left-span"><?php if($rows->tahun && $rows->tahun!='    ') echo $rows->tahun; else echo '- Not defined -'; ?> </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span5 left-span"> <?php if($rows->nama) echo $rows->nama; ?></div>
                                                                </div>
                                                            
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                            <?php } }
                                                            else 
                                                            {
                                                            ?>
                                                                 <div class="row">
                                                                    <div class="span8" style="text-align: center"> - No social responbility recorded -</div>
                                                                </div>
                                                            
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                             <?php }
                                                            ?>
                                                                
                                                            </div> -->
															
														<div class="span8 center-span bg-flower bg-color-blue" style="border: 1px #ccc solid;">
                                                            <div class="span8" >
                                                            <h2 class="fg-color-white">&nbsp;Student Thesis</h2>
                                                            </div>
                                                        </div>
														<div class="grid">
															<div class="page-control span8" data-role="page-control">
												   
																<span class="menu-pull "></span>
																<div class="menu-pull-bar "></div>
													   
															<ul class="bg-flower bg-color-blue" style = "margin-top: -3px">
																<li class="active bg-flower bg-color-blue"><a href="#graduate" class="fg-color-white"><i class="icon-laptop"></i>Graduate</a></li>
																<li class=" bg-flower bg-color-blue"><a href="#underGraduate" class="fg-color-white"><i class="icon-laptop"></i>Under Graduate</a></li>
															</ul>
															
															<div class="frames">
																<div class="frame active" id="graduate">
																	<?php
																		$i=1;
																		if($skripsi){ foreach($skripsi as $rows){ 
																			if($rows->nim[4] == 2) {?>
																			<div class="row">
																				<div class="span1 left-span"><?php echo $i++.". "; ?> </div>
																				<div class="span6 left-span"> <?php echo $rows->Nama_mahasiswa.", ";echo "<i>".$rows->judul_skripsi_en_penuh."</i>"; ?></div>
																			</div>
																	
																		<!--<div class="row">
																			<div class="span7 bg-color-blueDark" style="float: right;"></div>
																		</div>-->
																	<?php } 
																		} 
																	
																	if($i==1) 
																	{ 
																	?>
																		<div class="row">
																			<div class="span8" style="text-align:center">- No student thesis recorded -</div>
																		</div>
																		
																	<?php 
																	}
																	}
																	else
																	{
																	?>
																		 <div class="row">
																			<div class="span8" style="text-align: center"> - No student thesis recorded -</div>
																		</div>
																	
																		<div class="row">
																			<div class="span8 bg-color-blueDark" style="float: right;"></div>
																		</div>
																	 <?php }
																	?>
																		
																	</div>
																	<div class="frame" id="underGraduate">
																	<?php
																		$i=1;
																		if($skripsi){ foreach($skripsi as $rows){ 
																			if($rows->nim[4] == 1) {?>
																			<div class="row">
																				<div class="span1 left-span"><?php echo $i++.". "; ?> </div>
																				<div class="span6 left-span"> <?php echo $rows->Nama_mahasiswa.", ";echo "<i>".$rows->judul_skripsi_en_penuh."</i>"; ?></div>
																			</div>
																	
																		<!--<div class="row">
																			<div class="span7 bg-color-blueDark" style="float: right;"></div>
																		</div>-->
																	<?php } 
																		} 
																	
																	if($i==1) 
																	{ 
																	?>
																		<div class="row">
																			<div class="span8" style="text-align:center">- No student thesis recorded-</div>
																		</div>
																		
																	<?php 
																	}
																	}
																	else
																	{
																	?>
																		 <div class="row">
																			<div class="span8" style="text-align: center"> - No student thesis recorded -</div>
																		</div>
																	
																		<div class="row">
																			<div class="span8 bg-color-blueDark" style="float: right;"></div>
																		</div>
																	 <?php }
																	?>
																		
																	</div>
																</div>
															
															</div>
                                                        </div>	
															
															
															
															
															
                                                    </div>
                                                    <div class="frame" id="penghargaan">
                                                         <div class="span8 center-span bg-flower bg-color-blue" style="border: 1px #ccc solid;">
                                                            <div class="span8" >
                                                            <h2 class="fg-color-white">&nbsp;Awards</h2>
                                                            </div>
                                                        </div>
                                                        <div class="grid">
                                                            <?php if($penghargaan){ foreach($penghargaan as $rows){ ?>
                                                                <div class="row">
                                                                    <div class="span1-1 left-span"><?php if($rows->tahun) echo $rows->tahun; else echo 'Tidak diketahui'; ?> </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span5 left-span"> <?php if($rows->nama) echo $rows->nama; ?></div>
                                                                </div>
                                                            
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                            <?php }}
                                                           else 
                                                            {
                                                            ?>
                                                                 <div class="row">
                                                                    <div class="span8" style="text-align: center"> - No awards recorded. -</div>
                                                                </div>
                                                            
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                             <?php }
                                                            ?>
                                                                
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
			</form>
        </div>
    </div>

    <div class="span-sparate"></div></div>
</div>
</div>

<script>
	
	
	
	function changeType()
	{
		
		var myList = document.getElementById("selectType").options;
		var index = document.getElementById("selectType").selectedIndex;
		
		if(myList[index].text == "National")
		{
			document.getElementById("jourInt").style.display = 'none';
			document.getElementById("jourAccre").style.display = 'inline';
			document.getElementById("jourNonAccre").style.display = 'none';
			document.getElementById("intConference").style.display = 'none';
			document.getElementById("natConference").style.display = 'inline';
		}
		
		else if(myList[index].text == "International")
		{
			document.getElementById("jourInt").style.display = 'inline';
			document.getElementById("jourAccre").style.display = 'none';
			document.getElementById("jourNonAccre").style.display = 'none';
			document.getElementById("intConference").style.display = 'inline';
			document.getElementById("natConference").style.display = 'none';
		}
		
		else if(myList[index].text == "Accreditation")
		{
			document.getElementById("jourInt").style.display = 'none';
			document.getElementById("jourAccre").style.display = 'inline';
			document.getElementById("jourNonAccre").style.display = 'none';
		}
		
		else if(myList[index].text == "Non Accreditation")
		{
			document.getElementById("jourInt").style.display = 'none';
			document.getElementById("jourAccre").style.display = 'none';
			document.getElementById("jourNonAccre").style.display = 'inline';
		}
		
		
		
		
	}
</script>












