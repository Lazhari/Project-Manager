<!DOCTYPE html>
<html>
<head>
<title>Create a nice login form using CSS3 and HTML5</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<link rel="stylesheet" type="text/css" href="<?php echo css_url('inscription') ?>" media="all">
</head>

<body>
<h1>Inscription :Gestion des projets:<small>Stage</small></h1>
<?php echo form_open('connexion/signup',array('id'=>'inscription')); ?>
    <h1>Inscription</h1>
    <?php if (isset($success)): ?>
       <h2 class="success"><?php echo $success ?></h2> 
    <?php endif ?>
    <fieldset id="inputs">
       
        <label for="name">Nom <span class="require">*</span>:<?php echo form_error('name','<span class="error">','</span>') ?></label>
        <input type="text" name="name" id="name" value="<?php echo set_value('name') ?>"required>

        <label for="prenom">Prénom <span class="require">*</span>:<?php echo form_error('prenom','<span class="error">','</span>') ?></label>
        <input type="text" name="prenom" id="prenom" value="<?php echo set_value('prenom') ?>" required>

        <label for="phon">Numéro de Tél <span class="require">*</span>:<?php echo form_error('phon','<span class="error">','</span>') ?></label>
        <input type="text" name="phon" id="phon" placeholder="(+212)0653767543" value="<?php echo set_value('phon') ?>" required>

        <label for="email">E-mail <span class="require">*</span>:<?php echo form_error('email','<span class="error">','</span>') ?></label>
        <input type="email" name="email" id="email" value="<?php echo set_value('email') ?>"required>

        <label for="emailconf">Confirmation d'Email <span class="require">*</span>:<?php echo form_error('emailconf','<span class="error">','</span>') ?></label>
        <input type="email" name="emailconf" id="emailconf" value="<?php echo set_value('emailconf') ?>"required>

        <label for="pass">Mot de passe <span class="require">*</span>:<?php echo form_error('pass','<span class="error">','</span>') ?></label>
        <input type="password" name="pass" id="pass" required>

        <label for="passconf">Confirmation de mot de passe <span class="require">*</span> :<?php echo form_error('passconf','<span class="error">','</span>') ?></label>
        <input type="password" name="passconf" id="passconf" required>

        <label for="societe">Societé :<?php echo form_error('societe','<span class="error">','</span>') ?></label>
        <input type="text" name="societe" id="societe" value="<?php echo set_value('societe') ?>">

        <label for="adress">Adresse <span class="require">*</span>:<?php echo form_error('adress','<span class="error">','</span>') ?></label>
        <input type="text" name="adress" id="adress" value="<?php echo set_value('adress') ?>">

        <label for="ville">Ville <span class="require">*</span>:<?php echo form_error('ville','<span class="error">','</span>') ?></label>
        <select name="ville" id="ville">
            <?php foreach ($rows as $value): ?>
                <option value="<?php echo $value->nom_ville?>"><?php echo $value->nom_ville ?></option>
            <?php endforeach ?>
        </select>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Valider">
        <?php echo anchor('connexion/forgetpass', 'Mot de passe oublie'); echo anchor('connexion/index', 'Se connecter'); ?>
    </fieldset>
<?php echo form_close(); ?>

<br>
</body>
</html>
