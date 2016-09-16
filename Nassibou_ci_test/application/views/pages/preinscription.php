
            <div class="col-md-8 contact-right">
                <h2>Formulaire de préinscription</h2>
                <hr/>
                <div class="col-md-12" style="color: red;">
                <?php echo validation_errors(); ?>
                </div>
                <?php echo form_open('home/verifpreinscription'); ?>
                    <div class="col-md-6" style="">
                        <label class="checkbox inline">Nom : </label>
                        <input type="text" name="nom" value="" placeholder="Votre nom" />
                    </div>
                    <div class="col-md-6" style="">
                        <label class="checkbox inline">Prénoms : </label>
                        <input type="text" name="prenom" value="" placeholder="Votre prénoms" />
                    </div>
                    <div class="col-md-6" style="">
                        <label class="checkbox inline">Adresse e-mail : </label>
                        <input type="text" name="email" value="" placeholder="Votre adresse e-mail" />
                    </div>
                    <div class="col-md-6" style="">
                        <label class="checkbox inline">Téléphone : </label>
                        <input type="text" name="telephone" value="" placeholder="Votre Téléphone" />
                    </div>
                    <div class="col-md-6" style="">
                        <label class="checkbox inline">Age : </label>
                        <select name="age" id="age">
                            <option value="">Age</option>
                            <?php 
                                for ($i=10; $i<=60; $i++): 
                                    echo '<option value="' . $i . '">' . $i . '</option>';
                                endfor; 
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12" style="">
                        <label class="checkbox inline">Adresse : </label>
                        <textarea name="adresse" placeholder="Adresse ..."></textarea>
                    </div>
                    <div class="col-md-6" style="">
                        <label class="checkbox inline"><u>Catégorie de permis</u> : </label>
                        <div style="margin-left: 20px;">
                            <label class="checkbox inline">
                                <input name="permisMotoA" type="checkbox" id="inlineCheckbox1" value="Permis Moto (A)"> Permis Moto (A)
                            </label>
                            <label class="checkbox inline">
                                <input name="permisMotoA2" type="checkbox" id="inlineCheckbox1" value="Permis Moto A2 (35kW (47,5 ch))"> Permis Moto A2 (35kW (47,5 ch))
                            </label>
                            <label class="checkbox inline">
                                <input name="permis125" type="checkbox" id="inlineCheckbox2" value="Permis 125Cm3 (A1)"> Permis 125Cm3 (A1)
                            </label>
                            <label class="checkbox inline">
                                <input name="permisVoitureB" type="checkbox" id="inlineCheckbox3" value="Permis de voiture (B)"> Permis de voiture (B)
                            </label>
                            <label class="checkbox inline">
                                <input name="permisVoitureAAC" type="checkbox" id="inlineCheckbox3" value="Permis Voiture (AAC)"> Permis Voiture (AAC)
                            </label>
                            <label class="checkbox inline">
                                <input name="permisVoitureCS" type="checkbox" id="inlineCheckbox3" value="Permis Voiture (Conduite supervisée)"> Permis Voiture (Conduite supervisée)
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6" style="">
                        <label class="checkbox inline"><u>Catégorie de formation (7h)</u> :</label>
                        <div style="margin-left: 20px;">
                            <label class="checkbox inline">
                                <input name="formationBSR" type="checkbox" id="inlineCheckbox1" value="BSR (Permis AM)"> Formation BSR (Permis AM)
                            </label>
                            <label class="checkbox inline">
                                <input name="formation125" type="checkbox" id="inlineCheckbox2" value="Permis 125 Cm3"> Formation 125 Cm3
                            </label>
                        </div>
                    </div>
                    <div class="col-md-12" style="">
                        <label class="checkbox inline">Votre Message : </label>
                        <textarea name="message" placeholder="Message ..." style="height: 200px;"></textarea>
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
