<!--
API INFO

Key: ed84abd1-49a5-40bb-b2ec-c084f14edb1b
Rate Limit(s):
  10 requests every 10 seconds
  500 requests every 10 minutes
-->
<!DOCTYPE html>
<html>
<head>
  <title>Champion Info</title>

  <link href="https://fonts.googleapis.com/css?family=Signika:600" rel="stylesheet">

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/TweenMax.min.js'></script>
  <!-- https://github.com/lugolabs/circles -->
  <script src='js/circles.min.js'></script>
  <script src='js/variables.js'></script>
  <script src='js/getChampionInfo.js'></script>
  <script src='js/jquery.desoslide.min.js'></script>

  <link rel='stylesheet' href='css/magic.min.css'>
  <link rel='stylesheet' href='css/animate.min.css'>
  <link rel='stylesheet' href='css/jquery.desoslide.min.css'>
  <link rel='stylesheet' href='css/championInfo.css'>

  <script>
  window.onload = init;
  function init(){
  //Use PHP to recieve a champion's data from JSON file
  <?php
    $startAPI = 'https://global.api.pvp.net';
    $lol_static_data_Champion = '/api/lol/static-data/na/v1.2/champion/' . $_GET['champion'] . '?champData=info,lore,skins,passive,spells,tags';
    $API_KEY = '&api_key=ed84abd1-49a5-40bb-b2ec-c084f14edb1b';
    $url = '';
    $url = $startAPI . $lol_static_data_Champion . $API_KEY;
    $result = file_get_contents($url);
    $readResult = json_decode($result,true);
    ?>


    console.log(<?php echo json_encode($url); ?>);

    $(".currentSpell").fadeIn(1000);
    document.getElementById("passive").onclick = function() {abilitiesSwitch("#passive_ability","#passive")};
    document.getElementById("q").onclick = function() {abilitiesSwitch("#q_ability","#q")};
    document.getElementById("w").onclick = function() {abilitiesSwitch("#w_ability","#w")};
    document.getElementById("e").onclick = function() {abilitiesSwitch("#e_ability","#e")};
    document.getElementById("r").onclick = function() {abilitiesSwitch("#r_ability","#r")};
  }
  //Funtion for adding a currentSpell class base on the ability pick.
  function abilitiesSwitch(ability,key) {
    console.log(ability);
    $(".currentSpell").hide();
    $(".selectKey").removeClass("selectKey");
    $(".currentSpell").removeClass("currentSpell");
    $(key).addClass("selectKey");
    $(ability).addClass("currentSpell");
    $(".currentSpell").fadeIn(500);
  }
  </script>

</head>
<body>
  <h1 id='name'><?php echo $readResult['name'] ?></h1>
  <h2 id='title'><?php echo $readResult['title'] ?></h2>
  <div id='skinsSlideshow'></div>
  <div id='thumbSkins'>
    <ul class="thumbnail">
    <?php
      //list all the splash pictures
      foreach ($readResult['skins'] as $skin){
        echo " <li>
                <a href = 'https://ddragon.leagueoflegends.com/cdn/img/champion/splash/" . $readResult['key'] . "_" . $skin['num'] . ".jpg'>
                  <img src='https://ddragon.leagueoflegends.com/cdn/img/champion/splash/" . $readResult['key'] . "_" . $skin['num'] . ".jpg' alt='" . $readResult['key'] . "_" . $skin['num'] . "' data-desoslide-caption-title='" . $skin['name'] . "'>
                  </img>
                </a>
              </li>";
      }
     ?>
   </ul>
 </div>
  <!-- script for gallery slide function -->
  <script src="js/gallerySlideFunction.js"></script>
  <!-- lore -->
  <div>
    <h2>Lore</h2>
    <p id=lore><?php echo $readResult['lore']; ?></p>
  </div>
  <div id='tags'>
    <h2>Champion's Roles</h2>
      <ul>
      <?php
        //list all the tags

        foreach ($readResult['tags'] as $tags){
          echo '<li>' . $tags . '</li>';
        }
      ?>
    <ul>
  </div>
  <!-- info -->
  <div id='info'>
    <h2>Stats</h2>
    <div>
      <h3>Attack</h3>
      <div class="circle" id="circles-attack"></div>
    </div>
    <div>
      <h3>Defense</h3>
      <div class="circle" id="circles-defense"></div>
    </div>
    <div>
      <h3>Magic</h3>
      <div class="circle" id="circles-magic"></div>
    </div>
    <div>
      <h3>Difficulty</h3>
      <div class="circle" id="circles-difficulty"></div>
    </div>
    <script>
    // using php to receive data from API and put the specifc result into JavaScript variables
    var attack = <?php echo $readResult['info']['attack']?>;
    var defense = <?php echo $readResult['info']['defense']?>;
    var magic = <?php echo $readResult['info']['magic']?>;
    var difficulty = <?php echo $readResult['info']['difficulty']?>;

    //create circle charts for attack, defense, magic, and difficulty
    var circle_attack = Circles.create({
      id:                  'circles-attack',
      radius:              70,
      value:               attack,
      maxValue:            10,
      width:               15,
      text:                function(value){return value + '/10';},
      colors:              ['#5c1f1f', '#4d0a0a'],
      duration:            800
    });
    var circle_defense = Circles.create({
      id:                  'circles-defense',
      radius:              70,
      value:               defense,
      maxValue:            10,
      width:               15,
      text:                function(value){return value + '/10';},
      colors:              ['#163a16', '#002801'],
      duration:            800
    });
    var circle_magic = Circles.create({
      id:                  'circles-magic',
      radius:              70,
      value:               magic,
      maxValue:            10,
      width:               15,
      text:                function(value){return value + '/10';},
      colors:              ['#1b3556', '#062347'],
      duration:            800
    });
    var circle_difficulty = Circles.create({
      id:                  'circles-difficulty',
      radius:              70,
      value:               difficulty,
      maxValue:            10,
      width:               15,
      text:                function(value){return value + '/10';},
      colors:              ['#411a52', '#300542'],
      duration:            800
    });
    </script>

  </div>
  <h2>Abilities</h2>
  <div id='spells'>
    <ul id='keyboard'>
      <li><button id='passive' class="selectKey">P</button></li>
      <li><button id='q'>Q</button></li>
      <li><button id='w'>W</button></li>
      <li><button id='e'>E</button></li>
      <li><button id='r'>R</button></li>
    </ul>
    <div id="abilities">
      <?php
        //display abilities
        echo "<div class='currentSpell' id='passive_ability'>" .
             "<img src='https://ddragon.leagueoflegends.com/cdn/" . $_GET['version'] . "/img/passive/" . $readResult['passive']['image']['full']. "'></img>" .
             '<h3>' . $readResult['passive']['name'] . '</h3>' .
             '<P>' . $readResult['passive']['description'] . '</p>' .
             '</div>';
        $qwer = array('q','w','e','r');
        //whichkey is a counter loop for qwer
        $whichKey = 0;
        foreach ($readResult['spells'] as $spell){
          echo "<div id='" . $qwer[$whichKey] . "_ability'>" .
               "<img src='https://ddragon.leagueoflegends.com/cdn/" . $_GET['version'] . "/img/spell/" . $spell['image']['full']. "'></img>" .
               '<h3>' . $spell['name'] . '</h3>' .
               '<P>' . $spell['description'] . '</p>' .
               '</div>';
          $whichKey++;
        }
       ?>
     </div>
  </div>
</body>
</html>
