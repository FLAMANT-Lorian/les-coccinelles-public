import {settings as s} from "../settings";

(function () {
    const slider = {
        dots: document.querySelectorAll(s.slider.dots_class),
        init() {
            this.setup();
            this.addEventListeners();
        },

        setup() {
            document.querySelector(s.slider.dots_class).classList.add(s.slider.active_dot_class);
        },

        addEventListeners() {
            this.dots.forEach(dot => {
               dot.addEventListener('click', e => {
                   e.preventDefault();
                   const card = document.getElementById(dot.dataset.id);
                   console.log(card);
                   card.scrollIntoView({
                       behavior: 'smooth',
                       block: 'center'
                   });
                   this.setActiveClass(e.currentTarget);
               });
            });
        },

        setActiveClass(event) {
            this.dots.forEach(dot => {
               dot.classList.remove(s.slider.active_dot_class);
            });
            event.classList.add(s.slider.active_dot_class);
        }


    };
    if (document.querySelector('.slider')) {
        slider.init();
    }
})();