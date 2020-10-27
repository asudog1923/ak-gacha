//show loader
$('main').hide();
$('.loader').fadeIn('fast');

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('img').attr('draggable', 'false');

    //set default banner image
    $('#banner-select option').each(function(){
        if($(this).val() == banner){
            $(this).attr('selected', 'selected');
            $('#banner').attr('src', 'assets/img/banner/'+$(this).val()+'.jpeg');
        }
    });

    //change banner image
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

    //check debug is enabled or not
    if(debug == 'enable'){
        $('#debug-mode').prop('checked', true);
        $('#debug-title').html('Output');
    }else{
        $('#debug-mode').prop('checked', false);
    }
    $('#debug-label').click(function(){
        $('#debug-mode').trigger('click');
    });
    $('#debug-mode').on('click', function(){
        if($('#debug-mode').prop('checked') == false){
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

    //summary toggler
    $('#summary-toggle').click(function(e){
        e.preventDefault();
        if($('#summary').is(':hidden')){
            $('#summary').slideDown();
        }else{
            $('#summary').slideUp();
        }
    });
    //debug output toggler
    $('#debug-toggle').click(function(e){
        e.preventDefault();
        if($('#debug').is(':hidden')){
            $('#debug').slideDown();
        }else{
            $('#debug').slideUp();
        }
    });
    //reset button
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

    //check is single
    if(typeof single != 'undefined' && single == 'true'){
        $('#result').addClass('justify-content-center');
        $('.wrap').css('width', '10%');
    }

    //preload operator's image, then append it
    $('.op-load').each(function(){
        $(this).on('load', function(){
            $(this).next().css('background-image', 'url("'+$(this).attr('src')+'")');
            if($(this).next().css('background-image') != 'none') $(this).remove();
        });
    });
    //gacha bag
    $('#bar').change(function(){
        var barval = $('#bar').val();
        if(barval == '1'){
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

//hide loader on page fully loaded
$(window).on('load', function(){
    $('.loader').delay(1000).fadeOut('fast');
    $('main').show();
});
