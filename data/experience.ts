import type { Experience } from "@/types/content";

export const experiences = [
  {
    date: "2013-02",
    title: "Freelance",
    site: "https://ishabanov.com",
    image: "/images/experience/freelance.jpg",
    highlights: [
      "Developed plugins and themes for CMS platforms including MODx Evolution, Joomla, and WordPress.",
      "Created a Joomla-based property booking system enabling real-time apartment reservations.",
      "Built a custom MODx plugin for tarot-based fortune telling, gaining popularity among niche communities.",
      "Engineered back-end architecture and front-end UI for a remote education system, facilitating seamless online course delivery.",
    ],
  },
  {
    date: "2017-11",
    title: "Hemmersbach",
    site: "https://hemmersbach.com",
    image: "/images/experience/hemmersbach.jpg",
    highlights: [
      "Contributed to pioneering DDD implementation in PHP within the company.",
      "Developed a dynamic, rule-based permissions system enhancing platform flexibility and user control.",
      "Co-designed a UI filter engine that conditionally displayed data and components based on user roles and access rules.",
      "Formalized front-end best practices, significantly improving code consistency and development speed.",
    ],
  },
  {
    date: "2019-02",
    title: "PointPay",
    site: "https://pointpay.io",
    image: "/images/experience/pointpay.jpg",
    highlights: [
      "Designed and developed a full-featured cryptocurrency payment gateway used by B2B clients.",
      "Authored company-wide microservice architecture guidelines, improving development consistency and scalability.",
      "Built a robust internal infrastructure and integrated automated tests within CI/CD pipelines.",
      "Optimized build and deployment processes, reducing release times and minimizing production issues.",
    ],
  },
  {
    date: "2019-12",
    title: "iMusician",
    site: "https://imusician.pro",
    image: "/images/experience/imusician.jpg",
    highlights: [
      "Led the transition to a Domain-Driven Design (DDD) architecture, streamlining development and aligning codebase with business logic.",
      "Reduced delivery cycle time by optimizing CI/CD pipelines and automating regression tests.",
      "Championed Test-Driven Development (TDD) across the team, leading to a 40% reduction in post-deployment bugs.",
      "Built a music trend analytics engine that evolved into a new product offering, generating additional company revenue.",
    ],
  },
  {
    date: "2021-11",
    title: "Everli",
    site: "https://everli.com",
    image: "/images/experience/everli.jpg",
    highlights: [
      "Reduced CI/CD pipeline execution time by 35% through pipeline optimization and caching strategies, accelerating feature delivery.",
      "Pioneered the adoption of self-documented code principles, improving long-term code quality and reducing onboarding time for new developers.",
      "Designed and implemented a robust rolling update system, ensuring zero downtime deployments.",
      "Improved data storage efficiency and boosted search engine response time by refactoring data models and indexing strategies.",
    ],
  },
  {
    date: "2022-12",
    title: "CoinsPaid",
    site: "https://coinspaid.com",
    image: "/images/experience/coinspaid.jpg",
    highlights: [
      "Architected and deployed a clustered derivation mechanism for secure cryptocurrency address generation.",
      "Strengthened service security by integrating advanced authentication layers and secure communication protocols.",
      "Reengineered microservice architecture using Domain-Driven Design (DDD), improving modularity and maintainability.",
      "Delivered multiple critical internal microservices, enabling scalable back-end operations.",
      "Enhanced infrastructure performance and reduced system latency by optimizing Docker Swarm and Redis configurations.",
    ],
  },
] satisfies readonly Experience[];
