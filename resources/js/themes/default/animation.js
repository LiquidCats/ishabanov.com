document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        for (const entry of entries) {
            if (entry.isIntersecting) {
                entry.target.classList.add('animation-show')
            } else {
                entry.target.classList.remove('animation-show')
            }
        }
    }, {
        root: null,
        threshold: 0,
        rootMargin: '0px 0px -25% 0px'
    })

    const animated = document.querySelectorAll('[data-animation]')
    for (const animatedElement of animated) {
        animatedElement.classList.add('animation-init')
        observer.observe(animatedElement)
    }
})


