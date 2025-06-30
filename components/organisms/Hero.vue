<script setup lang="ts">
import { ref } from "vue";
import { useScroll, animate, stagger } from "motion-v";
import { splitText } from "motion-plus";
import { useTemplateRef, onMounted, onUnmounted } from "vue";
import Heading from "@/components/atoms/typography/Heading.vue";
import Scroller from "@/components/atoms/Scroller.vue";

// Template refs
const heroRef = useTemplateRef<HTMLElement>("hero");
const heroTextRef = useTemplateRef<HTMLElement>("hero-text");
const greetingRef = useTemplateRef<HTMLElement>("greeting");

const showScroll = ref<boolean>(true);

// Motion values
const { scrollY, scrollYProgress } = useScroll();

// Store cleanup function
let cleanup: (() => void) | null = null;

onMounted(() => {
  document.fonts.ready.then(() => {
    if (!greetingRef.value) return;

    const { chars } = splitText(greetingRef.value);

    // Animate the words in the h1
    animate(
      chars,
      { opacity: [0, 1], y: [10, 0] },
      {
        type: "spring",
        duration: 2,
        bounce: 0.5,
        delay: stagger(0.05),
      },
    );
  });

  scrollYProgress.on("change", (progress) => {
    showScroll.value = !(progress >= 0.01);
  });

  const textContainer = heroTextRef.value;
  const heroElement = heroRef.value;

  if (!textContainer || !heroElement) return;

  const textLines = textContainer.querySelectorAll<HTMLElement>("h1 > div");
  if (!textLines.length) return;

  // Initialize all lines as hidden except the first one
  textLines.forEach((line, index) => {
    if (index === 0) {
      // Show "Hi" immediately on mount
      line.style.opacity = "1";
      line.style.transform = "translateY(0px)";
    } else {
      // Hide other lines initially
      line.style.opacity = "0";
      line.style.transform = "translateY(30px)";
    }
  });

  // Make container visible
  textContainer.classList.remove("invisible");

  // Calculate animation parameters
  const heroHeight = heroElement.clientHeight;
  const totalAnimationDistance = heroHeight * 0.7; // Reduced for smoother animation
  const linesCount = textLines.length - 1; // Exclude first line since it's already visible
  const staggerDelay = 1 / (linesCount + 1); // Distribute remaining lines evenly

  // Set up scroll-based animation with improved easing
  const unsubscribe = scrollY.on("change", (scrollValue) => {
    const scrollProgress = Math.min(scrollValue / totalAnimationDistance, 1);

    textLines.forEach((line, index) => {
      if (index === 0) return; // Skip first line as it's always visible

      // Calculate when this line should start animating
      const lineStartProgress = (index - 1) * staggerDelay;
      const lineEndProgress = lineStartProgress + staggerDelay;

      // Calculate line-specific progress with improved easing
      const rawProgress = Math.max(
        0,
        Math.min(
          1,
          (scrollProgress - lineStartProgress) /
            (lineEndProgress - lineStartProgress),
        ),
      );

      // Apply easing function for smoother animation
      const easedProgress = easeOutCubic(rawProgress);

      // Apply transforms
      const opacity = easedProgress;
      const translateY = (1 - easedProgress) * 30;
      const scale = 0.95 + easedProgress * 0.05; // Subtle scale effect

      line.style.opacity = opacity.toString();
      line.style.transform = `translateY(${translateY}px) scale(${scale})`;
    });
  });

  cleanup = unsubscribe;
});

onUnmounted(() => {
  cleanup?.();
});

// Cubic easing function for smoother animations
function easeOutCubic(t: number): number {
  return 1 - Math.pow(1 - t, 3);
}
</script>

<template>
  <section
    ref="hero"
    id="hero"
    class="relative max-w-7xl mx-auto flex flex-col gap-3 min-h-screen md:rounded-4xl md:p-6 overflow-clip mb-10"
  >
    <AnimatePresence>
      <div ref="hero-text" class="sticky top-3 invisible">
        <Heading
          level="1"
          class="uppercase text-5xl md:text-8xl lg:text-9xl/24 font-black text-zinc-800"
        >
          <div ref="greeting">Hi...</div>
          <div>
            My name is
            <span
              class="bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent"
            >
              Ilya
            </span>
          </div>
          <div>I am Back-End</div>
          <div
            class="bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent"
          >
            Developer
          </div>
        </Heading>
      </div>
      <Scroller v-if="showScroll" />
    </AnimatePresence>
  </section>
</template>

<style scoped>
h1 > div {
  transition:
    opacity 0.4s cubic-bezier(0.4, 0, 0.2, 1),
    transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  transform-origin: center;
  will-change: opacity, transform;
  opacity: 0;
}

/* Optimize for performance */
section {
  contain: layout style paint;
}

.sticky {
  transform: translateZ(0); /* Force hardware acceleration */
}
</style>
