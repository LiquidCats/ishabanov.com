<script setup lang="ts">
import Text from "~/components/atoms/typography/Text.vue";
import LogoLink from "~/components/organisms/LogoLink.vue";
import FooterMenu from "~/components/molecules/FooterMenu.vue";
import { settings } from "~/states/static";

</script>

<template>
    <footer>
        <div class="my-6 flex justify-between pb-6">
            <div class="flex items-start gap-x-6">
                <FooterMenu :links="settings.menu">Menu</FooterMenu>
                <FooterMenu :links="settings.socials">Contacts</FooterMenu>
            </div>
            <div class="flex flex-col justify-between items-end gap-1">
                <LogoLink :size="8"/>
                <Text as="span" class="text-gray-500">&copy; Ilia Shabanov</Text>
            </div>
        </div>
    </footer>
</template>
