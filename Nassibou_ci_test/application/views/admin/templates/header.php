<!DOCTYPE html>
<html>
<head>
<title>Auto ecole Nassibou</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Auto Ecole La Réunion, Nassibou, Permis Moto, Permis Voiture, Formation BSR, Permis AM, Formation 125,
Permis A, Permis B, Permis 125, Catégorie de permis" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />
<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.0.min.js"></script>
<!-- banner Slider starts Here -->
<script src="<?php echo base_url(); ?>assets/js/responsiveslides.min.js"></script>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
 <script>
        // You can also use "$(window).load(function() {"
        $(function () {
          // Slideshow 4
          $("#slider3").responsiveSlides({
                auto: true,
                pager: false,
                nav: false,
                speed: 3000,
                namespace: "callbacks",
                before: function () {
                  $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                  $('.events').append("<li>after event fired.</li>");
                }
          });

        });
  </script>
  
<!--//End-slider-script -->
</head>
<body>
<!----start-header---->
<div class="header" id="home">
    <div class="container">
        <div class="logo">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo-3.png" alt=""></a>
        </div>
        <div class="menu">			
            <div class="top-menu navigation">
                <span class="menu"></span> 
                <ul class="navig">
                    <li><a href="<?php echo base_url(); ?>index.php/admin/pages">Accueil</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/lesmenus">Les menus</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/lespages">Les pages</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/admin/logout" style="color: black;">Déconnexion</a></li>
                </ul>
            </div>
            <!-- script-for-menu -->
           <script>
                $("span.menu").click(function(){
                    $(" ul.navig").slideToggle("slow" , function(){
                    });
                });
           </script>
           <!-- script-for-menu -->

            <div class="search">
                <form>
                    <input type="text" value="" placeholder="Rechercher ...">
                    <input type="submit" value="">
                </form>
            </div>
        </div>
        <div class="clearfix"></div>
   </div>	
</div>
<!----end-header---->
