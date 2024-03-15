import {animate, scroll, ScrollOffset} from 'motion'
document.addEventListener('DOMContentLoaded', () => {
    if (window.innerWidth <= 768) {
        return;
    }

    const cards = document.querySelectorAll('#experience > div')

    for (const card of cards) {
        const header = card.querySelector('a')
        scroll(animate(header, {
            y: [100, 0, 0, 100],
            opacity: [0, 1, 1, 0],
        }), {
            target: header,
            offset: [...ScrollOffset.Enter, ...ScrollOffset.Exit]
        })

        const description = card.querySelector('& > div > div:nth-child(1)')
        scroll(animate(description, {
            y: [300, 0, 0, -300],
            opacity: [0, 1, 1, 0],
        }), {
            target: description,
            offset: [...ScrollOffset.Enter, ...ScrollOffset.Exit]
        })

        const image = card.querySelector('& > div > div:nth-child(2)')
        scroll(animate(image, {
            // y: [100, -10, -10, 100],
            rotateZ: [0, '15deg', null, 0],
            // opacity: [0, 1, 1, 0],
        }), {
            target: image,
            offset: [...ScrollOffset.Enter, ...ScrollOffset.Exit]
        })
    }
})
