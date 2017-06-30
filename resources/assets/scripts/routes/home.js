export default {
  init() {
    // JavaScript to be fired on the home page
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
      $(document).ready(function(){
          $('.carousel-slick').slick({
              dots: true,
              infinite: true,
              speed: 500,
              autoplay: true,
              responsive: [
                  {
                      breakpoint: 992,
                      settings: {
                          slidesToShow: 8,
                          slidesToScroll: 2,
                      },
                  },
                  {
                      breakpoint: 768,
                      settings: {
                          slidesToShow: 4,
                          slidesToScroll: 1,
                      },
                  },
              ],
          });
      });
  },
};
