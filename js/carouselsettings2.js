var slides = [
    {src: 'images/carousel1.jpg'},
    {src: 'images/carousel2.jpg'},
    {src: 'images/carousel3.jpg'},
    {src: 'images/carousel4.jpg'},
    {src: 'images/carousel5.jpg'},
    {src: 'images/carousel6.jpg'},
];
$('.carousel-demo').jR3DCarousel({
    width : 1366,
    height: 768,
    slides: slides,
    animation: "scroll3D",
    animationCurve: 'ease-in-out',
    animationDuration: 700,
    animationInterval: 4000,
});
