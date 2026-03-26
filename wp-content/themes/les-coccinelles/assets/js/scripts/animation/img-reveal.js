import gsap from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export function imgReveal(items, params) {

    if (items.length === 0) return;

    items.forEach(item => {
        const mask = item.querySelector('.mask-content');
        const dir = item.dataset.dir;
        const tl = gsap.timeline({paused: true});

        if (dir === 'left') {
            gsap.set(mask, {
                opacity: 0.9,
                scale: 1.1,
                x: '110%',
                y: '10%',
            });
        } else if (dir === 'right') {
            gsap.set(mask, {
                opacity: 0.9,
                scale: 1.1,
                x: '-110%',
                y: '10%',
            });
        }

        if (dir === 'left' || dir === 'right') {
            tl.to(mask, {
                opacity: 1,
                x: '0%',
                y: '0%',
                scale: 1,
                duration: params.duration ?? 0,
                ease: params.ease ?? 'power3.out'
            });
        }

        const st = ScrollTrigger.create({
            trigger: item,
            start: 'top 75%',
            onEnter: () => tl.play(),
        })

        if (st.progress > 0 && !st.isActive) {
            tl.progress(1);
            st.disable();
        }
    });
}