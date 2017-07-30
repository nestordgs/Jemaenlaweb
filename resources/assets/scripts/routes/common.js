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
      $(".navbar a, footer a[href='#top']").on('click', function(event) {
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
              }, 900, function(){
                  // Add hash (#) to URL when done scrolling (default click behavior)
                  // window.location.hash = hash;
              });
          } // End if
      });
  },
};
