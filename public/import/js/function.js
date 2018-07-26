$(document).ready(function(){
  //Init
  $('.formOne').hide();
  $('.formMailOne').hide();
  $('.formAbsStructureReservation').hide();
  $('.formAbsPortalReservation').hide();
  $('.formAbsEnquiry').hide();
  $('.formAbsStoreONE').hide();
  //Select tipologia
  $('#selectType').change(function(){
    $('.formOne').hide();
    $('.formMailOne').hide();
    $('.formAbsStructureReservation').hide();
    $('.formAbsEnquiry').hide();
    if($(this).val()==1){
      $('.formOne').show();
    } else if ($(this).val() == 2) {
      $('.formMailOne').show();
    } else if ($(this).val() == 3) {
      $('.formAbsStructureReservation').show();
    } else if ($(this).val() == 4) {
      $('.formAbsPortalReservation').show();
    } else if ($(this).val() == 5) {
      $('.formAbsEnquiry').show();
    } else if ($(this).val() == 6) {
      $('.formAbsStoreONE').show();
    }
  });
  //Submit form FormOne
  $('#formOne').on('submit', function (e) {
    e.preventDefault();
    var item = $(this).serializeArray();
    $.ajax({
      url: '/api/import/dataone/upgrade',
      type: 'POST',
      contentType: 'application/json',
      data: JSON.stringify(item),
      dataType: "json",
      cache: false,
      timeout: (1000 * 60 * 60 * 24),
      beforeSend: function () {
        $('<div class="loadingOver"><span class="fas fa-spinner mm-spin"></span></div>').insertBefore($('#formOne'));
      },
      success: function (msg) {
        $('.loadingOver').fadeOut(100, function () {
          $(this).remove();
        });
        if (msg['result']=='welcome'){
          $('#formOne')[0].reset();
          swal({
            type: 'success',
            title: 'Dati inviati correttamente'
          });
        }
      },
      error: function (msg) {
        $('.loadingOver').fadeOut(100, function () {
          $(this).remove();
        });
        swal({
          type: 'error',
          title: 'Errore',
          text: msg.statusText
        })
      }
    });
  });
  //Submit form MailOne
  $('#formMailOne').on('submit', function (e) {
    e.preventDefault();
    var item = $(this).serializeArray();
    $.ajax({
      url: '/api/import/mailone/newsletter',
      type: 'POST',
      contentType: 'application/json',
      data: JSON.stringify(item),
      dataType: "json",
      cache: false,
      timeout: (1000 * 60 * 60 * 24),
      beforeSend: function () {
        $('<div class="loadingOver"><span class="fas fa-spinner mm-spin"></span></div>').insertBefore($('#formMailOne'));
      },
      success: function (msg) {
        $('.loadingOver').fadeOut(100, function () {
          $(this).remove();
        });
        if (msg['result']=='welcome'){
          $('#formOne')[0].reset();
          swal({
            type: 'success',
            title: 'Dati inviati correttamente'
          });
        }
      },
      error: function (msg) {
        $('.loadingOver').fadeOut(100, function () {
          $(this).remove();
        });
        swal({
          type: 'error',
          title: 'Errore',
          text: msg.statusText
        })
      }
    });
  });
  //Submit form formAbs
  $('#formAbsStructureReservation').on('submit', function (e) {
    e.preventDefault();
    var item = new FormData();
    item.append('file', $('#csvreservation')[0].files[0]);
    var myData = $(this).serialize();
    item.append('myData', myData);
    $.ajax({
      url: '/api/import/abs/structure/reservation',
      type: 'POST',
      contentType: false,
      processData: false,
      data: item,
      crossDomain: true,
      cache: false,
      timeout: (1000 * 60 * 60 * 24),
      beforeSend: function () {
        $('<div class="loadingOver"><span class="fas fa-spinner mm-spin"></span></div>').insertBefore($('#formAbsStructureReservation'));
      },
      success: function (msg) {
        $('.loadingOver').fadeOut(100, function () {
          $(this).remove();
        });
        if (msg['result'] == 'welcome') {
          $('#formAbsStructureReservation')[0].reset();
          swal({
            type: 'success',
            title: 'Dati inviati correttamente'
          });
        }
      },
      error: function (msg) {
        $('.loadingOver').fadeOut(100, function () {
          $(this).remove();
        });
        swal({
          type: 'error',
          title: 'Errore',
          text: msg.statusText
        })
      }
    });
  });
  //Submit form formAbs
  $('#formAbsPortalReservation').on('submit', function (e) {
    e.preventDefault();
    var item = new FormData();
    item.append('file', $('#csvportal')[0].files[0]);
    var myData = $(this).serialize();
    item.append('myData', myData);
    $.ajax({
      url: '/api/import/abs/portal/reservation',
      type: 'POST',
      contentType: false,
      processData: false,
      data: item,
      crossDomain: true,
      cache: false,
      timeout: (1000 * 60 * 60 * 24),
      beforeSend: function () {
        $('<div class="loadingOver"><span class="fas fa-spinner mm-spin"></span></div>').insertBefore($('#formAbsPortalReservation'));
      },
      success: function (msg) {
        $('.loadingOver').fadeOut(100, function () {
          $(this).remove();
        });
        if (msg['result'] == 'welcome') {
          $('#formAbsPortalReservation')[0].reset();
          swal({
            type: 'success',
            title: 'Dati inviati correttamente'
          });
        }
      },
      error: function (msg) {
        $('.loadingOver').fadeOut(100, function () {
          $(this).remove();
        });
        swal({
          type: 'error',
          title: 'Errore',
          text: msg.statusText
        })
      }
    });
  });
  //Submit form formAbs
  $('#formAbsEnquiry').on('submit', function (e) {
    e.preventDefault();
    var item = new FormData();
    item.append('file', $('#csvenquiry')[0].files[0]);
    var myData = $(this).serialize();
    item.append('myData', myData);
    $.ajax({
      url: '/api/import/abs/enquiry',
      type: 'POST',
      contentType: false,
      processData: false,
      data: item,
      crossDomain: true,
      cache: false,
      timeout: (1000 * 60 * 60 * 24),
      beforeSend: function () {
        $('<div class="loadingOver"><span class="fas fa-spinner mm-spin"></span></div>').insertBefore($('#formAbsEnquiry'));
      },
      success: function (msg) {
        $('.loadingOver').fadeOut(100, function () {
          $(this).remove();
        });
        if (msg['result'] == 'welcome') {
          $('#formAbsEnquiry')[0].reset();
          swal({
            type: 'success',
            title: 'Dati inviati correttamente'
          });
        }
      },
      error: function (msg) {
        $('.loadingOver').fadeOut(100, function () {
          $(this).remove();
        });
        swal({
          type: 'error',
          title: 'Errore',
          text: msg.statusText
        })
      }
    });
  });
  //Submit form StoreONE
  $('#formAbsStoreONE').on('submit', function (e) {
    e.preventDefault();
    var item = new FormData();
    item.append('file', $('#csvstoreone')[0].files[0]);
    var myData = $(this).serialize();
    item.append('myData', myData);
    $.ajax({
      url: '/api/import/abs/storeone',
      type: 'POST',
      contentType: false,
      processData: false,
      data: item,
      crossDomain: true,
      cache: false,
      timeout: (1000 * 60 * 60 * 24),
      beforeSend: function () {
        $('<div class="loadingOver"><span class="fas fa-spinner mm-spin"></span></div>').insertBefore($('#formAbsStoreONE'));
      },
      success: function (msg) {
        $('.loadingOver').fadeOut(100, function () {
          $(this).remove();
        });
        if (msg['result'] == 'welcome') {
          $('#formAbsStoreONE')[0].reset();
          swal({
            type: 'success',
            title: 'Dati inviati correttamente'
          });
        }
      },
      error: function (msg) {
        $('.loadingOver').fadeOut(100, function () {
          $(this).remove();
        });
        swal({
          type: 'error',
          title: 'Errore',
          text: msg.statusText
        })
      }
    });
  });
});