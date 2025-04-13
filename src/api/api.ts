import type {OptionsRaw} from "mande";

export const options: OptionsRaw = {
    mode: 'cors',
    credentials: 'same-origin',
    redirect: "error",
    referrerPolicy: "origin",
}

export const jsonOptions: OptionsRaw = {
    ...options,
    headers: {
        'Content-Type': 'application/json',
    }
}
