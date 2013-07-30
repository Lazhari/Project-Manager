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
                    <div class="span2">
                      <img src="http://placehold.it/160x120" alt="">
                      <div class="caption">
                        <p><br><a href="#" class="btn btn-primary">Modifeir</a>
                      </div>
                    </div>
                    <div class="span10">
                    <div class="well1">
                      <?php if (isset($profil)): ?>
                        <?php foreach ($profil as $value): ?>
                          <table class="table table-striped">
                            <tbody>
                              <tr>
                                <td><strong>Nom:</strong></td>
                                <td><?php echo $value->nom ?></td>
                              </tr>
                              <tr>
                                <td><strong>Prénom:</strong></td>
                                <td><?php echo $value->prenom ?></td>
                              </tr>
                              <tr>
                                <td><strong>Téléphone:</strong></td>
                                <td><?php echo $value->tel ?></td>
                              </tr>
                              <tr>
                                <td><strong>E-mail:</strong></td>
                                <td><?php echo $value->email ?></td>
                              </tr>
                              <tr>
                                <td><strong>Societé:</strong></td>
                                <td><?php echo $value->societe ?></td>
                              </tr>
                              <tr>
                                <td><strong>Adresse:</strong></td>
                                <td><?php echo $value->adress ?></td>
                              </tr>
                              <tr>
                                <td><strong>Ville :</strong></td>
                                <td><?php echo $value->ville ?></td>
                              </tr>
                            </tbody>
                          </table>
                        <?php endforeach ?>
                      <?php endif ?>
                  </div>
                    </div>
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