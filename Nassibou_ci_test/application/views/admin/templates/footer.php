<!--footer-->
<div class="footer">
    <div class="footer-grids">
        <div class="container">
            <div class="col-md-3 footer-grid">
                <h4>Services</h4>
                <ul>
                    <?php foreach ($menus_bas_col1 as $mon_menu): ?>
                        <?php if ($mon_menu['hyperlien'] == ''): ?>
                            <li><a href="<?php echo base_url(); ?>index.php/admin/pages/<?php echo $mon_menu['idPage']; ?>"><?php echo $mon_menu['menu']; ?></a></li>
                        <?php else: ?>
                            <li class="active"><a><?php echo $mon_menu['menu']; ?></a></li>
                        <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>Informations</h4>
                <ul>
                    <?php foreach ($menus_bas_col2 as $mon_menu): ?>
                        <?php if ($mon_menu['hyperlien'] == ''): ?>
                            <li><a href="<?php echo base_url(); ?>index.php/admin/pages/<?php echo $mon_menu['idPage']; ?>"><?php echo $mon_menu['menu']; ?></a></li>
                        <?php else: ?>
                            <li class="active"><a><?php echo $mon_menu['menu']; ?></a></li>
                        <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>Plus de détails</h4>
                <ul>
                    <?php foreach ($menus_bas_col3 as $mon_menu): ?>
                        <?php if ($mon_menu['hyperlien'] == ''): ?>
                            <li><a href="<?php echo base_url(); ?>index.php/admin/pages/<?php echo $mon_menu['idPage']; ?>"><?php echo $mon_menu['menu']; ?></a></li>
                        <?php else: ?>
                            <li class="active"><a><?php echo $mon_menu['menu']; ?></a></li>
                        <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="col-md-3 footer-grid contact-grid">
                <h4>Contactez-nous</h4>
                <ul>
                    <li><span class="c-icon1"> </span><label contenteditable="true" onblur="updateSiteMeta('email', $(this).text())"><?php echo $meta_email['meta_value']; ?></label></li>
                    <li><span class="c-icon2"> </span><label contenteditable="true" onblur="updateSiteMeta('telephone', $(this).text())"><?php echo $meta_phone['meta_value']; ?></label></li>
                </ul>
                <!--ul class="social-icons">
                    <li><a href="#"><span class="facebook"> </span></a></li>
                    <li><a href="#"><span class="twitter"> </span></a></li>
                    <li><a href="#"><span class="thumb"> </span></a></li>
                </ul-->
            </div>
            <div class="clearfix"></div>
       </div>
   </div>
</div>
<div class="copy">
    <p>
    Copyright &copy; <?php echo date("Y"); ?> | Design by <a href="http://www.about.me/donnat">Donnat Josephin</a> (<a href="http://www.dna-webhosting.com">Dna-webhosting</a>)</p>
</div>
<!--footer-->


<script>
    /*
     * MODIFICATION DU CONTENU D'UNE PAGE
     * ----------------------------------
     */
    $('.contenu').blur(function(){
        $.post("<?php echo base_url(); ?>index.php/admin/modifiercontenu", 
            { 
                idPage: $('#idPage').val(),
                contenu: $('#contenu').html()
            },
            function(data)
            {
                message_info_save(data)
            }
        );
    });
    /*
     * FIN MODIFICATION CONTENU
     */
    /*
     * MODIFICATION DU TITRE DE LA PAGE
     * --------------------------------
     */
    $('.titre').blur(function(){
        $.post("<?php echo base_url(); ?>index.php/admin/modifiertitre", 
            { 
                idPage: $('#idPage').val(),
                titre: $('#titre').text()
            },
            function(data)
            {
               message_info_save(data);
            }
        );
    });
    /*
     * MODIFICATION DU SITEMETA
     * --------------------------------
     */
    function updateSiteMeta(meta_key, meta_value) {
        $.post("<?php echo base_url(); ?>index.php/admin/modifierMeta", 
            { 
                meta_key: meta_key,
                meta_value: meta_value
            },
            function(data)
            {
               message_info_save(data);
            }
        );
    };
    
    /*
     * Function init message info sur enregistrement
     */
    function message_info_save(data) {
        $('#message-info').html(data);
        setTimeout(function(){
            $('#message-info').html('');
        }, 3000)
    }
    
</script>

</body>
</html>