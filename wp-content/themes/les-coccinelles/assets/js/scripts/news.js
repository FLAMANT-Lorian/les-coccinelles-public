const searchNewsInput = document.querySelector('.news-search-input input');
const newsWrapper = document.querySelector('.news-wrapper');

if (searchNewsInput) {
    addEventListener('DOMContentLoaded', e => {

        searchNewsInput.addEventListener('input', async e => {

            const search = e.currentTarget.value;

            const response = await fetch(
                '/wp-admin/admin-ajax.php', {
                    method: 'POST',
                    body: new URLSearchParams({
                        action: 'search_in_news',
                        search: search
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

                newsWrapper.innerHTML = data['data']['html'];
            } catch (error) {
                console.error('Erreur AJAX : ', error);
            }
        });
    });
}
