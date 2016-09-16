
            <div class="col-md-8 contact-right">
                <h2>Menu</h2>
                <hr/>
                <?php //print_r($menus); ?>
                <div class="col-md-12" id="message-info" style=""></div>
                <div class="col-md-12" style="">
                    <label>Titre du menu:</label>
                    <input id="nommenu" type="text" name="nommenu" value="<?php echo $menus[0]['menu']; ?>" placeholder="Nom du menu" style=" border: solid 1px #1b87e3; margin-bottom: 10px;">
                    <input id="idMenu" type="hidden" name="idMenu" value="<?php echo $menus[0]['idMenu']; ?>" placeholder="Nom du menu">
                </div>
                <div class="col-md-12" style="">
                    <label class="checkbox inline">Page du menu : </label>
                    <select name="idPage" id="idPage" style="width: 100%" <?php if ($menus[0]['hyperlien'] != '') echo "disabled"; ?>>
                        <?php foreach ($pages as $page): ?>
                        <?php 
                            if ($menus[0]['idPage'] == $page['idPage'])
                                echo '<option value="' . $page['idPage'] . '" selected>' . $page['titre'] . '</option>';
                            else
                                echo '<option value="' . $page['idPage'] . '">' . $page['titre'] . '</option>';
                        ?>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-md-12" style="">
                    <label class="checkbox inline">Emplacement du menu : </label>
                    <select name="idCategorie" id="idCategorie" style="width: 100%">
                        <?php foreach ($categories as $categorie): ?>
                        <?php 
                            //if ($categorie['idCategorie'] != '1') {
                                if ($menus[0]['idCategorie'] == $categorie['idCategorie'])
                                    echo '<option value="' . $categorie['idCategorie'] . '" selected>' . $categorie['categorie'] . '</option>';
                                else
                                    echo '<option value="' . $categorie['idCategorie'] . '">' . $categorie['categorie'] . '</option>';
                            //}
                        ?>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-md-12" style="text-align: right">
                    <div class="submit-btn">
                        <input type="submit" value="ENREGISTRER MODIFICATION" onclick="saveeditmenu()">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!----contact-end---->
<script type="text/javascript">

   function saveeditmenu(){
        $.post("<?php echo base_url(); ?>index.php/admin/updatemenu", 
            { 
                idMenu: $('#idMenu').val(),
                nommenu: $('#nommenu').val(),
                idPage: $('#idPage').val(),
                idCategorie: $('#idCategorie').val()
            },
            function(data)
            {
                //alert(data);
                location.reload();
            }
        );
    }
</script>