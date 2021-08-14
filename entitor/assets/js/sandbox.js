// Modal
const launch_modal = modal => $(`[sb-modal='${modal}']`).removeClass('sb-hidden').addClass("sb-modal-anim");
const close_modal = modal => $(`[sb-modal='${modal}']`).addClass('sb-hidden').removeClass("sb-modal-anim");

// API
const load_entities = data => {
  if(data.length==0) $("#sb-content").html("<div class=\"sb-center\"><div class=\"sb-create-master\" onclick=\"launch_modal('create')\"><i class=\"sb-create-master-icon mdi mdi-plus\"></i><div class=\"sb-create-master-text\">Create New</div></div></div>");
  else {
    let html = "<ul class=\"sb-items-container\" id=\"sb-items-list\">";
    for(let entity of data){
      let created = new Date(Date.parse(entity.c_date + " " + entity.c_time));
      let modified = new Date(Date.parse(entity.m_date + " " + entity.m_time));
      let days = [
        "Sun",
        "Mon",
        "Tue",
        "Wed",
        "Thu",
        "Fri",
        "Sat",
      ];
      let months = [
        "Jan",
        "Feb",
        "Mar",
        "Apr",
        "May",
        "Jun",
        "Jul",
        "Aug",
        "Sep",
        "Oct",
        "Nov",
        "Dec",
      ];
      html += `<li class="sb-item" title="${entity.name}"><div class="sb-item-preview"><span class="sb-item-preview-text">${entity.name.length>4?(entity.name.substring(0, 4)+"."):entity.name}</span></div><div class="sb-item-overlay"><div class="sb-item-edit" onclick="tinkerbox(${entity.id})"></div><div class="sb-item-selector"><label for="sb-check-elem-${entity.id}" class="sb-item-check-status" title="Toggle Selection"><input type="checkbox" id="sb-check-elem-${entity.id}" class="sb-check-elem" sb-item-id="${entity.id}"><i class="check-status check-status-empty mdi mdi-checkbox-blank-circle-outline"></i><i class="check-status check-status-checked mdi mdi-checkbox-marked-circle-outline"></i></label></div><ul class="sb-item-menu sb-item-top-menu"><li class="sb-item-item sb-item-menu-item-danger" onclick="delete_entity(${entity.id});" title="Delete"><i class="mdi mdi-delete"></i></li><li class="sb-item-item sb-item-menu-item-success" title="Edit" onclick="enable_edit_entity(${entity.id}, '${entity.name}');"><i class="mdi mdi-pencil"></i></li></ul><ul class="sb-item-menu sb-item-bottom-menu"><li class="sb-item-item sb-item-menu-item-expandable sb-item-menu-item-info" title="Info"><i class="mdi mdi-information-variant"></i><div class="sb-item-menu-item-expand"><div class="sb-expand-row"><b>Created</b>: ${`${days[created.getDay()]} ${created.getDate()} ${months[created.getMonth()]} ${created.getFullYear()}, ${created.getHours()%12}:${created.getMinutes()<10?"0"+created.getMinutes():created.getMinutes()}:${created.getSeconds()<10?"0"+created.getSeconds():created.getSeconds()} ${created.getHours()>12?"PM":"AM"}`}</div><div class="sb-expand-row"><b>Modified</b>: ${`${days[modified.getDay()]} ${modified.getDate()} ${months[modified.getMonth()]} ${modified.getFullYear()}, ${modified.getHours()%12}:${modified.getMinutes()<10?"0"+modified.getMinutes():modified.getMinutes()}:${modified.getSeconds()<10?"0"+modified.getSeconds():modified.getSeconds()} ${modified.getHours()>12?"PM":"AM"}`}</div></div></li></ul></div></li>`;
    }
    html += "<li class=\"sb-item sb-item-muted\" onclick=\"launch_modal('create')\" title=\"Create New Entity\"><div class=\"sb-item-create\"><i class=\"mdi mdi-plus sb-item-icon\"></i><span class=\"sb-item-text\">Create</span></div></li></ul>";
    $("#sb-content").html(html);
  }
  $("#sb-selection-toggle-trigger").removeClass('active');
  turn_selection_commands();
}
const delete_entity = entity_id => $.ajax({
  url: 'operator/entity.php',
  method: 'POST',
  data: {
    'operation': 'delete',
    'id': entity_id,
    'fetch': true
  },
  success: (r) => {
    try {
      r = JSON.parse(r);
      if(r.status == 1){
        toastr.success("Entity Deleted Successfully!");
      } else {
        if(r.error) toastr.error(r.error);
        else toastr.error("Unable to Delete Entity!");
      }
    } catch (error) {
      toastr.error("Unable to Delete Entity!");
    }
    if(r.data)
    load_entities(r.data);
    else if(r.status == 1) {
      toastr.error("Unable to fetch Data! Refreshing!");
      setTimeout(() => location.reload(), 1500);
    }
  },
  error: () => toastr.error("Unable to Delete Entity!")
});
const add_entity = () => {
  let value = $('#add-entity').val();
  if(value)
  $.ajax({
    url: 'operator/entity.php',
    method: 'POST',
    data: {
      'operation': 'create',
      'entity': value,
      'fetch': true
    },
    success: (r) => {
      try {
        r = JSON.parse(r);
        if(r.status == 1){
          toastr.success("Entity Created Successfully!");
          $('#add-entity').val("");
          close_modal('create');
        } else {
          if(r.error) toastr.error(r.error);
          else toastr.error("Unable to Create Entity!");
        }
      } catch (error) {
        toastr.error("Unable to Create Entity!");
      }
      if(r.data)
      load_entities(r.data);
      else if(r.status == 1) {
        toastr.error("Unable to fetch Data! Refreshing!");
        setTimeout(() => location.reload(), 1500);
      }
    },
    error: () => toastr.error("Unable to Create Entity!")
  });
  else toastr.error("Entity Required!");
};
const delete_multiple = deletion_ids => $.ajax({
  url: 'operator/entity.php',
  method: 'POST',
  data: {
    'operation': 'delete_multiple',
    'ids': deletion_ids,
    'fetch': true
  },
  success: (r) => {
    try {
      r = JSON.parse(r);
      if(r.status == 1){
        toastr.success(`Selection${deletion_ids.length>1?'s':''} Deleted Successfully!`);
      } else {
        if(r.error) toastr.error(r.error);
        else toastr.error(`Unable to Delete Selection${deletion_ids.length>1?'s':''}!`);
      }
    } catch (error) {
      toastr.error(`Unable to Delete Selection${deletion_ids.length>1?'s':''}!`);
    }
    if(r.data){
      load_entities(r.data);
    }
    else if(r.status == 1) {
      toastr.error("Unable to fetch Data! Refreshing!");
      setTimeout(() => location.reload(), 1500);
    }
  },
  error: () => toastr.error(`Unable to Delete Selection${deletion_ids.length>1?'s':''}!`)
});
const enable_edit_entity = (entity_id, entity_value) => {
  $("#edit-entity-id").val(entity_id);
  $("#edit-entity").val(entity_value);
  launch_modal('edit');
};
const edit_entity = () => {
  let id = $('#edit-entity-id').val();
  let value = $('#edit-entity').val();
  if(id && value)
  $.ajax({
    url: 'operator/entity.php',
    method: 'POST',
    data: {
      'operation': 'edit',
      'id': id,
      'entity': value,
      'fetch': true
    },
    success: (r) => {
      try {
        r = JSON.parse(r);
        if(r.status == 1){
          toastr.success("Entity Edited Successfully!");
          $('#edit-entity-id').val("");
          $('#edit-entity').val("");
          close_modal('edit');
        } else {
          if(r.error) toastr.error(r.error);
          else toastr.error("Unable to Edit Entity!");
        }
      } catch (error) {
        toastr.error("Unable to Edit Entity!");
      }
      if(r.data)
      load_entities(r.data);
      else if(r.status == 1) {
        toastr.error("Unable to fetch Data! Refreshing!");
        setTimeout(() => location.reload(), 1500);
      }
    },
    error: () => toastr.error("Unable to Edit Entity!")
  });
  else toastr.error("Entity Required!");
};
const tinkerbox = (entity_id) => location.href = `tinkerbox.php?entity=${entity_id}`;

