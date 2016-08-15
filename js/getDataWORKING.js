"use strict";

var startAPI = "https://global.api.pvp.net";
var lol_static_data_Champion = "/api/lol/static-data/na/v1.2/champion?champData=skins";
var API_KEY = "&api_key=ed84abd1-49a5-40bb-b2ec-c084f14edb1b";
var url = "";

// MY FUNCTIONS
function getData() {
    // build up URL string
    url = startAPI;
    url += lol_static_data_Champion;
    url += API_KEY;

  // call the League of Legends service, and download the JSON file
  console.log("loading " + url);
  jsonLoaded(url);
  $.ajax({
    type: 'GET',
    dataType: 'json',
    url: url,
    success: jsonLoaded
  });
}


function jsonLoaded(obj) {
  console.log("obj = " + obj);
  //console.log("obj stringified = " + JSON.stringify(obj));

  // if there is only one result, Eventful returns an object instead of an array
  // create an array with the single object

  // If there is an array of results, loop through them

  var allChampions= obj.data;
  console.log(obj.data);
  console.log(allChampions);
  var listChampions = "";
  for (var champion in obj.data) {
    console.log(champion);
    console.log(obj.data[champion]);
    var championInfo = obj.data[champion];
    var championImg = 'http://ddragon.leagueoflegends.com/cdn/img/champion/splash/' + champion + '_0.jpg';
      listChampions += "<li>Name: " +
                        championInfo.name +  " id: " + championInfo.id +
                        "</li>";

  }


  // //change html champion list
  document.querySelector("#dynamicContent").innerHTML = listChampions;
}
