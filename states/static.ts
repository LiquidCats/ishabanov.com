import {CodeBracketIcon, EnvelopeIcon, HomeIcon, PencilSquareIcon, SparklesIcon} from "@heroicons/vue/24/outline";
import dayjs from "dayjs";
import type {ExperienceResource, NonStrict, PostMeta, PostResource} from "~/types/api.ts";
import {PreviewTypes} from "~/enums/preview";

export const settings = {
    socials: [
        {
            icon: SparklesIcon,
            link: 'https://www.linkedin.com/in/ilia-shabanov',
            text: 'LinkedIn',
        },
        {
            icon: CodeBracketIcon,
            link: 'https://github.com/LiquidCats',
            text: 'GitHub',
        },
        {
            icon: EnvelopeIcon,
            link: 'mailto:ishabanov@liquid-cat.com',
            text: 'Mail',
        },
    ],
    menu: [
        {
            icon: HomeIcon,
            link: "/",
            text: 'Home',
        },
        {
            icon: PencilSquareIcon,
            link: "/posts",
            text: 'Posts',
        },
    ],
}

export const homepage = {
    years: dayjs().diff(dayjs('2015-11-25 00:00:00'), "years"),
    experiences:[
        {
            id:6,
            company_url:"https://coinspaid.com",
            company_logo:"images/experience/coinspaid.svg",
            position:"Senior Software Engineer",
            company_name:"CoinsPaid",
            tools:[
                {name:"MySQL", type:"database"},
                {name:"Redis", type:"database"},
                {name:"Laravel", type:"framework"},
                {name:"PHP", type:"language"},
                {name:"RabbitMQ", type:"queue"},
                {name:"Docker", type:"tool"},
                {name:"GoLang", type:"language"}
            ],
            description:[
                "Created a clustered derivation mechanism for cryptocurrency addresses.",
                "Enhanced the security of internal services.",
                "Improved the architecture of services using the Domain-Driven Design (DDD) approach."
            ],
            started_at:"2022-12-24 00:00:00",
            ended_at:null
        },
        {
            id:5,
            company_url:"https://it.everli.com",
            company_logo:"images/experience/everli.svg",
            position:"Senior Software Engineer",
            company_name:"Everli",
            tools:[
                {name:"MySQL", type:"database"},
                {name:"Redis", type:"database"},
                {name:"Laravel", type:"framework"},
                {name:"PHP", type:"language"},
                {name:"RabbitMQ", type:"queue"},
                {name:"Docker", type:"tool"},
                {name:"GitHub Actions", type:"deploy"}
            ],
            description:[
                "Improved and accelerated CI/CD pipelines, reducing the time to feature delivery.",
                "Researched, described, and integrated a self-documented code approach, enhancing code quality, shortening the feature delivery timeline, and saving funds over the long term.",
                "Developed a rolling update system for backend features.",
                "Optimized data storage and enhanced the speed of the search engine."
            ],
            started_at:"2021-11-04 00:00:00",
            ended_at:"2022-12-24 00:00:00"
        },
        {
            id:4,
            company_url:"https://imusician.pro",
            company_logo:"images/experience/imusician.svg",
            position:"Senior Software Engineer",
            company_name:"iMusician",
            tools:[
                {name:"PostgreSQL", type:"database"},
                {name:"Redis", type:"database"},
                {name:"Laravel", type:"framework"},
                {name:"PHP", type:"language"},
                {name:"Docker", type:"tool"},
                {name:"Bitbucket Pipelines", type:"deploy"},
                {name:"SQS", type:"queue"},
            ],
            description:[
                "Developed a long-term plan for complex refactoring and enhancement of the backend using the Domain-Driven Design (DDD) approach.",
                "Optimized and improved the CI/CD processes, resulting in reduced delivery times.",
                "Integrated the Test-Driven Development (TDD) approach within the team, significantly increasing the quality of delivered features.",
                "Created a music trends parser and aggregator for analytics, which the company now offers as a separate service.",
            ],
            started_at:"2020-12-01 00:00:00",
            ended_at:"2021-11-04 00:00:00"
        },
        {
            id:3,
            company_url:"https://pointpay.io",
            company_logo:"images/experience/pointpay.svg",
            position:"Senior Software Engineer",
            company_name:"PointPay",
            tools:[
                {name:"PostgreSQL", type:"database"},
                {name:"Laravel", type:"framework"},
                {name:"PHP", type:"language"},
                {name:"Docker", type:"tool"},
                {name:"kubernetes", type:"deploy"},
                {name:"NodeJS", type:"language"},
                {name:"GoLang", type:"language"},
                {name:"Kafka", type:"queue"},
                {name:"Crypto Nodes", type:"tool"},
                {name:"Nginx", type:"tool"}
            ],
            description:[
                "Developed a cryptocurrency payment gateway.",
                "Outlined the principles of building and creating microservices across the entire company.",
                "Developed and implemented internal infrastructure.",
                "Integrated tests within CI/CD pipelines.",
                "Optimized build and deployment processes.",
            ],
            started_at:"2019-12-01 00:00:00",
            ended_at:"2020-12-01 00:00:00"
        },
        {
            id:2,
            company_url:"https://hemmersbach.com",
            company_logo:"images/experience/hemmersbach.svg",
            position:"Middle Software Developer",
            company_name:"Hemmersbach",
            tools:[
                {name:"Redis", type:"database"},
                {name:"Laravel", type:"framework"},
                {name:"PHP", type:"language"},
                {name:"JavaScript", type:"language"},
                {name:"RabbitMQ", type:"queue"},
                {name:"Docker", type:"tool"},
                {name:"MSSQL", type:"database"},
                {name:"React", type:"framework"}
            ],
            description:[
                "Contributed to a team that was among the first to implement Domain-Driven Design (DDD) in PHP.",
                "Developed a rule-based permissions system and participated in the creation of a system that filters data and hides UI elements based on rules.",
                "Introduced best practices and structured the approach to front-end development within the company based on these practices.",
            ],
            started_at:"2017-12-01 00:00:00",
            ended_at:"2019-12-01 00:00:00"
        },
        {
            id:1,
            company_url:"https://school2100.com",
            company_logo:"images/experience/school2100.svg",
            position:"Junior Software Developer",
            company_name:"School2100",
            tools:[
                {name:"MySQL", type:"database"},
                {name:"PHP", type:"language"},
                {name:"JavaScript",  type:"language"},
                {name:"Vue", type:"framework"},
            ],
            description:[
                "Created the backend for a remote education system.",
                "Developed a frontend for the back-office operations of the remote education system.",
            ],
            started_at:"2016-12-01 00:00:00",
            ended_at:"2017-12-01 00:00:00"
        },
    ] as Array<ExperienceResource>
}



type PostData = {
    [k: string]: {
        data: PostResource,
        meta: NonStrict<PostMeta>,
    }
}

