<script setup lang="ts">

import Notification from "../../components/atoms/Notification.vue";
//
import useNotificationState from "../../states/notfications";

const notificationsState = useNotificationState()

</script>

<template>
    <TransitionGroup tag="div"
                     name="fade"
                     class="notifications position-fixed z-3 bottom-0 end-0 d-flex flex-column px-3 overflow-hidden">
        <Notification v-for="n in notificationsState.items"
                      :key="n"
                      @close="notificationsState.close(n)"
                      :message="n.message"
                      :type="n.type"/>
    </TransitionGroup>
</template>

<style scoped lang="scss">
.notifications {
    width: 1000px;
    max-width: 35%;
    transition: all 0.3s ease-in-out;
}

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
