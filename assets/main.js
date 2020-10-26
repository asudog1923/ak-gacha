$('main').hide();
$('.loader').fadeIn('fast');
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('#banner-select option').each(function(){
        if($(this).val() == banner){
            $(this).attr('selected', 'selected');
            $('#banner').attr('src', 'assets/img/banner/'+$(this).val()+'.jpeg');
        }
    });
    $('#banner-select').on('change', function(){
        $('#bloader').fadeIn('fast');
        $('#banner, .roll').hide();
        $('#banner').attr('src', 'assets/img/banner/'+$('#banner-select').val()+'.jpeg');
        $.ajax({
            url: 'setting.php?action=banner',
            type: 'POST',
            data: {'data': $('#banner-select').val()}
        });
        $('#banner').on('load', function(){
            $('#bloader').fadeOut('fast');
            $('#banner, .roll').show();
        });
        window.location.href = '#banner';
    });
    if(debug == 'enable'){
        $('#debug-mode').prop('checked', true);
    }else if(debug == 'disable'){
        $('#debug-mode').prop('checked', false);
        $('#debug-title').html('Disabled');
    }
    $('#debug-wrap').click(function(){
        if($('#debug-mode').prop('checked') == true){
            $('#debug-mode').prop('checked', false);
            debug = 'disable';
        }else{
            $('#debug-mode').prop('checked', true);
            debug = 'enable';
        }
        $.ajax({
            url: 'setting.php?action=debug',
            type: 'POST',
            data: {'data': debug}
        });
    });
    $('#summary-toggle').click(function(e){
        e.preventDefault();
        if($('#summary').is(':hidden')){
            $('#summary').slideDown();
        }else{
            $('#summary').slideUp();
        }
    });
    $('#debug-toggle').click(function(e){
        e.preventDefault();
        if($('#debug').is(':hidden')){
            $('#debug').slideDown();
        }else{
            $('#debug').slideUp();
        }
    });
    $('#reset').click(function(e){
        e.preventDefault();
        $.ajax({
            url: 'setting.php?action=reset',
            type: 'POST',
            success: function(response){
                if(response.message == 'redirect'){
                    window.location.href = 'index.php';
                }
            }
        });
    });
    if(typeof single != 'undefined' && single == 'true'){
        $('#result').addClass('justify-content-center');
        $('.wrap').css('width', '10%');
    }
    $('#bar').change(function(){
        var barval = $("#bar").val();
        if(barval == "1"){
            $('#bag').hide();
            $('#bag-container').hide();
            $('#bag').removeClass('bag-bg');
            $('#result').addClass('d-flex flex-row').show();
            $('#result').click(function(){
                window.location.href = 'index.php';
            });
        }
    });
});
$(window).on('load', function(){
    $('.loader').delay(1000).fadeOut('fast');
    $('main').show();
});
