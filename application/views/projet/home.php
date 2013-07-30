    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Sidebar</li>
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="nav-header">Sidebar</li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span10">
          <div class="hero-unit">
            <h1>Vous avez aucun projet</h1>
            <?php if (isset($success)): ?>
               <div class="alert">
                  <button class="close" data-dismiss="alert alert-success">×</button>
                  <strong>Succées</strong> <?php echo $success; ?>
              </div>
            <?php endif ?>
           
            <p>jusqu'à moment vous avez aucun projet 
            </p>
             <h2>Création d'un projet </h2>
                    <p>Pour créer un projet Cliqué sur le button dessus</p>
                    <!-- sample modal content -->
                    <div id="myModal" class="modal hide fade">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h3>Ajouter un projet</h3>
                    </div>
                    <div class="modal-body">
                      <?php echo form_open('projet/add',array('class'=>'form-horizontal well')) ?>
                        <fieldset>
                          <legend>Ajouter un nouveau projet</legend>

                          <div class="control-group">
                            <label class="control-label" for="nom_projet">Nom de Projet</label>
                            <div class="controls">
                              <input type="text" class="input-xlarge" id="nom_projet" name="nom_projet">
                              <?php echo form_error('nom_projet','<span class="help-inline error" style="color:red">','</span>') ?>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="description">Description de projet:</label>
                            <div class="controls">
                            <textarea name="description" id="description" class="input-xlarge"></textarea>
                            <?php echo form_error('description','<span class="help-inline error" style="color:red">','</span>') ?>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="start">Date du début:</label>
                            <div class="controls">
                            <input type="text" class="input-xlarge" id="start" name="start">
                            <?php echo form_error('start','<span class="help-inline error" style="color:red">','</span>') ?>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="end">Date de fin:</label>
                            <div class="controls error">
                            <input type="text" class="input-xlarge" id="end" name="end">
                            <?php echo form_error('end','<span class="help-inline error" style="color:red">','</span>') ?>
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="budget">budget:</label>
                            <div class="controls">
                              <?php echo form_error('budget','<span class="help-inline error" style="color:red">','</span>') ?>
                            <input type="number" class="input-xlarge" id="budget" name="budget">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="role">Role:</label>
                            <div class="controls">
                            <select name="role" id="role" class="input-xlarge">
                              <?php if (isset($rows)): ?> 
                                  <?php foreach ($rows as $val): ?>
                                    <option value="<?php echo $val->nom_Role ?>"><?php echo $val->nom_Role ?></option>
                                  <?php endforeach ?>
                              <?php endif ?>
                            </select>
                            <?php echo form_error('role','<span class="help-inline error" style="color:red">','</span>') ?>
                            </div>
                          </div>

                          <input type="submit" class="btn btn-primary btn-large " value="Sauvegarder">
                        </fieldset>
                      <?php echo form_close(); ?>
                  </div>
                  <div class="modal-footer">
                    <a href="#" class="btn btn-small btn-inverse" data-dismiss="modal" >Close</a>
                  </div>
                </div>
                <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-large"><i class="icon-plus-sign icon-white"></i> Ajouter un Projet </a>

                <hr>
          </div>
        </div>
      </div>
 </div><!--/.fluid-container-->