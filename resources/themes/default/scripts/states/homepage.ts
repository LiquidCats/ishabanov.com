import {defineStore} from "pinia";
import {ExperienceResource} from "../domain/types/api";

interface State {
    experiences: Array<ExperienceResource>,
}

const useHomepageState = defineStore<'app.homepage', State>('app.homepage', {
    state: () => ({
        experiences: [
            {
                id: 6,
                company_name: "CoinsPaid",
                company_url: "https://coinspaid.com",
                company_logo: "images\/experience\/coinspaid.svg",
                position: "Senior Software Engineer",
                description: [
                    "Created a clustered derivation mechanism for cryptocurrency addresses.",
                    "Enhanced the security of internal services.",
                    "Improved the architecture of services using the Domain-Driven Design (DDD) approach."
                ],
                started_at: "2022-12-24T00:00:00.000000Z",
                ended_at: null,
                tools: [
                    {
                        id: "redis",
                        name: "Redis",
                        type: "database",
                        level: 2,
                    },
                    {
                        id: "mysql",
                        name: "MySQL",
                        type: "database",
                        level: 2,
                    },
                    {
                        id: "laravel",
                        name: "Laravel",
                        type: "framework",
                        level: 2,
                    },
                    {
                        id: "php",
                        name: "PHP",
                        type: "language",
                        level: 2,
                    },
                    {
                        id: "rabbitmq",
                        name: "RabbitMQ",
                        type: "queue",
                        level: 2,
                    },
                    {
                        id: "docker",
                        name: "Docker",
                        type: "tool",
                        level: 2,
                    },
                    {
                        id: "golang",
                        name: "GoLang",
                        type: "language",
                        level: 1,
                    }
                ]
            },
            {
                id: 5,
                company_name: "Everli",
                company_url: "https://it.everli.com",
                company_logo: "images\/experience\/everli.svg",
                position: "Senior Software Engineer",
                description: [
                    "Improved and accelerated CI/CD pipelines, reducing the time to feature delivery.",
                    "Researched, described, and integrated a self-documented code approach, enhancing code quality, shortening the feature delivery timeline, and saving funds over the long term.",
                    "Developed a rolling update system for backend features.","Optimized data storage and enhanced the speed of the search engine."
                ],
                started_at: "2021-11-04T00:00:00.000000Z",
                ended_at: "2022-12-24T00:00:00.000000Z",
                tools: [
                    {
                        id: "mysql",
                        name: "MySQL",
                        type: "database",
                        level: 2,
                    },
                    {
                        id: "redis",
                        name: "Redis",
                        type: "database",
                        level: 2,
                    },
                    {
                        id: "laravel",
                        name: "Laravel",
                        type: "framework",
                        level: 2,
                    },
                    {
                        id: "php",
                        name: "PHP",
                        type: "language",
                        level: 2,
                    },
                    {
                        id: "rabbitmq",
                        name: "RabbitMQ",
                        type: "queue",
                        level: 2,
                    },
                    {
                        id: "docker",
                        name: "Docker",
                        type: "tool",
                        level: 2,
                    },
                    {
                        id: "github_actions",
                        name: "GitHub Actions",
                        type: "deploy",
                        level: 1,
                    }
                ]
            },
            {
                id: 4,
                company_name: "iMusician",
                company_url: "https://imusician.pro",
                company_logo: "images\/experience\/imusician.svg",
                position: "Senior Software Engineer",
                description: [
                    "Developed a long-term plan for complex refactoring and enhancement of the backend using the Domain-Driven Design (DDD) approach.",
                    "Optimized and improved the CI/CD processes, resulting in reduced delivery times.",
                    "Integrated the Test-Driven Development (TDD) approach within the team, significantly increasing the quality of delivered features.",
                    "Created a music trends parser and aggregator for analytics, which the company now offers as a separate service."
                ],
                started_at: "2020-12-01T00:00:00.000000Z",
                ended_at: "2021-11-04T00:00:00.000000Z",
                tools: [
                    {
                        id: "redis",
                        name: "Redis",
                        type: "database",
                        level: 2,
                    },
                    {
                        id: "postgresql",
                        name: "PostgreSQL",
                        type: "database",
                        level: 2,
                    },
                    {
                        id: "laravel",
                        name: "Laravel",
                        type: "framework",
                        level: 2,
                    },
                    {
                        id: "php",
                        name: "PHP",
                        type: "language",
                        level: 2,
                    },
                    {
                        id: "docker",
                        name: "Docker",
                        type: "tool",
                        level: 2,
                    },
                    {
                        id: "bitbucket_pipelines",
                        name: "Bitbucket Pipelines",
                        type: "deploy",
                        level: 1,
                    },
                    {
                        id: "sqs",
                        name: "SQS",
                        type: "queue",
                        level: 1,
                    }
                ]
            },
            {
                id: 3,
                company_name: "PointPay",
                company_url: "https://pointpay.io",
                company_logo: "images\/experience\/pointpay.svg",
                position: "Senior Software Engineer",
                description: [
                    "Developed a cryptocurrency payment gateway.",
                    "Outlined the principles of building and creating microservices across the entire company.",
                    "Developed and implemented internal infrastructure.","Integrated tests within CI/CD pipelines.","Optimized build and deployment processes."
                ],
                started_at: "2019-12-01T00:00:00.000000Z",
                ended_at: "2020-12-01T00:00:00.000000Z",
                tools: [
                    {
                        id: "postgresql",
                        name: "PostgreSQL",
                        type: "database",
                        level: 2,
                    },
                    {
                        id: "laravel",
                        name: "Laravel",
                        type: "framework",
                        level: 2,
                    },
                    {
                        id: "php",
                        name: "PHP",
                        type: "language",
                        level: 2,
                    },
                    {
                        id: "docker",
                        name: "Docker",
                        type: "tool",
                        level: 2,
                    },
                    {
                        id: "kubernetes",
                        name: "kubernetes",
                        type: "deploy",
                        level: 1,
                    },
                    {
                        id: "golang",
                        name: "GoLang",
                        type: "language",
                        level: 1,
                    },
                    {
                        id: "nodejs",
                        name: "NodeJS",
                        type: "language",
                        level: 1,
                    },
                    {
                        id: "kafka",
                        name: "Kafka",
                        type: "queue",
                        level: 1,
                    },
                    {
                        id: "crypto_nodes",
                        name: "Crypto Nodes",
                        type: "tool",
                        level: 1,
                    },
                    {
                        id: "nginx",
                        name: "Nginx",
                        type: "tool",
                        level: 1,
                    }
                ]
            },
            {
                id: 2,
                company_name: "Hemmersbach",
                company_url: "https://hemmersbach.com",
                company_logo: "images\/experience\/hemmersbach.svg",
                position: "Middle Software Developer",
                description: [
                    "Contributed to a team that was among the first to implement Domain-Driven Design (DDD) in PHP.",
                    "Developed a rule-based permissions system and participated in the creation of a system that filters data and hides UI elements based on rules.",
                    "Introduced best practices and structured the approach to front-end development within the company based on these practices."
                ],
                started_at: "2017-12-01T00:00:00.000000Z",
                ended_at: "2019-12-01T00:00:00.000000Z",
                tools: [
                    {
                        id: "redis",
                        name: "Redis",
                        type: "database",
                        level: 2,
                    },
                    {
                        id: "laravel",
                        name: "Laravel",
                        type: "framework",
                        level: 2,
                    },
                    {
                        id: "javascript",
                        name: "JavaScript",
                        type: "language",
                        level: 2,
                    },
                    {
                        id: "php",
                        name: "PHP",
                        type: "language",
                        level: 2,
                    },
                    {
                        id: "rabbitmq",
                        name: "RabbitMQ",
                        type: "queue",
                        level: 2,
                    },
                    {
                        id: "docker",
                        name: "Docker",
                        type: "tool",
                        level: 2,
                    },
                    {
                        id: "mssql",
                        name: "MSSQL",
                        type: "database",
                        level: 1,
                    },
                    {
                        id: "react",
                        name: "React",
                        type: "framework",
                        level: 1,
                    }
                ]
            },
            {
                id: 1,
                company_name: "School2100",
                company_url: "https://school2100.com",
                company_logo: "images\/experience\/school2100.svg",
                position: "Junior Software Developer",
                description: [
                    "Created the backend for a remote education system.",
                    "Developed a frontend for the back-office operations of the remote education system."
                ],
                started_at: "2016-12-01T00:00:00.000000Z",
                ended_at: "2017-12-01T00:00:00.000000Z",
                tools: [
                    {
                        id: "mysql",
                        name: "MySQL",
                        type: "database",
                        level: 2,
                    },
                    {
                        id: "javascript",
                        name: "JavaScript",
                        type: "language",
                        level: 2,
                    },
                    {
                        id: "php",
                        name: "PHP",
                        type: "language",
                        level: 2,
                    },
                    {
                        id: "vue",
                        name: "Vue",
                        type: "framework",
                        level: 1,
                    }
                ]
            }
        ] as Array<ExperienceResource>,
    }),
})

export default useHomepageState
