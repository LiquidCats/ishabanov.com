// import {stagger, timeline} from "motion";
//
// document.addEventListener('DOMContentLoaded', () => {
//     if (window.location.pathname !== "/") {
//         return;
//     }
//     if (window.innerWidth <= 768) {
//         return;
//     }
//
//     const controls = timeline([
//         ["#hero #position", {y: [200, 200], scale: [.9, 1], opacity: [0, 1]}, {delay: 1, duration: 1}],
//         ["#hero #position", {y: [200, 0]}, {delay:.5, duration: .5,}],
//         ['#hero > #grid-blocks > div', {y:[100, 0], opacity: [0, 1]}, {duration: 1, delay: stagger()}],
//         ['nav', {y:[-100, 0], opacity: [0, 1]}, {duration: .3}],
//         ['.js-cookie-consent', {y:[100, 0], opacity: [0, 1]}, {duration: .3}],
//     ])
//
//     document.addEventListener('resize', () => {
//         if (window.innerWidth <= 768) {
//             controls.stop()
//         }
//     })
// })
