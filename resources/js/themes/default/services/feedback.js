import AbstractService from "./abstract";

export default class FeedbackService extends AbstractService {
    /**
     * @param name
     * @param email
     * @param message
     * @param subject
     * @param _token
     * @return {Promise<Response>}
     */
    static async send({name, email, message, subject, _token}) {
        const response =  await fetch(FeedbackService._getUrl('feedback'), {
            method: 'POST',
            mode: 'cors',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({name, email, message, subject, _token})
        })

        return response.json();
    }
}
