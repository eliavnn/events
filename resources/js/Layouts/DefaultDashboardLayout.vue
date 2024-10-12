<template>
    <div
    :class="expanded ? 'grid-cols-[1fr,_6fr]' : 'grid-cols-[0fr,_0fr]' "
    class="min-h-screen bg-gray-100 grid transition-all duration-700 ease-in-out">
        <div class="h-full overflow-hidden">
            <div class="p-8">
                <h1 @click="expandSidebar" class="text-xl font-medium flex cursor-pointer">
                    <span class="font-bold text-sky-600 uppercase">e</span>
                    <span class="inline-block transition-all duration-300 origin-left" :class="expanded ? 'scale-x-100' : 'scale-x-0'">ventzz</span>
                </h1>

                <Menu
                :pt="{root: 'border-0 p-0 mt-10', submenuLabel: 'py-2 px-0 font-bold mt-4'}"
                :ptOptions="{mergeProps: true}"
                :model="menuItems"
                class="sticky top-10"

                />
            </div>

        </div>
        <div class="h-full overflow-hidden">
            <div class="p-4 h-full">
                <div class="rounded-lg bg-white dark:bg-zinc-900 p-4 h-full overflow-scroll border shadow-sm">
                    <slot />
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed, ref } from 'vue'
import { usePage } from '@inertiajs/vue3'
import Menu from 'primevue/menu';

const page = usePage();
const user = computed(() => page.props.auth.user);
const routes = computed(() => page.props.routes);

const menuItems = [
    {
        label: "General",
        items: [
            {
                label: "Dashboard",
                icon: "pi pi-home",
                url: routes.value.dashboard
            },
            {
                label: "Organizations",
                icon: "pi pi-building",
                url: routes.value.organizations
            },
            {
                label: "Events",
                icon: "pi pi-calendar",
                url: "/events"
            }
        ]
    },
    {
        label: "Account",
        items: [
            {
                label: "Billings",
                icon: "pi pi-money-bill",
                url: "/bills"
            }
        ]
    }
]

let expanded = ref(true);

const expandSidebar = () => {
    expanded.value = !expanded.value
}

</script>

<style lang="scss" scoped>

</style>
