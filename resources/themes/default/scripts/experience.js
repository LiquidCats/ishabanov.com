import debounce from "./utils/debounce";
import {ScrollSpy} from 'bootstrap'

document.addEventListener('DOMContentLoaded', () => {
    const section = document.getElementById('experience')
    if (!section) {
        return
    }
    const sectionRect = section.getBoundingClientRect()

    const descriptions = document.querySelector('.experience-descriptions')

    new ScrollSpy(descriptions, {
        target: '.experience-timeline',
        threshold: [.1, .25, .5, .75, 1],
        rootMargin: '-15% 0px '
    })

    // switches
    let isExperienceOnScreen = sectionRect.bottom > window.innerHeight && sectionRect.top <= 0;
    let linkClicked = false
    let scrollDirection = 0 // 0 - no scroll; 1 - top; -1 - bottom
    let currentElement = null


    const clickHandler = (e) => {
        e.preventDefault()
        linkClicked = true

        const id = e.target.attributes.getNamedItem('href').value
        const elem = document.querySelector(id)

        elem.scrollIntoView({
            block: "start",
            behavior: "smooth",
        });
    }

    document.querySelectorAll('.experience-timeline a').forEach((el) => {
        el.addEventListener('click', clickHandler)
    })

    descriptions.addEventListener('activate.bs.scrollspy', (e) => {
        const id = e?.relatedTarget?.hash
        if (!id) {
            return
        }

        /** @var {HTMLElement} currentElement */
        currentElement = document.querySelector(id)
    })

    document.addEventListener('resize', () => {
        const sectionRect = section.getBoundingClientRect()

        isExperienceOnScreen = sectionRect.bottom > window.innerHeight && sectionRect.top <= 0;
    })

    document.addEventListener('scroll', () => {
        const sectionRect = section.getBoundingClientRect()

        isExperienceOnScreen = sectionRect.bottom > window.innerHeight && sectionRect.top <= 0;
    })

    let lastScrollPosition = window.scrollY;
    document.addEventListener('scroll', () => {
        const currentScrollPosition = window.scrollY;
        if (currentScrollPosition > lastScrollPosition) {
            scrollDirection = -1
        }

        if (currentScrollPosition < lastScrollPosition) {
            scrollDirection = 1
        }

        lastScrollPosition = currentScrollPosition
        setTimeout(function() {
            scrollDirection = 0
        });
    })

    document.addEventListener('scroll', debounce(() => {
        if (!isExperienceOnScreen) {
            return
        }

        if (linkClicked) {
            linkClicked = false
            return;
        }

        if (scrollDirection !== 0) {
            return;
        }

        if (null === currentElement) {
            return;
        }

        setTimeout(() => {
            currentElement.scrollIntoView({
                behavior: 'smooth',
                block: 'start',
            })
            currentElement = null;

        },50)
    }, 50))
})

// document.addEventListener('DOMContentLoaded', () => {
//     const observer = new IntersectionObserver((entries) => {
//         for (const entry of entries) {
//             entry.target?.tartgetElement.classList.remove('active')
//             if (entry.isIntersecting) {
//                 entry.target?.tartgetElement.classList.add('active')
//             }
//         }
//     }, {
//         root: null,
//         threshold: [0.1, 0.5, 1],
//         rootMargin: '0px 0px -25%'
//     })
//
//     const links = document.getElementById('experience-years')
//
//     const handler = (e) => {
//         e.preventDefault()
//
//         const href = e.target.attributes.getNamedItem('href')
//         if (!href) {
//             return;
//         }
//
//         const elementToScroll = document.querySelector(href.value)
//         if (!elementToScroll) {
//             return;
//         }
//
//         elementToScroll.scrollIntoView(true)
//     }
//     for (const link of links.children) {
//         link.addEventListener('click', handler)
//         const href = link.attributes.getNamedItem('href')
//         if (!href) {
//             continue;
//         }
//
//         const observable = document.querySelector(href.value)
//         if (!observable) {
//             continue;
//         }
//
//         observable.tartgetElement = link
//
//         observer.observe(observable)
//     }
// })
