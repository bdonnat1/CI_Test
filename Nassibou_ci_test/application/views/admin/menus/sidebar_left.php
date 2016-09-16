<!--contact-starts-->
<div class="contact">
    <div class="container">
        <div class="contact-bottom">

            <div class="col-md-4 contact-left heading">
                <h2>Les menus</h2>
                <hr/>
                <div class="left-grid">
                <ul>
                    <li style="padding-bottom: 10px; font-weight: bold"><a style="color:red;" href="<?php echo base_url(); ?>index.php/admin/nouveaumenu" >AJOUTER UN MENU</a></li>
                    <?php 
                        foreach ($lesmenus as $mon_menu): 
                            //if ($mon_menu['hyperlien'] == ''):
                    ?>
                    <li style="border-bottom: solid 1px #eee">
                        <a href="<?php echo base_url(); ?>index.php/admin/lesmenus/<?php echo $mon_menu['idMenu']; ?>">
                            <?php echo $mon_menu['menu']; ?>
                        </a>
                        <span style="position: absolute; right: 0px;">
                            [<a href="javascript:supprmenu(<?php echo $mon_menu['idMenu']; ?>)" style=" color: red;">suppr</a>]
                        </span>
                    </li>
                    <?php 
                            //endif;
                        endforeach;
                    ?>
                </ul>
                    
                </div>
            </div>
<script type="text/javascript">
    
   function supprmenu(idMenu){
        $.post("<?php echo base_url(); ?>index.php/admin/supprimerMenu", 
            { 
                idMenu: idMenu
            },
            function(data)
            {
                location.reload();
            }
        );
    }
</script>