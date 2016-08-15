"use strict";

// read json file
function championInfo(champions) {
  champions = JSON.parse(champions);
  //console.log("obj stringified = " + JSON.stringify(obj));

  // if there is only one result, Eventful returns an object instead of an array
  // create an array with the single object

  // If there is an array of results, loop through them
  var championName = champions.name;
  var championTitle = champions.Title;
  var championSkins = champions.skins;
  var championLore = champions.lore;
  var championTags = champions.tags;
  var championInfo = champions.info;
  var championSpells = champions.spells;

  //Champion Skins
  for (var numberImage in championSkins) {

  }

  //Champion Lore
  document.querySelector("#lore").innerHTML = championLore;
  //Champion Tags
  var tagString = ""
  for (var i = 0; i < championTags.length; i++){
    //tagString += 
  }

  //Champion Info

  //Champion Spells
  for (var i = 0; i < championSpells.length; i++){
    //championSpells[i].name
    //championSpells[i].description
    //championSpells[i].
  }



  // //change html champion list
  document.querySelector("#containerIcon").innerHTML = listChampionsIcon;
}
