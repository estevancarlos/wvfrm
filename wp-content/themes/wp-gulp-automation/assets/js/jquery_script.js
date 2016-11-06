(function($) {
    $("a[target='_blank']").each(function() {
        $(this).append( "<i class='fa fa-external-link fa-fw' aria-hidden='true'></i>" );
    });
})( jQuery );