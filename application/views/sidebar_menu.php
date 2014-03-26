<div class="page secondary with-sidebar shadow">
    <div class="grid">
        <div class="row">
    <div class="span-sparate"></div>
    <div class="span12">
       <div class="page-sidebar bg-flower bg-color-blue">
            <ul >
			 <?php foreach($sidebar_fakultas as $fak) {  ?>
                            <li class="sticker sticker-color-blue bg-flower bg-color-blue" data-role="dropdown">
                                <a href="<?php echo base_url().'index.php/welcome/search/?type='.$type.'&search=0&resarea='.trim($fak->Nama_fakultas).''?>" class="fg-color-white"><?php echo $fak->Nama_fakultas_en;  ?></a>
                                <ul class=" sub-menu light">
								<?php foreach($sidebar_jurusan as $jur) { if($fak->Kode_fakultas==$jur->Kode_fakultas) { ?>
                                    <li class="dropdown  bg-color-white" data-role="dropdown">
                                        <a href="<?php echo base_url().'index.php/welcome/search/?type='.$type.'&search=0&resarea='.trim($fak->Nama_fakultas).'&major='.$jur->Nama_jurusan.''?>"><?php echo $jur->Nama_jurusan_en;  ?></a>
                                    </li>
                                   <?php } }  ?>

                                </ul>
                            </li>
                            
				<?php }  ?>
                        </ul>
        </div>

       