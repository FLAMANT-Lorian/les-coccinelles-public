import gsap from 'gsap';
import {ScrollTrigger} from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export function textReveal(items, params) {

    if (items.length === 0) return;

    items.forEach(item => {
        const mask = item.querySelector('.mask-content');
        const dir = item.dataset.dir;
        const tl = gsap.timeline({paused: true});

        if (dir === 'top') {
            gsap.set(mask, {
                opacity: 0,
                y: '120%',
            });
        } else if (dir === 'left') {
            gsap.set(mask, {
                opacity: 0,
                x: '10%'
            });
        } else if (dir === 'right') {
            gsap.set(mask, {
                opacity: 0,
                x: '-10%'
            });
        }

        if (dir === 'top') {
            tl.to(mask, {
                opacity: 1,
                y: '0%',
                duration: params.duration ?? 0,
                ease: params.ease ?? 'power3.out'
            });
        } else if (dir === 'left' || dir === 'right') {
            tl.to(mask, {
                opacity: 1,
                x: '0%',
                duration: params.duration ?? 0,
                ease: params.ease ?? 'power3.out'
            });
        }

        const st = ScrollTrigger.create({
            trigger: item,
            start: 'top 85%',
            onEnter: () => tl.play(),
        })

        if (st.progress > 0 && !st.isActive) {
            tl.progress(1);
            st.disable();
        }
    });
}