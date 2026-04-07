import {settings as s} from "../settings";

(function () {
    const formRequest = {
        form: document.querySelector(s.form.form_request_class),
        init() {
            this.makeRequest();
        },
        makeRequest() {
            this.form.addEventListener('submit', async e => {
                e.preventDefault();
                const data = new FormData(e.currentTarget);

                const response = await fetch(this.form.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json'
                    },
                    body: data
                });

                try {
                    if (!response.ok) return;

                    const result = await response.json();
                    this.deleteErrors();
                    this.displayResults(result);
                } catch (error) {
                    console.error('Erreur AJAX : ', error);
                }
            });
        },

        displayResults(result) {
            const inputs = ['last_name', 'first_name', 'email', 'phone', 'object', 'message', 'acceptance'];
            const errors = result.errors ?? false;
            const values = result.values ?? false;

            if (errors) {
                inputs.forEach(input => {

                    if (errors[input]) {
                        const error = errors[input][0];
                        const value = values[input];

                        const formInput = document.querySelector(`[name="${input}"]`);
                        formInput.value = value;

                        formInput.insertAdjacentHTML('afterend', `<p class="error">${error}</p>`);
                    }
                });
            } else {
                const message = result.message ?? '';
                const homeUrl = '/';
                this.form.insertAdjacentHTML('beforebegin', `
<div class="max-w-100 flex flex-col items-center gap-y-8 absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">
    <p class="text-center paragraph">${message}</p>
    <a href="${homeUrl}" aria-label="Retour à l'accueil" title="Retour à l'accueil" class="btn-back-filled">
        Retour à l'accueil
    </a>
</div>
`);
                this.form.remove();
            }
        },

        deleteErrors() {
            const errors = document.querySelectorAll('.error');
            errors.forEach(error => error.remove());
        }
    };
    if (document.querySelector(s.form.form_request_class)) {
        formRequest.init();
    }
})();