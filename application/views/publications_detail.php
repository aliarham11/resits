 <div class="page-region">
            <div class="page-region-content">
				<form method="get" action="<?php echo base_url().'index.php/welcome/search/?';?>" >
                <div class="grid">
				<div class="row">
                        <div class=" span9 bg-color-blue fg-color-white bg-flower shadow-two">
                            <div class="span6 inner">
                                <div class="span6">
                                <p style="text-align: justify"><?php echo $this->breadcrumb->show(); ?></p>
                                </div>
                                </div>
							<div class="span3" style="text-align: right; margin-top: 8px;">
								<input type="hidden" name="type" value="pub" />
								<input type="hidden" name="name" value="" />
                                <input type="hidden" name="major" value="" />
                                <input type="hidden" name="resarea" value="" />
                                <input type="hidden" name="journals" value="" />
								<input type="hidden" name="proceedings" value="" />
                                <input type="hidden" name="year" value="" />
                                <input type="hidden" name="thawal" value="" />
                                <input type="hidden" name="thakhir" value="" />
                                <input style="height: 27px; margin-right: 8px;" name="pubdes" placeholder="Search by title" type="text" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }"/>
                            </div>	
                        </div>
                    </div>
                   <div class="row">
                       <div class="span9">
                           <div class="tile shadow-three fives selected">
                                    <div class="tile-content">
                                        <div class="span9">
                                            <div class="page-control span8-1" data-role="page-control">
                                                
                                                <span class="menu-pull "></span>
                                                <div class="menu-pull-bar "></div>
                                                <ul class="bg-flower bg-color-blue">
                                                   <li class="active bg-flower bg-color-blue"><a href="#pengajaran" class="fg-color-white">Bibliographic Information  </a></li>
                                                 </ul>
                                                <div class="frames">
                                                    <div class="frame" id="pengajaran">
                                                       
                                                        
                                                        <div class="grid">
																<!--<div class="row">
                                                                    <div class="span1-1 left-span">Expert Name </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span5 left-span"> 
                                                                        <a href="<?php echo base_url()?>index.php/welcome/exp_detail/<?php echo $publikasi->Nip_lama_encrypt; ?>">
                                                                        <?php if($publikasi->Nama_dosen) echo $publikasi->Gelar_akademik_depan.$publikasi->Nama_dosen.$publikasi->Gelar_akademik_belakang; else echo '-';?>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
																-->
                                                                <div class="row">
                                                                    <div class="span1-1 left-span">Title </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span5 left-span"> <?php if($publikasi->Judul_penelitian) echo $publikasi->Judul_penelitian; else echo '-'; ?></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                                <!--<div class="row">
                                                                    <div class="span1-1 left-span" >Uploaded By</div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span5 left-span"> <?php if($publikasi->Nama_dosen) echo $publikasi->Gelar_akademik_depan.$publikasi->Nama_dosen.$publikasi->Gelar_akademik_belakang; else echo '-';?> </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
																-->
                                                                <div class="row">
                                                                    <div class="span1-1 left-span" >Authors </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span5 left-span"> 
																		<?php 
																			/*foreach($author as $rows)
																			{
																				echo $rows->nama_dosen." ";
																			}*/
																	if($publikasi->Pengarang) echo $publikasi->Pengarang; else echo '-';
																		?> 
																	</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span1-1 left-span" >Year </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span5 left-span"><?php if($publikasi->Periode_penelitian) {?>
																		<a href="<?php echo base_url().'index.php/welcome/search/?type=pub&year=custom&thawal='.$publikasi->Periode_penelitian.'&thakhir='.$publikasi->Periode_penelitian.''?>"><?php echo $publikasi->Periode_penelitian?></a>
																		<?php } else echo '-'; ?>
																	</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span1-1 left-span" >Published In </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span5 left-span">  <?php if($publikasi->Keterangan) echo $publikasi->Keterangan; else echo '-';?> </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span1-1 left-span" >Journal Type </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span5 left-span"> <?php if($publikasi->Nama_jenis_publikasi) echo $publikasi->Nama_jenis_publikasi; else echo '-';?> </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div
                                                                 <div class="row">
                                                                    <div class="span1-1 left-span" >External Link </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span5 left-span inner">
                                                                        <a href="<?php if($publikasi->Link_url) echo $publikasi->Link_url ?>"> <?php if($publikasi->Link_url) echo $publikasi->Link_url; else echo '-'; ?></a>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                                 <div class="row">
                                                                    <div class="span1-1 left-span" >Expertise Area </div>
                                                                    <div class="span-sparate">:</div>
																	<div class="span5 left-span"><?php if($publikasi->nama_kualifikasi) {?>
																		<a href="<?php echo base_url().'index.php/welcome/search/?type=pub&exparea='.$publikasi->nama_kualifikasi.''?>"><?php echo $publikasi->nama_kualifikasi?></a>
																		<?php } else echo '-'; ?>
																	</div>
																</div>
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
                                                                 <div class="row">
                                                                    <div class="span1-1 left-span" >Abstract </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div id="abstractPiece" class="span5 left-span" style="text-align: justify"> 
																	<?php 
																		$i=0;
																		$count=0;
																		if($publikasi->Abstrak) 
																		{	
																			while($count!=97)
																			{
																				if($publikasi->Abstrak[$i] == ' ')
																					$count++;
																			
																				echo $publikasi->Abstrak[$i];
																				$i++;
																			}	
																			echo '<a id="readMore" href="#abstractAll" onclick="showAll();return false" > ... [Read More]</a>';
																		}	
																		else echo '-'; 
																	?> 
																	</div>
																	<div id="abstractAll" class="span5 left-span" style="text-align: justify; display:none">
																	<?php if($publikasi->Abstrak)echo $publikasi->Abstrak;?>
																	</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
																<!--
                                                                 <div class="row">
                                                                    <div class="span1-1 left-span" >File </div>
                                                                    <div class="span-sparate">:</div>
                                                                    <div class="span5 left-span inner">
                                                                        <a href="<?php echo base_url().'assets/files/pub/'.$publikasi->Link_file ?>"> <?php if($publikasi->Link_file) echo '['.strtoupper(substr( $publikasi->Link_file, strpos( $publikasi->Link_file, "." ) + 1 )).']'; else echo '-'; ?></a>
                                                                    </div>
                                                                </div>
																<div class="row">
                                                                    <div class="span8 bg-color-blueDark" style="float: right;"></div>
                                                                </div>
																-->
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
    </div></div>
	
<script>
	function showAll()
	{
		document.getElementById("abstractPiece").style.display = 'none';
		document.getElementById("readMore").style.display = 'none';
		document.getElementById("abstractAll").style.display = 'inline';
	}
</script>	
	
	
	
