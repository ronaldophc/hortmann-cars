import { themeChange } from "theme-change";
themeChange();

import Glide from "@glidejs/glide";

new Glide('.glide', {
    type: 'carousel',
    perView: 1,
    focusAt: 'center',
}).mount();