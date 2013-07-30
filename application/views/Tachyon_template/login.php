<!doctype html>
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->

<!-- Mirrored from envato.walkingpixels.com/themes/tachyon/login.html by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 25 Jul 2012 15:37:30 GMT -->
<head>
	<title>Login | Project Manager</title>
	
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="copyright" content="">
	<meta name="author" content="">
	<meta name="language" content="English">
	<meta name="robots" content="index, follow">
	<meta property="fb:page_id" content="XXX"> <!-- XXX = Facebook Fan Page ID -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Icons -->
	<link rel="shortcut icon" href="http://envato.walkingpixels.com/favicon.ico">
	<link rel="apple-touch-icon" href="../../apple-touch-icon.html">
	
	<!-- CSS Styles -->
	<link rel="stylesheet" href="<?php echo css_url('screen') ?>">
	<link rel="stylesheet" href="<?php echo css_url('colors') ?>">
	<link rel="stylesheet" href="<?php echo css_url('jquery.tipsy') ?>">

	<style type="text/css">
		.invalid-side-note{
			color: red;
		}
	</style>
	
	<!-- Google WebFonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;v2' rel='stylesheet' type='text/css'>
	
	<!-- Modernizr adds classes to the <html> element which allow you to target specific browser functionality in your stylesheet -->
	<script src="<?php echo js_url('libs/modernizr-1.7.min') ?>"></script>
	
</head>
<body class="login">
	
	<div class="login-wrapper">
		
		<!-- Notification -->
		<?php if (isset($error_signup)): ?>

			<div class="notification error">
				<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
				<h4><?php echo $error_signup ?></h4>
				<p id="logaction"><a class="regtoggle" href="#" style="color:green;">Essayer de nouveau</a>!</p>
			</div>
			
		<?php endif ?>

		<?php if (isset($error)): ?>

			<div class="notification error">
				<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
				<h4><?php echo $error ?></h4>
			</div>
			
		<?php endif ?>

		<?php if (isset($success)): ?>

			<div class="notification success">
				<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
				<h4><?php echo $success ?></h4>
			</div>
			
		<?php endif ?>
		
		<!-- /Notification -->
		
		<!-- Full width content box -->
		<article class="content-box minimizer">
			<header>
				<h2>Project Manager </h2>
				<nav>
					<p id="logaction"><a class="regtoggle" href="#">S'inscrire</a>!</p>
					<p id="regaction"><a class="regtoggle" href="#">Se connecter</a>!</p>
				</nav>
			</header>
			<section>
				
				<div id="logform">
					<?php echo form_open('connexion/index'); ?>
						<dl>
							<dt>
								<label>E-mail</label>
							</dt>
							<dd>
								<input type="text" name="mail" placeholder="example@email.com" value="<?php echo set_value('mail'); ?>">
								<?php echo form_error('mail','<span class="invalid-side-note">','</span>') ?>
							</dd>
							<dt>
								<label>Mot de passe </label>
							</dt>
							<dd>
								<input type="password" name="password" placeholder="password" >
								<?php echo form_error('password','<span class="invalid-side-note">','</span>') ?> 
							</dd>
						</dl>
						<button type="submit">Se connecter</button>
					<?php echo form_close(); ?>
				</div>

				<div id="regform">
					<h3>Création d'un compte</h3>
					<?php echo form_open('connexion/signup',array('class'=>'vertical-form')); ?>
						<dl>
							<dt>
								<label class="mandatory">Nom</label>
							</dt>
							<dd>
								<input type="text" name="name" value="<?php echo set_value('name') ?>">
								<?php echo form_error('name','<span class="invalid-side-note">','</span>') ?> 
							</dd>

							<dt>
								<label class="mandatory">Prénom</label>
							</dt>
							<dd>
								<input type="text" name="prenom" value="<?php echo set_value('prenom') ?>">
								<?php echo form_error('prenom','<span class="invalid-side-note">','</span>') ?> 
							</dd>

							<dt>
								<label class="mandatory">Téléphone</label>
							</dt>
							<dd>
								<input type="text" name="phon" placeholder="(+212)0653767543" value="<?php echo set_value('phon') ?>">
								<?php echo form_error('phon','<span class="invalid-side-note">','</span>') ?> 
							</dd>

							<dt>
								<label class="mandatory">Email</label>
							</dt>
							<dd>
								<input type="text" name="email" value="<?php echo set_value('email') ?>">
								<?php echo form_error('email','<span class="invalid-side-note">','</span>') ?> 
							</dd>

							<dt>
								<label class="mandatory">Confirmer votre email</label>
							</dt>
							<dd>
								<input type="text" name="emailconf" value="<?php echo set_value('emailconf') ?>">
								<?php echo form_error('emailconf','<span class="invalid-side-note">','</span>') ?> 
							</dd>

							<dt>
								<label class="mandatory">Mot de passe</label>
							</dt>
							<dd>
								<input type="password" name="pass" value="">
								<?php echo form_error('pass','<span class="invalid-side-note">','</span>') ?> 
							</dd>

							<dt>
								<label class="mandatory">Confirmer mot de passe</label>
							</dt>
							<dd>
								<input type="password" name="passconf" value="">
								<?php echo form_error('passconf','<span class="invalid-side-note">','</span>') ?> 
							</dd>

							<dt>
								<label >Soieté</label>
							</dt>
							<dd>
								<input type="text" name="societe" value="<?php echo set_value('societe') ?>">
								<?php echo form_error('societe','<span class="invalid-side-note">','</span>') ?> 
							</dd>

							<dt>
								<label >Adresse</label>
							</dt>
							<dd>
								<input type="text" name="adress" value="<?php echo set_value('adress') ?>">
								<?php echo form_error('adress','<span class="invalid-side-note">','</span>') ?> 
							</dd>


							<dt>
								<label >Ville</label>
							</dt>
							<dd>
								
								<select name="ville">
									<!-- Récupération des noms des villes à partir de la base de donneés -->
									<?php 
									$rows= $this->connexionManager->get_villes();
									foreach ($rows as $value): ?>
                					<option value="<?php echo $value->nom_ville?>"><?php echo $value->nom_ville ?></option>
            						<?php endforeach ?>
            						<!-- End boucle -->
								</select>
								
							</dd>
							
						</dl>
						<button type="submit" >Valider</button> ou <a href="#" class="regtoggle">Annuler,J'ai déja un compte</a>
					<?php echo form_close(); ?>
				</div>
				
			</section>
			<footer>
				<ul class="login-links">
					<li><a href="#">Mot de passe oublie?</a></li>
				</ul>
			</footer>
		</article>
		<!-- /Full width content box -->
		
	</div>

	<!-- JavaScript at the bottom for faster page loading -->
	<script src="<?php echo js_url('ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min') ?> "></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
	<script src="<?php echo js_url('jquery/jquery.tipsy') ?>"></script>
	<script src="<?php echo js_url('login') ?>"></script>
	
	<script>
		var _gaq=[['_setAccount','UA-22557155-3'],['_trackPageview']];
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
</body>

<!-- Mirrored from envato.walkingpixels.com/themes/tachyon/login.html by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 25 Jul 2012 15:37:31 GMT -->
</html>