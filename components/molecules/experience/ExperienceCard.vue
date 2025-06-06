<script setup lang="ts">
import dayjs from "dayjs";
import {computed} from "vue";
import {ArrowUpRightIcon} from "lucide-vue-next"
//
import {TextSize, TextWeight} from "~/enums/text";
import type {ExperienceResource} from "~/types/api";
//
import Heading from "~/components/atoms/typography/Heading.vue";
import Text from "~/components/atoms/typography/Text.vue";
import List from "~/components/atoms/lists/List.vue";
import ListItem from "~/components/atoms/lists/ListItem.vue";
import AppLink from "~/components/atoms/AppLink.vue";

interface Props {
    experience: ExperienceResource
}
// Define
const props = defineProps<Props>()
// compute
const startedYear = computed(() => props.experience?.started_at ? dayjs(props.experience?.started_at).year() : dayjs().year())
const endedYear = computed(() => props.experience?.ended_at ? dayjs(props.experience?.ended_at).year() : 'now')
</script>

<template>
    <div class="group relative grid grid-cols-1 gap-3 md:grid-cols-8 lg:hover:!opacity-100 lg:group-hover/list:opacity-50 duration-300">
        <div class="absolute -inset-px z-0 hidden rounded-xl transition motion-reduce:transition-none lg:block lg:group-hover:bg-gray-100/[.1] lg:group-hover:shadow-[inset_0_1px_0_0_rgba(148,163,184,0.1)] lg:group-hover:drop-shadow-lg duration-300"></div>


        <div class="col-span-6 bg-night rounded-xl p-6 z-[3] block">
            <div class="mb-3">
                <Heading :level="3"
                         :size="TextSize.xl4"
                         :weight="TextWeight.bold"
                         class="leading-snug">
                    <AppLink :to="experience.company_url"
                             target="_blank"
                          class="inline-flex gap-1 items-baseline leading-tight hover:!text-blue-500 focus-visible:!text-blue-500 group/link">
                        <div class="absolute -inset-x-4 -inset-y-2.5 hidden rounded md:-inset-x-6 md:-inset-y-4 lg:block" />
                        <Text as="span">
                            {{ experience.position }} ·
                            <Text as="span" class="whitespace-nowrap">
                                {{ experience.company_name }}
                                <ArrowUpRightIcon class="inline-block size-8 shrink-0 transition-transform group-hover/link:-translate-y-1 group-hover/link:translate-x-1 group-focus-visible/link:-translate-y-1 group-focus-visible/link:translate-x-1 motion-reduce:transition-none ml-1 translate-y-px"/>
                            </Text>
                        </Text>

                    </AppLink>
                </Heading>
            </div>
            <Text :size="TextSize.sm" class="text-gray-400 mb-1">Stack:</Text>
            <div class="flex flex-wrap gap-1.5 mb-3">
                <Text as="span"
                      :size="TextSize.sm"
                      v-for="tool in experience.tools"
                      class="px-4 p-1 border rounded-md border-stone-200 bg-stone-300 text-stone-700">
                    {{ tool.name }}
                </Text>
            </div>
            <div>
                <Heading :level="3" :size="TextSize.sm" class="text-gray-400">Personal Achievements:</Heading>
                <List>
                    <ListItem v-for="item in experience.description"
                              :size="TextSize.md"
                              class="text-gray-50">
                        {{ item }}
                    </ListItem>
                </List>
            </div>
        </div>

        <header class="col-span-2 text-2xl font-black text-gray-100 md:p-6 hidden md:block uppercase"
                :aria-label="`${ startedYear } to ${ endedYear }`">
            <div>{{ startedYear }} - {{ endedYear }}</div>
        </header>
    </div>
</template>
