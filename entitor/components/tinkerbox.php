<div class="tinkerbox">
  <div class="tinkerbox-flip">
    <div class="tbox-page tbox-back">
      <div class="tbox-page-content">
        <div class="tbox-editor">
          <ul class="tbox-editor-toolbar">
            <li class="tbox-tool" title="Varchar Field" onclick="launch_modal('varchar-field'); $('#create-vc-property-name').focus();">
              <i class="mdi mdi-format-title"></i>
            </li>
            <li class="tbox-tool" title="Numeric Field" onclick="launch_modal('numeric-field'); $('#create-nm-property-name').focus();">
              <i class="mdi mdi-numeric"></i>
            </li>
            <li class="tbox-tool" title="Password Field" onclick="launch_modal('password-field'); $('#create-pw-property-name').focus();">
              <i class="mdi mdi-asterisk"></i>
            </li>
            <li class="tbox-tool" title="Large Text Field" onclick="launch_modal('text-field'); $('#create-tx-property-name').focus();">
              <i class="mdi mdi-format-align-left"></i>
            </li>
            <li class="tbox-tool" title="Date Field" onclick="launch_modal('date-field'); $('#create-dt-property-name').focus();">
              <i class="mdi mdi-calendar"></i>
            </li>
            <li class="tbox-tool" title="Time Field" onclick="launch_modal('time-field'); $('#create-tm-property-name').focus();">
              <i class="mdi mdi-timer"></i>
            </li>
            <li class="tbox-tool" title="Choices Field" onclick="launch_modal('choices-field'); $('#create-ch-property-name').focus();">
              <i class="mdi mdi-playlist-check"></i>
            </li>
            <li class="tbox-tool" title="Custom Field" onclick="launch_modal('raw-field'); $('#create-rw-property-name').focus();">
              <i class="mdi mdi-code-tags"></i>
            </li>
            <li class="tbox-tool" title="Go Back" onclick="location.href='sandbox.php';">
              <i class="mdi mdi-keyboard-backspace"></i>
            </li>
          </ul>
          <div class="tbox-editor-body">
            <div class="tboxe-body-backart">
            </div>
            <div class="tboxe-body-content">
              <div class="tmp-container">
                <div class="tbox-entity" title="<?=$entity['name']?>">
                  <input type="hidden" id="entity-id" value="<?=$entity['id']?>">
                  <div class="tbox-entity-overlay tbox-entity-overlay-prim active">
                    <h1 class="tbox-entity-title">
                      <?=strlen($entity['name'])>8?(substr($entity['name'], 0, 8)."."):$entity['name']?>
                    </h1>
                  </div>
                  <div class="tbox-entity-overlay tbox-entity-overlay-sec">
                    <ul class="tbox-entity-commands">
                      <li class="tbox-entity-cmd tbox-entity-cmd-lg tec-success" title="Add Property" id="create-property-modal-trigger">
                        <i class="tbox-entity-cmdicon mdi mdi-plus"></i>
                      </li>
                      <li class="tbox-entity-cmd tec-primary" title="Edit">
                        <i class="tbox-entity-cmdicon mdi mdi-pen"></i>
                      </li>
                      <li class="tbox-entity-cmd tec-danger" title="Delete">
                        <i class="tbox-entity-cmdicon mdi mdi-delete"></i>
                      </li>
                      <li class="tbox-entity-cmd tec-special" title="View SQL">
                        <i class="tbox-entity-cmdicon mdi mdi-code-brackets"></i>
                      </li>
                      <li class="tbox-entity-cmd tec-primary" title="Information">
                        <i class="tbox-entity-cmdicon mdi mdi-information-variant"></i>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="tmp-container" id="properties-container">
                <?php
                  foreach($properties as $property){
                    ?>
                      <div class="tbox-property" title="<?=$property['name']?>">
                        <div class="tbox-property-content">
                          <span class="tbox-property-text">
                            <?=strlen($property['name'])>10?(substr($property['name'], 0, 10)."."):$property['name']?>
                          </span>
                        </div>
                        <ul class="tbox-property-commands">
                          <li class="tbox-property-cmd" title="Edit">
                            <i class="mdi mdi-pen"></i>
                          </li>
                          <li class="tbox-property-cmd" title="View SQL">
                            <i class="mdi mdi-code-brackets"></i>
                          </li>
                          <li class="tbox-property-cmd" title="Delete">
                            <i class="mdi mdi-delete"></i>
                          </li>
                        </ul>
                      </div>
                    <?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
        <button class="tbox-flip-btn" title="Goto Design Box">
          <i class="mdi mdi-rotate-3d"></i>
          <span>Design</span>
        </button>
      </div>
      <div class="tbox-modal tbox-cp-container" tbox-modal-title="create-property"> <!-- onmouseleave="drop_modal('create-property');" -->
        <ul class="tbox-cp-items">
          <li class="tbox-cp-item" title="Varchar Field" onclick="drop_modal('create-property'); launch_modal('varchar-field'); $('#create-vc-property-name').focus();">
            <i class="mdi mdi-format-title"></i>
          </li>
          <li class="tbox-cp-item" title="Numeric Field" onclick="drop_modal('create-property'); launch_modal('numeric-field'); $('#create-nm-property-name').focus();">
            <i class="mdi mdi-numeric"></i>
          </li>
          <li class="tbox-cp-item" title="Password Field" onclick="drop_modal('create-property'); launch_modal('password-field'); $('#create-pw-property-name').focus();">
            <i class="mdi mdi-asterisk"></i>
          </li>
          <li class="tbox-cp-item" title="Large Text Field" onclick="drop_modal('create-property'); launch_modal('text-field'); $('#create-tx-property-name').focus();">
            <i class="mdi mdi-format-align-left"></i>
          </li>
          <li class="tbox-cp-item" title="Date Field" onclick="drop_modal('create-property'); launch_modal('date-field'); $('#create-dt-property-name').focus();">
            <i class="mdi mdi-calendar"></i>
          </li>
          <li class="tbox-cp-item" title="Time Field" onclick="drop_modal('create-property'); launch_modal('time-field'); $('#create-tm-property-name').focus();">
            <i class="mdi mdi-timer"></i>
          </li>
          <li class="tbox-cp-item" title="Choices Field" onclick="drop_modal('create-property'); launch_modal('choices-field'); $('#create-ch-property-name').focus();">
            <i class="mdi mdi-playlist-check"></i>
          </li>
          <li class="tbox-cp-item" title="Custom Field" onclick="drop_modal('create-property'); launch_modal('raw-field'); $('#create-rw-property-name').focus();">
            <i class="mdi mdi-code-tags"></i>
          </li>
          <li class="tbox-cp-item danger" title="Close" onclick="drop_modal('create-property');">
            <i class="mdi mdi-close"></i>
          </li>
        </ul>
      </div>
      <div class="tbox-full-modal" tbox-fm-title="varchar-field">
        <div class="tbox-fm-body">
          <h1 class="tbox-fm-title">
            Varchar Field
            <button class="tbox-fm-close" onclick="close_modal('varchar-field');" title="Close">
              <i class="mdi mdi-close"></i>
            </button>
          </h1>
          <div class="mt-4"> <!-- Form -->
            <input type="text" id="create-vc-property-name" class="form-control" placeholder="Name" required>
            <button class="btn btn-light w-100 mt-3" type="button" data-toggle="collapse" data-target="#varchar-advance-options">
              Advance Options
            </button>
            <div class="collapse" style="width: 400px;" id="varchar-advance-options">
              <div class="card card-body">
                <div class="row">
                  <div class="col-md-4 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-vc-nullable" class="custom-control-input">
                      <label class="custom-control-label" for="create-vc-nullable">Nullable</label>
                    </div>
                  </div>
                  <div class="col-md-4 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-vc-unique" class="custom-control-input">
                      <label class="custom-control-label" for="create-vc-unique">Unique</label>
                    </div>
                  </div>
                  <div class="col-md-4 my-3">
                    <input type="number" id="create-vc-size" min="1" value="254" title="Size" placeholder="Size" class="form-control" required>
                  </div>
                  <div class="col-auto pr-0 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-vc-default-enable" class="custom-control-input" onchange="if(this.checked) $('#create-vc-default-value')[0].removeAttribute('disabled'); else $('#create-vc-default-value').attr('disabled', true);">
                      <label class="custom-control-label" for="create-vc-default-enable"></label>
                    </div>
                  </div>
                  <div class="col pl-0 my-3">
                    <input type="text" id="create-vc-default-value" class="form-control" placeholder="Default" disabled>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <button type="button" class="mx-3 btn btn-success col" onclick="create_varchar_property();">Add</button>
            </div>
          </div>
        </div>
      </div>
      <div class="tbox-full-modal" tbox-fm-title="numeric-field">
        <div class="tbox-fm-body">
          <h1 class="tbox-fm-title">
            Numeric Field
            <button class="tbox-fm-close" onclick="close_modal('numeric-field');" title="Close">
              <i class="mdi mdi-close"></i>
            </button>
          </h1>
          <div class="mt-4"> <!-- Form -->
            <input type="text" id="create-nm-property-name" class="form-control" placeholder="Name" required>
            <button class="btn btn-light w-100 mt-3" type="button" data-toggle="collapse" data-target="#numeric-advance-options">
              Advance Options
            </button>
            <div class="collapse" style="width: 400px;" id="numeric-advance-options">
              <div class="card card-body">
                <div class="row">
                  <div class="col-md-6 my-3">
                    <div class="custom-control custom-radio">
                      <input type="radio" name="create-nm-type" id="create-nm-type-1" class="custom-control-input" value="FLOAT" checked>
                      <label class="custom-control-label" for="create-nm-type-1">Floating</label>
                    </div>
                  </div>
                  <div class="col-md-6 my-3">
                    <div class="custom-control custom-radio">
                      <input type="radio" name="create-nm-type" id="create-nm-type-2" class="custom-control-input" value="INT">
                      <label class="custom-control-label" for="create-nm-type-2">Integer</label>
                    </div>
                  </div>
                  <div class="col-md-4 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-nm-nullable" class="custom-control-input">
                      <label class="custom-control-label" for="create-nm-nullable">Nullable</label>
                    </div>
                  </div>
                  <div class="col-md-4 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-nm-unique" class="custom-control-input">
                      <label class="custom-control-label" for="create-nm-unique">Unique</label>
                    </div>
                  </div>
                  <div class="col-md-4 my-3">
                    <input type="number" id="create-nm-size" min="1" value="50" title="Size" placeholder="Size" class="form-control" required>
                  </div>
                  <div class="col-auto pr-0 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-nm-default-enable" class="custom-control-input" onchange="if(this.checked) $('#create-nm-default-value')[0].removeAttribute('disabled'); else $('#create-nm-default-value').attr('disabled', true);">
                      <label class="custom-control-label" for="create-nm-default-enable"></label>
                    </div>
                  </div>
                  <div class="col pl-0 my-3">
                    <input type="number" id="create-nm-default-value" class="form-control" placeholder="Default" disabled>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <button type="button" class="mx-3 btn btn-success col" onclick="create_numeric_property();">Add</button>
            </div>
          </div>
        </div>
      </div>
      <div class="tbox-full-modal" tbox-fm-title="password-field">
        <div class="tbox-fm-body">
          <h1 class="tbox-fm-title">
            Password Field
            <button class="tbox-fm-close" onclick="close_modal('password-field');" title="Close">
              <i class="mdi mdi-close"></i>
            </button>
          </h1>
          <div class="mt-4"> <!-- Form -->
            <input type="text" id="create-pw-property-name" class="form-control" placeholder="Name" required>
            <button class="btn btn-light w-100 mt-3" type="button" data-toggle="collapse" data-target="#password-advance-options">
              Advance Options
            </button>
            <div class="collapse" style="width: 400px;" id="password-advance-options">
              <div class="card card-body">
                <div class="row">
                  <div class="col-md-6 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-pw-nullable" class="custom-control-input">
                      <label class="custom-control-label" for="create-pw-nullable">Nullable</label>
                    </div>
                  </div>
                  <div class="col-md-6 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-pw-unique" class="custom-control-input">
                      <label class="custom-control-label" for="create-pw-unique">Unique</label>
                    </div>
                  </div>
                  <div class="col-auto pr-0 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-pw-default-enable" class="custom-control-input" onchange="if(this.checked) $('#create-pw-default-value')[0].removeAttribute('disabled'); else $('#create-pw-default-value').attr('disabled', true);">
                      <label class="custom-control-label" for="create-pw-default-enable"></label>
                    </div>
                  </div>
                  <div class="col pl-0 my-3">
                    <input type="number" id="create-pw-default-value" class="form-control" placeholder="Default" disabled>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <button type="button" class="mx-3 btn btn-success col" onclick="create_password_property();">Add</button>
            </div>
          </div>
        </div>
      </div>
      <div class="tbox-full-modal" tbox-fm-title="text-field">
        <div class="tbox-fm-body">
          <h1 class="tbox-fm-title">
            Large Text Field
            <button class="tbox-fm-close" onclick="close_modal('text-field');" title="Close">
              <i class="mdi mdi-close"></i>
            </button>
          </h1>
          <div class="mt-4"> <!-- Form -->
            <input type="text" id="create-tx-property-name" class="form-control" placeholder="Name" required>
            <button class="btn btn-light w-100 mt-3" type="button" data-toggle="collapse" data-target="#text-advance-options">
              Advance Options
            </button>
            <div class="collapse" style="width: 400px;" id="text-advance-options">
              <div class="card card-body">
                <div class="row">
                  <div class="col-md-6 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-tx-nullable" class="custom-control-input">
                      <label class="custom-control-label" for="create-tx-nullable">Nullable</label>
                    </div>
                  </div>
                  <div class="col-md-6 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-tx-unique" class="custom-control-input">
                      <label class="custom-control-label" for="create-tx-unique">Unique</label>
                    </div>
                  </div>
                  <div class="col-auto pr-0 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-tx-default-enable" class="custom-control-input" onchange="if(this.checked) $('#create-tx-default-value')[0].removeAttribute('disabled'); else $('#create-tx-default-value').attr('disabled', true);">
                      <label class="custom-control-label" for="create-tx-default-enable"></label>
                    </div>
                  </div>
                  <div class="col pl-0 my-3">
                    <textarea type="text" id="create-tx-default-value" class="form-control" placeholder="Default" disabled></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <button type="button" class="mx-3 btn btn-success col" onclick="create_text_property();">Add</button>
            </div>
          </div>
        </div>
      </div>
      <div class="tbox-full-modal" tbox-fm-title="date-field">
        <div class="tbox-fm-body">
          <h1 class="tbox-fm-title">
            Date Field
            <button class="tbox-fm-close" onclick="close_modal('date-field');" title="Close">
              <i class="mdi mdi-close"></i>
            </button>
          </h1>
          <div class="mt-4"> <!-- Form -->
            <input type="text" id="create-dt-property-name" class="form-control" placeholder="Name" required>
            <button class="btn btn-light w-100 mt-3" type="button" data-toggle="collapse" data-target="#date-advance-options">
              Advance Options
            </button>
            <div class="collapse" style="width: 400px;" id="date-advance-options">
              <div class="card card-body">
                <div class="row">
                  <div class="col-md-6 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-dt-nullable" class="custom-control-input">
                      <label class="custom-control-label" for="create-dt-nullable">Nullable</label>
                    </div>
                  </div>
                  <div class="col-md-6 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-dt-unique" class="custom-control-input">
                      <label class="custom-control-label" for="create-dt-unique">Unique</label>
                    </div>
                  </div>
                  <div class="col-auto pr-0 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-dt-default-enable" class="custom-control-input" onchange="if(this.checked) $('#create-dt-default-value')[0].removeAttribute('disabled'); else $('#create-dt-default-value').attr('disabled', true);">
                      <label class="custom-control-label" for="create-dt-default-enable"></label>
                    </div>
                  </div>
                  <div class="col pl-0 my-3">
                    <input type="date" id="create-dt-default-value" class="form-control" placeholder="Default" disabled>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <button type="button" class="mx-3 btn btn-success col" onclick="create_date_property();">Add</button>
            </div>
          </div>
        </div>
      </div>
      <div class="tbox-full-modal" tbox-fm-title="time-field">
        <div class="tbox-fm-body">
          <h1 class="tbox-fm-title">
            Time Field
            <button class="tbox-fm-close" onclick="close_modal('time-field');" title="Close">
              <i class="mdi mdi-close"></i>
            </button>
          </h1>
          <div class="mt-4"> <!-- Form -->
            <input type="text" id="create-tm-property-name" class="form-control" placeholder="Name" required>
            <button class="btn btn-light w-100 mt-3" type="button" data-toggle="collapse" data-target="#time-advance-options">
              Advance Options
            </button>
            <div class="collapse" style="width: 400px;" id="time-advance-options">
              <div class="card card-body">
                <div class="row">
                  <div class="col-md-6 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-tm-nullable" class="custom-control-input">
                      <label class="custom-control-label" for="create-tm-nullable">Nullable</label>
                    </div>
                  </div>
                  <div class="col-md-6 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-tm-unique" class="custom-control-input">
                      <label class="custom-control-label" for="create-tm-unique">Unique</label>
                    </div>
                  </div>
                  <div class="col-auto pr-0 my-3">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" id="create-tm-default-enable" class="custom-control-input" onchange="if(this.checked) $('#create-tm-default-value')[0].removeAttribute('disabled'); else $('#create-tm-default-value').attr('disabled', true);">
                      <label class="custom-control-label" for="create-tm-default-enable"></label>
                    </div>
                  </div>
                  <div class="col pl-0 my-3">
                    <input type="time" id="create-tm-default-value" class="form-control" placeholder="Default" disabled>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-4">
              <button type="button" class="mx-3 btn btn-success col" onclick="create_time_property();">Add</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tbox-page tbox-front">
      <div class="tbox-page-content">
        <h1 class="p-3">Design Panel</h1>
        <button class="tbox-flip-btn" title="Goto Structure Box">
          <i class="mdi mdi-rotate-3d"></i>
          <span>Struct</span>
        </button>
      </div>
    </div>
  </div>
</div>