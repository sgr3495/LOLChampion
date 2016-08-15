"use strict";

// read json file
function championIconLoaded(champions) {
  champions = JSON.parse(champions);
  //console.log("obj stringified = " + JSON.stringify(obj));

  // if there is only one result, Eventful returns an object instead of an array
  // create an array with the single object

  // If there is an array of results, loop through them

  var allChampions = champions.data;
  var listChampionsIcon = "";
  allChampionNames=[];
  for (var champion in allChampions){
    allChampionNames.push(champion);
  }
  allChampionNames.sort();
  for (var champion in allChampionNames) {
    console.log(champion);
    console.log(allChampionNames[champion]);
    var championInfo = allChampions[allChampionNames[champion]];
    var championImg = 'https://ddragon.leagueoflegends.com/cdn/' + champions.version + '/img/champion/' + championInfo.key + '.png';
    var championUrlPath = 'https://people.rit.edu/sgr3495/Temp/LOLWebsite/championInfo.php?champion=' + championInfo.id;
    console.log(championImg);
      listChampionsIcon += "<div class='flex_item'>";
        listChampionsIcon += "<a href=" + championUrlPath + ">";
          listChampionsIcon += "<img src='" + championImg +  "' alt='" + championInfo.name + "' />";
          listChampionsIcon += "<h3>" + championInfo.name + "</h3>";
        listChampionsIcon += "</a>";
      listChampionsIcon += "</div>";
  }


  // //change html champion list
  document.querySelector("#containerIcon").innerHTML = listChampionsIcon;
}
