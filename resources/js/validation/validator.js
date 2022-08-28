export default class Validator {
    /** @type {object} */
    #data

    /** @type {object} */
    #rules

    /** @type {object} */
    #messageBag = {}

    /** @type {boolean} */
    #isValid

    /**
     * @param {object} data
     * @param {object} rules
     */
    constructor(data, rules) {
        this.#data = data;
        this.#rules = rules;
    }

    /**
     * @param {object} data
     * @param {object} rules
     * @return {Validator}
     */
    static make = (data, rules) => new Validator(data, rules).validate()

    /**
     * @param {string} key
     * @return {string[]}
     */
    setMessage = key => {
        this.#messageBag[key] = [`${key} is invalid`]
    }

    validate = () => {
        /** @type {[string, function[]][]} */
        const validationEntries = Object.entries(this.#rules)

        let isValid = true;

        for (let [key, rules] of validationEntries) {
            const value = this.#data[key]
            const isValueValid = rules.every(rule => rule(value))

            if (!isValueValid) {
                this.setMessage(key)

                isValid = false
            }
        }

        this.#isValid = isValid

        return this;
    }

    /**
     * @return boolean
     */
    valid = () => this.#isValid;

    failed = () => !this.valid();

    /**
     * @param {string|null} field
     * @return {string[]}
     */
    getMessages = (field = null) => this.getMessageBag().getProperty(field)

    /**
     * @return {Object}
     */
    getMessageBag = () => this.#messageBag
}
