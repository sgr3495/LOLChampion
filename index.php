<!--
Key: ed84abd1-49a5-40bb-b2ec-c084f14edb1b
Rate Limit(s):
  10 requests every 10 seconds
  500 requests every 10 minutes
-->
<!DOCTYPE html>
<html>
<head>
  <title>LOL Champion</title>

  <link href="https://fonts.googleapis.com/css?family=Signika:600" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/TweenMax.min.js'></script>
  <script src='js/variables.js'></script>
  <script src='js/getData.js'></script>
  <link rel='stylesheet' href='css/main.css'>

  <script>
  window.onload = init;
  function init(){
  //USE PHP to HIDE the API_KEY and recieve a JSON file
  <?php
    $startAPI = 'https://global.api.pvp.net';
    $lol_static_data_Champion = '/api/lol/static-data/na/v1.2/champion?';
    $API_KEY = 'api_key=ed84abd1-49a5-40bb-b2ec-c084f14edb1b';
    $url = $startAPI . $lol_static_data_Champion . $API_KEY;
    //Get JSON file
    $result = file_get_contents($url);
    //Read JSON file
    $JSONResult = json_decode($result,true);
    //allChampions has JSON data
    $allChampions = $JSONResult['data'];
    ?>

    //Fade in all champion icon at the same time
    $('.flex_item').fadeIn(1000);

    //Make icon bigger when hover
    $('.flex_item').hover(
      function(){
        TweenLite.to($(this), 0.5, {scale:1.2});
      },
      function(){
        TweenLite.to($(this), 0.5, {scale:1});
      }
    );
  }
  </script>
</head>
<body>
  <h1>League of Legends Champions</h1>
  <h2>Select the champion to view more informations</h2>
  <div id='containerIcon'>
    <?php
      //Make an array of champions from JSON DATA
      $championList = array();
      foreach ($allChampions as $value){
        array_push($championList, $value);
        //array_push($championList, $championName);
      }
      //make function for sort the array list base on alphabet order
      function sort_by_key($a, $b) {
        return strcmp($a["key"], $b["key"]);
      }
      //sort championList in ABC order
      usort($championList, "sort_by_key");
      //make flex item of a champion icon and a champion name
      foreach ($championList as $value) {
        $championImg = 'https://ddragon.leagueoflegends.com/cdn/' . $JSONResult['version'] . '/img/champion/' . $value['key'] . '.png';
        $championUrlPath = 'https://people.rit.edu/sgr3495/Temp/LOLWebsite/championInfo.php?champion=' . $value['id'] . "&version=" . $JSONResult['version'];
        echo
         "<div class='flex_item'>" .
          "<a href=" . $championUrlPath . ">" .
            "<img src='" . $championImg .  "' alt='" . $value['name'] . "' />" .
            "<h3>" . $value['name'] . "</h3>" .
          "</a>" .
         "</div>";
      }
   ?>
  </div>
</body>
</html>
