$('#myCarousel').carousel({
  interval: 3000,
})

jQuery(document).on('click', '.mega-dropdown', function (e) {
  e.stopPropagation()
})


function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
    h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}

function checkTime(i) {
  if (i < 10) {
    i = "0" + i
  }; // add zero in front of numbers < 10
  return i;
}

// *****************************Authority*******************************

$(document).ready(function () {
  $("#testimonial-slider").owlCarousel({
    items: 1,
    itemsDesktop: [1000, 1],
    itemsDesktopSmall: [979, 1],
    itemsTablet: [769, 1],
    pagination: true,
    transitionStyle: "goDown",
    autoplay: true
  });
});
// *****************************Authority End*******************************

// ***************image gallery index page************
baguetteBox.run('.tz-gallery');
// ***********image gallery index page end***********