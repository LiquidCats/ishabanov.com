export type BlogPostMetadata = {
  legacyId: number;
  date: string;
  title: string;
  description: string;
  tags: readonly string[];
  image?: string;
  readingTime?: string;
};

export type BlogPost = BlogPostMetadata & {
  slug: string;
};

export type Experience = {
  date: string;
  title: string;
  site: string;
  image: string;
  highlights: readonly string[];
};
