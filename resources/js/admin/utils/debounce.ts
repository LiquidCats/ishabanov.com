export default function debounce(func: () => {}, delay: number) {
    let timer: number

    return function() {
        // @ts-ignore
        const context = this
        const args = arguments

        clearTimeout(timer);
        timer = setTimeout(function() {
            func.apply(context, args as any)
        }, delay);
    };
}
