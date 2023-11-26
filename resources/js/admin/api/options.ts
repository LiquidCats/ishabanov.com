import {OptionsRaw} from "mande";

export const options: OptionsRaw = {
    mode: 'cors',
    credentials: 'same-origin',
    headers: {
        'Content-Type': 'application/json'
    },
    redirect: "error",
    referrerPolicy: "origin",
    // responseAs: 'response'
}
