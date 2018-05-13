export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
    $('.input-field')
      .blur(function () {
        let parent = $(this).closest('.input-jema');
        if ($(this).val().trim() === '') {
          parent.removeClass('input-filled');
        }
      })
      .focus(function () {
        let parent = $(this).closest('.input-jema');
        parent.addClass('input-filled');
      });
    $(".navbar a, footer a[href='#top']").on('click', function (event) {
      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();
        // Store hash
        let hash = this.hash;
        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top,
        }, 900, function () {
          // Add hash (#) to URL when done scrolling (default click behavior)
          // window.location.hash = hash;
        });
      } // End if
    });
    $(window).scroll( function(){
        $('.fadeIn').each( function(){
            let bottom_of_object = $(this).offset().top + 150;
            let bottom_of_window = $(window).scrollTop() + $(window).height();
            bottom_of_window = bottom_of_window + 200;
            if( bottom_of_window > bottom_of_object ) {
                $(this).animate({'opacity': '1', 'transform': 'translate(0, 0)'}, 1000);
                $(this).removeClass('fadeIn')
                $(this).removeClass('left')
            }
        });
    });
  },
};
