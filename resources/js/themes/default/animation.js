document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        for (const entry of entries) {
            console.log(entry)
            if (entry.isIntersecting) {
                entry.target.classList.add('animation-show')
            } else {
                entry.target.classList.remove('animation-show')
            }
        }
    })

    const animated = document.querySelectorAll('[data-animation]')
    for (const animatedElement of animated) {
        animatedElement.classList.add('animation-init')
        observer.observe(animatedElement)
    }
})


