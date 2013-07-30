 <style type="text/css">
        .sidebar-nav {
        padding: 9px 0;
      }
      .tabs-left > .nav-tabs
      {
        font-weight: bold;
      }
      .well1 {
    background-color: blanchedAlmond;
    padding: 20px;
    margin: auto;
}
 </style>
 <div class="container-fluid">
       <div class="well">
         <div class="tabbable"> <!-- Only required for left/right tabs -->
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1" data-toggle="tab">Profil </a></li>
            <li><a href="#tab2" data-toggle="tab">Setting</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab1">
              <div class="row-fluid">
                <div class="span12">
                 
                  <div class="row-fluid">
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
                </div>
            </div>
            <hr>
            </div>
            <div class="tab-pane" id="tab2">
              <p>Howdy, I'm in Section 2.</p>
            </div>
          </div>
        </div>
       </div> 
</div>