import debounce from "./utils/debounce";
import {ScrollSpy} from 'bootstrap'

document.addEventListener('DOMContentLoaded', () => {
    const section = document.getElementById('experience')
    const sectionRect = section.getBoundingClientRect()

    const descriptions = document.getElementById('experience-descriptions')

    const spy = new ScrollSpy(descriptions, {
        target: '#experience-years',
    })

    spy.refresh()

    // switches
    let isExperienceOnScreen = sectionRect.bottom > window.innerHeight && sectionRect.top <= 0;
    let linkClicked = false
    let scrollDirection = 0 // 0 - no scroll; 1 - top; -1 - bottom
    let currentElement = null


    document.querySelectorAll('#experience-years a').forEach((el) => {
        el.addEventListener('click', (e) => {
            linkClicked = true
        })
    })

    descriptions.addEventListener('activate.bs.scrollspy', (e) => {
        const id = e?.relatedTarget?.hash?.slice(1)
        currentElement = document.getElementById(id)
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
        const elRect = currentElement.getBoundingClientRect()

        window.scrollTo({
            top: window.scrollY + elRect.top,
            behavior: "smooth"
        });
    }, 50))
})
