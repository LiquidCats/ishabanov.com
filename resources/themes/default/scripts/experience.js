import {animate, scroll, spring} from 'motion'
document.addEventListener('DOMContentLoaded', () => {
    const exp = document.getElementById('experience');

    const cards = exp.querySelectorAll('#experience-card')

    for (const card of cards) {
        const header = card.querySelector('h2')

        scroll(animate(header, {
            y: [200, 0, 0, 200],
            opacity: [0, 1, 1, 0],
        }), {
            target: header,
        })

        scroll(animate(card, {
            opacity: [0, 1, 1, 0],
            scaleX: [0.5, 1, 1, 0.5],
            scaleY: [0.5, 1, 1, 0.5],
        }), {
            target: card,
            offset: ["start end", "end end", "start start", "end start"]
        });
    }

    const logos = exp.querySelectorAll('#experience-logo')
    for (const logo of logos) {
        scroll(animate(logo, {
            x: [-200, 0, 0, -200],
            opacity: [0, 1, 1, 0],
        }), {
            target: logo,
        });
    }
})
