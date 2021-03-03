//*****************star ratting ****************** */
$(document)
  .ready(function () {
    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li')
      .on('mouseover', function () {
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

        // Now highlight all the stars that's not after the current hovered star
        $(this)
          .parent()
          .children('li.star')
          .each(function (e) {
            if (e < onStar) {
              $(this).addClass('hover');
            } else {
              $(this).removeClass('hover');
            }
          });

      })
      .on('mouseout', function () {
        $(this)
          .parent()
          .children('li.star')
          .each(function (e) {
            $(this).removeClass('hover');
          });
      });

    /* 2. Action to perform on click */
    $('#stars li').on('click', function () {
      var onStar = parseInt($(this).data('value'), 10); // The star currently selected
      var stars = $(this)
        .parent()
        .children('li.star');

      for (i = 0; i < stars.length; i++) {
        $(stars[i]).removeClass('selected');
      }

      for (i = 0; i < onStar; i++) {
        $(stars[i]).addClass('selected');
      }

      // JUST RESPONSE (Not needed)
      var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
      var msg = "";
      if (ratingValue > 1) {
        msg = "Your Rattiong is " + ratingValue + " stars.";
      } else {
        msg = "Your Rattiong is " + ratingValue + " stars.";
      }
      responseMessage(msg);
    });
  });

function responseMessage(msg) {
  $('.success-box').fadeIn(200);
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}
//*****************star ratting end****************** */

$('#myCarousel').carousel({ interval: 3000 })

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
  document
    .getElementById('txt')
    .innerHTML = h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
}

function checkTime(i) {
  if (i < 10) {
    i = "0" + i
  }; // add zero in front of numbers < 10
  return i;
}

// *****************************Authority*******************************

$(document)
  .ready(function () {
    $("#testimonial-slider").owlCarousel({
      items: 1,
      itemsDesktop: [
        1000, 1
      ],
      itemsDesktopSmall: [
        979, 1
      ],
      itemsTablet: [
        769, 1
      ],
      pagination: true,
      transitionStyle: "goDown",
      autoplay: true
    });
  });
// *****************************Authority End*******************************
// ***************image gallery index page************
baguetteBox.run('.tz-gallery');
// ***********image gallery index page end***********
