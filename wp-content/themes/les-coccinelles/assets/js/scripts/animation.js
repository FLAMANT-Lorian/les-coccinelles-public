import {textReveal} from "./animation/text-reveal";
import {settings as s} from "../settings";
import {imgReveal} from "./animation/img-reveal";

(function () {
    const animation = {
        init() {
            this.startRevealTextAnimation();
            this.startRevealImageAnimation();
        },

        startRevealTextAnimation() {
            const items = document.querySelectorAll(s.animation.text_reveal_selector);

            textReveal(items, s.animation.text_reveal);
        },

        startRevealImageAnimation() {
            const items = document.querySelectorAll(s.animation.img_reveal_selector);

            imgReveal(items, s.animation.img_reveal);
        }
    };
    addEventListener('DOMContentLoaded', () => {
        if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            animation.init();
        }
    });
})();