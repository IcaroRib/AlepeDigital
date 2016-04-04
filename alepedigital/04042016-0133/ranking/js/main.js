/*
 * GLOBALS
 */
CURRENT_PAGE = 0;


function load_content(){

    $('#loading').html("<img src='../common/img/loading.gif' height='32' width='32'/>").fadeIn('fast');
    var path = "scripts/getContent.php";
    
    $.ajax({

            url : path, /* URL que será chamada */ 
            type: 'POST',
            data: 'page=' + CURRENT_PAGE,
            cache: false,
            success: function(data){

                $('#loading').fadeOut('fast');
                $("#content-div").append(data);

            },
            error: function (data) {

                $('#loading').html("<img src='../common/img/error-loading.gif' height='32' width='32'/>").fadeIn('fast');

            }
    });
};



$(window).scroll(function(){

    if ($(window).scrollTop() + $(window).height() >= $(document).height() - 300){
        CURRENT_PAGE++;
        load_content();      
    }
});

$(document).ready(function() {   
    load_content();
});