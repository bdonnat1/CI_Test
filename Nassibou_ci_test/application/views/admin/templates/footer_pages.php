<!--footer-->
<div class="footer">
        
</div>
<div class="copy">
    <p>Copyright &copy; <?php echo date("Y"); ?> | Design by <a href="http://www.about.me/donnat">Donnat Josephin</a> (<a href="http://www.dna-webhosting.com">Dna-webhosting</a>)</p>
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