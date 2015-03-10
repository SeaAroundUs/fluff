( function( $ ) {

	// Focus styles for menus.
	$( '.main-navigation' ).find( 'a' ).on( 'focus.sela blur.sela', function() {
		$( this ).parents().toggleClass( 'focus' );
	} );

	// Additional class for posts with thumbnails
    function addHentryClass() {
        $( '.hentry + .has-post-thumbnail' ).prev().addClass( 'has-post-thumbnail-prev' );
		$('#nav-cat li.cat-item:first').removeClass('current-menu-ancestor'); /* KSB added to remove any leftover selected state */
		$('li.current_page_item').parents('li.cat-item').addClass('current-menu-ancestor'); /* KSB: adds the selected state to the parent menu item */
		/* KSB test for "home" state */  //ONLY if we have not done a search, and nothing else is selected, then select the "home" button.
		if ($('#nav-cat .current-menu-ancestor').length < 1 && $('#nav-cat .current-cat-parent').length < 1 && $("h1.page-title:contains('Search Results for')").length < 1) {
			$('li.cat-item:first').addClass('current-menu-ancestor') //just select the first one ('home') when nothing else got selected
		}
		/* KSB end test for "home" state */
    }

	$( document.body ).on( 'post-load',  addHentryClass );

	addHentryClass();

} )( jQuery );
