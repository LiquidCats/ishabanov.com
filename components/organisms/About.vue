<script setup lang="ts">
import { LucideLightbulb, ArrowRight } from "lucide-vue-next";
import Text from "@/components/atoms/typography/Text.vue";
import { Avatar, AvatarImage } from "@/components/ui/avatar";
import SectionHeading from "@/components/molecules/SectionHeading.vue";
import { socials } from "@/store/static";
// statcic file
import person from "@/assets/images/person.jpeg";
import { animate, stagger } from "motion-v";

const aboutCointainerRef = useTemplateRef("about-container");
const isInView = useInView(aboutCointainerRef, { amount: 0.3 });
const appearOptions = {
  opacity: [0, 1],
  y: [50, 0],
  scale: [0.9, 1],
};
const disappearOptions = {
  opacity: [1, 0],
  y: [0, 50],
  scale: [1, 0.9],
};

watch(isInView, (inView) => {
  if (!aboutCointainerRef.value) return;

  const elems = aboutCointainerRef.value.querySelectorAll(":scope > div");
  const options = inView ? appearOptions : disappearOptions;
  animate(elems, options, {
    delay: stagger(0.15),
    type: "spring",
    bounce: 0.2,
    duration: 0.7,
  });
});
</script>

<template>
  <section class="max-w-6xl space-y-3 mx-auto mb-10" id="about">
    <SectionHeading>About</SectionHeading>
    <div
      ref="about-container"
      class="grid lg:grid-cols-4 lg:grid-rows-1 md:grid-cols-1 md:grid-rows-2 gap-3"
    >
      <div
        class="lg:col-span-3 md:col-span-2 col-span-1 bg-zinc-800 flex flex-col-reverse md:flex-row gap-6 dark:bg-zinc-50 border border-indigo-100 rounded-2xl p-6 shadow-xl shadow-zinc-500/20"
      >
        <div class="space-y-3">
          <Text inverted as="div"
            >Senior backend engineer with deep experience in building robust
            systems using Go, PHP, and Docker. I specialize in blockchain
            infrastructure—working hands-on with Bitcoin and Ethereum nodes,
            mempool tracking, fee prediction models, and secure P2P
            integrations. Passionate about clean architecture, high performance,
            and exploring the intersection of backend and crypto
            technologies.</Text
          >
          <div class="flex flex-wrap items-stretch justify-stretch gap-3">
            <div
              v-for="item in socials"
              :class="[
                item.classes,
                'relative rounded-2xl duration-300 ease-in-out',
                'px-6 py-1.5',
                'ring-2 hover:ring-4 ring-zinc-50/30',
                'text-zinc-300 dark:text-zinc-700',
                'flex flex-row gap-1',
              ]"
            >
              <a
                :href="item.link"
                :target="item.external ? '_blank' : '_self'"
                class="absolute -inset-px"
              />
              <component :is="item.icon" class="size-5" />
              <span class="text-zinc-300">{{ item.text }}</span>
            </div>
          </div>
        </div>

        <div>
          <Avatar
            class="size-48 mx-auto bg-zinc-950 shadow-xl shadow-zinc-950/30"
          >
            <AvatarImage :src="person" />
          </Avatar>
        </div>
      </div>

      <div
        class="border border-zinc-800 rounded-full flex flex-col gap-3 justify-center items-center p-12 text-center"
      >
        <NuxtLink
          to="/blog"
          class="group flex flex-col gap-3 justify-center items-center"
        >
          <LucideLightbulb
            class="size-12 group-hover:stroke-yellow-500 group-hover:-translate-y-1 duration-300"
          />
          <Text as="span"
            >my thoughts and insights on IT in my person blog
            <ArrowRight class="inline group-hover:translate-x-0.5 duration-300"
          /></Text>
        </NuxtLink>
      </div>
    </div>
  </section>
</template>
