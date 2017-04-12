jQuery(document).ready(function( $ ) {
    function toggleAccordion(){
        if ($(window).width() < 992) {
            $( "#accordion" ).accordion();
        } else {
            $("#accordion").accordion("destroy");
        }
    }

    $("a[target='_blank']").each(function() {
        $(this).append( "<i class='fa fa-external-link fa-fw' aria-hidden='true'></i>" );
    });

    //http://stackoverflow.com/a/10770580/1088526
    $(window).resize(function(){
        toggleAccordion();
    });

});