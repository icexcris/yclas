$(function(){
    
    //sceditorBBCodePlugin for validation, updates iframe on submit 
$("button[name=submit]").click(function(){
    $("textarea[name=description]").data("sceditor").updateOriginal();
});
    
    //select2 enable/disable
    $('select').select2({
        "language": "es"
    });
    $('select').each(function(){
        if($(this).hasClass('disable-select2')){
            $(this).select2('destroy');      
        } 
    });
    //select2 responsive width
    $(window).on('resize', function() {
        $('select').each(function(){
            var width = $(this).parent().width();
            $(this).siblings('.select2-container').css({'width':width});
        });
    }).trigger('resize');
    
    $('input, select, textarea, .btn').tooltip();

    //datepicker in case date field exists
    if($('.cf_date_fields').length != 0){
        $('.cf_date_fields').datepicker();}

	$('.tips').popover();

	$('.slider_subscribe').slider();

    $('.radio > input:checked').parentsUntil('div .accordion').addClass('in');

    $(window).load(function(){
        $('#accept_terms_modal').modal('show');
    });

});

$(function(){
    var maxHeight = 0;
    $(".latest_ads").each(function() {
        if ($(this).outerHeight() > maxHeight) {
            maxHeight = $(this).outerHeight();
        }
    }).height(maxHeight);
});
