import FeedbackService from "../services/feedback";
import feedbackValidator from "../validation/feedback";

class Feedback {
    /** @type {HTMLFormElement} */
    #form

    /**
     * @param {HTMLFormElement} form
     */
    constructor(form) {
        this.#form = form;

        this.#form.oninput = this.#inputHandler
        this.#form.onsubmit = this.#submitHandler
    }

    static capture = () => {
        const form = document.getElementById('feedback-form')

        return new Feedback(form);
    }

    /**
     * @param {string} fieldName
     * @return {RadioNodeList | HTMLElement}
     */
    #getElement = fieldName => {
        if (fieldName.startsWith('_')) {
            return this.#form.elements.namedItem(fieldName);
        }

        return this.#form.elements.namedItem(`feedback-${fieldName}`)
    }

    /**
     * @param {string} fieldName
     */
    addCounter = fieldName => {
        const field = this.#getElement(fieldName)
        const maxLength = field.getAttribute('maxlength') ?? 0

        const counterElement = document.createElement('small')
        counterElement.className  = 'text-muted small'
        counterElement.textContent = `${field.textContent.length}/${maxLength}`

        field.oninput = (e) => {
            counterElement.textContent = `${e.target.value.length}/${maxLength}`
        }

        field.after(counterElement);
    }

    /**
     * @param {boolean} isDisabled
     * @return {void}
     */
    disableSubmit = (isDisabled) => {
        const submit = this.#getElement('submit')
        submit.disabled = isDisabled

        if (isDisabled) {
            submit.classList.add('disabled')
        } else {
            submit.classList.remove('disabled')
        }
    }

    /**
     * @param {string} fieldName
     * @return {void}
     */
    setInvalidField = fieldName => {
        this.#getElement(fieldName).classList.add('is-invalid')
    }

    /**
     * @param {string} fieldName
     * @return {void}
     */
    setValidField = fieldName => {
        this.#getElement(fieldName).classList.remove('is-invalid')
    }

    /**
     * @return {{subject: string, name: string, _token: string, message: string, email: string}}
     */
    getData = () => {
        return {
            name: this.#getElement('name').value,
            email: this.#getElement('email').value,
            subject: this.#getElement('subject').value,
            message: this.#getElement('message').value,
            _token: this.#getElement('_token').value,
        }
    }

    /**
     * @param {Event} e
     * @return {Promise<void>}
     */
    #submitHandler = async (e) => {
        e.preventDefault()
        e.stopPropagation()

        this.disableSubmit(true)

        const data = this.getData();
        const response = await FeedbackService.send(data);

        if (!response.ok) {
            this.#setUpInvalidFields(data, response?.validation);
        }

        this.disableSubmit(false)
    }

    /**
     * @param {Event} e
     */
    #inputHandler = (e) => {
        e.preventDefault()
        e.stopPropagation()

        const data = this.getData()
        const validator = feedbackValidator(data)
        const messages = validator.getMessageBag()

        this.disableSubmit(validator.failed());
        this.#setUpInvalidFields(data, messages);
    }

    /**
     * @param {Object} data
     * @param {Object} messages
     */
    #setUpInvalidFields = (data, messages) => {
        for (let key of Object.keys(data)) {
            if (messages.hasOwnProperty(key)) {
                this.setInvalidField(key);
            } else {
                this.setValidField(key);
            }
        }
    }
}

export default Feedback;
