<template>
  <NuxtLayout>
    <NuxtPage />
  </NuxtLayout>
</template>

<script>
import dayjs from "dayjs"; // ES 2015
import relativeTime from 'dayjs/plugin/relativeTime'

dayjs.extend(relativeTime);

</script>
