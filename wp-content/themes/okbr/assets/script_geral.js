(() => {
    document.addEventListener("DOMContentLoaded", () => {
      $('.projects').slick({
        infinite: true,
        slidesToShow: 3,
        centerPadding: '50px',
        responsive:[
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
            }
          },
          {
            breakpoint: 700,
            settings: {
              slidesToShow: 1,
            }
          },
        ]
      });
    });
  })();
