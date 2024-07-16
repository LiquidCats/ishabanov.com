import {Dayjs} from "dayjs";

export interface ExperienceItem {
    company_url: string,
    position: string,
    company_name: string,
    tools: Array<ExperienceItemTool>,
    description: Array<string>,
    started_at: Dayjs,
    ended_at: Dayjs,
}

export interface ExperienceItemTool {
    name: string
}
