<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DefaultDashboardLayout from '@/Layouts/DefaultDashboardLayout.vue';
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const user = computed(() => usePage().props.auth.user)


</script>

<template>
    <DefaultDashboardLayout>
        <h2 class="text-3xl">Hi, {{ user.name }}</h2>
    </DefaultDashboardLayout>
</template>
