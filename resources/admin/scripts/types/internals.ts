import {Colors} from "./colors";

export interface FileToUpload {
    file: File
    preview?: string
    name: string
    extension: string
    uploaded: boolean
}

export interface NotificationMessage {
    message: string
    type: Colors
}
