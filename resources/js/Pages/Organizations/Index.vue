<template>
    <Head title="Organizations" />
    <DefaultDashboardLayout>
        <h2 class="text-3xl">Organizations</h2>
        <p class="mt-2 text-gray-700"> Create and manage your organizations. Every organization can create and publish events. </p>

        <section class="mt-20 grid grid-cols-4 gap-8">
            <div v-for="organization in organizations" :key="organization.id"
                class="rounded-lg relative bg-white dark:bg-zinc-900 p-4 h-full aspect-[5/3] overflow-hidden  shadow-card hover:shadow-cardHover transition-all ease-in-out cursor-pointer bg-cover bg-center grid place-items-center"
                :class="organization.main_image_path ? 'border-white border-[3px]' : ''"
                :style="{ backgroundImage: `url(${organization.main_image_path})` }">

                <i v-if="!organization.main_image_path" class="pi pi-building text-[40px] text-gray-300 absolute "></i>

                <picture
                    class="absolute rounded-full grid place-items-center h-14 aspect-square bg-white bottom-2 left-2"
                    :class="!organization.logo_path ? 'border-gray-100 border-2' : ''"
                    >
                    <img v-if="organization.logo_path" :src="organization.logo_path" class="h-full w-full object-contain object-center" alt="logo">
                    <div v-else> {{ getOrgInitials(organization) }} </div>
                </picture>

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
import { ref, reactive, onMounted } from "vue";
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

const getOrgInitials = (org) => {
    let words = org.name.split(' ');
    words = words.filter(word => word.trim()).map(word => word[0].toUpperCase());

    if(words.length > 3) {
        return words.slice(0, 3).join('');
    }

    return words.join('');
}

onMounted(() => {
    console.log(props.organizations)
})

</script>

<style lang="scss" scoped>

</style>
