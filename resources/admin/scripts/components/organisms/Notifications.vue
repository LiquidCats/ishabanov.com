<script setup lang="ts">

import Notification from "../../components/atoms/Notification.vue";
//
import useNotificationState from "../../states/notfications";
import {hashCode} from "../../utils/hashCode";

const notificationsState = useNotificationState()

</script>

<template>
    <TransitionGroup tag="div"
                     name="fade"
                     class="fixed z-50 bottom-0 end-0 flex flex-col gap-1 px-3 overflow-hidden w-full md:w-1/2 lg:w-1/3">
        <Notification v-for="n in notificationsState.items"
                      :key="`n-${hashCode(n.message)}`"
                      @close="notificationsState.close(n)"
                      :message="n.message"
                      :type="n.type"/>
    </TransitionGroup>
</template>

<style scoped lang="scss">
/* 1. declare transition */
.fade-move,
.fade-enter-active,
.fade-leave-active {
    transition: all 0.3s ease-in-out;
}

/* 2. declare enter from and leave to state */
.fade-enter-from,
.fade-leave-to {
    opacity: 0;
    transform: translateX(100%);
}

</style>
