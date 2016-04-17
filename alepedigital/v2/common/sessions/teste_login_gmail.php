<!DOCTYPE html>
<html>

<head>
    <title>
        Facebook Login JavaScript Example
    </title>
    <meta charset="UTF-8">
</head>

<body>
    <script src="https://apis.google.com/js/platform.js" async defer>
    </script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
    </script>
    <button class="btn btn-sm btn-danger">Login com G+</button>
    <meta name="google-signin-client_id" content="648376689398-rbkruvg0pf8r2q627ttfbsa7gcpl5olu.apps.googleusercontent.com">
    <div id="my-signin2">Login com G+</div>

    </div>

    <?php

    session_start();

    if(isset($_SESSION['logged'])){

        if($_SESSION['logged'] == true){

            echo 'Id = '. $_SESSION["id"].' <br> '.'Nome ='. $_SESSION["nome"];

        }

        else{
            echo "a";
            echo '<div class="g-signin2" data-onsuccess="onSignIn">';

        }

    }
    else{
        echo '<div class="g-signin2" data-onsuccess="onSignIn">';
    }

    ?>
    <script>

        user = {};

        function renderButton() {
              gapi.signin2.render('my-signin2', {
                'scope': 'profile email',
                'width': 240,
                'height': 50,
                'longtitle': true,
                'theme': 'dark',
                'onsuccess': onSuccess,
                'onfailure': onFailure
              });
            }

        function callbackSessao(data,status){

            alert(data);
            location.reload();

        }

        function printRetorno(data, status){
            var url = 'gerarSessao.php';
            $.post(url,user,callbackSessao);
        }


        function onSuccess(googleUser) {
            alert("a");
            var profile = googleUser.getBasicProfile();
            user = {
                insert: 'true',
                gmailProfile: 'true',
                IDGmail: profile.getId(),
                nome: profile.getName(),
                urlImage: profile.getImageUrl(),
                email: profile.getEmail()
            };
            var url = '../db/dbUser.php';
            $.post(url,user,printRetorno);

        }
        // function onSignIn(googleUser) {
        //     var profile = googleUser.getBasicProfile();
        //     user = {
        //         insert: 'true',
        //         gmailProfile: 'true',
        //         IDGmail: profile.getId(),
        //         nome: profile.getName(),
        //         urlImage: profile.getImageUrl(),
        //         email: profile.getEmail()
        //     };
        //     var url = '../db/dbUser.php';
        //     $.post(url,user,printRetorno);

        // }

        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function() {
                console.log('User signed out.');
            });
        }
    </script>
      <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>

</body>

</html>