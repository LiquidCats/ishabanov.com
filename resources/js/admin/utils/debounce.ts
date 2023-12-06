export default function debounce<T extends (...args: any[]) => any>(func: T, wait: number): (...args: Parameters<T>) => Promise<ReturnType<T>> {
    let timeoutId: number | null = null;

    return function(...args: Parameters<T>): Promise<ReturnType<T>> {
        return new Promise<ReturnType<T>>((resolve, reject) => {
            if (timeoutId !== null) {
                clearTimeout(timeoutId);
            }

            timeoutId = setTimeout(async () => {
                try {
                    const result = await func(...args);
                    resolve(result);
                } catch (error) {
                    reject(error);
                }
            }, wait);
        });
    };
}
