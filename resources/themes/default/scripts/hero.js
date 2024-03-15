import {inView, stagger, timeline} from "motion";

document.addEventListener('DOMContentLoaded', () => {
    if (window.innerWidth <= 768) {
        return;
    }


    const stop = inView(document.getElementById('hero'), ({target}) => {
        timeline([
            ["#hero:nth-child(1)", {y: [-100, 0], opacity: [0, 1]}, {duration: 1, delay: .1}],
            ['#hero div > div', {y:[100, 0], opacity: [0, 1]}, {duration: 1, delay: stagger()}]
        ], {
            direction: 'alternate'
        })
    }, {
        margin: "500px 0px"
    })


    document.addEventListener('resize', () => {
        if (window.innerWidth <= 768) {
            stop()
        }
    })
})