export const posts: PostData = {
    'post-13': {
        data: {
            id: 13,
            title: 'Will AI take over my job in the future?',
            preview: 'Explore the evolving relationship between AI and the IT workforce in "Will I Be Replaced by AI in the Future?" This article delves into the impact of artificial intelligence on IT jobs, addressing common concerns and debunking myths about AI-driven job displacement. It highlights how AI complements rather than replaces human efforts, and suggests key skills IT professionals should develop to stay relevant. Offering a balanced view, it reassures that the future of IT is not about replacement, but about collaboration between humans and AI, ensuring a promising outlook for those ready to adapt.',
            is_draft: false,
            published_at: '2024-04-27 22:45:00',
            reading_time: 6,
            preview_image_type: PreviewTypes.left_side,
            preview_image_id: '365e0798b764cc79e34dd37b5c7250bc3184ea5e',
            blocks: [
                {
                    key: '0194d1ee-45e9-73df-a719-7c5682179471',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Introduction'
                },
                {
                    key: '0194d1ee-45ea-727b-a80b-f49291db1a2f',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'In the dynamic landscape of technology, Artificial Intelligence (AI) is no longer just a buzzword but a pivotal force reshaping the IT industry. As IT professionals, understanding the implications of AI is crucial not only for staying relevant but also for harnessing its potential to enhance our work. This article delves into how AI is integrated into various IT domains, addresses the prevalent concerns about job security, and highlights the evolving synergy between human intellect and machine learning.'
                },
                {
                    key: '0194d1ee-45ea-727b-a80b-fbeec46562b7',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Understanding AI and Its Role in IT'
                },
                {
                    key: '0194d1ee-45ea-727b-a80b-ff49b07cbc22',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Artificial Intelligence, or AI, refers to the capability of a machine to imitate intelligent human behavior. In the realm of IT, AI\'s applications are vast and transformative. From automating routine tasks to analyzing massive datasets, AI technologies are becoming indispensable.'
                },
                {
                    key: '0194d1ee-45ea-727b-a80c-0191d3316ae9',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Applications in IT:'
                },
                {
                    key: '0194d1ee-45ea-727b-a80c-079b0cd18275',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1ee-466b-79eb-a693-0d43599c3662',
                            type: 'list-item',
                            styles: [],
                            content: 'Data Management: AI algorithms can organize, manage, and retrieve data from huge databases efficiently, reducing human error and increasing accessibility.'
                        },
                        {
                            key: '0194d1ee-466b-79eb-a693-0d4359f2a44a',
                            type: 'list-item',
                            styles: [],
                            content: 'Cybersecurity: With cyber threats becoming more sophisticated, AI helps in predicting and mitigating potential breaches, enhancing the security landscape.'
                        },
                        {
                            key: '0194d1ee-466b-79eb-a693-0d435a6e8609',
                            type: 'list-item',
                            styles: [],
                            content: 'Cloud Computing: AI optimizes cloud environments for better resource management, leading to cost-effective and scalable solutions.'
                        }
                    ]
                },
                {
                    key: '0194d1ee-45ea-727b-a80c-0885cf025645',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'The Concern of Job Replacement'
                },
                {
                    key: '0194d1ee-45ea-727b-a80c-0d68f05e19b8',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'A common apprehension among IT professionals is the fear of AI replacing their jobs. This concern is not unfounded, as automation can lead to job displacements in certain areas. However, the narrative isn\'t solely about job loss but about transformation. Statistics indicate that while AI may automate certain roles, it also creates new opportunities requiring advanced skills and training.'
                },
                {
                    key: '0194d1ee-45ea-727b-a80c-1006e502b17b',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Areas Where AI Complements Human Effort'
                },
                {
                    key: '0194d1ee-45ea-727b-a80c-14d202ea4150',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Rather than viewing AI as a competitor, it should be seen as a collaborator. AI excels in handling data-intensive and repetitive tasks, allowing IT professionals to focus on more strategic and creative aspects of their roles.'
                },
                {
                    key: '0194d1ee-45ea-727b-a80c-180439c4cecf',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Examples of Collaboration:'
                },
                {
                    key: '0194d1ee-45ea-727b-a80c-1c3416859cc2',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1ee-466b-79eb-a693-0d435d1ef914',
                            type: 'list-item',
                            styles: [],
                            content: 'Automated Testing: AI can rapidly perform and replicate detailed tests on software applications, freeing developers to focus on more complex problems'
                        },
                        {
                            key: '0194d1ee-466b-79eb-a693-0d435d9204c7',
                            type: 'list-item',
                            styles: [],
                            content: 'Network Management: AI-driven tools monitor network traffic and performance, predicting outages and bottlenecks, which helps in proactive maintenance.'
                        }
                    ]
                },
                {
                    key: '0194d1ee-45ea-727b-a80c-2074fae465e4',
                    type: 'image',
                    styles: [],
                    content: {
                        alt: 'DALL·E 2024-04-27 23.42.44 - A modern office environment depicted in an anime style, featuring a diverse group of IT professionals interacting with futuristic AI technology. The s',
                        src: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/wY9mYRSPiXGQmo9avYsTgm7fOdmj73G9hnOgjNKy.jpg',
                        caption: ''
                    }
                },
                {
                    key: '0194d1ee-45ea-727b-a80c-262fc0abcd88',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Skills to Develop to Stay Relevant'
                },
                {
                    key: '0194d1ee-45ea-727b-a80c-2a578fe0582d',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Adapting to the evolving tech landscape is essential. For IT professionals, developing a set of complementary skills is crucial to work alongside AI effectively.'
                },
                {
                    key: '0194d1ee-45ea-727b-a80c-2dc1f7fdb722',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Key Skills to Cultivate:'
                },
                {
                    key: '0194d1ee-45ea-727b-a80c-32738dfa4d35',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1ee-466c-73f4-b27e-9500e681933f',
                            type: 'list-item',
                            styles: [],
                            content: 'Machine Learning and Analytics: Understanding the basics of AI and machine learning algorithms will be crucial as these technologies become standard tools in the IT toolkit.'
                        },
                        {
                            key: '0194d1ee-466c-73f4-b27e-9500e71b5cb7',
                            type: 'list-item',
                            styles: [],
                            content: 'Soft Skills: Critical thinking, problem-solving, and effective communication are vital, as these are areas where human judgment is still indispensable.'
                        },
                        {
                            key: '0194d1ee-466c-73f4-b27e-9500e76a4938',
                            type: 'list-item',
                            styles: [],
                            content: 'Security and Ethics: As AI systems handle more data, skills in cybersecurity and ethical considerations around AI deployments become increasingly important.'
                        }
                    ]
                },
                {
                    key: '0194d1ee-45ea-727b-a80c-37117131950a',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Conclusion'
                },
                {
                    key: '0194d1ee-45ea-727b-a80c-3b31003210f9',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'The integration of AI in IT is inevitable and brings with it a host of challenges and opportunities. For IT professionals, the focus should be on adaptation and the continuous learning of new skills. With AI handling more routine tasks, professionals can pivot to roles that require human intuition and creativity, ensuring their invaluable place in overseeing and integrating AI systems. The future of IT is not about human versus machine but about human with machine, creating a collaborative environment that enhances both the capabilities of AI and the strategic influence of IT professionals.'
                }
            ],
            tags: [
                {
                    id: 30,
                    name: 'Artificial Intelligence',
                    slug: 'artificial-intelligence'
                },
                {
                    id: 36,
                    name: 'IT Careers',
                    slug: 'it-careers'
                },
                {
                    id: 45,
                    name: 'IT Industry',
                    slug: 'it-industry'
                },
                {
                    id: 47,
                    name: 'Skill Development',
                    slug: 'skill-development'
                }
            ],
            previewImage: {
                hash: '365e0798b764cc79e34dd37b5c7250bc3184ea5e',
                type: 'image/jpeg',
                path: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/syWfeBY087amQ8SrkLD7JYJvnABJaBsUAfMBwcOs.jpg',
                extension: 'jpeg',
                name: 'DALL·E 2024-04-27 22.52.55 - A futuristic office setting featuring advanced AI technologies integrated with human IT professionals. The scene includes a diverse team of IT workers',
                file_size: 292870
            }
        },
        meta: {
            similar: [
                {
                    id: 12,
                    title: 'Entering IT (Part 3): Navigating the Software Engineer Interview Process',
                    preview: '<p>The field of software engineering is as exciting as it is challenging, offering endless opportunities for creative problem-solving and innovation. As you embark on your journey into this dynamic industry, one critical hurdle stands between you and your dream job: the interview process. This article aims to demystify the software engineer interview, offering a comprehensive guide on what to expect, from HR screening to the final offer, ensuring you walk into your interview prepared and confident.</p>',
                    is_draft: null,
                    published_at: '2024-03-17 16:22:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                },
                {
                    id: 10,
                    title: 'Entering IT (Part 2): Best Learning Resources',
                    preview: '<p>Hey there! Are you ready to continue diving into the &nbsp;world of IT? Whether you\'re just starting out or looking to polish your skills, I\'ve got some resources lined up for you.</p>',
                    is_draft: null,
                    published_at: '2024-01-21 07:30:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                },
                {
                    id: 9,
                    title: 'Entering IT (Part 1): IT Trends 2024',
                    preview: '<p>2024 has just begun, and it\'s a great time for new beginnings! I\'m excited to kick off a series of articles about starting a career in Information Technology (IT). We\'ll begin with the basics, focusing on the latest trends in IT. In this article, I aim to simplify and explain the top IT trends of the year, making them easy to understand. Let\'s dive into the exciting world of IT together!</p>',
                    is_draft: null,
                    published_at: '2024-01-09 19:00:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                }
            ],
            previous: {
                id: 12,
                title: 'Entering IT (Part 3): Navigating the Software Engineer Interview Process',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            },
            next: null
        }
    },
    'post-12': {
        data: {
            id: 12,
            title: 'Entering IT (Part 3): Navigating the Software Engineer Interview Process',
            preview: '<p>The field of software engineering is as exciting as it is challenging, offering endless opportunities for creative problem-solving and innovation. As you embark on your journey into this dynamic industry, one critical hurdle stands between you and your dream job: the interview process. This article aims to demystify the software engineer interview, offering a comprehensive guide on what to expect, from HR screening to the final offer, ensuring you walk into your interview prepared and confident.</p>',
            is_draft: false,
            published_at: '2024-03-17 16:22:00',
            reading_time: 11,
            preview_image_type: PreviewTypes.fill,
            preview_image_id: '9d481c8818bfb70634decc4883f8afae386d4ac6',
            blocks: [
                {
                    key: '0194d1f1-1b71-76ff-b3aa-a09c1faf657d',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'The field of software engineering is as exciting as it is challenging, offering endless opportunities for creative problem-solving and innovation. As you embark on your journey into this dynamic industry, one critical hurdle stands between you and your dream job: the interview process. This article aims to demystify the software engineer interview, offering a comprehensive guide on what to expect, from HR screening to the final offer, ensuring you walk into your interview prepared and confident.'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-a5f35fc9c722',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Interview Steps'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-a9486a6800cc',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'HR Screening'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-ad4d75638b67',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'The first step in the interview process is often an HR screening, a conversation with a Human Resources representative. The goal here is to assess whether you\'re a good fit for the company culture and to verify the basic qualifications listed on your resume. Expect questions about your previous experience, why you\'re interested in the role, and your career aspirations. To make a good impression, be professional, articulate clearly why you want the position, and how you can contribute to the team.'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-b0ceb6434b59',
                    type: 'image',
                    styles: [],
                    content: {
                        alt: 'DALL·E 2024-03-17 16.09.27 - Create an image preview for an article titled \'Entering IT_ Navigating the Software Engineer Interview Process\'. The image should feature a bright, en',
                        src: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/IhAfcP3erhsmihp651IhsSJarYMH4iPrBeHLX6FW.jpg',
                        caption: ''
                    }
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-b768a636868b',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Technical Interview'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-b9b441a14e08',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Technical interviews are designed to assess a candidate\'s technical abilities, problem-solving skills, and coding proficiency. Typically, they consist of several components, including coding challenges, system design questions, and behavioral interviews to gauge how well you work with a team and handle real-world problems.'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-bec320b03488',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'System design questions are common aspect of technical interviews, especially for more senior roles. In this part, you might be asked to design a scalable system or software architecture for a hypothetical application. This tests your understanding of software design principles, scalability, reliability, and efficiency.'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-c32aad3ce40c',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Technical Practice'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-c58c2403fe70',
                    type: 'raw',
                    content: '<p>The coding part often involves solving algorithmic problems that test your understanding of data structures, algorithms, and your ability to think logically under pressure. It\'s not just about getting the right answer; it\'s also about how you approach the problem, the efficiency of your solution, and your ability to explain your thought process clearly.</p>\n<h3 class="text-xl my-3">Test Task</h3>\n<p>In the test task, you\'re typically given a problem to solve within a specified timeframe, which could range from a few hours to a few days. This task will likely involve designing and implementing a solution to a problem, fixing a bug in a given codebase, or adding a new feature to an existing application. The key here is to demonstrate your ability to work independently, your coding standards, and how you approach problem-solving.</p>\n<p class="text-md my-3">To excel in the tech task:</p>\n<ul>\n<li><strong>Understand the requirements thoroughly</strong> before beginning your work. Don\'t hesitate to ask clarifying questions if you\'re unsure about any aspect of the task.</li>\n<li><strong>Plan your approach</strong> before diving into coding. Outline the steps you\'ll take, the algorithms you might use, and how you\'ll structure your code.</li>\n<li><strong>Test your solution</strong> extensively. Ensure it not only meets the requirements but also handles edge cases and errors gracefully.</li>\n<li><strong>Document your work.</strong> Briefly explain your thought process, why you chose a particular approach, and any assumptions you made along the way.</li>\n</ul>\n<h3 class="text-xl my-3">Live Coding Session</h3>\n<p>The live coding session is often part of the technical interview, where you\'ll be asked to solve programming problems in real-time, usually via a shared coding platform. This session tests your ability to code under pressure, your thought process, and your problem-solving skills.</p>\n<p class="text-md my-3">Tips for a successful live coding session:</p>\n<ul>\n<li><strong>Stay calm and communicate.</strong > Explain what you\'re thinking as you work through the problem. If you get stuck, articulate where and why, as this can still demonstrate your problem-solving skills.</li>\n<li><strong>Clarify the problem</strong> before you start coding. Make sure you understand what\'s being asked and confirm any assumptions with your interviewer.</li>\n<li><strong>Think about edge cases</strong> and test your code as you go. Showing that you\'re considering different scenarios will impress your interviewer.</li>\n</ul>'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-c92d0e06ec1b',
                    type: 'remark',
                    content: [
                        {
                            key: '0194d1ef-1cda-7e94-b0fa-e85f4179dfef',
                            type: 'heading',
                            styles: {
                                type: 'primary'
                            },
                            content: 'My Two Cents:'
                        },
                        {
                            key: '0194d1ef-1cda-7e94-b0fa-e85f41f1ab88',
                            type: 'paragraph',
                            styles: {
                                type: 'unstyled'
                            },
                            content: 'Big tech companies have given the impression that being good at solving algorithmic problems during live coding tests is the best way to showcase an engineer\'s abilities. While I wouldn\'t say this is completely incorrect, it seems a bit off the mark when it comes to judging someone\'s technical skills. Here\'s why: as a software engineer, you\'re more likely to spend your time writing business logic, handling old code, making code better, and ensuring your code is easy to understand and maintain.<br>Nevertheless, it\'s still important for you as a developer to have a good understanding of algorithms and how complex they are. But remember, this shouldn\'t be your main skill if you aim to come up with really great solutions. Being familiar with algorithms helps with solving problems more efficiently, but the real heart of software engineering is about developing applications that are strong, can grow, and are easy for users to interact with.'
                        }
                    ]
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-cf776a6c6631',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Preparation for the Technical Step'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-d0357f1a2236',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Preparation is key to succeeding in technical interviews. Practicing coding problems on platforms like LeetCode or HackerRank, studying system design concepts, and reviewing your own past projects can be incredibly beneficial. Additionally, soft skills should not be underestimated. Being able to communicate effectively, exhibit teamwork, and demonstrate a growth mindset can significantly impact your interview outcome.'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-d5b162724ee3',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Preparing for the technical interview requires a strategic approach. Here are some tips on where and how to prepare:'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-d821387467a4',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1ef-1cda-7e94-b0fa-e85f4454c232',
                            type: 'list-item',
                            styles: [],
                            content: 'Leverage online resources. Platforms like Codecademy, Coursera, and Udemy offer courses on algorithms, data structures, and specific programming languages. Practice platforms like LeetCode, HackerRank, and CodeSignal provide a wide range of problems to solve.'
                        },
                        {
                            key: '0194d1ef-1cda-7e94-b0fa-e85f451e07fb',
                            type: 'list-item',
                            styles: [],
                            content: 'Study common algorithms and data structures. Make sure you understand sorting algorithms, trees, graphs, queues, stacks, and hash tables, as these are frequently tested.'
                        },
                        {
                            key: '0194d1ef-1cda-7e94-b0fa-e85f45475f82',
                            type: 'list-item',
                            styles: [],
                            content: 'Practice coding by hand. It helps solidify your understanding and prepares you for whiteboard coding or paper-based coding tests.'
                        },
                        {
                            key: '0194d1ef-1cda-7e94-b0fa-e85f4629e24c',
                            type: 'list-item',
                            styles: [],
                            content: 'Join a study group or find a coding buddy. Discussing problems and solutions with others can deepen your understanding and expose you to different approaches.'
                        }
                    ]
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-dc0ef29b8001',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Finally, remember that technical interviews are as much about assessing fit as they are about technical skills. Showing curiosity, a willingness to learn, and a positive attitude can leave a lasting impression on your interviewers, potentially tipping the scales in your favor.'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-e38444dd82c0',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Manager Interview'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-e7dbc2868cbd',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'After clearing the technical hurdles, you might face a manager interview, focusing on your soft skills, team fit, project management abilities, and how you handle specific situations. Expect questions like how you\'ve overcome challenges in past projects, your approach to teamwork and conflict, and your career aspirations.'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-e827ea531d8d',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'To prepare:'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-efec32aadaec',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1ef-1cda-7e94-b0fa-e85f4931697c',
                            type: 'list-item',
                            styles: [],
                            content: 'Reflect on your past experiences. Have examples ready that showcase your problem-solving skills, leadership, teamwork, and ability to learn from failure.'
                        },
                        {
                            key: '0194d1ef-1cdb-77fb-a32b-016fe7404948',
                            type: 'list-item',
                            styles: [],
                            content: 'Research the company\'s culture and values. Tailor your answers to demonstrate how you align with them.'
                        }
                    ]
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-f34d46685893',
                    type: 'image',
                    styles: [],
                    content: {
                        alt: 'DALL·E 2024-03-17 16.15.28 - Design an image that serves as a vibrant and engaging preview for an article titled \'Entering IT_ Navigating the Software Engineer Interview Process\'',
                        src: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/7SYh30XC9p3CzSEDUArEbznIVF1Iaf2Nfv3IPIbk.jpg',
                        caption: ''
                    }
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-f6caa2b9db00',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Offer'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-faa7bf364c83',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Congratulations! If you\'ve made it to this step, you\'ve likely impressed your potential employer. The offer stage involves discussing your salary, benefits, and other terms of employment. Don\'t shy away from negotiating to ensure the offer meets your expectations and reflects your value to the company.</p>\n<p class="text-md my-3">If you receive an offer:'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3aa-fe6574b1095b',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1f0-8d9f-71b5-825e-9ed60470ace7',
                            type: 'list-item',
                            styles: [],
                            content: '<strong>Evaluate the entire package,</strong> not just the salary. Consider benefits, work-life balance, growth opportunities, and the team you\'ll be working with.'
                        },
                        {
                            key: '0194d1f0-b36d-77ff-9813-cd47f2488d1a',
                            type: 'list-item',
                            styles: [],
                            content: '<strong>Negotiate respectfully</strong> if the offer doesn\'t meet your expectations. Be clear about your worth and what you\'re looking for.'
                        }
                    ]
                },
                {
                    key: '0194d1f1-1b71-76ff-b3ab-039bb2a4794c',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'If you don\'t receive an offer, reflect on the experience to identify areas for improvement. Seek feedback, continue to refine your skills, and keep applying. Every interview is a learning opportunity.'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3ab-05d9f154368c',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'The journey to becoming a software engineer is filled with learning and challenges, with the interview process being a significant hurdle. By understanding what to expect and preparing accordingly, you can approach each stage with confidence. Remember, each interview is an opportunity to learn and grow. With perseverance and continuous improvement, you\'ll find the right opportunity that matches your skills and aspirations'
                },
                {
                    key: '0194d1f1-1b71-76ff-b3ab-0ba3cb9a1dd4',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'This comprehensive guide covers the essentials of what to expect and how to prepare for a software engineer interview, from the initial HR screening to the final offer stage. By following these tips and dedicating yourself to thorough preparation, you\'re well on your way to success in your software engineering career.'
                }
            ],
            tags: [
                {
                    id: 2,
                    name: 'Software Development',
                    slug: 'software-development'
                },
                {
                    id: 20,
                    name: 'Career Advice',
                    slug: 'career-advice'
                },
                {
                    id: 36,
                    name: 'IT Careers',
                    slug: 'it-careers'
                },
                {
                    id: 43,
                    name: 'Tech Interview Preparation',
                    slug: 'tech-interview-preparation'
                }
            ],
            previewImage: {
                hash: '9d481c8818bfb70634decc4883f8afae386d4ac6',
                type: 'image/jpeg',
                path: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/IhAfcP3erhsmihp651IhsSJarYMH4iPrBeHLX6FW.jpg',
                extension: 'jpeg',
                name: 'DALL·E 2024-03-17 16.09.27 - Create an image preview for an article titled \'Entering IT_ Navigating the Software Engineer Interview Process\'. The image should feature a bright, en',
                file_size: 265852
            }
        },
        meta: {
            similar: [
                {
                    id: 13,
                    title: 'Will AI take over my job in the future?',
                    preview: 'Explore the evolving relationship between AI and the IT workforce in "Will I Be Replaced by AI in the Future?" This article delves into the impact of artificial intelligence on IT jobs, addressing common concerns and debunking myths about AI-driven job displacement. It highlights how AI complements rather than replaces human efforts, and suggests key skills IT professionals should develop to stay relevant. Offering a balanced view, it reassures that the future of IT is not about replacement, but about collaboration between humans and AI, ensuring a promising outlook for those ready to adapt.',
                    is_draft: null,
                    published_at: '2024-04-27 22:45:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                },
                {
                    id: 10,
                    title: 'Entering IT (Part 2): Best Learning Resources',
                    preview: '<p>Hey there! Are you ready to continue diving into the &nbsp;world of IT? Whether you\'re just starting out or looking to polish your skills, I\'ve got some resources lined up for you.</p>',
                    is_draft: null,
                    published_at: '2024-01-21 07:30:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                },
                {
                    id: 7,
                    title: 'How Not to Be Hired by a Toxic Company',
                    preview: '<p>With eight years of experience in software engineering, I\'ve seen how toxic work environments can impact one\'s career and well-being. Here\'s an expanded guide to help you avoid such companies.</p>',
                    is_draft: null,
                    published_at: '2023-12-18 00:00:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                }
            ],
            previous: {
                id: 11,
                title: 'Unusual Yet Effective Optimizations',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            },
            next: {
                id: 13,
                title: 'Will AI take over my job in the future?',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            }
        }
    },
    'post-11': {
        data: {
            id: 11,
            title: 'Unusual Yet Effective Optimizations',
            preview: '<p>Today, let\'s talk about some quirky yet effective optimization strategies. A few weeks ago, I was working on improving the performance of a service. Originally, its task was to verify certain details on a cryptocurrency blockchain, then check and either insert or update data in a database (DB). It sounded like a solid plan, and our initial tests seemed promising.</p>',
            is_draft: false,
            published_at: '2024-01-28 17:25:00',
            reading_time: 2,
            preview_image_type: PreviewTypes.left_side,
            preview_image_id: '073bdf0939f81a40bd68d344dfdc17ed77029237',
            blocks: [
                {
                    type: 'paragraph',
                    styles: [],
                    content: 'Today, let\'s talk about some quirky yet effective optimization strategies. A few weeks ago, I was working on improving the performance of a service. Originally, its task was to verify certain details on a cryptocurrency blockchain, then check and either insert or update data in a database (DB). It sounded like a solid plan, and our initial tests seemed promising.'
                },
                {
                    type: 'paragraph',
                    styles: [],
                    content: 'However, when we started processing real data, issues cropped up due to overwhelming the database. A quick investigation revealed that the volume of actual data far exceeded our development estimates. You might wonder, what exactly went wrong? Well, our tests were conducted on a much smaller scale than needed. Consequently, in a production environment, the service had to check a DB table containing tens of millions of rows, while simultaneously performing insertions and updates on another table.'
                },
                {
                    type: 'paragraph',
                    styles: [],
                    content: 'So, how did we optimize it? First off, we implemented preloading: instead of checking in the DB, we shifted this process to memory. Sometimes, addressing problems this way is perfectly fine. Yes, it used about 3GB of RAM at its peak, but utilizing RAM as temporary storage is quite acceptable&mdash;just remember that tools like Redis are also available. Next, we optimized the insertion and update processes. Rather than updating and inserting one record at a time, we switched to bulk operations. To give you an idea of the improvement, processing 3,000 entries individually took around 12 seconds, but when combined into a single bulk operation, it only took about 0.085 seconds&mdash;that\'s less than 100 milliseconds! After implementing these optimizations, the service operated almost 20 times faster.'
                },
                {
                    type: 'paragraph',
                    styles: [],
                    content: 'In conclusion, always remember to consider the actual data volume when developing a new service. And equally important, don\'t skip performance testing before going live with your services. It\'s crucial for avoiding surprises down the road.'
                }
            ],
            tags: [
                {
                    id: 38,
                    name: 'Performance Optimization',
                    slug: 'performance-optimization'
                },
                {
                    id: 39,
                    name: 'Database Management',
                    slug: 'database-management'
                },
                {
                    id: 40,
                    name: 'Efficient Coding',
                    slug: 'efficient-coding'
                },
                {
                    id: 41,
                    name: 'Data Scaling',
                    slug: 'data-scaling'
                },
                {
                    id: 42,
                    name: 'Tech Solutions',
                    slug: 'tech-solutions'
                }
            ],
            previewImage: {
                hash: '073bdf0939f81a40bd68d344dfdc17ed77029237',
                type: 'image/jpeg',
                path: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/FdydtsC987o9YcapdcWRjx9htTzl8lLN9ahroDJS.jpg',
                extension: 'jpg',
                name: 'DALL·E 2024-01-28 21.13.38 - An abstract illustration symbolizing database optimization and performance improvement in the context of cryptocurrency blockchain. The image should f',
                file_size: 265297
            }
        },
        meta: {
            similar: [],
            previous: {
                id: 10,
                title: 'Entering IT (Part 2): Best Learning Resources',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            },
            next: {
                id: 12,
                title: 'Entering IT (Part 3): Navigating the Software Engineer Interview Process',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            }
        }
    },
    'post-10': {
        data: {
            id: 10,
            title: 'Entering IT (Part 2): Best Learning Resources',
            preview: '<p>Hey there! Are you ready to continue diving into the &nbsp;world of IT? Whether you\'re just starting out or looking to polish your skills, I\'ve got some resources lined up for you.</p>',
            is_draft: false,
            published_at: '2024-01-21 07:30:00',
            reading_time: 5,
            preview_image_type: PreviewTypes.left_side,
            preview_image_id: '8321517aaa0472c69101609d1e52ff04b90bcd86',
            blocks: [
                {
                    key: '0194d1f1-bea9-703c-bc1b-6b9feecbab71',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Hey there! Are you ready to continue diving into the &nbsp;world of IT? Whether you\'re just starting out or looking to polish your skills, I\'ve got some resources lined up for you.'
                },
                {
                    key: '0194d1f1-beaa-76ce-9a57-231b430cf56c',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Let\'s Start with the Basics'
                },
                {
                    key: '0194d1f1-beaa-76ce-9a57-2417860674b0',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f2e8ded11',
                            type: 'list-item',
                            styles: [],
                            content: 'GCFGlobal: This is your go-to spot for free tutorials on all the basics - think computer skills, internet basics, and getting to know Microsoft Office. It\'s easy to follow and totally free!'
                        },
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f2eedb3da',
                            type: 'list-item',
                            styles: [],
                            content: 'Alison: Alison is another cool place to get your feet wet with computer literacy and IT basics. And guess what? It\'s free too!'
                        },
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f2f579165',
                            type: 'list-item',
                            styles: [],
                            content: 'YouTube (Traversy Media, Computerphile, NetworkChuck): These channels are fantastic for tutorials and easy-to-understand explanations.'
                        },
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f2fcb79fb',
                            type: 'list-item',
                            styles: [],
                            content: 'O\'Reilly Media, Packt Publishing, Safari Books Online: These are treasure troves for IT and programming books.'
                        }
                    ]
                },
                {
                    key: '0194d1f1-beaa-76ce-9a57-28c6098cd6cf',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'For the Future Coders'
                },
                {
                    key: '0194d1f1-beaa-76ce-9a57-2e2171927e03',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f318212b7',
                            type: 'list-item',
                            styles: [],
                            content: 'Codecademy: Want to learn coding in a fun, interactive way? Codecademy is your friend. They cover languages like Python, JavaScript, and more.'
                        },
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f32441c9d',
                            type: 'list-item',
                            styles: [],
                            content: 'Coursera: Dreaming of learning from top universities or companies? Coursera has got programming courses that&rsquo;ll make that dream come true.'
                        },
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f328e4add',
                            type: 'list-item',
                            styles: [],
                            content: 'edX: Here&rsquo;s another gem where you can learn computer science from the brains at Harvard, MIT, and others.'
                        }
                    ]
                },
                {
                    key: '0194d1f1-beaa-76ce-9a57-32a9572c3e39',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Web Wizards, Right This Way'
                },
                {
                    key: '0194d1f1-beaa-76ce-9a57-37b8d0fba3c0',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f34eab002',
                            type: 'list-item',
                            styles: [],
                            content: 'FreeCodeCamp: It\'s all about web development here. Learn HTML, CSS, JavaScript, and more for free.'
                        },
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f35e456b2',
                            type: 'list-item',
                            styles: [],
                            content: 'Udemy: Udemy has a huge range of web development courses. There&rsquo;s something for every level, so jump in!'
                        },
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f36a34e16',
                            type: 'list-item',
                            styles: [],
                            content: 'The Odin Project: This is a free, open-source coding curriculum focused on full-stack web development. Totally worth checking out!'
                        }
                    ]
                },
                {
                    key: '0194d1f1-beaa-76ce-9a57-39ac8df36489',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Cybersecurity Enthusiasts'
                },
                {
                    key: '0194d1f1-beaa-76ce-9a57-3cabad2f5fb6',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f37eead17',
                            type: 'list-item',
                            styles: [],
                            content: 'Cybrary: Dive into the world of cybersecurity with both free and paid courses.'
                        },
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f382bd4cf',
                            type: 'list-item',
                            styles: [],
                            content: 'SANS Cyber Aces Online: Here, you&rsquo;ll find some neat free courseware on cybersecurity basics.'
                        }
                    ]
                },
                {
                    key: '0194d1f1-beaa-76ce-9a57-4139006f5f72',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Network Navigators'
                },
                {
                    key: '0194d1f1-beaa-76ce-9a57-44b9f602998a',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f392b855f',
                            type: 'list-item',
                            styles: [],
                            content: 'Cisco Networking Academy: Cisco\'s platform is great for courses in networking and cybersecurity'
                        },
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f393d14ee',
                            type: 'list-item',
                            styles: [],
                            content: 'CompTIA: They offer certifications and training in network security and IT fundamentals. Super useful for building a strong foundation!'
                        }
                    ]
                },
                {
                    key: '0194d1f1-beaa-76ce-9a57-49f9dbc0a732',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Data Science &amp; Big Data Buffs'
                },
                {
                    key: '0194d1f1-beaa-76ce-9a57-4e06dab6022d',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f3a7df4ae',
                            type: 'list-item',
                            styles: [],
                            content: 'Kaggle: Perfect for hands-on projects in data science and machine learning.'
                        },
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f3b112a79',
                            type: 'list-item',
                            styles: [],
                            content: 'DataCamp: Specializes in data science and analytics courses using R, Python, and SQL.'
                        }
                    ]
                },
                {
                    key: '0194d1f1-beaa-76ce-9a57-509d16a4c9d6',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'IT Certification for Pros'
                },
                {
                    key: '0194d1f1-beaa-76ce-9a57-56479aa53c13',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f3dad11b7',
                            type: 'list-item',
                            styles: [],
                            content: 'Microsoft Certifications: Get certified in various Microsoft technologies.'
                        },
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f3e02aead',
                            type: 'list-item',
                            styles: [],
                            content: 'Cisco Certification: Great for networking and security certifications.'
                        },
                        {
                            key: '0194d1f1-bf12-754a-98b2-a03f3e9f9918',
                            type: 'list-item',
                            styles: [],
                            content: 'AWS Training and Certification: Learn about AWS cloud services directly from Amazon.'
                        }
                    ]
                },
                {
                    key: '0194d1f1-beaa-76ce-9a57-5bfaf029443c',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'So, that\'s my roundup of some of the best resources to kickstart or boost your IT journey. Remember, the world of IT is vast and constantly evolving, so keep exploring and stay curious. Happy learning!'
                }
            ],
            tags: [
                {
                    id: 34,
                    name: 'Tech Education',
                    slug: 'tech-education'
                },
                {
                    id: 35,
                    name: 'Learn Coding',
                    slug: 'learn-coding'
                },
                {
                    id: 36,
                    name: 'IT Careers',
                    slug: 'it-careers'
                },
                {
                    id: 37,
                    name: 'Digital Skills',
                    slug: 'digital-skills'
                }
            ],
            previewImage: {
                hash: '8321517aaa0472c69101609d1e52ff04b90bcd86',
                type: 'image/jpeg',
                path: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/j0YQaFf7wCdEimbaV7sDq351Pxdir2GJjPxlbUy2.jpg',
                extension: 'jpg',
                name: 'DALL·E 2024-01-21 11.40.10 - A vibrant and engaging image representing learning and education in the field of Information Technology. The image should showcase symbols like books,',
                file_size: 199140
            }
        },
        meta: {
            similar: [
                {
                    id: 13,
                    title: 'Will AI take over my job in the future?',
                    preview: 'Explore the evolving relationship between AI and the IT workforce in "Will I Be Replaced by AI in the Future?" This article delves into the impact of artificial intelligence on IT jobs, addressing common concerns and debunking myths about AI-driven job displacement. It highlights how AI complements rather than replaces human efforts, and suggests key skills IT professionals should develop to stay relevant. Offering a balanced view, it reassures that the future of IT is not about replacement, but about collaboration between humans and AI, ensuring a promising outlook for those ready to adapt.',
                    is_draft: null,
                    published_at: '2024-04-27 22:45:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                },
                {
                    id: 12,
                    title: 'Entering IT (Part 3): Navigating the Software Engineer Interview Process',
                    preview: '<p>The field of software engineering is as exciting as it is challenging, offering endless opportunities for creative problem-solving and innovation. As you embark on your journey into this dynamic industry, one critical hurdle stands between you and your dream job: the interview process. This article aims to demystify the software engineer interview, offering a comprehensive guide on what to expect, from HR screening to the final offer, ensuring you walk into your interview prepared and confident.</p>',
                    is_draft: null,
                    published_at: '2024-03-17 16:22:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                }
            ],
            previous: {
                id: 9,
                title: 'Entering IT (Part 1): IT Trends 2024',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            },
            next: {
                id: 11,
                title: 'Unusual Yet Effective Optimizations',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            }
        }
    },
    'post-9': {
        data: {
            id: 9,
            title: 'Entering IT (Part 1): IT Trends 2024',
            preview: '<p>2024 has just begun, and it\'s a great time for new beginnings! I\'m excited to kick off a series of articles about starting a career in Information Technology (IT). We\'ll begin with the basics, focusing on the latest trends in IT. In this article, I aim to simplify and explain the top IT trends of the year, making them easy to understand. Let\'s dive into the exciting world of IT together!</p>',
            is_draft: false,
            published_at: '2024-01-09 19:00:00',
            reading_time: 6,
            preview_image_type: PreviewTypes.fill,
            preview_image_id: '6af789348f258f464ecfc370dc4b8218d2e66e53',
            blocks: [
                {
                    key: '0194d1f2-7532-7534-8e08-0749216b4dfa',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: '2024 has just begun, and it\'s a great time for new beginnings! I\'m excited to kick off a series of articles about starting a career in Information Technology (IT). We\'ll begin with the basics, focusing on the latest trends in IT. In this article, I aim to simplify and explain the top IT trends of the year, making them easy to understand. Let\'s dive into the exciting world of IT together!'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-0b13bdd99fd2',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Trend 1: AI - The Brain Behind the Scenes'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-0cf24ccd6b7d',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Artificial Intelligence (AI) isn\'t just a buzzword anymore; it\'s the powerhouse driving a multitude of industries. In 2024, AI is more than just an assistant; it\'s a decision-maker. From healthcare diagnostics to personalized shopping experiences, AI is everywhere. What\'s fascinating is how AI is evolving to be more empathetic and intuitive, almost like it\'s getting a mind of its own!'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-131b780446b6',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Trend 2: Quantum Computing - The Game Changer'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-15fd7e44b076',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Remember when we thought supercomputers were the peak of computing power? Well, think again! Quantum computing is the new kid on the block, and it\'s changing the game entirely. Imagine solving complex problems in minutes, which would have taken traditional computers years to crack. That\'s the power of quantum computing, and in 2024, it\'s starting to become more accessible and impactful, particularly in fields like cryptography and climate modeling.'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-1b2566e76267',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Trend 3: Edge Computing - Bringing Data Closer'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-1f1e36f89f29',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'With the explosion of IoT (Internet of Things) devices, there\'s a massive amount of data being generated every second. Edge computing is the trend that\'s making sense of this data deluge by processing it closer to where it\'s generated. This means faster insights and quicker responses, essential for everything from smart cities to autonomous vehicles.'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-227f90fe8b7f',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Trend 4: Cybersecurity - The Never-Ending Battle'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-2503ae6a1c97',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'As our reliance on technology grows, so does the sophistication of cyber threats. In 2024, cybersecurity isn\'t just about firewalls and antivirus software; it\'s about predictive analytics and AI-driven threat detection. The focus is on staying one step ahead of cybercriminals, which is a never-ending but crucial battle.'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-2bc4841cf1a7',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Trend 5: Blockchain Beyond Cryptocurrency'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-2f74bac6aef1',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Blockchain has outgrown its cryptocurrency shoes and is now strutting on various industry runways. From supply chain transparency to secure voting systems, blockchain in 2024 is all about trust and transparency in digital transactions. It\'s fascinating to see how this technology is redefining processes across different sectors.'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-32a2a9c3c7ce',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Trend 6: AR and VR - More Than Just Gaming'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-35d557e96e45',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Augmented Reality (AR) and Virtual Reality (VR) are no longer confined to the realms of gaming. In 2024, these technologies are revolutionizing education, healthcare, and even real estate. Imagine learning history by virtually walking through ancient Rome or trying on clothes in a digital store. That\'s the magic of AR and VR!'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-3b0f8286b5d3',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Trend 7: 5G and Beyond - The Need for Speed'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-3ec55f8626d6',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: '5G has been a hot topic for a while, and in 2024, it\'s becoming the backbone of our increasingly connected world. The lightning-fast speeds and low latency are not just boosting mobile internet but are also enabling advancements in areas like telemedicine and remote work. And guess what? We\'re already hearing murmurs about 6G research!'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-4337d636e12b',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Trend 8: Sustainable Tech - Going Green'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-4423625d0b16',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'The tech world is getting a green makeover! In 2024, sustainability isn\'t just a nice-to-have; it\'s a must-have. From energy-efficient data centers to eco-friendly gadgets, the focus is on reducing the environmental footprint of technology. It\'s heartening to see the industry taking responsibility for our planet.'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-4b6b24ee9595',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Conclusion'
                },
                {
                    key: '0194d1f2-7532-7534-8e08-4f2548789a9c',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Well, there you have it &ndash; a glimpse into the exciting world of IT in 2024. These trends aren\'t just shaping technology; they\'re shaping our lives, our work, and our future. As a software engineer, I\'m thrilled to be part of this journey and can\'t wait to see where these trends take us. Here\'s to an innovative and inspiring 2024 in the world of IT!'
                }
            ],
            tags: [
                {
                    id: 11,
                    name: 'Cybersecurity',
                    slug: 'cybersecurity'
                },
                {
                    id: 30,
                    name: 'Artificial Intelligence',
                    slug: 'artificial-intelligence'
                },
                {
                    id: 31,
                    name: 'Cloud Computing',
                    slug: 'cloud-computing'
                },
                {
                    id: 32,
                    name: 'IoT',
                    slug: 'iot'
                },
                {
                    id: 33,
                    name: 'Tech Trends',
                    slug: 'tech-trends'
                }
            ],
            previewImage: {
                hash: '6af789348f258f464ecfc370dc4b8218d2e66e53',
                type: 'image/jpeg',
                path: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/t3WzOP9QVP4KmMzLgRL3Z4xNNmNSAexhA9ZJ6xyF.jpg',
                extension: 'jpg',
                name: 'DALL·E 2024-01-06 18.00.17 - A modern, visually engaging graphic depicting the top IT trends of 2024. The image should be bright and colorful, featuring symbolic icons or illustra',
                file_size: 245861
            }
        },
        meta: {
            similar: [
                {
                    id: 13,
                    title: 'Will AI take over my job in the future?',
                    preview: 'Explore the evolving relationship between AI and the IT workforce in "Will I Be Replaced by AI in the Future?" This article delves into the impact of artificial intelligence on IT jobs, addressing common concerns and debunking myths about AI-driven job displacement. It highlights how AI complements rather than replaces human efforts, and suggests key skills IT professionals should develop to stay relevant. Offering a balanced view, it reassures that the future of IT is not about replacement, but about collaboration between humans and AI, ensuring a promising outlook for those ready to adapt.',
                    is_draft: null,
                    published_at: '2024-04-27 22:45:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                },
                {
                    id: 3,
                    title: 'You Will Never Be Fully Secured with PHP',
                    preview: '<p>In the evolving world of software development, security remains a paramount concern, especially when dealing with financial data. A reflection on past experiences reveals insightful lessons, particularly regarding the use of PHP in web development. While PHP offers ease of use and quick development turnaround, it inherently possesses certain security vulnerabilities that are crucial for developers to understand. This article delves into these challenges, underscoring the importance of vigilance in the realm of web security.</p>',
                    is_draft: null,
                    published_at: '2023-11-19 10:00:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                }
            ],
            previous: {
                id: 8,
                title: 'Bouncing Back from Burnout',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            },
            next: {
                id: 10,
                title: 'Entering IT (Part 2): Best Learning Resources',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            }
        }
    },
    'post-8': {
        data: {
            id: 8,
            title: 'Bouncing Back from Burnout',
            preview: '<p>Hey everyone! Remember when we talked about how tough it can be to spot a toxic company during the hiring stage? Well, navigating such an environment can amplify professional burnout. I want to share my journey through this, diving deeper into the complexities of burnout in a toxic IT company. This isn\'t just a story; it\'s a survival guide packed with insights and strategies.</p>',
            is_draft: false,
            published_at: '2023-12-24 09:00:00',
            reading_time: 7,
            preview_image_type: PreviewTypes.left_side,
            preview_image_id: '6b09261873dc49c7be9a233bd67b7a360a72f404',
            blocks: [
                {
                    key: '0194d1f3-3bde-75fa-9dde-892a8d85ea98',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Hey everyone! Remember when we talked about how tough it can be to spot a toxic company during the hiring stage? Well, navigating such an environment can amplify professional burnout. I want to share my journey through this, diving deeper into the complexities of burnout in a toxic IT company. This isn\'t just a story; it\'s a survival guide packed with insights and strategies.'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-8dacb0d163fb',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Understanding Burnout'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-92c4ac2d8b2e',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'First things first, what is professional burnout? It\'s not just a fancy term for feeling tired on a Monday morning. Burnout in IT can feel like hitting a wall &ndash; you\'re emotionally drained, your motivation has left the building, and even the simplest tasks feel like climbing Mount Everest. It\'s important to recognize these signs early because, let\'s face it, we\'re not robots (yet!).'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-941175d2aae0',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'So, what happens when you find yourself in a less-than-ideal work environment? Burnout in a toxic IT setting isn\'t just about feeling tired or disengaged. It\'s like being stuck in quicksand &ndash; the more you struggle, the deeper you sink. It\'s crucial to recognize these signs and understand that it\'s not just about workload, but also the negative vibes that drain your energy and enthusiasm.'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-9ae3983937e5',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'What To Do With This'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-9cbf31ab523d',
                    type: 'image',
                    styles: [],
                    content: {
                        alt: 'DALL·E 2023-12-24 13.17.38 - A realistic image representing professional burnout in the IT sector. The scene depicts a cluttered desk with multiple screens, a keyboard, and variou Large',
                        src: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/Gdk3nHhd9RYBl7X1KHhqU79ERSKEOAUB5P2RiQl1.jpg',
                        caption: ''
                    }
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-a1e9793f8ae2',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Unplug and Recharge'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-a5f9d624cc86',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'In a toxic environment, unplugging is your lifeline. It\'s about more than just taking a break from your devices; it\'s about mental detox. Try activities that rejuvenate your spirit. Whether it\'s hiking, painting, or just enjoying a quiet cup of coffee, find what refuels you and make it a non-negotiable part of your routine.'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-a80d5b4d0d0a',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Set Boundaries'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-ad18d2323721',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'In the world of IT, where the lines between work and life blur, setting boundaries is essential. This is more than just turning off notifications; it\'s about cultivating a mindset where you respect your limits. Be clear with your colleagues and bosses about your availability and stick to it.'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-b0d068da42ba',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Find Your Tribe'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-b7029868e299',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'A supportive network can be your anchor in a stormy workplace. Whether it&rsquo;s colleagues, online communities, or friends outside of work, build connections with people who understand and support you. Share your struggles and successes, and you&rsquo;ll find strength in solidarity.'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-b8ec7a4aa7c8',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Keep Learning But at Your Pace'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-bdcb2d336b7d',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'The pressure to constantly upgrade your skills in IT can be overwhelming, especially in a toxic environment. Focus on learning that aligns with your interests and career goals. Remember, every small step in learning is progress, and it doesn&rsquo;t have to happen overnight.'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-c23319a9cd06',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Seek Professional Help If Needed'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-c49b3ea02174',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Dealing with burnout, especially in a toxic environment, can be a complex and challenging journey. Professional guidance can be invaluable in navigating these waters. Therapists or counselors specializing in workplace issues can offer personalized strategies and support.'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-cb9666f8dcc7',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Dealing with burnout, especially in a toxic environment, can be a complex and challenging journey. Professional guidance can be invaluable in navigating these waters. Therapists or counselors specializing in workplace issues can offer personalized strategies and support.'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-cfcdf4a0c59a',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Understanding the Role of Leadership'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-d18893482908',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Leadership plays a huge role in shaping workplace culture. Reflect on how management styles and policies contribute to the environment. Sometimes, advocating for change or being part of the conversation can be empowering and part of your burnout recovery journey.'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-d55ecbb552d0',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Embracing Self-Care as a Priority'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-da6ec3495599',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Self-care isn&rsquo;t just a buzzword; it&rsquo;s a critical survival skill in toxic work environments. This means prioritizing your health, setting aside time for rest, and engaging in activities that promote mental and physical well-being.'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-de1c8c53d9f1',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Navigating Career Choices'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-e2070b16d653',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Sometimes, the best way to handle burnout is to reassess your career path. Consider if your current role aligns with your values and long-term goals. Exploring new opportunities might be scary, but it can also be the path to a more fulfilling career.'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-e504457d52c9',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Conclusion'
                },
                {
                    key: '0194d1f3-3bde-75fa-9dde-ea3959427b05',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Dealing with burnout can be a daunting journey, but it\'s also filled with opportunities for personal growth and self-discovery. By finding ways to detach, setting firm boundaries, building a strong support network, continuing to learn at your own pace, seeking professional help, understanding the role of leadership, prioritizing self-care, and being open to new career paths, you can navigate through these challenges. Let&rsquo;s embrace this journey as an integral part of our professional lives and emerge stronger, more resilient, and more aligned with our true selves. Here\'s to overcoming, learning, and thriving in the world of IT! 🚀'
                }
            ],
            tags: [
                {
                    id: 22,
                    name: 'Workplace Culture',
                    slug: 'workplace-culture'
                },
                {
                    id: 25,
                    name: 'Burnout In Tech',
                    slug: 'burnout-in-tech'
                },
                {
                    id: 26,
                    name: 'Toxic Work Culture',
                    slug: 'toxic-work-culture'
                },
                {
                    id: 27,
                    name: 'Work-Life Balance',
                    slug: 'work-life-balance'
                },
                {
                    id: 28,
                    name: 'Career Resilience',
                    slug: 'career-resilience'
                },
                {
                    id: 29,
                    name: 'Mental Health In Tech',
                    slug: 'mental-health-in-tech'
                }
            ],
            previewImage: {
                hash: '6b09261873dc49c7be9a233bd67b7a360a72f404',
                type: 'image/jpeg',
                path: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/Gdk3nHhd9RYBl7X1KHhqU79ERSKEOAUB5P2RiQl1.jpg',
                extension: 'jpeg',
                name: 'DALL·E 2023-12-24 13.17.38 - A realistic image representing professional burnout in the IT sector. The scene depicts a cluttered desk with multiple screens, a keyboard, and variou Large',
                file_size: 268573
            }
        },
        meta: {
            similar: [
                {
                    id: 7,
                    title: 'How Not to Be Hired by a Toxic Company',
                    preview: '<p>With eight years of experience in software engineering, I\'ve seen how toxic work environments can impact one\'s career and well-being. Here\'s an expanded guide to help you avoid such companies.</p>',
                    is_draft: null,
                    published_at: '2023-12-18 00:00:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                }
            ],
            previous: {
                id: 7,
                title: 'How Not to Be Hired by a Toxic Company',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            },
            next: {
                id: 9,
                title: 'Entering IT (Part 1): IT Trends 2024',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            }
        }
    },
    'post-7': {
        data: {
            id: 7,
            title: 'How Not to Be Hired by a Toxic Company',
            preview: '<p>With eight years of experience in software engineering, I\'ve seen how toxic work environments can impact one\'s career and well-being. Here\'s an expanded guide to help you avoid such companies.</p>',
            is_draft: false,
            published_at: '2023-12-18 00:00:00',
            reading_time: 6,
            preview_image_type: PreviewTypes.fill,
            preview_image_id: '5e152fdb83a4f07d081be9adaea1ee6a0d950011',
            blocks: [
                {
                    key: '0194d1f4-0cc7-7519-9a0f-2c7767186456',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'With eight years of experience in software engineering, I\'ve seen how toxic work environments can impact one\'s career and well-being. Here\'s an expanded guide to help you avoid such companies.'
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-32fbdb7ef6fc',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Research the Company Culture'
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-36690d93f673',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Understanding a company\'s culture is crucial. Look beyond the official website and explore:'
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-38391f8ed590',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1f4-0d24-7585-9646-445c75d0a9fa',
                            type: 'list-item',
                            styles: [],
                            content: 'Employee Reviews: Websites like Glassdoor or Indeed often contain candid reviews from current and former employees. Pay attention to comments about management style, work-life balance, and office politics.'
                        },
                        {
                            key: '0194d1f4-0d24-7585-9646-445c764de415',
                            type: 'list-item',
                            styles: [],
                            content: 'Social Media and News: Check the company\'s social media presence and any recent news articles for insights into their public image and how they handle crises or controversies.'
                        },
                        {
                            key: '0194d1f4-0d24-7585-9646-445c7700f1dc',
                            type: 'list-item',
                            styles: [],
                            content: 'Network Insights: If possible, reach out to current or former employees through platforms like LinkedIn for firsthand accounts of the company culture.'
                        }
                    ]
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-3cbdd33a1c57',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Evaluate the Job Description'
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-42198727fa0a',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'A job description can be very telling:'
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-444f55e628be',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1f4-0d24-7585-9646-445c7846a671',
                            type: 'list-item',
                            styles: [],
                            content: 'Vague Descriptions: Be cautious of listings that are vague about job responsibilities or requirements. A lack of clarity can indicate disorganization or unrealistic expectations.'
                        },
                        {
                            key: '0194d1f4-0d24-7585-9646-445c78ba2ff0',
                            type: 'list-item',
                            styles: [],
                            content: 'Over-the-Top Language: Terms like "superstar coder," "wizard," or "hero" might suggest a culture that values overwork and unrealistic achievements.'
                        },
                        {
                            key: '0194d1f4-0d24-7585-9646-445c792d979b',
                            type: 'list-item',
                            styles: [],
                            content: 'Perks Over Substance: If a job listing focuses more on perks (like free lunches) than the role itself, it might be compensating for a demanding work environment'
                        }
                    ]
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-4910fb565e5d',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Observe the Interview Process'
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-4f59686e2dc3',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'The interview process is a window into the company\'s values:'
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-50b22a6058df',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1f4-0d24-7585-9646-445c7bfc368b',
                            type: 'list-item',
                            styles: [],
                            content: 'Respect and Professionalism: Note how punctual and prepared the interviewers are. Disrespectful or disorganized behavior during the interview often reflects the company\'s overall attitude.'
                        },
                        {
                            key: '0194d1f4-0d24-7585-9646-445c7c21c87c',
                            type: 'list-item',
                            styles: [],
                            content: 'Questions They Ask: Pay attention to the questions asked. Are they relevant and respectful, or invasive and irrelevant?'
                        },
                        {
                            key: '0194d1f4-0d24-7585-9646-445c7c99a354',
                            type: 'list-item',
                            styles: [],
                            content: 'Response to Your Queries: Evaluate how transparent they are when answering your questions. Evasive or vague responses can be red flags.'
                        }
                    ]
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-56a25cc6b40b',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Ask the Right Questions'
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-5990ffde1704',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Arm yourself with specific questions:'
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-5e7fc5871786',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1f4-0d24-7585-9646-445c7ede237c',
                            type: 'list-item',
                            styles: [],
                            content: 'Work-Life Balance: Inquire about average work hours, expectations for overtime, and how the company ensures employees don\'t burn out.'
                        },
                        {
                            key: '0194d1f4-0d24-7585-9646-445c7eee7112',
                            type: 'list-item',
                            styles: [],
                            content: 'Team and Manager Dynamics: Ask about the management style, frequency of team meetings, and how decisions are made.'
                        },
                        {
                            key: '0194d1f4-0d24-7585-9646-445c7fbe15ac',
                            type: 'list-item',
                            styles: [],
                            content: 'Career Development: Question them about training opportunities, performance review processes, and typical career paths within the company.'
                        },
                        {
                            key: '0194d1f4-0d24-7585-9646-445c805f482a',
                            type: 'list-item',
                            styles: [],
                            content: 'Employee Turnover: High turnover can be a sign of a toxic environment. Ask about the average tenure of employees.'
                        }
                    ]
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-6342149fd09d',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Listen to Your Gut'
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-64d70de782fb',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Your intuition is a powerful tool. If you feel uneasy or notice red flags, it\'s often for a good reason. Trusting your instincts can save you from a negative experience.'
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-6ac6b96193e1',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Follow-Up After the Interview'
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-6e118e5e1d17',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Pay attention to the follow-up process:'
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-715e5d36903c',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1f4-0d24-7585-9646-445c8418b86b',
                            type: 'list-item',
                            styles: [],
                            content: 'Communication Style: Is the company prompt and professional in their communication after the interview?'
                        },
                        {
                            key: '0194d1f4-0d24-7585-9646-445c843e8d67',
                            type: 'list-item',
                            styles: [],
                            content: 'Offer Details: Scrutinize the job offer for any discrepancies or concerning clauses, like mandatory overtime or ambiguous job responsibilities.'
                        }
                    ]
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-768bc29c792e',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Conclusion'
                },
                {
                    key: '0194d1f4-0cc7-7519-9a0f-7a9cdc9a8f51',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Avoiding a toxic work environment starts with thorough research, keen observation during the interview process, and trusting your instincts. Asking the right questions and paying attention to the subtleties can reveal a lot about a company\'s true nature. Remember, it\'s not just about them choosing you, but also about you choosing a healthy and supportive work environment.'
                }
            ],
            tags: [
                {
                    id: 20,
                    name: 'Career Advice',
                    slug: 'career-advice'
                },
                {
                    id: 21,
                    name: 'Job Search Tips',
                    slug: 'job-search-tips'
                },
                {
                    id: 22,
                    name: 'Workplace Culture',
                    slug: 'workplace-culture'
                },
                {
                    id: 23,
                    name: 'Interview Tips',
                    slug: 'interview-tips'
                },
                {
                    id: 24,
                    name: 'Healthy Workplace',
                    slug: 'healthy-workplace'
                }
            ],
            previewImage: {
                hash: '5e152fdb83a4f07d081be9adaea1ee6a0d950011',
                type: 'image/jpeg',
                path: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/dccdFMne0Svjmm3lRLPBAfedA2K6UozdtlByv39y.jpg',
                extension: 'jpg',
                name: 'DALL·E 2023-12-17 17.39.34 - A bright and engaging 16_9 article preview image for \'How Not to Be Hired by a Toxic Company\'. The image should feature symbolic elements like a magni',
                file_size: 307190
            }
        },
        meta: {
            similar: [
                {
                    id: 12,
                    title: 'Entering IT (Part 3): Navigating the Software Engineer Interview Process',
                    preview: '<p>The field of software engineering is as exciting as it is challenging, offering endless opportunities for creative problem-solving and innovation. As you embark on your journey into this dynamic industry, one critical hurdle stands between you and your dream job: the interview process. This article aims to demystify the software engineer interview, offering a comprehensive guide on what to expect, from HR screening to the final offer, ensuring you walk into your interview prepared and confident.</p>',
                    is_draft: null,
                    published_at: '2024-03-17 16:22:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                },
                {
                    id: 8,
                    title: 'Bouncing Back from Burnout',
                    preview: '<p>Hey everyone! Remember when we talked about how tough it can be to spot a toxic company during the hiring stage? Well, navigating such an environment can amplify professional burnout. I want to share my journey through this, diving deeper into the complexities of burnout in a toxic IT company. This isn\'t just a story; it\'s a survival guide packed with insights and strategies.</p>',
                    is_draft: null,
                    published_at: '2023-12-24 09:00:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                }
            ],
            previous: {
                id: 6,
                title: 'The Dark Side of IT',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            },
            next: {
                id: 8,
                title: 'Bouncing Back from Burnout',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            }
        }
    },
    'post-6': {
        data: {
            id: 6,
            title: 'The Dark Side of IT',
            preview: '<p>In the world of IT, where the future seems to be crafted from lines of code and innovative tech solutions, the grass isn\'t always as green as it appears. As someone who\'s been in the thick of this field, I want to share my first-hand experience about the less glamorous side of working in IT.</p>',
            is_draft: false,
            published_at: '2023-12-09 12:30:00',
            reading_time: 5,
            preview_image_type: null,
            preview_image_id: null,
            blocks: [
                {
                    key: '0194d1f4-b975-754b-9d3d-8ea32244a105',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'In the world of IT, where the future seems to be crafted from lines of code and innovative tech solutions, the grass isn\'t always as green as it appears. As someone who\'s been in the thick of this field, I want to share my first-hand experience about the less glamorous side of working in IT.'
                },
                {
                    key: '0194d1f4-b976-77e8-a03b-feac1d2b2753',
                    type: 'image',
                    styles: [],
                    content: {
                        alt: 'DALL·E 2023-12-09 16.08.25 - An eye-catching and vibrant image representing the challenges of working in IT. The image includes a person sitting in front of a large computer scree',
                        src: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/sIHwFoz2qsjwdC7II9AQ9khoCDDihhqJfIpHBTh7.jpg',
                        caption: ''
                    }
                },
                {
                    key: '0194d1f4-b976-77e8-a03c-01581be0aedf',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Constant Learning Pressure'
                },
                {
                    key: '0194d1f4-b976-77e8-a03c-04ec219621f9',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'The tech world moves at lightning speed. New programming languages, tools, and technologies pop up almost daily. Keeping up can be exhilarating but also exhausting. There\'s this unspoken rule that you always need to be learning, always on top of the latest trends. This relentless pressure to stay relevant can be overwhelming, especially when you\'re juggling work and personal life.'
                },
                {
                    key: '0194d1f4-b976-77e8-a03c-0b8c297575e5',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Work-Life Imbalance'
                },
                {
                    key: '0194d1f4-b976-77e8-a03c-0cd2ac6e1005',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Speaking of juggling, let\'s talk about work-life balance, or the lack thereof. In IT, the lines between work and personal time often blur. You might find yourself answering emails at midnight or troubleshooting server issues over the weekend. It\'s like being on call 24/7. This constant availability eats into your personal time, making it tough to unwind and disconnect.'
                },
                {
                    key: '0194d1f4-b976-77e8-a03c-124a9c124ad6',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'The Loneliness of Remote Work'
                },
                {
                    key: '0194d1f4-b976-77e8-a03c-1570f92f58b5',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'The pandemic has shifted many IT jobs to a remote setting. While working from home has its perks, it can also be isolating. The lack of physical interaction with colleagues can lead to feelings of loneliness and disconnection. The camaraderie that comes with office banter, lunch breaks with coworkers, and face-to-face meetings is sorely missed.'
                },
                {
                    key: '0194d1f4-b976-77e8-a03c-1ae990b877d4',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'The Physical Toll'
                },
                {
                    key: '0194d1f4-b976-77e8-a03c-1d935ce228f1',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Sitting in front of a computer for long hours isn\'t just boring; it\'s harmful. Eye strain, carpal tunnel syndrome, and back problems are common complaints among IT professionals. The sedentary nature of the job can also lead to broader health issues, like obesity and heart disease.'
                },
                {
                    key: '0194d1f4-b976-77e8-a03c-22d9e0f1cd22',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'High Stress Levels'
                },
                {
                    key: '0194d1f4-b976-77e8-a03c-249c51d52d6f',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Deadlines, system crashes, and the need for quick problem-solving contribute to high stress levels in IT. When a system goes down, the pressure is on to fix it fast, and the responsibility often falls heavily on the IT team. This constant high-stress environment can lead to burnout and mental health issues.'
                },
                {
                    key: '0194d1f4-b976-77e8-a03c-299ffbcb323f',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Unrealistic Expectations and Blame Culture'
                },
                {
                    key: '0194d1f4-b976-77e8-a03c-2d3641e02366',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'One of the most disheartening aspects of working in IT is dealing with unrealistic expectations and a blame culture from some companies and managers. These leaders often exert excessive pressure on their teams, expecting them to deliver complex projects in unreasonably short timeframes. When things go awry, as they sometimes do in the complex world of technology, the blame is often unfairly placed on the developers and IT staff. This environment not only harms morale but also stifles creativity and innovation.'
                },
                {
                    key: '0194d1f4-b976-77e8-a03c-33044427d80d',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Imposter Syndrome'
                },
                {
                    key: '0194d1f4-b976-77e8-a03c-36057cdaefff',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'In an industry filled with brilliant minds, it\'s easy to feel like you don\'t measure up. Imposter syndrome, the feeling of being a fraud despite your successes, is common in IT. The competitive environment, along with the need to constantly prove your skills, can be mentally draining.'
                },
                {
                    key: '0194d1f4-b976-77e8-a03c-385c2edeb045',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'In conclusion, while working in IT offers a front-row seat to innovation and problem-solving, it\'s not without its challenges. The constant learning, blurred work-life boundaries, physical and mental tolls, unrealistic demands, and a blame culture are real issues that many in the field experience. It\'s important to find a balance, take care of your health, and remember that it\'s okay to step back and breathe. The world of technology will still be there when you return.'
                }
            ],
            tags: [
                {
                    id: 17,
                    name: 'IT Life Realities',
                    slug: 'it-life-realities'
                },
                {
                    id: 18,
                    name: 'Behind The Screens',
                    slug: 'behind-the-screens'
                },
                {
                    id: 19,
                    name: 'Tech Toll Truths',
                    slug: 'tech-toll-truths'
                }
            ],
            previewImage: null
        },
        meta: {
            similar: [],
            previous: {
                id: 5,
                title: 'How to Choose the Right Backend Architecture',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            },
            next: {
                id: 7,
                title: 'How Not to Be Hired by a Toxic Company',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            }
        }
    },
    'post-5': {
        data: {
            id: 5,
            title: 'How to Choose the Right Backend Architecture',
            preview: '<p>Hey there! Today, I want to chat about something that\'s been a big part of my coding life: backend architectural patterns. If you\'re like me, you\'ve probably found yourself lost in this maze more than once. So, let\'s break it down, shall we?</p>',
            is_draft: false,
            published_at: '2023-12-02 11:36:00',
            reading_time: 10,
            preview_image_type: PreviewTypes.left_side,
            preview_image_id: '682608d44d7eba5945ef02ac3b390ac58da25ce8',
            blocks: [
                {
                    key: '0194d1f5-4f85-75bc-bd46-9017bc7d3663',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Hey there! Today, I want to chat about something that\'s been a big part of my coding life: backend architectural patterns. If you\'re like me, you\'ve probably found yourself lost in this maze more than once. So, let\'s break it down, shall we?'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-949dab810bf0',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Overview Your Variants'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-99cea8ccc403',
                    type: 'image',
                    styles: [],
                    content: {
                        alt: 'DALL·E 2023-12-02 15.57.04 - A vibrant and colorful image representing various backend architectural patterns. The image should feature symbolic representations of monolithic arch',
                        src: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/banD0S7U2bSauhXgGTpLIA9ttBKAzKGgmYiy5Ad7.jpg',
                        caption: ''
                    }
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-9d88198855de',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'The Monolith'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-a0f642ac8760',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'When I first started coding, everything was about the \'monolithic\' approach. Think of it as a one-size-fits-all solution. In a monolith, all parts of the application &ndash; user interface, database operations, server-side logic &ndash; are bundled into a single platform. It\'s like having your entire wardrobe in one giant suitcase. Super convenient, right? Well, yes and no.'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-a735bfec1471',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'The good part? It\'s straightforward. You\'ve got everything in one place, making it easier to develop, deploy, and debug. But as my projects got bigger, this suitcase started bursting at the seams. Changing one thing meant risking something else. It\'s like pulling a thread on your sweater and ending up with a mess.'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-a82cd5e3427e',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Microservices'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-ae69f6d9d5ae',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Enter microservices &ndash; the game-changer. Imagine breaking that giant suitcase into several smaller, organized bags. Each microservice is like a mini-application, focusing on a specific function and communicating with others through APIs.'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-b2fcc3d68e06',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'This was a breath of fresh air! I could update parts of the app without affecting others. It felt like modular lego pieces that I could play around with. But, it wasn\'t all smooth sailing. Coordinating these services, especially in large systems, can be like herding cats. It requires careful planning and a solid understanding of how these services will interact.'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-b60a2798f5b7',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Event-Driven Architecture'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-b8e2f782edf1',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'As I delved deeper, I stumbled upon event-driven architecture (EDA). This is all about reacting to events. In simple terms, when something happens (an event), the system responds accordingly. It\'s like having a bunch of dominoes; tip one, and the rest follow in a specific order.</p>\n<p>This approach is fantastic for systems where real-time data processing and responsiveness are key. But beware, it can get complex. Managing and tracking the flow of events can be a headache, especially when debugging.'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-bc352bde8e07',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Serverless'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-c188b2650405',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Lately, I\'ve been exploring \'serverless\' architecture. Contrary to the name, there are still servers involved, but it\'s all about offloading the server management to cloud providers. It\'s like having a self-driving car; you just tell it where to go.'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-c5d7b2f589b5',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Serverless is great for scalability and cost-efficiency, as you pay per use. However, it demands a different mindset, especially in terms of design and deployment.'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-cab663c67081',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'And more'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-ccfc404df096',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1f5-4ff2-713e-8e3e-9da11645ebce',
                            type: 'list-item',
                            styles: [],
                            content: 'Service-Oriented Architecture (SOA): SOA is a style where services are provided to the other components by application components, through a communication protocol over a network. It&rsquo;s essentially a collection of services that communicate with each other.'
                        },
                        {
                            key: '0194d1f5-4ff2-713e-8e3e-9da1169f0f67',
                            type: 'list-item',
                            styles: [],
                            content: 'Layered (N-Tier) Architecture: This pattern breaks down your application into layers, each having a specific responsibility and function. It&rsquo;s one of the most common architectures and is typically split into three layers: presentation, business logic, and data storage.'
                        },
                        {
                            key: '0194d1f5-4ff2-713e-8e3e-9da11712c11d',
                            type: 'list-item',
                            styles: [],
                            content: 'CQRS (Command Query Responsibility Segregation): This separates the models for reading and writing data. By separating these two, you can optimize the read model for querying and the write model for updating data.'
                        },
                        {
                            key: '0194d1f5-4ff2-713e-8e3e-9da117ed74ad',
                            type: 'list-item',
                            styles: [],
                            content: 'Domain-Driven Design (DDD): This is not a technology or methodology but a design approach where the structure and language of your code (class names, class methods, class variables) match the business domain.'
                        },
                        {
                            key: '0194d1f5-4ff2-713e-8e3e-9da118553a77',
                            type: 'list-item',
                            styles: [],
                            content: 'API-First Development: In this approach, the API is considered the first priority. The API is developed first, and the application that uses the API is developed afterward, which can be useful in systems that are primarily driven by numerous APIs.'
                        },
                        {
                            key: '0194d1f5-4ff2-713e-8e3e-9da118ab5f96',
                            type: 'list-item',
                            styles: [],
                            content: 'Hexagonal Architecture (Ports and Adapters): This pattern allows an application to equally be driven by users, programs, automated tests, or batch scripts, and to be developed and tested in isolation from its eventual run-time devices and databases.'
                        },
                        {
                            key: '0194d1f5-4ff2-713e-8e3e-9da1195b5067',
                            type: 'list-item',
                            styles: [],
                            content: 'Cloud-Native Architecture: This is more of a holistic approach than a specific pattern. It&rsquo;s designed to embrace rapid change, large scale, and resilience, enabled by cloud computing environments.'
                        }
                    ]
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-d21611a72923',
                    type: 'remark',
                    content: [
                        {
                            key: '0194d1f5-4ff3-7e37-a8db-ab93928b1931',
                            type: 'heading',
                            styles: {
                                type: 'primary'
                            },
                            content: 'My Two Cents'
                        },
                        {
                            key: '0194d1f5-4ff3-7e37-a8db-ab93933b3f2b',
                            type: 'paragraph',
                            styles: {
                                type: 'unstyled'
                            },
                            content: 'Navigating through these architectural patterns has been quite a journey. Each has its charms and challenges. The key takeaway? There\'s no one-size-fits-all. It\'s about finding what works best for your project\'s needs and your team\'s skills.'
                        },
                        {
                            key: '0194d1f5-4ff3-7e37-a8db-ab939366d94f',
                            type: 'paragraph',
                            styles: {
                                type: 'unstyled'
                            },
                            content: 'Also, keep learning and experimenting. The tech world is always evolving, and what\'s cutting-edge today might be outdated tomorrow. Stay curious, stay flexible, and enjoy the ride in this fascinating world of backend architecture!'
                        }
                    ]
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-d71bc67f1ee0',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Choosing the Right Backend Architecture: Tips from My Playbook'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-d86f0b08eea9',
                    type: 'image',
                    styles: [],
                    content: {
                        alt: 'DALL·E 2023-12-02 16.01.45 - A conceptual image of a man standing at a crossroads, surrounded by multiple paths leading in different directions, each path representing a different',
                        src: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/w3MiHHk5B2x1TNf4jYovuLbewIJBaDFUbhknQJlf.jpg',
                        caption: ''
                    }
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-ddd73d05f49b',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'After exploring various architectural patterns, you might wonder, "How do I choose the right one for my project?" Well, here\'s some advice from my own experiences, a sort of playbook, if you will.'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-e00c16a04030',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Understand Your Project Requirements'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-e58d51422e6e',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'First and foremost, know what you\'re building. Is it a small blog or a large-scale e-commerce site? Different projects have different needs. A monolith could be perfect for simpler applications, while microservices might be the way to go for complex, scalable systems.'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-ea4779c3f64a',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Consider Your Team\'s Expertise'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-ee481ae2df10',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'The architecture you choose should align with your team\'s skills. If you\'ve got a team skilled in dealing with microservices, then leveraging that expertise makes sense. But if your team is more comfortable with monolithic applications, starting with that might be a better choice.'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-f30aa8365c63',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Scalability and Maintenance'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-f68046c57147',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Think about the future. Will your app grow in terms of users or functionality? Microservices and serverless architectures offer better scalability, but they also demand more maintenance and oversight. Be realistic about your capacity to manage these aspects.'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-f8e17a174304',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Budget and Resources'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd46-fe82cea2c51c',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Budget is always a factor. Serverless can be cost-effective for certain projects, but if you\'re running a service with constant usage, a traditional server approach might be more economical. Also, consider the resources needed for setting up and maintaining your chosen architecture.'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd47-037fde4c1c0f',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Performance Needs'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd47-04eba4c177bc',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Some architectures handle load and performance better than others. If your application requires real-time data processing, consider event-driven or microservices architectures. For less demanding applications, a monolith could do just fine.'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd47-0957c81e1e33',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Experiment and Adapt'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd47-0feb0646a496',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Don\'t be afraid to experiment. Sometimes, you won\'t know what works best until you try it out. Start small, gather feedback, and be ready to adapt. Remember, architecture isn\'t set in stone. It can evolve as your project grows.'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd47-12c915b0ef0d',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Wrapping Up'
                },
                {
                    key: '0194d1f5-4f85-75bc-bd47-15a3bb7f7fd8',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Choosing the right backend architecture is a balancing act. Consider your project\'s needs, your team\'s skills, budget constraints, and future growth. Be flexible and open to change, because the tech world is always in motion. Most importantly, don\'t let the fear of making the \'wrong\' choice stop you. Every decision is a learning opportunity.'
                }
            ],
            tags: [
                {
                    id: 1,
                    name: 'Domain Driven Design',
                    slug: 'domain-driven-design'
                },
                {
                    id: 2,
                    name: 'Software Development',
                    slug: 'software-development'
                },
                {
                    id: 4,
                    name: 'Software Architecture',
                    slug: 'software-architecture'
                },
                {
                    id: 5,
                    name: 'Microservices',
                    slug: 'microservices'
                },
                {
                    id: 15,
                    name: 'Programming Best Practices',
                    slug: 'programming-best-practices'
                },
                {
                    id: 16,
                    name: 'Development Strategies',
                    slug: 'development-strategies'
                }
            ],
            previewImage: {
                hash: '682608d44d7eba5945ef02ac3b390ac58da25ce8',
                type: 'image/jpeg',
                path: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/CyILkJWkyLLSsZEnBHMlQWsseVrb5Fc3wCOXkgN4.jpg',
                extension: 'jpg',
                name: 'DALL·E 2023-12-02 15.57.37 - A visually engaging, bright and colorful image depicting a maze made of various iconic symbols representing different backend architectural patterns.',
                file_size: 276540
            }
        },
        meta: {
            similar: [
                {
                    id: 12,
                    title: 'Entering IT (Part 3): Navigating the Software Engineer Interview Process',
                    preview: '<p>The field of software engineering is as exciting as it is challenging, offering endless opportunities for creative problem-solving and innovation. As you embark on your journey into this dynamic industry, one critical hurdle stands between you and your dream job: the interview process. This article aims to demystify the software engineer interview, offering a comprehensive guide on what to expect, from HR screening to the final offer, ensuring you walk into your interview prepared and confident.</p>',
                    is_draft: null,
                    published_at: '2024-03-17 16:22:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                },
                {
                    id: 4,
                    title: 'Modern Backend in 2023',
                    preview: '<p>2023 is coming to an end, and it\'s the perfect time to chat about what modern backend development really is. In a nutshell, it\'s about building the powerhouse of apps and websites with the latest tech. We\'re talking about cool trends like microservices &ndash; tiny, independent units making your apps super flexible. There\'s also serverless computing, which is like having magic at your fingertips, handling all the server stuff so you don\'t have to. And APIs? They&rsquo;re like secret tunnels that let different apps communicate. Plus, we&rsquo;ve got the latest in Docker, Kubernetes, AI, and cloud-native development. It\'s not just about coding in Python, JavaScript, or Go, but also about the new frameworks that are changing the game. We&rsquo;ll also dive into how DevOps and CI/CD can make life as a coder way smoother, and why keeping your data safe is more important than ever. This article is a fun, friendly guide to all that and more. It\'s for anyone curious about backend tech in 2023, and I promise it&rsquo;s as exciting as it sounds!</p>',
                    is_draft: null,
                    published_at: '2023-11-25 12:40:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                },
                {
                    id: 2,
                    title: 'My Journey Beyond the Hype of Microservices',
                    preview: '<p><img class="block w-full h-auto rounded-md mx-auto my-3" src="https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/q3X286VnOkkaADEi6DiR1SXEjKOpWcUsObtZDlhw.jpg" alt="Wise Developer"></p>\n<p>As a software developer in the constantly evolving tech landscape, I once viewed microservices as the ultimate solution to all architectural problems. However, my journey through various projects has taught me that this isn\'t always the case. I\'ve learned the hard way that microservices aren\'t the one-size-fits-all solution they\'re often touted to be.</p>',
                    is_draft: null,
                    published_at: '2023-11-11 13:00:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                }
            ],
            previous: {
                id: 4,
                title: 'Modern Backend in 2023',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            },
            next: {
                id: 6,
                title: 'The Dark Side of IT',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            }
        }
    },
    'post-4': {
        data: {
            id: 4,
            title: 'Modern Backend in 2023',
            preview: '<p>2023 is coming to an end, and it\'s the perfect time to chat about what modern backend development really is. In a nutshell, it\'s about building the powerhouse of apps and websites with the latest tech. We\'re talking about cool trends like microservices &ndash; tiny, independent units making your apps super flexible. There\'s also serverless computing, which is like having magic at your fingertips, handling all the server stuff so you don\'t have to. And APIs? They&rsquo;re like secret tunnels that let different apps communicate. Plus, we&rsquo;ve got the latest in Docker, Kubernetes, AI, and cloud-native development. It\'s not just about coding in Python, JavaScript, or Go, but also about the new frameworks that are changing the game. We&rsquo;ll also dive into how DevOps and CI/CD can make life as a coder way smoother, and why keeping your data safe is more important than ever. This article is a fun, friendly guide to all that and more. It\'s for anyone curious about backend tech in 2023, and I promise it&rsquo;s as exciting as it sounds!</p>',
            is_draft: false,
            published_at: '2023-11-25 12:40:00',
            reading_time: 7,
            preview_image_type: PreviewTypes.fill,
            preview_image_id: 'bbeaee8745fad2a6178e2732262908edf7b579f0',
            blocks: [
                {
                    key: '0194d1f6-e8e0-70ff-9998-9e43632b70da',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Introduction'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-a341931ca3a3',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: '2023 is coming to an end, and it\'s the perfect time to chat about what modern backend development really is. In a nutshell, it\'s about building the powerhouse of apps and websites with the latest tech. We\'re talking about cool trends like microservices &ndash; tiny, independent units making your apps super flexible. There\'s also serverless computing, which is like having magic at your fingertips, handling all the server stuff so you don\'t have to. And APIs? They&rsquo;re like secret tunnels that let different apps communicate. Plus, we&rsquo;ve got the latest in Docker, Kubernetes, AI, and cloud-native development. It\'s not just about coding in Python, JavaScript, or Go, but also about the new frameworks that are changing the game. We&rsquo;ll also dive into how DevOps and CI/CD can make life as a coder way smoother, and why keeping your data safe is more important than ever. This article is a fun, friendly guide to all that and more. It\'s for anyone curious about backend tech in 2023, and I promise it&rsquo;s as exciting as it sounds!'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-a62de0c261ae',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'If you\'re curious about what\'s happening in the world of backend development in 2023, you\'ve come to the right place. Whether you\'re a seasoned developer or just dipping your toes into the backend pool, this article aims to shed some light on the latest trends and technologies shaping the backend scene in 2023. And don\'t worry, I\'ll keep the tech jargon to a minimum &ndash; promise!'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-abf9037b3dcb',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'The Rise of Serverless and FaaS'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-ac73d5bea5dc',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'First up, let\'s talk about serverless computing and Function as a Service (FaaS). These are not just buzzwords; they\'re revolutionizing how we build and deploy applications. Imagine not having to worry about managing servers &ndash; sounds great, right? With serverless, you can focus more on coding and less on infrastructure. AWS Lambda and Google Cloud Functions are some cool examples to check out.'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-b2d379631233',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Containerization and Kubernetes'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-b72e95a2e6ec',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Containers, led by Docker, have been a game-changer, and Kubernetes has become the go-to for orchestrating these containers. It\'s like having a personal assistant to manage and scale your application seamlessly. If you haven\'t explored Kubernetes yet, 2023 might be the year to start.'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-b89dccd8d3e2',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Microservices Architecture'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-bf2211bbe6c8',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Gone are the days of bulky, monolithic applications. Microservices are in, allowing for modular and more manageable codebases. This approach lets teams update parts of an app without overhauling everything. It\'s like fixing a bike\'s flat tire without having to rebuild the whole bike.'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-c22559d8eadc',
                    type: 'image',
                    styles: [],
                    content: {
                        alt: 'DALL·E 2023-11-25 16.54.11 - A digital illustration demonstrating the concept of an Application Programming Interface (API) in a simplified and visually appealing manner. The imag',
                        src: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/yS8qvzCnJh7do3eq5LFTeVbQ4FxRsvz0bDGhUgZr.jpg',
                        caption: ''
                    }
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-c743f1d3d417',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'API-First Development'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-c8e2cef7c80d',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'APIs are the backbone of modern web applications. An API-first approach ensures that your application is flexible and ready for integration with other services or platforms. Think of it as building a universal remote control for your app &ndash; it can interact with just about anything.'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-ce44ab7fd03e',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'DevOps and Continuous Integration/Continuous Deployment (CI/CD)'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-d02acb2c610c',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'DevOps isn\'t new, but it\'s more important than ever. It bridges the gap between development and operations, leading to faster and more reliable software releases. Tools like Jenkins, GitLab CI, and GitHub Actions help automate the software deployment process, making life easier for developers.'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-d66f6251b9d3',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'The Power of Cloud-Native Technologies'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-db0044456f27',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Embracing cloud-native technologies means building and running applications that fully exploit the advantages of the cloud computing model. This approach is all about speed, scalability, and resilience. Think of cloud-native as building a house designed specifically for the location it\'s in, rather than a one-size-fits-all approach.'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-de0e1ffe1d7c',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Security as a Priority'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-e0dc6c14db4f',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'With great power comes great responsibility. As backend technologies evolve, so do the security threats. In 2023, it&rsquo;s crucial to prioritize security in every aspect of backend development. This means regular security audits, staying updated with patches, and adopting practices like DevSecOps.'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-e66cf8458962',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Conclusion'
                },
                {
                    key: '0194d1f6-e8e0-70ff-9998-eaf0d80575d0',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'The backend world in 2023 is vibrant and evolving rapidly. Staying updated with these trends and technologies is key to building robust, efficient, and scalable applications. Remember, the best approach is the one that aligns with your project\'s needs and your team\'s expertise. Happy coding!'
                }
            ],
            tags: [
                {
                    id: 2,
                    name: 'Software Development',
                    slug: 'software-development'
                },
                {
                    id: 4,
                    name: 'Software Architecture',
                    slug: 'software-architecture'
                },
                {
                    id: 8,
                    name: 'PHP',
                    slug: 'php'
                },
                {
                    id: 12,
                    name: 'Backend Future',
                    slug: 'backend-future'
                },
                {
                    id: 13,
                    name: 'Tech Innovation Insight',
                    slug: 'tech-innovation-insight'
                },
                {
                    id: 14,
                    name: 'Modern Dev Trends',
                    slug: 'modern-dev-trends'
                }
            ],
            previewImage: {
                hash: 'bbeaee8745fad2a6178e2732262908edf7b579f0',
                type: 'image/jpeg',
                path: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/T78JR7d0MITYE2fxI7Uig1tbig8aKbwaS5vETTch.jpg',
                extension: 'jpg',
                name: 'DALL·E 2023-11-25 16.37.07 - An engaging and colorful digital illustration for an article about modern backend technologies in 2023. The image should visually represent key themes',
                file_size: 466800
            }
        },
        meta: {
            similar: [
                {
                    id: 12,
                    title: 'Entering IT (Part 3): Navigating the Software Engineer Interview Process',
                    preview: '<p>The field of software engineering is as exciting as it is challenging, offering endless opportunities for creative problem-solving and innovation. As you embark on your journey into this dynamic industry, one critical hurdle stands between you and your dream job: the interview process. This article aims to demystify the software engineer interview, offering a comprehensive guide on what to expect, from HR screening to the final offer, ensuring you walk into your interview prepared and confident.</p>',
                    is_draft: null,
                    published_at: '2024-03-17 16:22:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                },
                {
                    id: 5,
                    title: 'How to Choose the Right Backend Architecture',
                    preview: '<p>Hey there! Today, I want to chat about something that\'s been a big part of my coding life: backend architectural patterns. If you\'re like me, you\'ve probably found yourself lost in this maze more than once. So, let\'s break it down, shall we?</p>',
                    is_draft: null,
                    published_at: '2023-12-02 11:36:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                },
                {
                    id: 3,
                    title: 'You Will Never Be Fully Secured with PHP',
                    preview: '<p>In the evolving world of software development, security remains a paramount concern, especially when dealing with financial data. A reflection on past experiences reveals insightful lessons, particularly regarding the use of PHP in web development. While PHP offers ease of use and quick development turnaround, it inherently possesses certain security vulnerabilities that are crucial for developers to understand. This article delves into these challenges, underscoring the importance of vigilance in the realm of web security.</p>',
                    is_draft: null,
                    published_at: '2023-11-19 10:00:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                }
            ],
            previous: {
                id: 3,
                title: 'You Will Never Be Fully Secured with PHP',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            },
            next: {
                id: 5,
                title: 'How to Choose the Right Backend Architecture',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            }
        }
    },
    'post-3': {
        data: {
            id: 3,
            title: 'You Will Never Be Fully Secured with PHP',
            preview: '<p>In the evolving world of software development, security remains a paramount concern, especially when dealing with financial data. A reflection on past experiences reveals insightful lessons, particularly regarding the use of PHP in web development. While PHP offers ease of use and quick development turnaround, it inherently possesses certain security vulnerabilities that are crucial for developers to understand. This article delves into these challenges, underscoring the importance of vigilance in the realm of web security.</p>',
            is_draft: false,
            published_at: '2023-11-19 10:00:00',
            reading_time: 5,
            preview_image_type: PreviewTypes.left_side,
            preview_image_id: '5292f52f2c920382d7bc19fc00f30b795895a633',
            blocks: [
                {
                    key: '0194d1f7-b868-73af-8cb6-6d66b82adbdf',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'In the evolving world of software development, security remains a paramount concern, especially when dealing with financial data. A reflection on past experiences reveals insightful lessons, particularly regarding the use of PHP in web development. While PHP offers ease of use and quick development turnaround, it inherently possesses certain security vulnerabilities that are crucial for developers to understand. This article delves into these challenges, underscoring the importance of vigilance in the realm of web security.'
                },
                {
                    key: '0194d1f7-b868-73af-8cb6-717ec730a839',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Years ago, while working on a project that dealt with users\' financial data, a part of the service was implemented in PHP for the sake of development speed. It was during this period that the realization dawned upon me: PHP applications are perpetually in a state of illusory security. This observation extends beyond PHP to all non-compiled languages.'
                },
                {
                    key: '0194d1f7-b868-73af-8cb6-77bfff927d5a',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'The Misconception of External Attacks Only'
                },
                {
                    key: '0194d1f7-b868-73af-8cb6-790fed2162dd',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Many discussions around web application security focus on external attacks like XSS, CSRF, or SQL Injection. While it\'s true that modern frameworks offer basic protection against these threats, the real danger often lies elsewhere.'
                },
                {
                    key: '0194d1f7-b868-73af-8cb6-7efb8e2dd656',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'The Internal Enemy'
                },
                {
                    key: '0194d1f7-b868-73af-8cb6-814cb3216342',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'The inherent vulnerabilities of PHP, primarily due to its status as an interpreted language, pose significant risks for code security. This nature facilitates the modification and execution of malicious code more easily than in compiled languages. Furthermore, managing the balance of read, write, and execute permissions in PHP applications is a complex task, often leading to compromises in functionality. Unlike compiled languages, PHP doesn\'t inherently support running in minimalistic containers like scratch. Consequently, PHP applications are typically deployed in larger, albeit more secure, containers such as Alpine. However, even with these measures, if a breach occurs, the PHP code is exposed to potential tampering and execution of malicious activities.'
                },
                {
                    key: '0194d1f7-b868-73af-8cb6-855db7e08cf6',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Dependencies add another layer of risk. Even with robust internal security practices, vulnerabilities can infiltrate through external libraries or tools that the application relies on. Two prominent examples illustrate this risk'
                },
                {
                    key: '0194d1f7-b868-73af-8cb6-8bf9595bb4f7',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1f7-b8ba-7da3-ae23-2d2b64775b0f',
                            type: 'list-item',
                            styles: [],
                            content: 'The Docker Escape Vulnerability: This involved a flaw in Docker (CVE-2019-5736) that allowed attackers to escalate their privileges to the host level from within a container. PHP applications, if running in such compromised containers, were vulnerable to this exploit.'
                        },
                        {
                            key: '0194d1f7-b8ba-7da3-ae23-2d2b64b38a0f',
                            type: 'list-item',
                            styles: [],
                            content: 'The Ghost Vulnerability: This was a critical issue in the GNU C Library (CVE-2015-0235), impacting many Linux distributions used in server environments. PHP applications running on affected systems were potentially exposed to remote code execution attacks.'
                        }
                    ]
                },
                {
                    key: '0194d1f7-b868-73af-8cb6-8c8434f33009',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'These examples underscore the multifaceted nature of security challenges in PHP environments. They highlight the necessity for vigilant security practices, not only within the PHP code itself but also in the broader ecosystem of tools and dependencies the application relies on.'
                },
                {
                    key: '0194d1f7-b868-73af-8cb6-90e523ca710f',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'The Hidden Dangers in Dependencies'
                },
                {
                    key: '0194d1f7-b868-73af-8cb6-958cfd14115d',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Continuing on the theme of dependencies, there are less obvious yet equally alarming risks. Consider two scenarios that may seem like something out of a paranoia-inducing thriller:'
                },
                {
                    key: '0194d1f7-b868-73af-8cb6-9b5706011011',
                    type: 'list',
                    styles: {
                        type: 'unordered'
                    },
                    content: [
                        {
                            key: '0194d1f7-b8ba-7da3-ae23-2d2b67884a90',
                            type: 'list-item',
                            styles: [],
                            content: 'Instances where a contributor to an open-source project, over several years, gradually introduces obfuscated malicious code or a backdoor.'
                        },
                        {
                            key: '0194d1f7-b8ba-7da3-ae23-2d2b67eee43f',
                            type: 'list-item',
                            styles: [],
                            content: 'Discovering a useful library, reviewing its code on GitHub, and finding nothing suspicious, only to experience a sneaky swap during installation, replacing the original code with an obfuscated version containing a backdoor.'
                        }
                    ]
                },
                {
                    key: '0194d1f7-b868-73af-8cb6-9de473412b66',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'A Call for Vigilance and Continuous Learning'
                },
                {
                    key: '0194d1f7-b868-73af-8cb6-a2b2048de2f6',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'In conclusion, while PHP and similar languages offer flexibility and rapid development, they come with inherent security challenges. It\'s crucial for developers to remain vigilant, continuously educate themselves about potential vulnerabilities, and employ best practices to mitigate risks. The journey towards secure web development is ongoing, and awareness is the first step.'
                }
            ],
            tags: [
                {
                    id: 6,
                    name: 'Docker Security Risks',
                    slug: 'docker-security-risks'
                },
                {
                    id: 7,
                    name: 'Security',
                    slug: 'security'
                },
                {
                    id: 8,
                    name: 'PHP',
                    slug: 'php'
                },
                {
                    id: 9,
                    name: 'PHP Application Vulnerabilities',
                    slug: 'php-application-vulnerabilities'
                },
                {
                    id: 10,
                    name: 'Vulnerabilities',
                    slug: 'vulnerabilities'
                },
                {
                    id: 11,
                    name: 'Cybersecurity',
                    slug: 'cybersecurity'
                }
            ],
            previewImage: {
                hash: '5292f52f2c920382d7bc19fc00f30b795895a633',
                type: 'image/jpeg',
                path: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/L4rtitb9GZgrjhGrthMIl1PUAxEloc1503tcVnYm.jpg',
                extension: 'jpg',
                name: 'DALL·E 2023-11-17 21.17.48 - A conceptual image for an article about security vulnerabilities in Docker containers running PHP applications. The scene shows a large, semi-transpar',
                file_size: 429453
            }
        },
        meta: {
            similar: [
                {
                    id: 9,
                    title: 'Entering IT (Part 1): IT Trends 2024',
                    preview: '<p>2024 has just begun, and it\'s a great time for new beginnings! I\'m excited to kick off a series of articles about starting a career in Information Technology (IT). We\'ll begin with the basics, focusing on the latest trends in IT. In this article, I aim to simplify and explain the top IT trends of the year, making them easy to understand. Let\'s dive into the exciting world of IT together!</p>',
                    is_draft: null,
                    published_at: '2024-01-09 19:00:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                },
                {
                    id: 4,
                    title: 'Modern Backend in 2023',
                    preview: '<p>2023 is coming to an end, and it\'s the perfect time to chat about what modern backend development really is. In a nutshell, it\'s about building the powerhouse of apps and websites with the latest tech. We\'re talking about cool trends like microservices &ndash; tiny, independent units making your apps super flexible. There\'s also serverless computing, which is like having magic at your fingertips, handling all the server stuff so you don\'t have to. And APIs? They&rsquo;re like secret tunnels that let different apps communicate. Plus, we&rsquo;ve got the latest in Docker, Kubernetes, AI, and cloud-native development. It\'s not just about coding in Python, JavaScript, or Go, but also about the new frameworks that are changing the game. We&rsquo;ll also dive into how DevOps and CI/CD can make life as a coder way smoother, and why keeping your data safe is more important than ever. This article is a fun, friendly guide to all that and more. It\'s for anyone curious about backend tech in 2023, and I promise it&rsquo;s as exciting as it sounds!</p>',
                    is_draft: null,
                    published_at: '2023-11-25 12:40:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                }
            ],
            previous: {
                id: 2,
                title: 'My Journey Beyond the Hype of Microservices',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            },
            next: {
                id: 4,
                title: 'Modern Backend in 2023',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            }
        }
    },
    'post-2': {
        data: {
            id: 2,
            title: 'My Journey Beyond the Hype of Microservices',
            preview: '<p><img class="block w-full h-auto rounded-md mx-auto my-3" src="https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/q3X286VnOkkaADEi6DiR1SXEjKOpWcUsObtZDlhw.jpg" alt="Wise Developer"></p>\n<p>As a software developer in the constantly evolving tech landscape, I once viewed microservices as the ultimate solution to all architectural problems. However, my journey through various projects has taught me that this isn\'t always the case. I\'ve learned the hard way that microservices aren\'t the one-size-fits-all solution they\'re often touted to be.</p>',
            is_draft: false,
            published_at: '2023-11-11 13:00:00',
            reading_time: 5,
            preview_image_type: null,
            preview_image_id: null,
            blocks: [
                {
                    key: '0194d1f8-56ea-7346-a636-a354b69f9902',
                    type: 'image',
                    styles: [],
                    content: {
                        alt: 'Wise Developer',
                        src: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/q3X286VnOkkaADEi6DiR1SXEjKOpWcUsObtZDlhw.jpg',
                        caption: ''
                    }
                },
                {
                    key: '0194d1f8-d8db-7067-855b-08baf77a6515',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'As a software developer in the constantly evolving tech landscape, I once viewed microservices as the ultimate solution to all architectural problems. However, my journey through various projects has taught me that this isn\'t always the case. I\'ve learned the hard way that microservices aren\'t the one-size-fits-all solution they\'re often touted to be.'
                },
                {
                    key: '0194d1f8-56ea-7346-a636-ab48dfe0cf2c',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Falling for the Microservices Hype'
                },
                {
                    key: '0194d1f8-56ea-7346-a636-acb590297ffe',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'My initial encounter with microservices was filled with enthusiasm. The idea of breaking down a complex application into smaller, independently deployable services seemed revolutionary. Inspired by the success stories of tech giants, I was convinced that microservices were the key to scalability, flexibility, and efficiency.'
                },
                {
                    key: '0194d1f8-56ea-7346-a636-b270178a9523',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Facing the Realities'
                },
                {
                    key: '0194d1f8-56ea-7346-a636-b578d53d94e9',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'However, reality hit when I actually implemented them. The complexity of managing multiple services soon became apparent. Issues like inter-service communication, data consistency, and the need for a robust infrastructure were more challenging than I had anticipated. I underestimated the costs and overestimated the ease of deployment, leading to extended timelines and strained resources.'
                },
                {
                    key: '0194d1f8-56ea-7346-a636-b83e9a262dcb',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'A Misguided One-Size-Fits-All Approach'
                },
                {
                    key: '0194d1f8-56ea-7346-a636-bff2378151c0',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'In retrospect, I realize that the industry\'s, and my own, infatuation with microservices led to a somewhat blind adoption. In some projects, a simpler monolithic architecture or a hybrid model would have been more appropriate. This misalignment between the chosen architecture and the project needs often resulted in reduced efficiency and productivity.'
                },
                {
                    key: '0194d1f8-56ea-7346-a636-c1c5ad01be0d',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Embracing Balance and Adaptability'
                },
                {
                    key: '0194d1f8-56ea-7346-a636-c4642c78cfd0',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'My experiences have taught me that the essence of effective software architecture is not in following trends but in finding balance. It\'s crucial to assess the specific needs of a project and choose an architecture that aligns with those needs. Sometimes, the simplicity of a monolith is exactly what a project requires.'
                },
                {
                    key: '0194d1f8-56ea-7346-a636-cb1e96eddac5',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'The Best Advice: Start with a Strong Monolith'
                },
                {
                    key: '0194d1f8-56ea-7346-a636-cc78a8f7ef31',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'The best advice I can offer is to never start with microservices; begin by creating and improving your monolith. As a wise colleague once said, "Before doing bad microservices, you need a good monolith." Despite my initial enthusiasm for microservices, this is where Domain-Driven Design (DDD) comes into play. By defining and splitting domains, you can identify specific areas where microservices can genuinely benefit your application.'
                },
                {
                    key: '0194d1f8-56ea-7346-a636-d312f511919e',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Understanding Distributed Systems and Failures'
                },
                {
                    key: '0194d1f8-56ea-7346-a636-d56f468899ec',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'In a distributed system, expect failures. Robust error handling and monitoring are obvious necessities, but there&rsquo;s more to it. By deliberately putting your system in a state of failure, you can assess whether you have a true microservices architecture or a distributed monolith. If the failure of one service blocks others from working, it\'s a clear sign that you don&rsquo;t have a microservice architecture but a distributed monolith.'
                },
                {
                    key: '0194d1f8-56ea-7346-a636-d8e8117bdbb5',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Conclusion'
                },
                {
                    key: '0194d1f8-56ea-7346-a636-dc4d2082f46e',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'My journey with microservices has been a path of learning and realignment. Microservices, while powerful, are not a universal solution. As I move forward in my career, my focus is on choosing the right tool for each job, rather than chasing the allure of a single architectural style. This balanced approach, which includes starting with a strong monolithic base and understanding the intricacies of distributed systems, has led me to more successful, sustainable, and effective software development.'
                }
            ],
            tags: [
                {
                    id: 2,
                    name: 'Software Development',
                    slug: 'software-development'
                },
                {
                    id: 4,
                    name: 'Software Architecture',
                    slug: 'software-architecture'
                },
                {
                    id: 5,
                    name: 'Microservices',
                    slug: 'microservices'
                }
            ],
            previewImage: null
        },
        meta: {
            similar: [
                {
                    id: 12,
                    title: 'Entering IT (Part 3): Navigating the Software Engineer Interview Process',
                    preview: '<p>The field of software engineering is as exciting as it is challenging, offering endless opportunities for creative problem-solving and innovation. As you embark on your journey into this dynamic industry, one critical hurdle stands between you and your dream job: the interview process. This article aims to demystify the software engineer interview, offering a comprehensive guide on what to expect, from HR screening to the final offer, ensuring you walk into your interview prepared and confident.</p>',
                    is_draft: null,
                    published_at: '2024-03-17 16:22:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                },
                {
                    id: 5,
                    title: 'How to Choose the Right Backend Architecture',
                    preview: '<p>Hey there! Today, I want to chat about something that\'s been a big part of my coding life: backend architectural patterns. If you\'re like me, you\'ve probably found yourself lost in this maze more than once. So, let\'s break it down, shall we?</p>',
                    is_draft: null,
                    published_at: '2023-12-02 11:36:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                },
                {
                    id: 4,
                    title: 'Modern Backend in 2023',
                    preview: '<p>2023 is coming to an end, and it\'s the perfect time to chat about what modern backend development really is. In a nutshell, it\'s about building the powerhouse of apps and websites with the latest tech. We\'re talking about cool trends like microservices &ndash; tiny, independent units making your apps super flexible. There\'s also serverless computing, which is like having magic at your fingertips, handling all the server stuff so you don\'t have to. And APIs? They&rsquo;re like secret tunnels that let different apps communicate. Plus, we&rsquo;ve got the latest in Docker, Kubernetes, AI, and cloud-native development. It\'s not just about coding in Python, JavaScript, or Go, but also about the new frameworks that are changing the game. We&rsquo;ll also dive into how DevOps and CI/CD can make life as a coder way smoother, and why keeping your data safe is more important than ever. This article is a fun, friendly guide to all that and more. It\'s for anyone curious about backend tech in 2023, and I promise it&rsquo;s as exciting as it sounds!</p>',
                    is_draft: null,
                    published_at: '2023-11-25 12:40:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                }
            ],
            previous: {
                id: 1,
                title: 'Navigating Domain-Driven Design: A Prudent Approach to Software Development',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            },
            next: {
                id: 3,
                title: 'You Will Never Be Fully Secured with PHP',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            }
        }
    },
    'post-1': {
        data: {
            id: 1,
            title: 'Navigating Domain-Driven Design: A Prudent Approach to Software Development',
            preview: '<p>Not too long ago, I celebrated my 8-year journey in the field of Information Technology, and it has spurred me to contemplate sharing my valuable experiences in this domain.</p>\n<p>&nbsp;</p>\n<p>As a seasoned software developer, I have traversed the intricate landscape of Domain-Driven Design (DDD), an approach highly esteemed in the realm of software development. DDD is renowned for its ability to create robust domain models and establish a domain-specific language, ultimately bridging the communication gap between developers and domain experts. However, my experience has revealed that while DDD offers significant advantages, it may not be the panacea for every project. Join me as we explore the potential pitfalls of DDD that I have encountered and discern when it is prudent to employ this approach.</p>',
            is_draft: false,
            published_at: '2023-11-04 10:00:00',
            reading_time: 4,
            preview_image_type: PreviewTypes.left_side,
            preview_image_id: 'bb6bc9541e0422357f33a73e06a86e5b18d8c3b6',
            blocks: [
                {
                    key: '0194d1f9-af94-77fd-960a-8764bd512202',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Not too long ago, I celebrated my 8-year journey in the field of Information Technology, and it has spurred me to contemplate sharing my valuable experiences in this domain.'
                },
                {
                    key: '0194d1f9-af94-77fd-960a-89c4f6c9ed17',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'As a seasoned software developer, I have traversed the intricate landscape of Domain-Driven Design (DDD), an approach highly esteemed in the realm of software development. DDD is renowned for its ability to create robust domain models and establish a domain-specific language, ultimately bridging the communication gap between developers and domain experts. However, my experience has revealed that while DDD offers significant advantages, it may not be the panacea for every project. Join me as we explore the potential pitfalls of DDD that I have encountered and discern when it is prudent to employ this approach.'
                },
                {
                    key: '0194d1f9-af94-77fd-960a-8fe0d1375886',
                    type: 'image',
                    styles: [],
                    content: {
                        alt: 'upset developer',
                        src: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/Ud0PONSeR77wo8capSwVVOHF61NwBy6zMaEgOuV8.jpg',
                        caption: ''
                    }
                },
                {
                    key: '0194d1f9-af94-77fd-960a-91cb05b2559c',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Overcomplicating the Simple:'
                },
                {
                    key: '0194d1f9-af94-77fd-960a-944f4bfa80aa',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Imagine deploying cutting-edge drone technology for the humble task of delivering a handwritten note to your next-door neighbor. It might appear extravagant and unnecessary. In my extensive experience, I\'ve observed that for projects lacking inherent complexity, DDD can introduce an unwarranted level of intricacy. This can drain valuable resources and time from essential features, leading to inefficiencies.'
                },
                {
                    key: '0194d1f9-af94-77fd-960a-998d588e1fe2',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'DDD may not be necessary when developing a Content Management System (CMS) for blogging. However, for projects with substantial business logic, adopting a Domain-Driven approach from the outset is advisable.'
                },
                {
                    key: '0194d1f9-af94-77fd-960a-9cf4bfce8f2a',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'Misunderstanding the Concept:'
                },
                {
                    key: '0194d1f9-af94-77fd-960a-a378a9add288',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'Many developers, including myself when I first encountered it, perceive Domain-Driven Design as merely an architectural pattern. In reality, DDD extends far beyond the application\'s architecture. The foremost aspect to grasp about Domain-Driven Design is that it encompasses not only code but also all aspects of the development pipeline. DDD dictates rules not only for developers but also for the entire team, or even the company, regarding how to communicate, collaborate, and then proceed with development.'
                },
                {
                    key: '0194d1f9-af94-77fd-960a-a6fda9cb65c8',
                    type: 'heading',
                    styles: {
                        type: 'primary'
                    },
                    content: 'The Quagmire of Overthinking:'
                },
                {
                    key: '0194d1f9-af94-77fd-960a-abd0a3247bb5',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'In the pursuit of crafting the perfect domain model, developers (myself included, even to this day) often end up creating a complex, unwieldy structure. To illustrate, consider a scenario where you are designing a purchase process for an order. As you delve into the development, you may identify additional aspects that seem beneficial or necessary for the future. Consequently, you decide to implement these immediately, resulting in ripple effects on your database structure and other components of the application. This, in turn, necessitates numerous adjustments to data repositories, services, and business logic. Ultimately, you may find yourself dealing with unwieldy "God Objects" handling an excessive amount of logic due to overimplementation.'
                },
                {
                    key: '0194d1f9-af94-77fd-960a-afc893788e5f',
                    type: 'paragraph',
                    styles: {
                        type: 'unstyled'
                    },
                    content: 'In navigating the landscape of Domain-Driven Design, it is essential to weigh these considerations judiciously, considering the unique requirements of each project. DDD can be a potent tool when applied with discretion, enhancing the development process and improving communication between developers and domain experts. Ultimately, the success of DDD lies in its thoughtful application, tailored to the specific needs and complexities of the project at hand.'
                }
            ],
            tags: [
                {
                    id: 1,
                    name: 'Domain Driven Design',
                    slug: 'domain-driven-design'
                },
                {
                    id: 2,
                    name: 'Software Development',
                    slug: 'software-development'
                },
                {
                    id: 3,
                    name: 'DDD',
                    slug: 'ddd'
                }
            ],
            previewImage: {
                hash: 'bb6bc9541e0422357f33a73e06a86e5b18d8c3b6',
                type: 'image/jpeg',
                path: 'https://storage.ishabanov.com/ishabanov-0194a1e4-d4d2-73be-a773-809a8c58a186/media/Ud0PONSeR77wo8capSwVVOHF61NwBy6zMaEgOuV8.jpg',
                extension: 'jpg',
                name: 'upset developer',
                file_size: 780100
            }
        },
        meta: {
            similar: [
                {
                    id: 12,
                    title: 'Entering IT (Part 3): Navigating the Software Engineer Interview Process',
                    preview: '<p>The field of software engineering is as exciting as it is challenging, offering endless opportunities for creative problem-solving and innovation. As you embark on your journey into this dynamic industry, one critical hurdle stands between you and your dream job: the interview process. This article aims to demystify the software engineer interview, offering a comprehensive guide on what to expect, from HR screening to the final offer, ensuring you walk into your interview prepared and confident.</p>',
                    is_draft: null,
                    published_at: '2024-03-17 16:22:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                },
                {
                    id: 5,
                    title: 'How to Choose the Right Backend Architecture',
                    preview: '<p>Hey there! Today, I want to chat about something that\'s been a big part of my coding life: backend architectural patterns. If you\'re like me, you\'ve probably found yourself lost in this maze more than once. So, let\'s break it down, shall we?</p>',
                    is_draft: null,
                    published_at: '2023-12-02 11:36:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                },
                {
                    id: 4,
                    title: 'Modern Backend in 2023',
                    preview: '<p>2023 is coming to an end, and it\'s the perfect time to chat about what modern backend development really is. In a nutshell, it\'s about building the powerhouse of apps and websites with the latest tech. We\'re talking about cool trends like microservices &ndash; tiny, independent units making your apps super flexible. There\'s also serverless computing, which is like having magic at your fingertips, handling all the server stuff so you don\'t have to. And APIs? They&rsquo;re like secret tunnels that let different apps communicate. Plus, we&rsquo;ve got the latest in Docker, Kubernetes, AI, and cloud-native development. It\'s not just about coding in Python, JavaScript, or Go, but also about the new frameworks that are changing the game. We&rsquo;ll also dive into how DevOps and CI/CD can make life as a coder way smoother, and why keeping your data safe is more important than ever. This article is a fun, friendly guide to all that and more. It\'s for anyone curious about backend tech in 2023, and I promise it&rsquo;s as exciting as it sounds!</p>',
                    is_draft: null,
                    published_at: '2023-11-25 12:40:00',
                    reading_time: 1,
                    preview_image_type: null,
                    preview_image_id: null,
                    blocks: []
                }
            ],
            previous: null,
            next: {
                id: 2,
                title: 'My Journey Beyond the Hype of Microservices',
                preview: null,
                is_draft: null,
                published_at: null,
                reading_time: 0,
                preview_image_type: null,
                preview_image_id: null,
                blocks: []
            }
        }
    },
}