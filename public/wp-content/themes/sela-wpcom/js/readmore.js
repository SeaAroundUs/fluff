(function($) {
$(function() {
  $('a.read-more').click(function(e) {
    var $this = $(this);

    e.preventDefault();
    e.stopPropagation();

    $this.hide();
    $this.siblings('p.more').slideDown();
  });
});
})(jQuery);
