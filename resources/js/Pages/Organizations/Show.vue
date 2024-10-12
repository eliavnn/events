<template>
    <Head>
        <title>{{ organization.name }} | Organizations</title>
        <link rel="icon" type="image/svg+xml" :href="organization.logo_path" />
    </Head>
    <DefaultDashboardLayout>
        <div class="relative">
            <img class="w-full max-h-[400px] object-center object-cover rounded-t-md" :src="organization.main_image_path" alt="">
        </div>
    </DefaultDashboardLayout>
</template>

<script setup>
import DefaultDashboardLayout from '@/Layouts/DefaultDashboardLayout.vue';
import { Head } from '@inertiajs/vue3'
import Avatar from 'primevue/avatar';

const props = defineProps({
    organization: Object
})

</script>

<style lang="scss" scoped>


</style>
