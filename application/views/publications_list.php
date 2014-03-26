        <div class="page-region">
            <div class="page-region-content">
                <form method="get" action="<?php echo base_url().'index.php/welcome/search/?';?>" >
                <div class="grid">
                    <div class="row">
                        <div class=" span9 bg-color-blue fg-color-white bg-flower shadow-two">
                            <div class="span6 inner">
                                <p style="text-align: justify"><?php echo $this->breadcrumb->show(); ?></p>
                            </div>
                            <div class="span3" style="text-align: right; margin-top: 8px;">
                                        <input type="hidden" name="type" value="<?php echo $type?>" />
										<input type="hidden" name="name" value="<?php echo $name?>" />
                                        <input type="hidden" name="major" value="<?php echo $major?>" />
                                        <input type="hidden" name="resarea" value="<?php echo $resarea?>" />
                                        <input type="hidden" name="journals" value="<?php echo $journals?>" />
										<input type="hidden" name="proceedings" value="<?php echo $proceedings?>" />
                                        <input type="hidden" name="year" value="<?php echo $year?>" />
                                        <input type="hidden" name="thawal" value="<?php if($thawal) echo $thawal?>" />
                                        <input type="hidden" name="thakhir" value="<?php if($thakhir) echo $thakhir?>" />
                                        <input value="<?php if($pubdes) echo $pubdes;?>" style="height: 27px; margin-right: 8px;" name="pubdes" placeholder="Search by title" type="text" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }"/>
                                        
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span9 bg-color-blueDark"></div>
                    </div>
                    <div class="row">
                        <div class="span9">
                            <div class="span1" style="margin-top: 5px;">Type :</div>
                            <div class="span2" >
                                <label class="input-control checkbox span2">
                                  <div class="input-control select" >
										<select name="medpub" onchange="this.form.submit()">
                                            <option value="all">All</option>
                                            <option value="A" <?php if ($medpub == 'A') echo ' selected="selected"'; ?>>Majalah Populer / Koran</option>
										    <option value="B" <?php if ($medpub == 'B') echo ' selected="selected"'; ?>>Seminar Nasional</option>
										    <option value="C" <?php if ($medpub == 'C') echo ' selected="selected"'; ?>>Seminar Internasional</option>
											<option value="D" <?php if ($medpub == 'D') echo ' selected="selected"'; ?>>Prosiding (ISBN)</option>
											<option value="E" <?php if ($medpub == 'E') echo ' selected="selected"'; ?>>Jurnal Nasional Belum Akreditasi</option>
											<option value="F" <?php if ($medpub == 'F') echo ' selected="selected"'; ?>>Jurnal Nasional Terakreditasi</option>
											<option value="G" <?php if ($medpub == 'G') echo ' selected="selected"'; ?>>Jurnal Internasional</option>
                                        </select>
										
                                    </div>
                                </label>
                            </div>
                            <div style="text-align: right;">
                                    <?php echo $this->pagination->create_links(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span9 bg-color-blueDark"></div>
                    </div>
                <div class="row">
                    <div class="span9">
                    <ul class="listview image">
                <?php if(count($detail) > 0) { 
                foreach($detail as $rows) { ?>
                    <li class="selected shadow-three" style="width:100%; min-height: 130px;">
                        <a href="<?php echo base_url()?>index.php/welcome/pub_detail/<?php echo $rows->Kode_publikasi_dosen_tetap; ?>" style="margin-left:6px; margin-bottom: 3px;" >
                        <div class='icon' style='margin-top:4px;'>
                            <?php if($rows->media_publikasi=='E'||$rows->media_publikasi=='F'||$rows->media_publikasi=='G') {?>
                                <img src="<?php echo base_url()?>assets/images/User-Files-icon.png" style="height: 50px;width: 50px; margin-left:12px; margin-top:6px; " />
                                <?php } else if($rows->media_publikasi=='B'||$rows->media_publikasi=='C'||$rows->media_publikasi=='D') {?>
                                <img src="<?php echo base_url()?>assets/images/User-Files-icon-3.png" style="height: 50px;width: 50px; margin-left:12px; margin-top:6px; " />
                                <?php } else{?>
								<img src="<?php echo base_url()?>assets/images/User-Files-icon-3.png" style="height: 50px;width: 50px; margin-left:12px; margin-top:6px; " />
                                <?php } ?>
								
                                <span style="padding: 13px;" class="font-1 fg-color-darken">Detail</span>
                            </div>
                        </a>
                            <div class="data" >
                                <a href="<?php echo base_url()?>index.php/welcome/exp_detail/<?php echo $rows->Nip_lama_encrypt; ?>" ><div class="span7 font-4"><p><?php echo $rows->Gelar_akademik_depan.' '. $rows->Nama_dosen.' '.$rows->Gelar_akademik_belakang;?></p></div></a>
                                <div class="span7"><p><?php if($rows->Periode_penelitian) echo $rows->Periode_penelitian.' - ';
                                if($rows->Judul_penelitian) echo $rows->Judul_penelitian;?></p></div>
                                <div class="span7 bg-color-blueDark"></div>
                                <p><span><a href="<?php echo base_url()?>index.php/welcome/search/?type=pub&major=<?php echo $rows->Nama_jurusan; ?>&resarea=<?php echo $rows->Nama_fakultas; ?>"><?php echo $rows->Nama_jurusan; ?></a> <?php if($rows->Nama_jurusan) echo ' - '; ?><a href="<?php echo base_url()?>index.php/welcome/search/?type=pub&resarea=<?php echo $rows->Nama_fakultas; ?>"> <?php echo $rows->Nama_fakultas;?></a></span></p>
                            </div>
                        </li><?php
                } } ?>
                
                  </ul>
                        <div class="grid">
                    <div class="row">
                        <div class="span9 bg-color-blueDark"></div>
                    </div>
                    <div class="row">
                        <div class="span9">
                            <div class="span4-7">Result <?php echo $countresult;?> of <?php echo $countall;?>  entries</div>
                            <div style="text-align: right;">
                                    <?php echo $this->pagination->create_links(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span9 bg-color-blueDark"></div>
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