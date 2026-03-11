import {settings as s} from "../settings";

(function () {
    const menu = {
        menu: document.querySelector(s.menu.menu_class),
        burgerMenuLabel: document.querySelector(s.menu.burger_menu_label),
        burgerMenuCheckbox: document.querySelector(s.menu.burger_menu_checkbox),
        navContainer: document.querySelector(s.menu.nav_container),

        init() {
            this.setup();
            this.handleAccessibility();
        },

        setup() {
            this.burgerMenuLabel.setAttribute('aria-expanded', 'false');
            this.navContainer.setAttribute('aria-hidden', 'true');
        },

        handleAccessibility() {
            this.burgerMenuCheckbox.addEventListener('change', e => {
                let ariaHiddenAttr = !e.currentTarget.checked;
                let ariaExpandedAttr = e.currentTarget.checked;
                this.burgerMenuLabel.setAttribute('aria-expanded', ariaExpandedAttr.toString());
                this.navContainer.setAttribute('aria-hidden', ariaHiddenAttr.toString());
            });
        }
    };
    menu.init();
})();