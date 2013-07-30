<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Project Manager</a>
          <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-user"></i> <?php if (isset($username)): ?>
                  <?php echo $username ?>
              <?php endif ?>
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><?php echo anchor('profil/','Profil'); ?></li>
              <li class="divider"></li>
              <li><?php echo anchor('connexion/logout','se deconnecter'); ?></li>
            </ul>
          </div>
          <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-briefcase"></i> Liste Project
              <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <?php if (isset($projet_info)): ?>
                <?php foreach ($projet_info as $row): ?>
                    <li><a href="#"><?php echo $row->nom; ?></a></li>
                    <li class="divider"></li>
                <?php endforeach ?>
                <?php else: ?>
                <li><a href="#">Vous avez aucun projet</a></li>
              <?php endif ?>
            </ul>
          </div>
          <div class="btn-group pull-right">
            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="icon-plus-sign"></i> Ajouter un projet
            </a>
          </div>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>