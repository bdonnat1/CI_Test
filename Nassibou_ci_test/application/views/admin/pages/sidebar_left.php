<!--contact-starts-->
<div class="contact">
    <div class="container">
        <div class="contact-bottom">

            <div class="col-md-4 contact-left heading">
                <h2>Les pages</h2>
                <hr/>
                <div class="left-grid">
                <ul>
                    <li style="padding-bottom: 10px; font-weight: bold"><a style="color:red;" href="<?php echo base_url(); ?>index.php/admin/nouveaupage">AJOUER UNE PAGE</a></li>
                    <?php foreach ($lespages as $mon_menu): ?>
                    <li style="border-bottom: solid 1px #eee">
                        <a href="<?php echo base_url(); ?>index.php/admin/lespages/<?php echo $mon_menu['idPage']; ?>">
                            <?php echo $mon_menu['titre']; ?>
                        </a>
                        <span style="position: absolute; right: 0px;">
                            [<a href="javascript:supprpage(<?php echo $mon_menu['idPage']; ?>)" style=" color: red;">suppr</a>]
                        </span>
                    </li>
                    <?php endforeach ?>
                </ul>
                </div>
            </div>
            
<script type="text/javascript">
    
   function supprpage(idPage){
        $.post("<?php echo base_url(); ?>index.php/admin/supprimerPage", 
            { 
                idpage: idPage
            },
            function(data)
            {
                location.reload();
            }
        );
    }
</script>