/*
 * GLOBALS
 */

var LOGGED = false;

function ptype2alt() {
    var windowWidth = window.innerWidth;
    var temp1;
    if (windowWidth < 992) {
        temp1 = '<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#login-modal">Login</button><br/>-- ou --<br/><button type="button" class="btn btn-xs btn-info" onclick="showDiv(\'cadastro-div\')">Cadastre-se</button>';
    } else {
        temp1 = 'Faça Login ou Cadastre-se para poder usufruir dos recursos do site!<br/><br/><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#login-modal">Login / Cadastro</button>';
    }
    document.getElementById("p-side-left").innerHTML = temp1;
}


function cepRequest() {
    $('#cep').blur(function() {
        /* Configura a requisição AJAX */
        $.ajax({
            url: 'scripts/consultar_cep.php',
            /* URL que será chamada */
            type: 'POST',
            /* Tipo da requisição */
            data: 'cep=' + $('#cep').val(),
            /* dado que será enviado via POST */
            dataType: 'json',
            /* Tipo de transmissão */
            success: function(data) {
                if (data.sucesso == 1) {
                    $('#rua').val(data.rua);
                    $('#bairro').val(data.bairro);
                    $('#cidade').val(data.cidade);
                    $('#estado').val(data.estado);
                }
            }
        });
        return false;
    })
};


function verifyLogin() {
    var url = '../sessions/session.php';
    $.get(url, function(data, status) {
        valor = JSON.parse(data);
        if (valor == []) {
            LOGGED = true;
        } else {
            LOGGED = valor.logged;
        }

    });
}

function gerarSessao(data, status) {
    var user = jQuery.parseJSON(data);
    var url = '../common/sessions/gerarSessao.php';
    $.post(url, user, function(data,status){location.reload();;});
}


function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    user = {
        insert: 'true',
        gmailProfile: 'true',
        IDGmail: profile.getId(),
        nome: profile.getName(),
        urlImage: profile.getImageUrl(),
        email: profile.getEmail()
    };
    var url = '../common/DB/dbUser.php';
    $.post(url, user, gerarSessao);

}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function() {
        console.log('User signed out.');
    });
}


$(document).ready(function() {
    cepRequest();
    ptype2alt();
    verifyLogin();
});

$(window).resize(function() {
    ptype2alt();
});