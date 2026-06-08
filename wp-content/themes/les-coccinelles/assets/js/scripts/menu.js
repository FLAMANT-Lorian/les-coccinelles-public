import {settings as s} from "../settings";

(function () {
    const menu = {
        menu: document.querySelector(s.menu.menu_class),
        burgerMenuLabel: document.querySelector(s.menu.burger_menu_label),
        burgerMenuCheckbox: document.querySelector(s.menu.burger_menu_checkbox),
        navContainer: document.querySelector(s.menu.nav_container),

        init() {
            this.setup(window.innerWidth);
            this.handleAccessibility();
            this.closeMenuOnEscape();

            addEventListener('resize', e => {
                this.setup(e.currentTarget.innerWidth);
            })
        },

        setup(width) {
            if (width > 1440) {
                this.navContainer.setAttribute('aria-hidden', 'false');
                this.navContainer.removeAttribute('inert');
            } else {
                this.burgerMenuCheckbox.checked = false;
                this.navContainer.setAttribute('aria-hidden', 'true');
                this.navContainer.setAttribute('inert', '');
            }
        },

        handleAccessibility() {
            this.burgerMenuCheckbox.addEventListener('change', e => {
                let ariaHiddenAttr = !e.currentTarget.checked;
                this.navContainer.setAttribute('aria-hidden', ariaHiddenAttr.toString());
                if (e.currentTarget.checked) {
                    this.navContainer.removeAttribute('inert');
                } else {
                    this.navContainer.setAttribute('inert', '');
                }
            });
        },
        closeMenuOnEscape() {
            addEventListener('keydown', e => {
                if (e.key === 'Escape') {
                    this.burgerMenuCheckbox.checked = false;
                }
            });
        }
    };
    menu.init();
})();