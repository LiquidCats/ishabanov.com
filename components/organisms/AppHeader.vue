<script setup lang="ts">
import { menu } from "@/store/static";
import { NuxtLink } from "#components";
import { motion, useScroll } from "motion-v";
import { ref } from "vue";

const navIsHidden = ref<boolean>(true);
const { scrollYProgress } = useScroll();

scrollYProgress.on("change", (v) => {
  if (v > 0.03) {
    navIsHidden.value = false;
  } else {
    navIsHidden.value = true;
  }
});
</script>

<template>
  <header>
    <AnimatePresence>
      <motion.nav
        v-if="!navIsHidden"
        :initial="{ opacity: 0, y: 100, scale: 0.3 }"
        :animate="{
          opacity: 1,
          y: 0,
          scale: 1,
          transition: {
            type: 'spring',
            bounce: 0.4,
            duration: 0.3,
          },
        }"
        :while-hover="{ scale: 1.05 }"
        :exit="{ opacity: 0, y: 100, scale: 0.3 }"
        aria-label="navigation"
        class="fixed bottom-3 z-50 w-full"
      >
        <ul
          role="menu"
          :class="[
            'rounded-4xl bg-zinc-50/50 backdrop-blur border border-zinc-800/10',
            'flex flex-row gap-0 justify-center items-center',
            'p-3 mx-auto w-fit',
            'z-1',
          ]"
        >
          <li v-for="item in menu" :key="item.text" role="none">
            <Button
              as-child
              variant="link"
              class="flex flex-col gap-0 -inset-x-px"
            >
              <NuxtLink
                :to="item.link"
                :target="item.external ? '_blank' : '_self'"
                role="menuitem"
                active-class="underline"
              >
                <component :is="item.icon" class="size-5" />
                {{ item.text }}
              </NuxtLink>
            </Button>
          </li>
        </ul>
      </motion.nav>
    </AnimatePresence>
  </header>
</template>
