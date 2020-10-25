$('main').hide();
$('.loader').fadeIn('fast');
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('#banner-select').on('change', function(){
        $('#bloader').fadeIn('fast');
        $('#banner, .roll').hide();
        $('#banner').attr('src', 'assets/img/banner/'+$('#banner-select').val()+'.jpeg');
        $('#banner').on('load', function(){
            $('#bloader').fadeOut('fast');
            $('#banner, .roll').show();
        });
        window.location.href = '#banner';
    });
    if(single == 'true'){
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
