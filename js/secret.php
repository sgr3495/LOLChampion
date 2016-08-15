<?php
  $startAPI = "https://global.api.pvp.net";
  $lol_static_data_Champion = "/api/lol/static-data/na/v1.2/champion?champData=skins";
  $API_KEY = "&api_key=ed84abd1-49a5-40bb-b2ec-c084f14edb1b";
  $url = "";
  $url = $startAPI . $lol_static_data_Champion . $API_KEY;
  $result = file_get_contents($url);
echo'
<script>
  cow = <?php echo json_encode($result); ?>;
  console.log(cow);
</script>
'
?>
