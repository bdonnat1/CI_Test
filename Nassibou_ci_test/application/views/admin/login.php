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
<style type="text/css">

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
  margin-top: 5px;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
  margin: 5px 0;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

</style>
<body>
<div class="container">

    <div class="form-signin" style="text-align: center;">
        <?php echo form_open('admin/login'); ?>
            <div class="" style="color: red;">
            <?php echo validation_errors(); ?>
            </div>
          <h2 class="form-signin-heading">Veuillez vous connecter</h2>
          <label for="login" class="sr-only">Login</label>
          <input type="text" name="login" id="login" class="form-control" placeholder="Nom d'utilisateur" autofocus>
          <label for="motdepasse" class="sr-only">Mot de passe</label>
          <input type="password" name="motdepasse" id="motdepasse" class="form-control" placeholder="Mot de passe">
          <!--div class="checkbox">
            <label>
              <input type="checkbox" value="remember-me"> Se souvenir de moi
            </label>
          </div-->
          <button class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</button>
          <br>
          <a href="<?php echo base_url(); ?>index.php">Page d'accueil du site</a>
        </form>
    </div>

</div> <!-- /container -->
</body>

