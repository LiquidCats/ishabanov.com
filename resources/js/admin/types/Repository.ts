import {ApiResponse} from "./ApiResponse";

export default interface Repository {
    get<T>(path: string): Promise<ApiResponse<T>>
    post<T, D>(path: string, data: D): Promise<ApiResponse<T>>
    put<T, D>(path: string, data: D): Promise<ApiResponse<T>>
    patch<T, D>(path: string, data: D): Promise<ApiResponse<T>>
    delete<T, D>(path: string, data: D): Promise<ApiResponse<T>>
}
