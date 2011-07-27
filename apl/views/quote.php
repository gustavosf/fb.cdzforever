<html>
  <head>
    <title>CDZForever</title>
  </head>
  <body>
    <div id="fb-root">
      <?php echo $quote; ?><br><br>
      <a href="#" onclick="postIt()">Postar essa porra no meu mural</a>
    </div>
    <script src="http://connect.facebook.net/en_US/all.js"></script>
    <script>
      FB.init({ 
        appId:'<?php echo APP_ID; ?>',
        cookie:true, 
        status:true,
        xfbml:true 
      });
      var postIt = function() {
        FB.ui({
          method: 'feed',
          //display: 'iframe', 
          description: '<b><?php echo $quote; ?></b>',
          link: 'http://apps.facebook.com/cdzforever',
          picture: 'http://seganfredo.net/cdzf/img/seiya.jpg',
          name: 'CDZForever',
          caption: 'Frases dos Cavaleiros do Zodíaco',
          redirect_uri: 'http://seganfredo.net/cdzf/redirect-back.php',
          next: null
        });
      };
    </script>
  </body>
</html> 