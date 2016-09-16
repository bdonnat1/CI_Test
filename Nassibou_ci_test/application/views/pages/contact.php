
            <div class="col-md-8 contact-right">
                <h2>Formulaire de contact</h2>
                <hr/>
                <!--form-->
                <div class="col-md-12" style="color: red;">
                <?php echo validation_errors(); ?>
                </div>
                <?php echo form_open('home/contact'); ?>
                    <div class="col-md-6" style="">
                        <label class="checkbox inline">Nom : </label>
                        <input type="text" value="<?php echo($nom); ?>" name="nom" placeholder="Votre nom" />
                    </div>
                    <div class="col-md-6" style="">
                        <label class="checkbox inline">Adresse e-mail : </label>
                        <input type="text" value="<?php echo($email); ?>" name="email" placeholder="Votre adresse e-mail" />
                    </div>
                    <div class="col-md-12" style="">
                        <label class="checkbox inline">Sujet : </label>
                        <input type="text" value="<?php //echo($sujet); ?>" name="sujet" placeholder="Sujet ..." />
                    </div>
                    <div class="col-md-12" style="">
                        <label class="checkbox inline">Message : </label>
                        <textarea placeholder="Message ..." name="message" style="height: 300px;"><?php echo($message); ?></textarea>
                    </div>
                    <div class="col-md-12" style="">
                        <div class="submit-btn">
                            <input type="submit" value="ENVOYER">
                        </div>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!----contact-end---->