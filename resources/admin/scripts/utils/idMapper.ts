import {WithId} from "../types/blocks";

export const idMapper = <B>(b: B, i: number): B &WithId => ({...b, id: i})
