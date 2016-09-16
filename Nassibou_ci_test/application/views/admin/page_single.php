
            <div class="col-md-8 contact-right">
                <div class="col-md-12" id="message-info" style=""></div>
                <div class="col-md-12" style="">
                    <h2>
                        <span contenteditable="true" id="titre" class="titre" ><?php echo $pages['titre']; ?></span>
                    </h2>
                    <hr/>
                    <input type="hidden" id="idPage" value="<?php echo $pages['idPage']; ?>">
                </div>
                <div class="col-md-12">
                    <div contenteditable="true" onchange="alert($(this).html())" class="editable contenu" id="contenu" title="DOUBLE CLIQUE POUR MODIFIER LE CONTENU" style="padding: 2px; min-height: 250px;">
                        <?php echo ($pages['contenu']); ?>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!----contact-end---->

