// import './bootstrap';
import 'preline'

new Glide('.glide', {
    type: 'carousel',
    perView: 4,
    breakpoints: {
        1024: {
            perView: 3
        },
        640: {
            perView: 1
        },
    }
}).mount();
