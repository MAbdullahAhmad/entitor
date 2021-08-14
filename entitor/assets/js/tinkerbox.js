// Flip Setup
let body_el = $("body");
$(()=>{
  body_el.addClass("tbox-active");
});
$(".tbox-flip-btn").click(()=> body_el.toggleClass('tbox-active'));


// Add Property Modal
$('#create-property-modal-trigger').click((e)=>{
  place_modal(e.clientX, e.clientY, 'create-property');
});

// Reload / Refresh Properties
const refresh_properties = properties => location.reload(); // console.log(properties);

// Add Property
const create_property = (data, success_func) => {
  // Request
  if(data.name) $.ajax({
    url: 'operator/property.php',
    method: 'POST',
    data: {
      'operation': 'create',
      'entity': $("#entity-id").val(),
      'payload': data,
      'fetch': true,
    },
    success: (r) => {
      try {
        r = JSON.parse(r);
        if(r.status == 1){
          toastr.success('Property Created Successfully!');
        } else {
          if(r.error) toastr.error(r.error);
          else toastr.error('Unable to Create Proerty!');
        }
      } catch (error) {
        toastr.error('Unable to Create Proerty!');
      }
      if(r.data){
        refresh_properties(r.data);
        if(success_func) success_func();
      }
      else if(r.status == 1) {
        toastr.error("Unable to fetch Data! Refreshing!");
        setTimeout(() => location.reload(), 1500);
      }
    },
    error: () => toastr.error('Unable to Create Property!')
  });
  else toastr.error('Property Name Required!');
};
// Create Property
const create_varchar_property = () => {
  create_property({
    name: $('#create-vc-property-name').val(),
    type: 'VARCHAR',
    nullable: $('#create-vc-nullable')[0].checked,
    unique: $('#create-vc-unique')[0].checked,
    size: $('#create-vc-size').val(),
    default_enable: $('#create-vc-default-enable')[0].checked,
    default_value: $('#create-vc-default-value').val()
  }, () => close_modal('varchar-field'));

  $('#create-vc-property-name').val('');
  $('#create-vc-nullable')[0].checked=false;
  $('#create-vc-unique')[0].checked=false;
  $('#create-vc-size').val('');
  $('#create-vc-default-enable')[0].checked=false;
  $('#create-vc-default-value').val('');
};
const create_numeric_property = () => {
  create_property({
    name: $('#create-nm-property-name').val(),
    type: $('#create-nm-type-1')[0].checked?'FLOAT':'INT',
    nullable: $('#create-nm-nullable')[0].checked,
    unique: $('#create-nm-unique')[0].checked,
    size: $('#create-nm-size').val(),
    default_enable: $('#create-nm-default-enable')[0].checked,
    default_value: $('#create-nm-default-value').val()
  }, () => close_modal('numeric-field'));

  $('#create-nm-property-name').val('');
  $('#create-nm-type-1')[0].checked=true;
  $('#create-nm-nullable')[0].checked=false;
  $('#create-nm-unique')[0].checked=false;
  $('#create-nm-size').val('');
  $('#create-nm-default-enable')[0].checked=false;
  $('#create-nm-default-value').val('');
};
const create_password_property = () => {
  /* Size : 512 (For Sha2-512 Encryption) */
  create_property({
    name: $('#create-pw-property-name').val(),
    type: 'PASSWORD',
    size: 512,
    nullable: $('#create-pw-nullable')[0].checked,
    unique: $('#create-pw-unique')[0].checked,
    default_enable: $('#create-pw-default-enable')[0].checked,
    default_value: $('#create-pw-default-value').val()
  }, () => close_modal('numeric-field'));

  $('#create-pw-property-name').val('');
  $('#create-pw-nullable')[0].checked=false;
  $('#create-pw-unique')[0].checked=false;
  $('#create-pw-default-enable')[0].checked=false;
  $('#create-pw-default-value').val('');
};
const create_text_property = () => {
  create_property({
    name: $('#create-tx-property-name').val(),
    type: 'LARGE_TEXT',
    nullable: $('#create-tx-nullable')[0].checked,
    unique: $('#create-tx-unique')[0].checked,
    default_enable: $('#create-tx-default-enable')[0].checked,
    default_value: $('#create-tx-default-value').val()
  }, () => close_modal('text-field'));

  $('#create-tx-property-name').val('');
  $('#create-tx-nullable')[0].checked=false;
  $('#create-tx-unique')[0].checked=false;
  $('#create-tx-default-enable')[0].checked=false;
  $('#create-tx-default-value').val('');
};
const create_date_property = () => {
  create_property({
    name: $('#create-dt-property-name').val(),
    type: 'DATE',
    nullable: $('#create-dt-nullable')[0].checked,
    unique: $('#create-dt-unique')[0].checked,
    default_enable: $('#create-dt-default-enable')[0].checked,
    default_value: $('#create-dt-default-value').val()
  }, () => close_modal('date-field'));

  $('#create-dt-property-name').val('');
  $('#create-dt-nullable')[0].checked=false;
  $('#create-dt-unique')[0].checked=false;
  $('#create-dt-default-enable')[0].checked=false;
  $('#create-dt-default-value').val('');
};
const create_time_property = () => {
  create_property({
    name: $('#create-tm-property-name').val(),
    type: 'TIME',
    nullable: $('#create-tm-nullable')[0].checked,
    unique: $('#create-tm-unique')[0].checked,
    default_enable: $('#create-tm-default-enable')[0].checked,
    default_value: $('#create-tm-default-value').val()
  }, () => close_modal('time-field'));

  $('#create-tm-property-name').val('');
  $('#create-tm-nullable')[0].checked=false;
  $('#create-tm-unique')[0].checked=false;
  $('#create-tm-default-enable')[0].checked=false;
  $('#create-tm-default-value').val('');
};

// In-Place Modal
const place_modal = (x, y, modal) => $(`[tbox-modal-title='${modal}']`).addClass('active').css('left', `${x-10}px`).css('top', `${y-10}px`);
var drop_modal = (modal) => $(`[tbox-modal-title='${modal}']`).removeClass('active');

// Full-Size Modal
const launch_modal = (modal) => $(`[tbox-fm-title='${modal}']`).addClass('active');
const close_modal = (modal) => $(`[tbox-fm-title='${modal}']`).removeClass('active');