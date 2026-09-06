<script lang="ts">
import type { BlogPostMetadata } from "@/types/content";

export const post = {
  legacyId: 10,
  date: "2024-01-21",
  title: "Entering IT (Part 2): Best Learning Resources",
  description:
    "Hey there! Are you ready to continue diving into the world of IT? Whether you’re just starting out or looking to polish your skills, I’ve got some resources lined up for you.",
  tags: ["tech-education", "learn-coding", "it-careers", "digital-skills", "career"],
  image: "/images/media/j0YQaFf7wCdEimbaV7sDq351Pxdir2GJjPxlbUy2.jpg",
} satisfies BlogPostMetadata;
</script>

<script setup lang="ts">
import BlogArticle from "@/components/organisms/BlogArticle.vue";

definePageMeta({ path: "/blog/entering-it-(part-2)-best-learning-resources" });
</script>

<template>
  <BlogArticle :post="post">
    <p>Hey there! Are you ready to continue diving into the world of IT? Whether you’re just starting out or looking to polish your skills, I’ve got some resources lined up for you.</p>
    <h2>Let’s Start with the Basics</h2>
    <ul>
      <li><strong>GCFGlobal:</strong> Free tutorials on computer skills, internet basics, and Microsoft Office.</li>
      <li><strong>Alison:</strong> Free courses on computer literacy and IT fundamentals.</li>
      <li><strong>YouTube:</strong> Channels like Traversy Media, Computerphile, and NetworkChuck offer clear, practical tutorials.</li>
      <li><strong>Books:</strong> O’Reilly Media, Packt Publishing, and Safari Books Online are treasure troves of IT and programming titles.</li>
    </ul>
    <h2>For the Future Coders</h2>
    <ul>
      <li><strong>Codecademy:</strong> Interactive lessons on Python, JavaScript, and more.</li>
      <li><strong>Coursera:</strong> University‑ and industry‑backed programming courses.</li>
      <li><strong>edX:</strong> Computer science classes from Harvard, MIT, and leading institutions.</li>
    </ul>
    <h2>Web Wizards, Right This Way</h2>
    <ul>
      <li><strong>FreeCodeCamp:</strong> A free, project‑based web development curriculum (HTML, CSS, JavaScript).</li>
      <li><strong>Udemy:</strong> A vast selection of web development courses at all levels.</li>
      <li><strong>The Odin Project:</strong> An open‑source full‑stack web development curriculum—completely free.</li>
    </ul>
    <h2>Cybersecurity Enthusiasts</h2>
    <ul>
      <li><strong>Cybrary:</strong> Both free and paid cybersecurity training.</li>
      <li><strong>SANS Cyber Aces Online:</strong> Free courseware covering security fundamentals.</li>
    </ul>
    <h2>Network Navigators</h2>
    <ul>
      <li><strong>Cisco Networking Academy:</strong> Official networking and cybersecurity courses from Cisco.</li>
      <li><strong>CompTIA:</strong> Certifications for network security and IT fundamentals.</li>
    </ul>
    <h2>Data Science &amp; Big Data Buffs</h2>
    <ul>
      <li><strong>Kaggle:</strong> Hands‑on data science and machine learning competitions and tutorials.</li>
      <li><strong>DataCamp:</strong> Interactive courses in R, Python, and SQL for data analysis.</li>
    </ul>
    <h2>IT Certification for Pros</h2>
    <ul>
      <li><strong>Microsoft Certifications:</strong> Credentials for various Microsoft technologies.</li>
      <li><strong>Cisco Certification:</strong> Industry‑recognized networking and security certificates.</li>
      <li><strong>AWS Training and Certification:</strong> Official Amazon Web Services training and exams.</li>
    </ul>
    <p>So, that’s my roundup of some of the best resources to kickstart or boost your IT journey. Remember, the world of IT is vast and constantly evolving, so keep exploring and stay curious. Happy learning!</p>
  </BlogArticle>
</template>
