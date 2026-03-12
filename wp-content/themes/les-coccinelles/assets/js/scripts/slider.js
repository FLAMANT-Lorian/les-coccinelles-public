import {settings as s} from "../settings";

(function () {
    const newsSlider = {
        dots: document.querySelectorAll(s.newsSlider.dots_class),
        init() {
            this.setup();
            this.addEventListeners();
        },

        setup() {
            document.querySelector(s.newsSlider.dots_class).classList.add(s.newsSlider.active_dot_class);
        },

        addEventListeners() {
            this.dots.forEach(dot => {
               dot.addEventListener('click', e => {
                   e.preventDefault();
                   const card = document.getElementById(dot.id);
                   console.log(card);
                   card.scrollIntoView({
                       behavior: 'smooth'
                   });
                   this.setActiveClass(e.currentTarget);
               });
            });
        },

        setActiveClass(event) {
            this.dots.forEach(dot => {
               dot.classList.remove(s.newsSlider.active_dot_class);
            });
            event.classList.add(s.newsSlider.active_dot_class);
        }


    };
    if (document.querySelector('.news-slider')) {
        newsSlider.init();
    }
})();