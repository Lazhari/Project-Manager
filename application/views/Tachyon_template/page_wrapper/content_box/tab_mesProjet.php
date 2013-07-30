<!-- Tab Content #tab1 : mes projet -->
				<div class="tab default-tab sidetabs" id="tab1">
					<!--Nav da teb -->
					<nav class="sidetab-switch">
						<ul>
							<li><a class="default-sidetab" href="#sidetab1">Mes Projets</a></li>
							<li><a href="#sidetab2">Ajouter un Projet</a></li>
							<li><a href="#sidetab3" >Gérer votre groupe des utilisateurs</a></li>
							<li><a href="#sidetab4">Calender</a></li>
						</ul>
					</nav> <!-- end nav -->

					<!-- SideTab 1 -->

					<!-- Notification -->
					<div class="sidetab default-sidetab" id="sidetab1">
						<?php if (isset($success)): ?>
							<div class="notification success">
									<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
									<h4><?php echo $success ?> </h4>
							</div>
						<?php endif ?>
						<?php if (isset($error_addUser)): ?>
							<div class="notification error">
									<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
									<h4><?php echo $error_addUser ?> </h4>
									<a href="#emailuser" class="modal">Inviter le membres</a>
							</div>
						<?php endif ?>
						<?php if (isset($success_addUser)): ?>
							<div class="notification success">
									<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
									<h4><?php echo $success_addUser ?> </h4>
							</div>
						<?php endif ?>
						<?php if (isset($error_invitationMail)): ?>
							<div class="notification error">
									<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
									<h4><?php echo $error_invitationMail ?> </h4>
									<a href="#emailuser" class="modal">Essayer de nouveau</a>
							</div>
						<?php endif ?>
						<?php if (isset($success_invitationMail)): ?>
							<div class="notification success">
									<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
									<h4><?php echo $success_invitationMail ?> </h4>
							</div>
						<?php endif ?>
						<!-- End Notification -->

						<h3>Mes Projets :</h3>
						<?php if (isset($projet_info)): ?>
							<form action="<?php echo site_url('projet/index') ?>" class="table-form">
								<table>
									<thead>
										<tr>
											<th><input type="checkbox" class="check-all"></th>
											<th>&nbsp;</th>
											<th>Nom de Projets</th>
											<th>Description</th>
											<th>Le nombres des jours restés</th>
											<th>Budget en (DH)</th>
											<th>Role</th>
											<th>Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($projet_info as $key=>$row): ?>
											<tr>
													<td><input type="checkbox" name="projet" value="<?php echo $row->Projets_ID ?>"></td>
													<td>
														<!-- Table actions -->
														<a class="toggle-table-switch tooltip" href="#" title="Show options" style="">Options</a>
														<ul class="table-switch" style="display: none; margin-left: 8px; ">
															<li><a href="#sample" class="modal">view</a></li>
															<li><a href="#">edit</a></li>
															<li><a href="#">delete</a></li>
														</ul>
														<!-- /Table actions -->
													</td>
													<td><?php echo $row->nom ?></td>
													<td><?php echo $row->description ?></td>
													<td>
														<?php 
															$datetime1 = new DateTime($row->start);
															$datetime2 = new DateTime($row->end);
															$interval = $datetime1->diff($datetime2);
															echo $interval->format('%R%a jours');
													 	?>
													</td>
													<td><?php echo $row->budget ?></td>
													<td><?php echo $row->nom_Role ?></td>
													<td>
														<ul class="actions">
															<li><a class="view tooltip" href="#" title="View Item">view</a></li>
															<li><a class="edit tooltip" href="#" title="Edit Item">edit</a></li>
															<li><a class="delete tooltip" href="#" title="Delete Item">delete</a></li>
														</ul>
													</td>
											</tr>
										<?php endforeach ?>
									</tbody>
								</table>
							</form>
						<?php endif ?>
						<?php if (isset($info)): ?>
							<div class="notification information">
								<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
								<h4><?php echo $info ?> </h4>
							</div>
						<?php endif ?>
								
						
					
						

					</div> <!-- End Sidetab1 -->

					<!-- SideTab2 : Ajoute un Projet -->
					<div class="sidetab" id="sidetab2">
						<?php echo form_open('projet/add',array('class'=>'horizontal-form')) ?>
							<fieldset>
								<legend>Information sur Projet:</legend>
								<dl>
									<!-- Nom du projet -->
									<dt>
										<label class="mandatory">Nom du projet</label>
									</dt>
									<dd>
										<input type="text" name="nom_projet" value="<?php echo set_value('nom_projet') ?>" class="medium">
										<?php echo form_error('nom_projet','<span class="invalid-side-note">','</span>'); ?>
									</dd> <!-- End :Nom de projet -->

									<!-- Description de projet -->
									<dt>
										<label class="mandatory">description du projet</label>
									</dt>
									<dd>
										<textarea name="description" cols="40" rows="5" class="wysiwyg large">
											<?php echo set_value('description') ?>
										</textarea>
										<?php echo form_error('description','<span class="invalid-side-note">','</span>'); ?>
										<p>Donner une petite description a votre projet</p>
									</dd> <!-- End :description de projet -->

									<!-- date de debut -->
									<dt>
										<label class="mandatory">Date de debut</label>
									</dt>
									<dd>
										<input type="text" name="start" class="datestart" value="<?php echo set_value('start') ?>">
										<?php echo form_error('start','<span class="invalid-side-note">','</span>'); ?>
									</dd>
									<!-- End -->

									<!-- date de fin -->
									<dt>
										<label class="mandatory">Date de fin</label>
									</dt>
									<dd>
										<input type="text" name="end" class="dateend" value="<?php echo set_value('end') ?>">
										<?php echo form_error('end','<span class="invalid-side-note">','</span>'); ?>
									</dd>
									<!-- End -->

									<!-- Budget -->
									<dt>
										<label class="mandatory">Budget</label>
									</dt>
									<dd>
										<input type="text" name="budget" value="<?php echo set_value('value') ?>">
										<?php echo form_error('budget','<span class="invalid-side-note">','</span>'); ?>
										<p>Budget en Dh</p>
									</dd>
									<!-- End input Budget -->

									<!-- Role dans le projet -->
									<input type="hidden" name="role" value="Chef de projet">
								</dl>
							</fieldset>
							<button type="submit">Ajouter</button>
							 or 
							<a href="#">Annuler</a>
						<?php echo form_close(); ?>
					</div> <!-- end SideTab2 -->
					<div class="sidetab" id="sidetab3">
						<?php echo form_open('projet/addUser',array('class'=>'horizontal-form')) ?>
							<fieldset>
								<legend>Ajouter un utilisateur:</legend>
								<dl>
									<!-- Email -->
									<dt>
										<label class="mandatory">Email</label>
									</dt>
									<dd>
										<input type="text" name="user_email" value="<?php echo set_value('user_email') ?>" class="medium">
										<?php echo form_error('user_email','<span class="invalid-side-note">','</span>'); ?>
									</dd> <!-- End :Email --> 
									<!-- Projet liste -->
									<dt>
										<label class="mandatory">Projet:</label>
									</dt>
									<dd>
										<select name="projet">
											<?php if ($projet_info): ?>
												<?php foreach ($projet_info as $row): ?>
													<?php if ($row->nom_Role == "Chef de projet"): ?>
														<option value="<?php echo $row->nom; ?>"><?php echo $row->nom; ?></option>
													<?php endif ?>
												<?php endforeach ?>
											<?php endif ?>
										</select>
										<?php echo form_error('projet','<span class="invalid-side-note">','</span>'); ?>
									</dd>
									<!-- End: Projet liste -->
									<dt>
										<label class="mandatory">Role</label>
									</dt>
									<dd>
										<input type="text" name="role" value="<?php echo set_value('role') ?>" class="medium">
										<?php echo form_error('role','<span class="invalid-side-note">','</span>'); ?>
									</dd>
									<dt>
										<label class="mandatory">description de role</label>
									</dt>
									<dd>
										<textarea name="description_role" cols="40" rows="5" class="wysiwyg large">
											<?php echo set_value('description_role') ?>
										</textarea>
										<?php echo form_error('description_role','<span class="invalid-side-note">','</span>'); ?>
										<p>Donner une petite description au role associe à l'utilisateur</p>
									</dd>
								</dl>
								
							</fieldset>
							<button type="submit">Ajouter</button>
							 or 
							<a href="#">Annuler</a>
						<?php form_close(); ?>
					</div>
					<!-- SdieTab3 -->
					<div class="sidetab" id="sidetab4">
						<h3> Calendrier </h3>
						<!-- jQuery Full Calendar Plugin -->
						<div class="fullcalendar"></div>
						<!-- /jQuery Full Calendar Plugin -->
					</div>
				</div>
				<!-- /Tab Content #tab1 -->