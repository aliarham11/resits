 <div class="page-region">
            <div class="page-region-content">
                <form method="get" action="<?php echo base_url().'index.php/welcome/search/?';?>" >
                <div class="grid">
                    <div class="row">
                        <div class=" span9 bg-color-blue fg-color-white bg-flower shadow-two">
                            <div class="span9 inner">
                                <div class="span6">
                                <p style="text-align: justify"><?php echo $this->breadcrumb->show(); ?></p>
                                </div>
                                <div class="span3" style="text-align: right; margin-top: 8px;">
                                        <input type="hidden" name="type" value="<?php echo $type?>" />
                                        <input type="hidden" name="major" value="<?php echo $major?>" />
                                        <input type="hidden" name="resarea" value="<?php echo $resarea?>" />
										<input type="hidden" name="exparea" value="<?php echo $exparea?>" />
										<input type="hidden" name="search" value="<?php echo $search?>" />
                                        <input value="<?php if($name) echo $name;?>" style="height: 27px; margin-right: 8px;" name="name" placeholder="Search by name" type="text" onkeydown="if (event.keyCode == 13) { this.form.submit(); return false; }"/>
                                        
                                </div>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span9 bg-color-blueDark"></div>
                    </div>
                    <div class="row">
                        <div class="span9">
                            <div class="span1" style="margin-top: 5px;">Status :</div>
                            <div class="span2" >
                                <label class="input-control checkbox span2">
                                  <div class="input-control select" >
                                        <select name="status" onchange="this.form.submit()">
                                            <option value="all">All</option>
                                            <option value="aktif" <?php if ($status == 'aktif') echo ' selected="selected"'; ?>>Aktif</option>
                                            <option value="pensiun" <?php if ($status == 'pensiun') echo ' selected="selected"'; ?>>Pensiun</option>
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
                <?php  if(1) { 
                $no=1;
                foreach($detail as $rows) {  ?>
                        <li class="span5 selected shadow-three <?php if(trim($rows->Nama_status) == "Pensiun") echo "bg-color-yellow"?>" style="width: 330px;">
                    <a href="<?php echo base_url()?>index.php/welcome/exp_detail/<?php echo $rows->Nip_lama_encrypt; ?>">
                        <div class='icon'>
                              <?php
							  //Dekripsi nip untuk mengambil foto berdasarkan nip lama.....
                              $CI =& get_instance();
                              $CI->load->library('encrypt');
                              $Decoded_nip = $CI->encrypt->decode($rows->Nip_lama,'MY KEY');
                              
							  //print_r(trim($rows->Nip_lama)); exit();
                             // echo file_exists(FCPATH .'assets/images/foto/'.trim($rows->Nip_lama).'.jpg'); 
                              if(file_exists(FCPATH.'assets/images/foto/'.trim($rows->Nip_lama).'.jpg')){?>
                                            <img  src="<?php echo base_url()?>assets/images/foto/<?php echo trim($rows->Nip_lama);?>.jpg" class="place-left"/>
                                            <?php }
                                                else{
                                            ?>
                                            <img src="<?php echo base_url()?>assets/images/no-photo.png" class="place-left"/>
                                             <?php 
                                             }
                                            ?>
                            </div>
                            <div class="data" style="height:155px;" >
                               
                                <p><h4> <?php echo $rows->Gelar_akademik_depan.$rows->Nama_dosen.$rows->Gelar_akademik_belakang;?><h4></p>
                                <div class="span2-1 bg-color-blueDark"></div>
                                <p><span><?php if($rows->Nama_jurusan) echo $rows->Nama_jurusan?> </span></p>
                                <p> #journals : <?php if($rows->journals!='') echo $rows->journals?></p>
                                <p> #conferences   : <?php if($rows->conferences!='') echo $rows->conferences?></p>
								
                            </div>
                            </a>
                        </li>
                     <?php   $no++;
                }  } ?>
                
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













