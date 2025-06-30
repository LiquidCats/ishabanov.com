import {
  Linkedin,
  Github,
  House,
  AtSign,
  Newspaper,
  ArrowUpRightIcon,
  Send,
} from "lucide-vue-next";

type Link = {
  icon: any;
  link: string;
  text: string;
  external?: boolean;
  classes?: Array<string>;
};

export const socials: Array<Link> = [
  {
    icon: Linkedin,
    link: "https://www.linkedin.com/in/ilia-shabanov",
    text: "LinkedIn",
    classes: ["hover:bg-blue-500/30"],
    external: true,
  },
  {
    icon: Github,
    link: "https://github.com/LiquidCats",
    text: "GitHub",
    classes: ["hover:bg-zinc-500/30"],
    external: true,
  },
  {
    icon: Send,
    link: "https://t.me/DegradationOfMine",
    text: "Telegram",
    classes: ["hover:bg-blue-300/30"],
    external: true,
  },
  {
    icon: AtSign,
    link: "mailto:ishabanov@liquid-cat.com",
    text: "Mail",
    classes: ["hover:bg-orange-500/30"],
    external: false,
  },
];
export const menu: Array<Link> = [
  {
    icon: House,
    link: "/",
    text: "Home",
    external: false,
  },
  {
    icon: Newspaper,
    link: "/blog",
    text: "Blog",
    external: false,
  },
  {
    icon: ArrowUpRightIcon,
    link: "https://liquid-cats.com",
    text: "Projects",
    external: true,
  },
];
