/**
 * @param {string} value
 * @return {boolean}
 */
export const isRequired = value => value !== '';

/**
 * @param {number} min
 * @param {number} max
 * @return {function(string, number, number): boolean}
 */
export const isBetween = (min, max) => (value, min, max) => !(value.length < min || value.length > max);

/**
 * @param {string} email
 * @return {boolean}
 */
export const isEmail = email => {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    return re.test(email);
};
