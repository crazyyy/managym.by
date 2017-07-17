function contAdd(elem, link){
    jQuery.post(link,function(data) {
        jQuery(elem).append(data);
    });
}

function contUpt(elem, link){
    jQuery(elem).load(link);
}

var show_overflow = false;

$(document).ready(function(){
    //    $('.ckeditor_add').each(function(){
    //        CKEDITOR.replace($(this).attr('id'));
    //    });
    
    tinymce.PluginManager.load('moxiecut', '/plugins/tinymce/plugins/moxiecut/plugin.min.js');
    tinymce.init({
        selector: ".ckeditor_add",
        plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste moxiecut"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		extended_valid_elements : "iframe[name|src|framespacing|border|frameborder|scrolling|title|height|width]",
        autosave_ask_before_unload: false,
        relative_urls: false,
        remove_script_host: true
    });
 
    $(".fancybox").fancybox();
    
    $('#new-item').click(function(){
        $(this).hide();
        $('.new-item').show();
    });
    
    $('#search-item').click(function(){
        $(this).hide();
        $('.search-item').show();
    });
    
    $('#checkall').click(function(){
        $('.checkboxone input[type=checkbox]').attr('checked','checked');
        return false;
    });
    
    $('.text-more').click(function(){
        if (show_overflow === true)
            $(this).parent('.div-overflow').css('max-height','120px');
        else
            $(this).parent('.div-overflow').css('max-height','none');
        show_overflow = !show_overflow;
    });
    
    $('input[name=date_from]').datepicker({ 
        firstDay: 1,
        monthNames: [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ],
        dayNames: [ "Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота" ],
        dayNamesMin: [ "Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб" ],
        dateFormat: "dd.mm.yy"
    });
    $('input[name=date_to]').datepicker({ 
        firstDay: 1,
        monthNames: [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ],
        dayNames: [ "Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота" ],
        dayNamesMin: [ "Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб" ],
        dateFormat: "dd.mm.yy"
    });
	$('input[name=date]').datepicker({ 
        firstDay: 1,
        monthNames: [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ],
        dayNames: [ "Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота" ],
        dayNamesMin: [ "Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб" ],
        dateFormat: "dd.mm.yy"
    });
	$('input[name=ev_Date]').datepicker({ 
        firstDay: 1,
        monthNames: [ "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь" ],
        dayNames: [ "Воскресенье", "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота" ],
        dayNamesMin: [ "Вс", "Пн", "Вт", "Ср", "Чт", "Пт", "Сб" ],
        dateFormat: "dd.mm.yy"
    });
})