// Commands
const turn_selection_commands = () => {
  if($("#sb-items-list").hasClass("sb-selection-mode"))
  $("#sb-selection-delete-oper").removeClass("disabled");
  else $("#sb-selection-delete-oper").addClass("disabled");
};
const toggle_selection = () => {
  $("#sb-items-list").toggleClass("sb-selection-mode");
  $("#sb-selection-toggle-trigger").toggleClass("active");

  turn_selection_commands();
};
const select_all = () => {
  if(!$("#sb-items-list").hasClass("sb-selection-mode"))
  toggle_selection();
  
  let unselected_found = false;
  for(let element of $(".sb-check-elem"))
  if (!element.checked) unselected_found = true;

  if(unselected_found) for(let element of $(".sb-check-elem"))
  element.checked = true;
  else for(let element of $(".sb-check-elem"))
  element.checked = false;
};
const delete_selected = (delete_button) => {
  if($(delete_button).hasClass('disabled')){
    toastr.error("Select to Delete!");
    return;
  }
  let deletion_ids = [];
  for(element of $('.sb-check-elem'))
  if(element.checked) deletion_ids.push($(element).attr('sb-item-id'));

  if(deletion_ids.length == 0)
  toastr.error("Zero Selected!");
  else delete_multiple(deletion_ids);
};