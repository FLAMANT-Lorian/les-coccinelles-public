import {settings as s} from "../settings";

(function () {
    const search = {
        form: document.querySelector(s.form.search_form_class),
        init() {
            addEventListener('DOMContentLoaded', () => {
                if (document.querySelector(s.news.search_news_input)) {
                    this.searchNewsInput = document.querySelector(s.news.search_news_input);
                    this.newsWrapper = document.querySelector(s.news.news_wrapper);
                    this.handleSearch('news', this.searchNewsInput, this.newsWrapper);
                } else if (document.querySelector(s.events.search_events_input)) {
                    this.searchEventsInput = document.querySelector(s.events.search_events_input);
                    this.eventsWrapper = document.querySelector(s.events.events_wrapper);
                    this.handleSearch('events', this.searchEventsInput, this.eventsWrapper);
                }
            });

            this.form.addEventListener('submit', e => {
                e.preventDefault();
            });
        },

        handleSearch(cptName, input, wrapper) {
            input.addEventListener('input', async e => {

                const search = e.currentTarget.value;

                const response = await fetch(
                    '/wp-admin/admin-ajax.php', {
                        method: 'POST',
                        body: new URLSearchParams({
                            action: 'search_in_post',
                            search: search,
                            cpt_name: cptName
                        })
                    });

                try {
                    if (!response.ok) return;

                    const data = await response.json();

                    const url = new URL(window.location);

                    if (search) {
                        url.searchParams.set('search', search);
                    } else {
                        url.searchParams.delete('search');
                    }

                    window.history.pushState({}, '', url);

                    wrapper.innerHTML = data['data']['html'];

                } catch (error) {
                    console.error('Erreur AJAX : ', error);
                }
            });
        }
    }
    if (document.querySelector(s.news.search_news_input) || document.querySelector(s.events.search_events_input)) {
        search.init();
    }
})();
