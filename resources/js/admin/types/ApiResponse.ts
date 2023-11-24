export interface ApiResponse<T> {
    data: T
    links: ResponseLinks
    meta: ResponseMeta
}

export interface ResponseLinks {
    first?: string
    last?: string
    prev?: string
    next?: string
}
export interface ResponseMeta {
    current_page: number,
    from: number,
    last_page: number,
    links: ResponseMetaLink[],
    path: string,
    per_page: number,
    to: number,
    total: number
}

export interface ResponseMetaLink {
    url?: string,
    label: string,
    active: boolean
}
