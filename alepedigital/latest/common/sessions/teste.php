<html>
<head>
  <meta name="google-signin-client_id" content="648376689398-rbkruvg0pf8r2q627ttfbsa7gcpl5olu.apps.googleusercontent.com">
</head>
<body>
  <div id="my-signin2"></div>
  <script>

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
    function onFailure(error) {
      console.log(error);
    }
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
  </script>

  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
</body>
</html>