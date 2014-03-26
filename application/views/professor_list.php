
        <div class="page-region">
            <div class="page-region-content">
                <div class="grid">
                    <div class="row">
                        <div class="span9 bg-color-blueDark"></div>
                    </div>
                    <div class="row">
                        <div class="span9">
                            <div class="span4-7" style="font-size: medium;">Has 687 registered users</div>
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
                <?php if(count($detail) > 0) { ?>
                <?php
                foreach($detail as $rows) {
                    echo '<li class="span5 selected shadow-three">';
                        echo "<div class='icon'>";
                               echo ' <img src="'.base_url().'assets/images/myface.jpg" />';
                            echo "</div>";
                            echo '<div class="data">';
                                echo " <p>Aktif</p>";
                                echo " <p><h4>Prof. Dr. Ir. Herman Joha Huris<h4></p>";
                                echo '<div class="span2-1 bg-color-blueDark"></div>';
                                echo '<p><span> diana@if.its.ac.id </span></p>';
                                  echo " <p> Publikasi Ilmiah :". $rows['stok']."</p>";
                                  echo " <p> Publikasi Jurnal :". $rows['stok']."</p>";
                            echo "</div>";
                        echo "</li>";
                } ?>
                </table>
                <?php } ?>
                
                  </ul>
                        <div class="grid">
                    <div class="row">
                        <div class="span9 bg-color-blueDark"></div>
                    </div>
                    <div class="row">
                        <div class="span9">
                            <div class="span4-7"></div>
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
        </div>
        <div class="span-sparate" ></div>
            </div>
        <div class="row">
            <div class="span-sparate" ></div>
            <div class="span12 bg-color-blueDark">
            </div>
            <div class="span-sparate" ></div>
        </div>
        </div>
    </div>














