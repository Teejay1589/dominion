// Set base_url ahead

// For Search Bar
$('#searchButton').click(function() {
  if( $('input[name="searchterm"]').val() == "" || $('input[name="searchterm"]').val() == undefined ) {
  } else {
    // document.location.assign(document.location.origin + document.location.pathname + '/' + $('select[name="filter"]').val() + '/' + $('input[name="searchterm"]').val().trim() + '?entries=' + $('select[name="entries"]').val());
    document.location.assign(base_url + '/' + $('select[name="filter"]').val() + '/' + encodeURIComponent($('input[name="searchterm"]').val().trim()) + '?entries=' + $('select[name="entries"]').val());
  }
});
$('input[name="searchterm"]').keydown(function (e) {
  if (e.which == 13) {
    $('#searchButton').click();
    return false;
  }
});
$('select[name="entries"]').change(function() {
    document.location.assign('?entries=' + $(this).val());
});


// // For Multiple Action
// $('input[name="select_all"]').click(function() {
//   if ( $('input[name="select_all"]:checked').length == 1 ) {
//     $('input[name="selection[]"]').attr('checked', true);
//   } else {
//     $('input[name="selection[]"]').attr('checked', false);
//   }
// });
// $('select[name="selection_action"]').change(function() {
//   $('select[name="selection_action"]').val($(this).val());
// });
// $('.multipleActionButton').click(function() {
//   let len = $('input[name="selection[]"]:checked').length;
//   let sa = $('select[name="selection_action"]').val();
//   if( len > 0 && sa != undefined ) {
//     // console.log($('input[name="selection[]"]:checked').serialize());
//     // document.location.assign(document.location.origin + document.location.pathname + '/multiple/' + $('select[name="selection_action"]').val() + '?' + $('input[name="selection[]"]:checked').serialize());
//     document.location.assign(base_url + '/multiple/' + $('select[name="selection_action"]').val() + '?' + $('input[name="selection[]"]:checked').serialize());
//     // console.log(len + ' records to ' + sa);
//   }
//   // } else {
//   //   alert('Please, make some selections!');
//   // }
// });