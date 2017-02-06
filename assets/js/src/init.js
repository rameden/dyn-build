jQuery(document).ready(function($){
      
  $('.layout').attr('data-toggle', 'closed');

	$( ".layout .acf-fc-layout-handle" ).live( "click", function() {
		$(this).parent().before( "<div class='acf-layout-modal-clickmask'></div>" );
		$(this).parent().addClass('openModal');
		$('.CodeMirror').each(function(i, el){
	            el.CodeMirror.refresh();
	        });
	});

	$( ".acf-layout-modal-clickmask" ).live( "click", function() {
		$(".openModal .acf-fc-layout-handle").click();

		//There should only be one background in existance
		$(".acf-layout-modal-clickmask").remove();
		$( ".openModal" ).removeClass('openModal');

	});

  //handle clicking button to open/close the search div
    jQuery('.top_searchicon, .searchicon').on('click touchstart', (function(e) {
        e.preventDefault();
        var $el = jQuery(this).toggleClass('active');
        var targetClass = $el.is('.searchicon') ? '.blog_search' : '.top_blog_search';
        jQuery(targetClass).toggleClass('active');
    }));

    //auto focus on search active
    jQuery('.uk-icon-search-top, .uk-icon-search-bottom').click(function(){
      var $el = jQuery(this);
      var targetClass = $el.is('.uk-icon-search-bottom') ? '#search-focus-bottom' : '#search-focus-top';
      jQuery(targetClass).focus();
    });

    //Facebook jquery for share this
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    //Open share in smalle seperate window
    jQuery('#fb_share, #tw_share, #li_share, #go_share').click(function(event) {
        event.preventDefault();
        window.open(jQuery(this).attr("href"), "popupWindow", "width=600,height=400,scrollbars=yes");
    });

});
