<!--contact-starts-->
<div class="contact">
    <div class="container">
        <div class="contact-bottom">

            <div class="col-md-4 contact-left heading">
                <h2>Contactez-nous</h2>
                <hr/>
                <div>
                    <?php echo $meta_contactleft['meta_value']; ?>
                </div>
                <hr/>
                <h2>Navigation</h2>
                <hr/>
                <div class="left-grid">
                <ul>
                    <?php foreach ($menus_bas_gauche as $mon_menu): ?>
                        <?php if ($mon_menu['hyperlien'] == ''): ?>
                            <li><a href="<?php echo base_url(); ?>index.php/home/pages/<?php echo $mon_menu['idPage']; ?>"><?php echo $mon_menu['menu']; ?></a></li>
                        <?php else: ?>
                            <li><a href="<?php echo base_url(); ?>index.php/home/<?php echo $mon_menu['hyperlien']; ?>"><?php echo $mon_menu['menu']; ?></a></li>
                        <?php endif; ?>
                    <?php endforeach ?>
                            <li><a style="text-decoration: underline" href="<?php echo base_url(); ?>index.php/admin/login">Espace d'administration</a></li>
                </ul>
                </div>
            </div>