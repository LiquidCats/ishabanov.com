import {animate, inView} from 'motion'

document.addEventListener('DOMContentLoaded', () => {
    if (window.innerWidth <= 768) {
        return;
    }

    const cards = document.querySelectorAll('#experience > ul > li')

    for (const card of cards) {
        inView(card, ({target}) => {
            animate(target, {
                y: [100, 0],
                opacity: [0, 1],
            }, {
                margin: "500px 0",
                duration: .5,
            })
        })
    }
})
