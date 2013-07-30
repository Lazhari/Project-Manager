 <div class="container-fluid">
      <div class="row-fluid">
        <div class="span2">
          <div class="well sidebar-nav">
             <button class="close" data-dismiss="alert">×</button>
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
            <h1>Projet Name</h1>
            <p><strong>description de projet :</strong>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
             <h2>Plus d'informations </h2>
                    <p>Pour plus d'infos Cliqué sur le button dessus</p>
                    <!-- sample modal content -->
                    <div id="myModal" class="modal hide fade">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h3>Infos projets</h3>
                    </div>
                    <div class="modal-body">
                      <?php if (isset($projet_info)): ?>
                      <?php foreach ($projet_info as $row): ?>
                      <dl class="dl-horizontal">
                        <dt>Nom: </dt>
                        <dd><?php echo $row->nom; ?></dd>
                        <dt>Description: </dt>
                        <dd><?php echo $row->description; ?></dd>
                        <dt>date limite: </dt>
                        <dd><?php echo $row->start ?></dd>
                        <dt>Etat:</dt>
                        <?php if (!$row->status): ?>
                          <dd>Encore d'evolution</dd>
                        <?php else: ?>
                          <dd>Projet est términé</dd>
                        <?php endif ?>
                        <dt>Budget:</dt>
                        <dd><?php echo $row->budget ?> DH</dd>
                        <dt>Role : </dt>
                        <dd><?php echo $row->nom_Role ?></dd>
                      </dl>
                  <?php endforeach ?> 
                  <?php endif ?>
                    </div>  
                  <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal" >Close</a>
                    <a href="#" class="btn btn-primary">Save changes</a>
                  </div>
                </div>
                <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-large"><i class="icon-folder-open icon-white"></i> More information </a>

                <hr>
          </div>
          <div class="well deskop">
            <div class="tabbable tabs-left">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#lA" data-toggle="tab"><i class="icon-tag"></i>Infos Projet</a></li>
                <li><a href="#lB" data-toggle="tab"><i class="icon-indent-left"></i> Les Sous Projets</a></li>
                <li><a href="#lC" data-toggle="tab"><i class="icon-tasks"></i> Taches</a></li>
                <li><a href="#lD" data-toggle="tab"><i class="icon-user"></i> Users</a></li>
                <li><a href="#lE" data-toggle="tab"><i class="icon-repeat"></i> Avancement</a></li>
                <li><a href="#lF" data-toggle="tab"><i class="icon-file"></i> Rapport</a></li>
                <li><a href="#lG" data-toggle="tab"><i class="icon-wrench"></i> Gestion Projet</a></li>
                <li><a href="#lH" data-toggle="tab"><i class="icon-wrench"></i>Gestion users</a></li>
                <li><a href="#lI" data-toggle="tab"><i class="icon-wrench"></i>Gestion Taches</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="lA">
                  <?php if (isset($projet_info)): ?>
                  <?php foreach ($projet_info as $row): ?>
                      <dl class="dl-horizontal">
                        <dt>Nom: </dt>
                        <dd><?php echo $row->nom; ?></dd>
                        <dt>Description </dt>
                        <dd><?php echo $row->description; ?></dd>
                        <dt>date limite </dt>
                        <dd><?php echo $row->start ?></dd>
                        <dt>Etat</dt>
                        <?php if ($row->status): ?>
                          <dd>Encore d'evolution</dd>
                        <?php else: ?>
                          <dd>Projet est términé</dd>
                        <?php endif ?>
                        <dt>Budget</dt>
                        <dd><?php echo $row->budget ?> DH</dd>
                        <dt>Role : </dt>
                        <dd><?php echo $row->nom_Role ?></dd>
                      </dl>
                  <?php endforeach ?> 
                  <?php endif ?>
                  
                </div>
                <div class="tab-pane" id="lB">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="tab-pane" id="lC">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="tab-pane" id="lD">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="tab-pane" id="lE">
                  <div class="alert">
                    <button class="close" data-dismiss="alert">×</button>
                    <strong>Warning!</strong> Attention les taux d'avancement est faibles 
                    <div class="progress progress-danger progress-striped active">
                      <div class="bar" style="width: 27%"></div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="lF">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="tab-pane" id="lG">
                    <h2>Gestion Projet</h2>
                    <p>Pour plus d'infos Cliqué sur le button dessus</p>
                    <!-- sample modal content -->
                    <div id="myModal" class="modal hide fade">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h3>Project Setting</h3>
                    </div>
                    <div class="modal-body">
                      <h4>Text in a modal</h4>
                      <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem.</p>

                      <h4>Popover in a modal</h4>
                      <p>This <a href="#" class="btn popover-test" title="A Title" data-content="And here's some amazing content. It's very engaging. right?">button</a> should trigger a popover on hover.</p>

                      <h4>Tooltips in a modal</h4>
                      <p><a href="#" class="tooltip-test" title="Tooltip">This link</a> and <a href="#" class="tooltip-test" title="Tooltip">that link</a> should have tooltips on hover.</p>

                    <hr>

                      <h4>Overflowing text to show optional scrollbar</h4>
                      <p>We set a fixed <code>max-height</code> on the <code>.modal-body</code>. Watch it overflow with all this extra lorem ipsum text we've included.</p>
                      <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                      <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                      <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                      <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                      <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
                      <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                  </div>
                  <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal" >Close</a>
                    <a href="#" class="btn btn-primary">Save changes</a>
                  </div>
                </div>
                <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-large"><i class="icon-cog icon-white"></i> Modifier Projet </a>

                <hr>
            </div>
              </div>
      </div>
          </div>
        </div><!--/span-->
      </div><!--/row-->
 </div><!--/.fluid-container-->