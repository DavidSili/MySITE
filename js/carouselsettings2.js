var slides = [
    {src: 'images/me1.jpg'},
    {src: 'images/me2.jpg'},
    {src: 'images/me3.jpg'},
    {src: 'images/me4.jpg'},
    {src: 'images/me5.jpg'},
    {src: 'images/me6.jpg'},
];
$('.carousel-demo').jR3DCarousel({
    width : 300,
    height: 200,
    slides: slides,
    animation: "scroll",
    animationCurve: 'ease-in-out',
    animationDuration: 700,
    animationInterval: 3000,
});
