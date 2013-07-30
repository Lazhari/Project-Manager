<section role="main" class="page-wrapper">
	
		<!-- Dashboard -->
		<?php include_once('page_wrapper/dashboard.php') ?>
		<!-- /Dashboard -->
	
		<div class="clearfix"></div> <!-- We're really sorry for this, but because of IE7 we still need separated div with clearfix -->
		
		<!-- Full width content box -->
		<!-- Notification -->
					<div class="sidetab default-sidetab col-2" id="sidetab1">
						<?php if (isset($error_updateCoord)): ?>
							<div class="notification error">
									<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
									<h4><?php echo $error_updateCoord ?> </h4>
							</div>
						<?php endif ?>
					</div>
					<div class="sidetab default-sidetab col-2" id="sidetab1">
						<?php if (isset($success_changepass)): ?>
							<div class="notification success">
									<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
									<h4><?php echo $success_changepass ?> </h4>
							</div>
						<?php endif ?>
					</div>
					<div class="sidetab default-sidetab col-2" id="sidetab1">
						<?php if (isset($error_changepass)): ?>
							<div class="notification error">
									<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
									<h4><?php echo $error_changepass ?> </h4>
									<a href="#" class="show-notification-details">► Show Details</a>
									<ul class="notification-details" style="display: block; ">
										<li><?php echo form_error('passactuel') ?> </li>
									</ul>
							</div>
						<?php endif ?>
					</div>
					<div class="sidetab default-sidetab col-2" id="sidetab1">
						<?php if (isset($error_upload)): ?>
							<div class="notification error">
									<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
									<h4><?php echo $error_upload ?> </h4>
							</div>
						<?php endif ?>
					</div>
		<!-- End notification -->
		<article class="content-box minimizer col-2">
			<!-- l'en-tete -->
			<header>
				<h2 style="padding-right: 90px; ">Mon Profile</h2>
				<a href="#" class="content-box-minimizer" title="Toggle Content Block" style="display: block; left: 125px; ">Toggle</a>
				<nav>
					<ul class="tab-switch">
						<li><a class="default-tab" href="#tab1">Mes infos</a></li>
						<li><a href="#tab2">Éditer Profile</a></li>
						<li><a href="#tab3">Aide</a></li>
					</ul>
				</nav>
			</header>
			<section >
				<div class="tab default-tab vcard" id="tab1">
					<?php if (isset($profil)): ?>
					<?php if (empty($profil[0]->avatar)): ?>
						<img src="<?php echo img_url('icons/icon_avatar.jpg') ?>" alt="photo of Kevin Glenn Bates" class="photo">
					<?php else: ?>
						<a href="#avatar" class="modal">
							<img src="<?php echo avatar_url($profil[0]->avatar) ?>" alt="photo of Kevin Glenn Bates" class="photo" >
						</a>
					<?php endif ?>
					<div class="vcard-details">
						<ul>
							<li class="name">
								<a class="url fn n" href="#">
									<span class="given-name">Monsieur</span>
									<span class="additional-name"><?php echo $profil[0]->nom ?></span>
									<span class="family-name"><?php echo $profil[0]->prenom ?></span>
								</a>
							</li>
							<li class="title"><em>Chef de projet</em></li>
							<li class="societe"><span>Societé:</span> <?php echo $profil[0]->societe ?></li>
							<li class="email"><span>E-mail:</span> <a href="mailto:<?php echo $profil[0]->email?>"><?php echo $profil[0]->email ?></a></li>
							<li class="tel"><span>Téléphone:</span> <?php echo $profil[0]->tel ?></li>
							<li class="adr">
								<span>Address:</span>
								<div>
									<span class="street-address"><?php echo $profil[0]->adress ?></span>
									<span class="locality"><?php echo $profil[0]->ville ?></span>
									<span class="country-name">Maroc</span>
								</div>
							</li>
						</ul>
					</div>
					<?php endif ?>
				<!-- /User Profile - vCard -->
				</div>	
				<div class="tab sidetabs" id="tab2">
					<!--Nav da teb -->
					<nav class="sidetab-switch">
						<ul>
							<li><a class="default-sidetab" href="#sidetab1">Coordonneés Personnel</a></li>
							<li><a href="#sidetab2">Changer Mot de passe</a></li>
							<li><a href="#sidetab3" >Ajouter une photo de profile</a></li>
						</ul>
					</nav> <!-- end nav -->
					<div class="sidetab default-sidetab" id="sidetab1">
						<?php echo form_open('profil/updateCoord',array('class'=>'vertical-form')); ?>
						<fieldset>
							<legend>Coordonnées Personnel</legend>
							<dl>
								<ul class="accordion">
									<li>
										<a class="accordion-switch" href="#"><h3>Nom et Prénom </h3></a>
										<div style="display: none; ">
											<dt>
												<label class="mandatory">Nom</label>
											</dt>
											<dd>
												<input type="text" name="name" value="<?php echo $profil[0]->nom ?>">
												<?php echo form_error('name','<span class="invalid-side-note">','</span>') ?> 
											</dd>

											<dt>
												<label class="mandatory">Prénom</label>
											</dt>
											<dd>
												<input type="text" name="prenom" value="<?php echo $profil[0]->prenom ?>">
												<?php echo form_error('prenom','<span class="invalid-side-note">','</span>') ?> 
											</dd>
										</div>
									</li>
									<li>
										<a class="accordion-switch" href="#"><h3>Coordonnées </h3></a>
										<div style="display: none; ">
											<dt>
												<label class="mandatory">Téléphone</label>
											</dt>
											<dd>
												<input type="text" name="phon" placeholder="(+212)0653767543" value="<?php echo $profil[0]->tel ?>">
												<?php echo form_error('phon','<span class="invalid-side-note">','</span>') ?> 
											</dd>
											<dt>
												<label >Soieté</label>
											</dt>
											<dd>
												<input type="text" name="societe" value="<?php echo $profil[0]->societe ?>">
												<?php echo form_error('societe','<span class="invalid-side-note">','</span>') ?> 
											</dd>
										</div>
									</li>

									<li>
										<a class="accordion-switch" href="#"><h3>Adresse </h3></a>
										<div style="display: none; ">
											<dt>
												<label >Adresse</label>
											</dt>
											<dd>
												<input type="text" name="adress" value="<?php echo $profil[0]->adress ?>">
												<?php echo form_error('adress','<span class="invalid-side-note">','</span>') ?> 
											</dd>

											<dt>
												<label >Ville</label>
											</dt>
											<dd>
											
												<select name="ville" >
													<option value="<?php echo $profil[0]->ville ?>" selected="selected"><?php echo $profil[0]->ville ?></option>
													<!-- Récupération des noms des villes à partir de la base de donneés -->
													<?php 
													$rows= $this->connexionManager->get_villes();
													foreach ($rows as $value): ?>
				                					<option value="<?php echo $value->nom_ville?>"><?php echo $value->nom_ville ?></option>
				            						<?php endforeach ?>
				            						<!-- End boucle -->
												</select>
											
											</dd>
										</div>
									</li>
								</ul>	
							</dl>
							<br>
						</fieldset>
						<button type="submit" >Valider</button> ou <a href="#" class="regtoggle">Annuler</a>
						<?php echo form_close(); ?>
					</div> <!-- End SideTab2 :coordonnées personnel -->
					<!-- Changer mot de passe -->
					<div class="sidetab" id="sidetab2">
						<?php echo form_open('profil/changePassword',array('class'=>'vertical-form')); ?>
							<fieldset>
								<legend>Changer mot de passe</legend>
								<dl>
									<dt>
										<label class="mandatory">Mot de passe actuel</label>
									</dt>
									<dd>
										<input type="password" name="passactuel" class="medium" >
										<?php echo form_error('passactuel','<span class="invalid-side-note">','</span>') ?> 
									</dd>
									<dt>
										<label class="mandatory">Nouvel mot de passe</label>
									</dt>
									<dd>
										<input type="password" name="pass" class="medium" >
										<?php echo form_error('pass','<span class="invalid-side-note">','</span>') ?> 
									</dd>
									<dt>
										<label class="mandatory">Confirmer mot de passe</label>
									</dt>
									<dd>
										<input type="password" name="passconf" class="medium" >
										<?php echo form_error('passconf','<span class="invalid-side-note">','</span>') ?> 
									</dd>
								</dl>
							</fieldset>
							<button type="submit" >Valider</button> ou <a href="#" class="regtoggle">Annuler</a>
						<?php echo form_close() ?>
					</div><!-- End :sidetab2 : changer mot de passe -->

					<!-- Sidetab3 : Ajouter un avatar -->
					<div class="sidetab" id="sidetab3">
						<?php echo form_open_multipart('profil/addAvatar',array('class'=>'vertical-form')) ?>
							<fieldset>
								<legend>Ajouter une photo de profil</legend>
								<dl>
									<dt>
										<label >Chemin</label>
									</dt>
									<dd>
										<input type="file" class="fileupload customfile-input" name="userfile">
										<p>Max size 5Mb</p>
									</dd>
								</dl>
							</fieldset>
							<button type="submit" >Valider</button> ou <a href="#" class="regtoggle">Annuler</a>
						<?php echo form_close(); ?>
					</div> <!-- End sidetab3 : changer avatar -->

				</div> <!-- End TAB2: Modifeir Profil -->
				<div class="tab sidetabs" id="tab3">
					
				</div>
			</section>
		</article>


		<article class="content-box minimizer col-2 clear-rm">
			<header>
				<h2 style="padding-right: 90px; ">Mes Projets</h2>
				<a href="#" class="content-box-minimizer" title="Toggle Content Block" style="display: block; left: 136px; ">Toggle</a>
			</header>
			<section>
				<?php if (isset($projet_info)): ?>
				<!-- Accordion -->
				<ul class="accordion">
					<?php foreach ($projet_info as $row): ?>
						<!-- Accordion Tab -->
						<li>
							<a class="accordion-switch" href="#"><h3><?php echo $row->nom ?></h3></a>
							<div style="display: none; ">
								<p><?php echo $row->description ?></p>
									<a href="#" class="show-notification-details">Liste des participants au projets</a>
									<ul class="notification-details" style="display: block; ">
										<?php foreach ($this->projetManager->getUsersByIdProject($row->Projets_ID) as $val): ?>
											<li><?php echo $val->nom." ".$val->prenom; ?></li>
										<?php endforeach ?>
									</ul>
							</div>
						</li>
					<!-- /Accordion Tab -->
					<?php endforeach ?>
				</ul>
				<?php endif ?>
				
			</section>
		</article>
		<!-- /Full width content box -->
	
</section>
	<!-- /Main Content -->

<!-- Modal -->

<div class="modal-content" id="avatar">
	<img src="<?php echo base_url().'assets/Avatars/'.$profil[0]->avatar; ?>"  alt="">
	<?php echo form_open_multipart('profil/addAvatar',array('class'=>'vertical-form')) ?>
							<fieldset>
								<legend>Ajouter une photo de profil</legend>
								<dl>
									<dt>
										<label >Chemin</label>
									</dt>
									<dd>
										<input type="file" class="fileupload customfile-input" name="userfile">
										<p>Max size 5Mb</p>
									</dd>
								</dl>
							</fieldset>
							<button type="submit" >Valider</button> ou <a href="#" class="regtoggle">Annuler</a>
	<?php echo form_close(); ?>
</div>