
            <div class="col-md-8 contact-right">
                <h2>Ajouter une page</h2>
                <hr/>
                <div class="col-md-12" id="message-info" style=""></div>
                <div class="col-md-12" style="">
                    <label>Titre de la page:</label>
                    <input id="titrepage" type="text" name="titrepage" value="" placeholder="Titre de la page" style=" border: solid 1px #1b87e3; margin-bottom: 10px;">
                </div>
                <div class="col-md-12">
                    <label>Contenu de la page:</label>
                    <div contenteditable="true" class="editable" id="contenupage" style="padding: 2px; min-height: 300px; border: solid 1px #1b87e3;">
                        
                    </div>
                </div>
                <div class="col-md-12" style="text-align: right">
                    <div class="submit-btn">
                        <input type="submit" value="ENREGISTRER LA PAGE" onclick="addNewPage()">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!----contact-end---->
<script type="text/javascript">

   function addNewPage(){
        $.post("<?php echo base_url(); ?>index.php/admin/addPage", 
            { 
                titre: $('#titrepage').val(),
                contenu: $('#contenupage').html()
            },
            function(data)
            {
               message_info_save(data);
               if (data='<div style="padding: 10px; background: #bdffa7; color: #0da01e; ">Enregistrement réussi!</div>')
                   location.reload();
            }
        );
    }
</script>