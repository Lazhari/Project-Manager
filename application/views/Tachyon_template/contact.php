<section role="main" class="page-wrapper">
	
		<!-- Dashboard -->
		<?php include_once('page_wrapper/dashboard.php') ?>
		<!-- /Dashboard -->
	
		<div class="clearfix"></div> <!-- We're really sorry for this, but because of IE7 we still need separated div with clearfix -->
		
		<!-- Full width content box -->
		<!-- Notification -->
					
		<!-- End notification -->
		<article class="content-box minimizer col-2">
			<!-- l'en-tete -->
			<header>
				<h2 style="padding-right: 90px; ">Liste des utilisateurs </h2>
				<a href="#" class="content-box-minimizer" title="Toggle Content Block" style="display: block; left: 125px; ">Toggle</a>
			</header>
			<section >
				<?php if (isset($users)): ?>
					<ul class="contacts">
						<?php foreach ($users as $row): ?>
							<!-- Contacts item -->
							<li>
								<img src="<?php echo avatar_url($row->avatar) ?>" alt="Sample Avatar">
								<ul>
									<li><strong><?php echo $row->nom." ".$row->prenom; ?></strong></li>
									<li><em><?php echo $row->societe ?></em></li>
									<li><a href="#<?php echo $row->nom ?>" class="modal">View Details</a></li>
								</ul>
							</li>
							<!-- /Contacts item -->
						<?php endforeach ?>
					</ul>
				<?php endif ?>
			</section>
		</article>


		<article class="content-box minimizer col-2 clear-rm">
			<header>
				<h2 style="padding-right: 90px; ">Mes Contacts </h2>
				<a href="#" class="content-box-minimizer" title="Toggle Content Block" style="display: block; left: 136px; ">Toggle</a>
			</header>
			<section >
				<?php if (isset($myContacts)): ?>
					<ul class="contacts">
						<?php foreach ($myContacts as $row): ?>
							<!-- Contacts item -->
							<li>
								<img src="<?php echo avatar_url($row->avatar) ?>" alt="Sample Avatar">
								<ul>
									<li><strong><?php echo $row->nom." ".$row->prenom; ?></strong></li>
									<li><em><?php echo $row->societe ?></em></li>
									<li><a href="#<?php echo 'contact'.$row->nom ?>" class="modal">View Details</a></li>
								</ul>
							</li>
							<!-- /Contacts item -->
						<?php endforeach ?>
					</ul>
				<?php endif ?>
			</section>
		</article>
		<!-- /Full width content box -->
	
</section>
	<!-- /Main Content -->
<?php if (isset($users)): ?>
	<?php foreach ($users as $row): ?>
		<div class="modal-content" id="<?php echo $row->nom ?>">
			<div class="vcard">
					<img src="<?php echo avatar_url($row->avatar) ?>" alt="photo of Kevin Glenn Bates" class="photo" >
					<div class="vcard-details">
						<ul>
							<li class="name">
								<a class="url fn n" href="#">
									<span class="given-name">Monsieur</span>
									<span class="additional-name"><?php echo $row->nom ?></span>
									<span class="family-name"><?php echo $row->prenom ?></span>
								</a>
							</li>
							<li class="title"><em>Chef de projet</em></li>
							<li class="societe"><span>Societé:</span> <?php echo $row->societe ?></li>
							<li class="email"><span>E-mail:</span> <a href="mailto:<?php echo $row->email?>"><?php echo $row->email ?></a></li>
							<li class="tel"><span>Téléphone:</span> <?php echo $row->tel ?></li>
							<li class="adr">
								<span>Address:</span>
								<div>
									<span class="street-address"><?php echo $row->adress ?></span>
									<span class="locality"><?php echo $row->ville ?></span>
									<span class="country-name">Maroc</span>
								</div>
							</li>
						</ul>	
					</div>
				</div>	
				<?php if (isset($myContactsId)): ?>
					<?php if (!in_array($row->ID, $myContactsId) ): ?>
						<a class="icon small blue" href="<?php echo site_url('users/addContact/'.$row->ID) ?>"><img src="<?php echo img_url('icons/buttons/address_book.png') ?>" alt="Admin User" ><span>Ajouter à Mes contact</span></a>
						<?php else: ?>
						<div class="notification information">
							Ce membres est déja parmis vos contacts
						</div>
					<?php endif ?>
				<?php else: ?>
					<a class="icon small blue" href="<?php echo site_url('users/addContact/'.$row->ID) ?>"><img src="<?php echo img_url('icons/buttons/address_book.png') ?>" alt="Admin User" ><span>Ajouter à Mes contact</span></a>
				<?php endif ?>	
		</div>
	<?php endforeach ?>
<?php endif ?>

<?php if (isset($myContacts)): ?>
	<?php foreach ($myContacts as $row): ?>
		<div class="modal-content" id="<?php echo 'contact'.$row->nom ?>">
			<div class="vcard">
					<img src="<?php echo avatar_url($row->avatar) ?>" alt="photo of Kevin Glenn Bates" class="photo" >
					<div class="vcard-details">
						<ul>
							<li class="name">
								<a class="url fn n" href="#">
									<span class="given-name">Monsieur</span>
									<span class="additional-name"><?php echo $row->nom ?></span>
									<span class="family-name"><?php echo $row->prenom ?></span>
								</a>
							</li>
							<li class="title"><em>Chef de projet</em></li>
							<li class="societe"><span>Societé:</span> <?php echo $row->societe ?></li>
							<li class="email"><span>E-mail:</span> <a href="mailto:<?php echo $row->email?>"><?php echo $row->email ?></a></li>
							<li class="tel"><span>Téléphone:</span> <?php echo $row->tel ?></li>
							<li class="adr">
								<span>Address:</span>
								<div>
									<span class="street-address"><?php echo $row->adress ?></span>
									<span class="locality"><?php echo $row->ville ?></span>
									<span class="country-name">Maroc</span>
								</div>
							</li>
						</ul>	
					</div>
				</div>	
		</div>
	<?php endforeach ?>
<?php endif ?>
<!-- Modal -->
