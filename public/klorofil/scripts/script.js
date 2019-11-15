$(function() {
	var current = window.location.href;
	$('.sidebar nav a').each(function() {
		var $this = $(this);
		if($this.attr('href') == current) {
			$this.parents('li').addClass('active');
		}
	});
});