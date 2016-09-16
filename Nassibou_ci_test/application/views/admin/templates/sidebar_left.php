<!--contact-starts-->
<div class="contact">
    <div class="container">
        <div class="contact-bottom">

            <div class="col-md-4 contact-left heading">
                <h2>Contactez-nous</h2>
                <hr/>
                <div contenteditable="true" onblur="updateSiteMeta('contactleft', $(this).html())">
                    <?php echo $meta_contactleft['meta_value']; ?>
                </div>
                <hr/>
                <h2>Navigation</h2>
                <hr/>
                <div class="left-grid">
                <ul>
                    <?php foreach ($menus_bas_gauche as $mon_menu): ?>
                        <?php if ($mon_menu['hyperlien'] == ''): ?>
                            <li><a href="<?php echo base_url(); ?>index.php/admin/pages/<?php echo $mon_menu['idPage']; ?>"><?php echo $mon_menu['menu']; ?></a></li>
                        <?php else: ?>
                            <li class="active"><a><?php echo $mon_menu['menu']; ?></a></li>
                        <?php endif; ?>
                    <?php endforeach ?>
                            <li><a style="color:red;" href="<?php echo base_url(); ?>index.php/admin/account/">Modifier mon compte</a></li>
                </ul>
                </div>
            </div>