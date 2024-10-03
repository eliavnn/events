<template>
    <Head title="Organizations" />
    <DefaultDashboardLayout>
        <h2 class="text-3xl">Organizations</h2>
        <p class="mt-2 text-gray-700"> Create and manage your organizations. Every organization can create and publish events. </p>

        <section class="mt-20 grid grid-cols-4 gap-8">
            <div v-for="organization in organizations" :key="organization.id"
                class="rounded-lg bg-white dark:bg-zinc-900 p-4 h-full aspect-[5/3] border-2 border-white  shadow-card hover:shadow-cardHover transition-all ease-in-out cursor-pointer">
            </div>

            <DashedAddButton @add-clicked="showOrgDialalog = true" />
        </section>

        <Dialog v-model:visible="showOrgDialalog" :pt:mask:class="'bg-black/40'" >
            <template #container >
                <OrganizationForm :errors="formErrors" @close-dialog="showOrgDialalog = false" @data-submit="handleFormSubmit" />
            </template>
        </Dialog>

    </DefaultDashboardLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import { ref, reactive } from "vue";
import { router } from '@inertiajs/vue3'
import DefaultDashboardLayout from '@/Layouts/DefaultDashboardLayout.vue';
import DashedAddButton from '@/Components/DashedAddButton.vue';
import OrganizationForm from '@/Components/Forms/OrganizationForm.vue';
import Dialog from 'primevue/dialog';



const props = defineProps({
    organizations: Array,
    storeUrl: String
})

let showOrgDialalog = ref(false)
let formErrors = ref(null)

const handleFormSubmit = (form) => {


    form.submit("post", props.storeUrl, {
        onSuccess: (page) => {
            showOrgDialalog.value = false
        },
        onError: (errors) => {
            formErrors.value = errors
            console.log(formErrors.value)
        }
    })

}

</script>

<style lang="scss" scoped>

</style>
