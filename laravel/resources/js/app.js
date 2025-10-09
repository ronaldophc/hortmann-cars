import Glide from "@glidejs/glide";
document.addEventListener('DOMContentLoaded', function () {
    var glide = document.querySelector('.glide');
    if (!glide) return;
    new Glide('.glide', {
        type: 'carousel',
        perView: 1,
        focusAt: 'center',
    }).mount();
});
