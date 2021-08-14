<div class="sandbox-wrapper">
  <!-- Base -->
  <div class="sandbox-base">
    <div class="sb-base-shadow">
      <div class="sb-base-shadow-block"></div>
      <div class="sb-base-shadow-block"></div>
      <div class="sb-base-shadow-block"></div>
      <div class="sb-base-shadow-block"></div>
    </div>
    <div class="sb-base-content" id="sb-content">
      <?php
        if(count($entities)==0){
          ?>
            <div class="sb-center">
              <div class="sb-create-master" onclick="launch_modal('create')">
                <i class="sb-create-master-icon mdi mdi-plus"></i>
                <div class="sb-create-master-text">
                  Create New
                </div>
              </div>
            </div>
          <?php
        } else {
          ?>
            <ul class="sb-items-container" id="sb-items-list">
              <?php
                foreach($entities as $entity){
                  ?>
                    <li class="sb-item" title="<?=$entity['name']?>">
                      <div class="sb-item-preview">
                        <span class="sb-item-preview-text">
                          <?=strlen($entity['name'])>4?(substr($entity['name'], 0, 4)."."):$entity['name']?>
                        </span>
                      </div>
                      <div class="sb-item-overlay">
                        <div class="sb-item-edit" onclick="tinkerbox(<?=$entity['id']?>)"></div>
                        <div class="sb-item-selector">
                          <label for="sb-check-elem-<?=$entity['id']?>" class="sb-item-check-status" title="Toggle Selection">
                            <input type="checkbox" id="sb-check-elem-<?=$entity['id']?>" class="sb-check-elem" sb-item-id="<?=$entity['id']?>">
                            <i class="check-status check-status-empty mdi mdi-checkbox-blank-circle-outline"></i>
                            <i class="check-status check-status-checked mdi mdi-checkbox-marked-circle-outline"></i>
                          </label>
                        </div>
                        <ul class="sb-item-top-menu sb-item-menu">
                          <li class="sb-item-item sb-item-menu-item-danger" onclick="delete_entity(<?=$entity['id']?>);" title="Delete">
                            <i class="mdi mdi-delete"></i>
                          </li>
                          <li class="sb-item-item sb-item-menu-item-success" title="Edit" onclick="enable_edit_entity(<?=$entity['id']?>, '<?=$entity['name']?>');">
                            <i class="mdi mdi-pencil"></i>
                          </li>
                        </ul>
                        <ul class="sb-item-bottom-menu sb-item-menu">
                          <li class="sb-item-item sb-item-menu-item-expandable sb-item-menu-item-info" title="Info">
                            <i class="mdi mdi-information-variant"></i>
                            <div class="sb-item-menu-item-expand">
                              <div class="sb-expand-row">
                                <b>Created</b>: <?=strftime("%a %e %B %Y, %l:%M:%S %p", strtotime($entity['c_date'] . " " . $entity['c_time']))?>
                              </div>
                              <div class="sb-expand-row">
                                <b>Modified</b>: <?=strftime("%a %e %B %Y, %l:%M:%S %p", strtotime($entity['m_date'] . " " . $entity['m_time']))?>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </li>
                  <?php
                }
              ?>
              <li class="sb-item sb-item-muted" onclick="launch_modal('create')" title="Create New Entity">
                <div class="sb-item-create">
                  <i class="mdi mdi-plus sb-item-icon"></i>
                  <span class="sb-item-text">
                    Create
                  </span>
                </div>
              </li>
            </ul>
          <?php
        }
      ?>
    </div>
  </div>

  <!-- Toolbar -->
  <div class="sandbox-toolbar">
    <a href="index.php" class="sb-toolbar-logo" title="Home">
      <img src="assets/img/logo.png" alt="" class="sb-toolbar-logo-img">
    </a>
    <ul class="sb-toolbar-menu">
      <li class="sb-toolbar-menu-item" title="Create New Entity" onclick="launch_modal('create')">
        <div class="sb-toolbar-menu-icon-wrapper">
          <i class="mdi mdi-plus sb-toolbar-menu-icon"></i>
        </div>
        <span class="sb-toolbar-menu-text">
          Create
        </span>
      </li>
      <li class="sb-toolbar-menu-item" title="Toggle Selection Mode" id="sb-selection-toggle-trigger" onclick="toggle_selection();">
        <div class="sb-toolbar-menu-icon-wrapper">
          <i class="mdi mdi-check sb-toolbar-menu-icon"></i>
        </div>
        <span class="sb-toolbar-menu-text">
          Select
        </span>
      </li>
      <li class="sb-toolbar-menu-item" title="Select All" onclick="select_all();">
        <div class="sb-toolbar-menu-icon-wrapper">
          <i class="mdi mdi-check-all sb-toolbar-menu-icon"></i>
        </div>
        <span class="sb-toolbar-menu-text">
          All
        </span>
      </li>
      <li class="sb-toolbar-menu-item disabled" title="Delete Selected" id="sb-selection-delete-oper" onclick="delete_selected(this);">
        <div class="sb-toolbar-menu-icon-wrapper">
          <i class="mdi mdi-delete sb-toolbar-menu-icon"></i>
        </div>
        <span class="sb-toolbar-menu-text">
          Delete
        </span>
      </li>
      <li class="sb-toolbar-menu-item" title="Back to Homepage" onclick="location.href='index.php';">
        <div class="sb-toolbar-menu-icon-wrapper">
          <i class="mdi mdi-exit-to-app sb-toolbar-menu-icon"></i>
        </div>
        <span class="sb-toolbar-menu-text">
          Exit
        </span>
      </li>
    </ul>
  </div>

  <!-- Modals -->
  <div class="sb-modal sb-hidden" sb-modal="create">
    <div class="sb-modal-content p-4 text-center">
      <h3 class="text-muted py-4 sb-nus">Create</h3>
      <hr>
      <div class="p-4 row text-right">
        <input type="text" name="entity" id="add-entity" class="form-control col-md m-2 pl-3 sb-round" placeholder="Entity Name" required>
        <button class="btn btn-success col-sm-auto col m-2 pr-4 pl-3 sb-round" title="Create Entity" onclick="add_entity();">
          <i class="mdi mdi-plus"></i> Create
        </button>
      </div>
      <button class="btn btn-secondary sb-round sb-modal-close" title="Close"  onclick="close_modal('create')">
        <i class="mdi mdi-close"></i>
      </button>
    </div>
  </div>
  <div class="sb-modal sb-hidden" sb-modal="edit">
    <div class="sb-modal-content p-4 text-center">
      <h3 class="text-muted py-4 sb-nus">Edit</h3>
      <hr>
      <div class="p-4 row text-right">
        <input type="hidden" name="entity_id" id="edit-entity-id">
        <input type="text" name="entity" id="edit-entity" class="form-control col-md m-2 pl-3 sb-round" placeholder="Entity Name" required>
        <button class="btn btn-primary col-sm-auto col m-2 pr-4 pl-3 sb-round" title="Edit Entity" onclick="edit_entity();">
          <i class="mdi mdi-pen"></i> Edit
        </button>
      </div>
      <button class="btn btn-secondary sb-round sb-modal-close" title="Close"  onclick="close_modal('edit')">
        <i class="mdi mdi-close"></i>
      </button>
    </div>
  </div>
</div>