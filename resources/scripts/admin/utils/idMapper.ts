import {v7 as uuid} from "uuid";

export const idMapper = <B extends object>(b: B): B => ({...b, key: uuid() })
