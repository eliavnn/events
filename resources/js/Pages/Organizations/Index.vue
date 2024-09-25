<template>
    <DefaultDashboardLayout>
        <h2 class="text-3xl">Organizations</h2>
        <p class="mt-2 text-gray-700"> Create and manage your organizations. Every organization can create and publish events. </p>



    </DefaultDashboardLayout>
</template>

<script setup>
import DefaultDashboardLayout from '@/Layouts/DefaultDashboardLayout.vue';

const props = defineProps({
    organizations: Array
})

</script>

<style lang="scss" scoped>

</style>
