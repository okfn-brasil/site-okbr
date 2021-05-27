(() => {
    document.addEventListener("DOMContentLoaded", () => {
      $('.projects').slick({
        infinite: true,
        slidesToShow: 3,
        centerPadding: '50px',
      });
    });
  })();