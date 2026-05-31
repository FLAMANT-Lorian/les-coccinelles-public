import {Calendar} from 'vanilla-calendar-pro';
import 'vanilla-calendar-pro/styles/index.css';

async function initCalendar() {
    const url = document.getElementById('hall-calendar').dataset.url;
    const disabled = await getDisabledDates(url);
    const calendar = new Calendar('#hall-calendar', {
        locale: 'fr',
        selectionDatesMode: 'disabled',
        disableDates: disabled
    });
    calendar.init();
}

async function getDisabledDates(url) {
    let dates = [];

    await fetch(url, {
        method: 'GET'
    }).then(r => r.json()).then(data => {
        data['data'].forEach(date => {
            dates.push(date.start_date + ':' + date.end_date)
        });
    });

    return dates;
}

addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('hall-calendar')) {
        void initCalendar();
    }
});