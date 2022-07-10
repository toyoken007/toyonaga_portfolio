// $(".slide-items").slick({
//   autoplay: false,
//   slidesToShow: 3,
//   infinite: true,
//   slidesToScroll: 1,
//   arrows: true,
//   dots: true,
//   variableWidth: true,
// });

$('.slide-items').slick({
  centerMode: false,
  centerPadding: '60px',
  slidesToShow: 4,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1,
        dots: true
      }
    }
  ]
});
