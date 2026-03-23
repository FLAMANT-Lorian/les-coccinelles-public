import {settings as s} from "../settings";

(function () {
    const form = {
        acceptanceField: document.querySelector(s.form.acceptance_field),
        submitButton: document.querySelector(s.form.submit_button),
        init() {
            this.submitButton.disabled = true;
            this.acceptanceField.addEventListener('change', e => {
                e.currentTarget.checked ? this.submitButton.disabled = false : this.submitButton.disabled = true;
            });
        },
    };
    if (document.querySelector(s.form.form_class)) {
        form.init();
    }
})();