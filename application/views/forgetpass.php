<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Twitter Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

   <!-- Le styles -->
    <link href="<?php echo css_url('bootstrap'); ?>" rel="stylesheet">
    <link href="<?php echo css_url('Aristo/Aristo'); ?>" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
      .tabs-left > .nav-tabs
      {
        font-weight: bold;
      }
    </style>
    <link href="<?php echo css_url('bootstrap-responsive') ?>" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
  </head>

  <body data-spy="scroll" data-target=".subnav" data-offset="50">

<div class="container">

  <?php if (isset($success)): ?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Well done!</strong> <?php echo $success; ?>
      </div>
  <?php endif ?>

  <?php if (isset($error)): ?>
      <div class="alert alert-error">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Oh snap!</strong> <?php echo $error; ?>
      </div>
  <?php endif ?>
  
    <?php echo form_open('connexion/forgetpass',array('class'=>'form-horizontal well')); ?>
  <fieldset>
    <legend>Récupération de mot de passe</legend>
    <div class="control-group">
      <label class="control-label" for="email">Votre email</label>
      <div class="controls">
        <input type="text" class="input-xlarge" id="email" name="email">
      </div>
    </div>
  </fieldset>
  <div class="form-actions">
      <button type="submit" class="btn btn-primary">Valider</button>
      <button class="btn">Cancel</button>
  </div>
<?php echo form_close(); ?>
</div>
 <div class="container">
      <footer class="footer">
        <p>Copyright 2012</p>
      </footer>
    </div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo js_url('jquery') ?>"></script>
    <script src="<?php echo js_url('bootstrap-transition') ?>"></script>
    <script src="<?php echo js_url('bootstrap-alert') ?>"></script>
    <script src="<?php echo js_url('bootstrap-modal') ?>"></script>
    <script src="<?php echo js_url('bootstrap-dropdown') ?>"></script>
    <script src="<?php echo js_url('bootstrap-scrollspy') ?>"></script>
    <script src="<?php echo js_url('bootstrap-tab') ?>"></script>
    <script src="<?php echo js_url('bootstrap-tooltip') ?>"></script>
    <script src="<?php echo js_url('bootstrap-popover') ?>"></script>
    <script src="<?php echo js_url('bootstrap-button') ?>"></script>
    <script src="<?php echo js_url('bootstrap-collapse') ?>"></script>
    <script src="<?php echo js_url('bootstrap-carousel') ?>"></script>
    <script src="<?php echo js_url('bootstrap-typeahead') ?>"></script>


  </body>
</html>
