import Validator from "./validator";
import {isBetween, isEmail, isRequired} from "./rules";

/**
 * @param {{name: string, email: string, subject: string, message: string, _token: string}} data
 * @return {Validator}
 * @constructor
 */
const feedbackValidator = data => Validator.make(data, {
    name: [isRequired, isBetween(1, 59)],
    email: [isRequired, isEmail, isBetween(3, 100)],
    subject: [isRequired],
    message: [isRequired, isBetween(1, 200)],
    _token: [isRequired],
})

export default feedbackValidator
