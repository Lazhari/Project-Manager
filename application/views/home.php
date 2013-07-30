<!DOCTYPE html>

<html>
<head>
<title>Connexion :Gestion des projets</title>
<link rel="stylesheet" type="text/css" href="<?php echo css_url('style');?>" media="all">
</head>

<body>
<h1>Gestion des Projets: <small>Stage</small></h1>
<?php if (isset($error)): ?>
	<div id="erreur" ><?php echo $error ?></div>
<?php endif ?>
<?php echo form_open('connexion/index',array('id'=>'login')); ?>
    <h1>Log In</h1>
    <fieldset id="inputs">
    	<?php echo form_error('email','<span class="error">','</span>') ?>
        <input name="email" id="email" type="text" placeholder="Email" autofocus required> 
        <?php echo form_error('pass','<span class="error">','</span>') ?> 
        <input name="pass" id="password" type="password" placeholder="Password" required>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Log in">
        <?php echo anchor('connexion/forgetpass', 'Mot de passe oublie'); ?><?php echo anchor('connexion/signup', 'Register'); ?>
    </fieldset>
<?php echo form_close(); ?>
<!-- BSA AdPacks code -->
</body>
</html>
