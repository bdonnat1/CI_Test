<!--footer-->
<div class="footer">
    <div class="footer-grids">
        <div class="container">
            <div class="col-md-3 footer-grid">
                <h4>Services</h4>
                <ul>
                    <?php foreach ($menus_bas_col1 as $mon_menu): ?>
                        <?php if ($mon_menu['hyperlien'] == ''): ?>
                            <li><a href="<?php echo base_url(); ?>index.php/home/pages/<?php echo $mon_menu['idPage']; ?>"><?php echo $mon_menu['menu']; ?></a></li>
                        <?php else: ?>
                            <li><a href="<?php echo base_url(); ?>index.php/home/<?php echo $mon_menu['hyperlien']; ?>"><?php echo $mon_menu['menu']; ?></a></li>
                        <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>Informations</h4>
                <ul>
                    <?php foreach ($menus_bas_col2 as $mon_menu): ?>
                        <?php if ($mon_menu['hyperlien'] == ''): ?>
                            <li><a href="<?php echo base_url(); ?>index.php/home/pages/<?php echo $mon_menu['idPage']; ?>"><?php echo $mon_menu['menu']; ?></a></li>
                        <?php else: ?>
                            <li><a href="<?php echo base_url(); ?>index.php/home/<?php echo $mon_menu['hyperlien']; ?>"><?php echo $mon_menu['menu']; ?></a></li>
                        <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>Plus de détails</h4>
                <ul>
                    <?php foreach ($menus_bas_col3 as $mon_menu): ?>
                        <?php if ($mon_menu['hyperlien'] == ''): ?>
                            <li><a href="<?php echo base_url(); ?>index.php/home/pages/<?php echo $mon_menu['idPage']; ?>"><?php echo $mon_menu['menu']; ?></a></li>
                        <?php else: ?>
                            <li><a href="<?php echo base_url(); ?>index.php/home/<?php echo $mon_menu['hyperlien']; ?>"><?php echo $mon_menu['menu']; ?></a></li>
                        <?php endif; ?>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="col-md-3 footer-grid contact-grid">
                <h4>Contactez-nous</h4>
                <ul>
                    <li><span class="c-icon1"> </span><a href="mailto:<?php echo $meta_email['meta_value']; ?>"><?php echo $meta_email['meta_value']; ?></a></li>
                    <li><span class="c-icon2"> </span><a href="tel:<?php echo $meta_phone['meta_value']; ?>"><?php echo $meta_phone['meta_value']; ?></a></li>
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
    <!--img src="images/Logo.png" style="height: 40px; position: fixed; right: 5px; bottom: 5px; cursor: pointer;" onclick="document.location.href='http://www.dna-webhosting.com' "-->
    <p>
    Copyright &copy; <?php echo date("Y"); ?> | Design by <a href="http://www.about.me/donnat">Donnat Josephin</a> (<a href="http://www.dna-webhosting.com">Dna-webhosting</a>)</p>
</div>
<!--footer-->		

</body>
</html>