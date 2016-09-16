<!--contact-starts-->
<div class="contact">
    <div class="container">
        <div class="contact-bottom">
            <div class="col-md-3 contact-right">&nbsp;</div>
            <div class="col-md-6 contact-right">
                <h2>Modifier profil</h2>
                <hr/>
                    <div id="message-info"></div>
                    <div class="col-md-12" style="">
                        <label class="checkbox inline">Login : </label>
                        <input type="text" id="login" disabled value="<?php echo $info_user[0]['login']; ?>" name="login" placeholder="Login" />
                    </div>
                    <div class="col-md-12" style="">
                        <label class="checkbox inline">Nouveau mot de passe : </label>
                        <input type="password" id="password1" value="" name="password" placeholder="Nouveau mot de passe" style="color:black" />
                    </div>
                    <div class="col-md-12" style="">
                        <label class="checkbox inline">Nouveau mot de passe : </label>
                        <input type="password" id="password2" value="" name="password" placeholder="Nouveau mot de passe" style="color:black" />
                    </div>
                    <div class="col-md-12" style="">
                        <div class="submit-btn" style="text-align: right">
                            <input type="submit" value="Enregistrer" onclick="updateprofil()">
                            <input type="submit" value="Quitter" onclick="document.location.href='<?php echo base_url(); ?>index.php/admin/pages/2'">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 contact-right">&nbsp;</div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    //alert('ok');
    function updateprofil() {
        $.post("<?php echo base_url(); ?>index.php/admin/modifierProfil", 
            { 
                login: '<?php echo $info_user[0]['login']; ?>',
                password1: $('#password1').val(),
                password2: $('#password2').val()
            },
            function(data)
            {
               $('#message-info').html(data);
                setTimeout(function(){
                    $('#message-info').html('');
                }, 5000);
            }
        );
    };
</script>