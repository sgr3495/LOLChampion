<?php
  $startAPI = "https://global.api.pvp.net";
  $lol_static_data_Champion = "/api/lol/static-data/na/v1.2/champion?champData=skins";
  $API_KEY = "&api_key=ed84abd1-49a5-40bb-b2ec-c084f14edb1b";
  $url = "";
  $url = startAPI;
  $url += lol_static_data_Champion;
  $url += API_KEY;
  $result = JSON.Parse($url);
?>;
