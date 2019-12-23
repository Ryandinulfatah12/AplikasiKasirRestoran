$(function() {
	var current = window.location.href;
	$('li a').each(function() {
		var $this = $(this);
		if($this.attr('href') == current) {
			$(this).addClass('active');
		}
	});
});


// $('#form-delete').on('submit', function(e){
// var form = this;
// e.preventDefault();
//     swal({
//       title: 'Hapus data ?',
//       text: "Klik Hapus untuk menghapus data !",
//       type: 'warning',
//       showCancelButton: true,
//       confirmButtonColor: '#3085d6',
//       cancelButtonColor: '#d33',
//       confirmButtonText: 'Hapus'
//     }).then((result) => {
//       if (result.value) {
//         return form.submit();
//       }
//     })
// });