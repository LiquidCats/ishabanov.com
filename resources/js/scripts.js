import * as Bootstrap from 'bootstrap'

import Feedback from "./feedback";

const feedback = Feedback.capture();

feedback.disableSubmit(true)
feedback.addCounter('message')
