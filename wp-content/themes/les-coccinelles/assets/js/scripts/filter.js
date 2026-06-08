import {settings as s} from "../settings";

(function () {
    const filter = {
        form: document.querySelector(s.form.search_form_class),

        currentOrder: '',
        currentSearch: '',
        init() {
            this.handleSearch();
            this.handleOrder();
        },

        handleSearch() {
            if (document.querySelector(s.news.search_news_input)) {
                this.input = document.querySelector(s.news.search_news_input);
                this.wrapper = document.querySelector(s.news.news_wrapper);
                this.cptName = 'news';
            } else if (document.querySelector(s.events.search_events_input)) {
                this.input = document.querySelector(s.events.search_events_input);
                this.wrapper = document.querySelector(s.events.events_wrapper);
                this.cptName = 'events';
            }

            if (!this.input) return;

            this.input.addEventListener('input', e => {
                this.currentSearch = e.currentTarget.value;

                this.fetch();
                this.updateUrl();
            });
        },

        handleOrder() {
            this.orderSelect = document.querySelector(s.events.event_filter_select);

            if (!this.orderSelect) return;

            this.orderSelect.addEventListener('change', async e => {
                this.currentOrder = e.currentTarget.value;

                if (this.currentOrder === '') {
                    this.currentOrder = '';
                }

                await this.fetch();
                this.updateUrl();
            });
        },

        async fetch() {
            const params = new URLSearchParams({
                action: 'search_in_post',
                search: this.currentSearch,
                cpt_name: this.cptName,
            });

            if (this.currentOrder !== '') {
                params.append('order', this.currentOrder);
            }

            const response = await fetch(
                '/wp-admin/admin-ajax.php', {
                    method: 'POST',
                    body: params
                });

            try {
                if (!response.ok) return;

                const data = await response.json();

                this.wrapper.innerHTML = data['data']['html'];

            } catch (error) {
                console.error('Erreur AJAX : ', error);
            }
        },

        updateUrl() {
            const url = new URL(window.location);

            if (this.currentSearch) {
                url.searchParams.set('search', this.currentSearch);
            } else {
                url.searchParams.delete('search');
            }

            if (this.currentOrder && this.currentOrder !== '') {
                url.searchParams.set('order', this.currentOrder);
            } else {
                url.searchParams.delete('order');
            }

            window.history.pushState({}, '', url);
        }
    }
    addEventListener('DOMContentLoaded', () => {
        if (document.querySelector(s.news.search_news_input) || document.querySelector(s.events.search_events_input)) {
            filter.init();
        }
    });
})();
