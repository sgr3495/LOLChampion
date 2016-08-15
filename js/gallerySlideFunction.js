$(document).ready(function(){
  //$('#slideshow').desoSlide('rebuild');
  // Get all thumbs (an array of objects)
  //var my_thumbs = $('#slideshow').desoSlide('#thumbnail');

  $('#skinsSlideshow').desoSlide({
      thumbs: $('.thumbnail li > a'),
      effect: {
          provider: 'animate',
          name: 'fade'
      },
      auto:{
        load:true,
        start:true
      },
      overlay: 'always',
      interval: 5000
  });
});
