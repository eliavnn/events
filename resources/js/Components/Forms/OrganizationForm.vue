<template>
    <div class="w-[1200px] aspect-video bg-white rounded-2xl overflow-hidden">
        <div ref="imageContainer" class="bg-center bg-cover w-full h-1/3 bg-gray-300 grid place-items-center relative">

            <div @click="emits('close-dialog')" class="h-8 aspect-square bg-white rounded-full absolute top-8 right-8 grid place-items-center shadow-md cursor-pointer">
                <i class="pi pi-times"></i>
            </div>

            <label for="main-image" class="h-14 aspect-square bg-white rounded-full absolute top-full right-8 -translate-y-1/2 grid place-items-center shadow-md cursor-pointer">
                <i class="pi pi-camera"></i>
                <input @input="handleUpload($event, 'main-image')" class="hidden" type="file" id="main-image">
            </label>

            <label ref="logoContainer" for="logo" class="h-32 aspect-square bg-center bg-contain bg-no-repeat bg-white rounded-full absolute top-full left-8 -translate-y-1/2 grid place-items-center shadow-md cursor-pointer">
                <span v-if="!logoUploaded" class="uppercase font-black text-xl">logo</span>
                <input @input="handleUpload($event, 'logo')" class="hidden" type="file" id="logo">
            </label>

            <i v-if="!imageUploaded"  class="pi pi-image text-8xl text-gray-500"></i>
        </div>

        <div class="p-12 pt-24">


            <Stepper value="1" class="w-3/4 mx-auto" >
                <StepPanels>
                    <StepPanel v-slot="{ activateCallback }" value="1">
                        <div class="flex flex-col h-48">

                            <FloatLabel class="mb-4">
                                <InputText v-model="form.name" id="org_name" aria-describedby="org_name-help" :fluid="true" class="max-w-[50%]" />
                                <label for="org_name">Organization Name</label>
                            </FloatLabel>


                            <label for="org_desc">Description</label>
                            <Textarea id="org-desc" v-model="form.description" rows="5" cols="30" />


                        </div>
                        <div class="flex pt-6 justify-end">
                            <Button label="Next" icon="pi pi-arrow-right" iconPos="right" @click="activateCallback('2')" />
                        </div>
                    </StepPanel>

                    <StepPanel v-slot="{ activateCallback }" value="2">
                        <div class="flex flex-col h-48">

                            <div class="flex gap-10 ">
                                <FloatLabel class="mb-8">
                                    <InputText v-model="form.contact_phone" id="org_contact_phone" aria-describedby="org_contact_phone-help" :fluid="true" class="!basis-1/2 !grow" />
                                    <label for="org_contact_phone">Contact Phone</label>
                                </FloatLabel>


                                <FloatLabel class="mb-8">
                                    <InputText v-model="form.contact_email" id="org_email" aria-describedby="org_email-help" :fluid="true" class="basis-0 grow" />
                                    <label for="org_email">Email</label>
                                </FloatLabel>
                            </div>

                            <FloatLabel class="mb-8">
                                    <InputText v-model="form.website" id="org_website" aria-describedby="org_website-help" :fluid="true" class="max-w-[50%]" />
                                    <label for="org_website">Website</label>
                            </FloatLabel>

                        </div>
                        <div class="flex pt-6 justify-between">
                            <Button label="Back" severity="secondary" icon="pi pi-arrow-left" @click="activateCallback('1')" />
                            <Button label="Next" icon="pi pi-arrow-right" iconPos="right" @click="activateCallback('3')" />
                        </div>
                    </StepPanel>

                    <StepPanel v-slot="{ activateCallback }" value="3">

                        <div class="flex flex-col h-48">

                            <FloatLabel class="mb-8">
                                <InputText v-model="form.address" id="org_address" aria-describedby="org_address-help" :fluid="true" class="max-w-[50%]" />
                                <label for="org_address">Address</label>
                            </FloatLabel>

                            <div class="flex gap-10 ">
                                <FloatLabel class="mb-8">
                                    <InputText v-model="form.city" id="org_city" aria-describedby="org_city-help" :fluid="true" class="!basis-1/2 !grow" />
                                    <label for="org_city">City</label>
                                </FloatLabel>

                                <FloatLabel class="mb-8">
                                    <InputText v-model="form.state" id="org_state" aria-describedby="org_state-help" :fluid="true" class="basis-0 grow" />
                                    <label for="org_state">State</label>
                                </FloatLabel>

                                <FloatLabel class="mb-8">
                                    <InputText v-model="form.postal_code" id="org_zip" aria-describedby="org_zip-help" :fluid="true" class="basis-0 grow" />
                                    <label for="org_zip">Zip</label>
                                </FloatLabel>

                            </div>
                        </div>

                        <div class="flex pt-6 justify-between">
                            <Button label="Back" severity="secondary" icon="pi pi-arrow-left" @click="activateCallback('2')" />
                            <Button label="Create" raised icon="pi pi-arrow-right" iconPos="right" @click="submitForm" />
                        </div>
                    </StepPanel>
                </StepPanels>
            </Stepper>

            <Message class="mt-10 w-3/4 mx-auto" icon="pi pi-exclamation-circle" v-if="props.errors" severity="error" :closable="false">
                <ul :class="Object.keys(props.errors).length > 1 ? 'list-disc' : ''">
                    <li v-for="(value, key) in props.errors" :key="key">{{ value }}</li>
                </ul>
            </Message>

        </div>

    </div>
</template>

<script setup>
import { ref, reactive } from "vue";
import Stepper from 'primevue/stepper';
import StepList from 'primevue/steplist';
import StepPanels from 'primevue/steppanels';
import StepItem from 'primevue/stepitem';
import Step from 'primevue/step';
import StepPanel from 'primevue/steppanel';
import Button from 'primevue/button';
import FloatLabel from 'primevue/floatlabel';
import InputText from 'primevue/inputtext';
import Textarea from 'primevue/textarea';
import InputMask from 'primevue/inputmask';
import Message from 'primevue/message';

import { useForm } from '@inertiajs/vue3'

const props = defineProps({
    errors: {
        type: Object,
        required: false
    }
})

const emits = defineEmits(['close-dialog', 'data-submit'])

let imageContainer = ref(null)
let logoContainer = ref(null)

let imageUploaded = ref(false)
let logoUploaded = ref(false)


const resolveContainer = (name, file) => {
    switch (name) {
        case 'main-image':
            imageUploaded.value = true
            form.main_image = file
            return imageContainer
        case 'logo':
            logoUploaded.value = true
            form.logo = file
            return logoContainer
        default:
            return null
    }
}

const handleUpload = (event, containerName) => {
    const file = event.target.files[0];
    const url = URL.createObjectURL(file);
    const container = resolveContainer(containerName, file);

    container.value.style.backgroundImage = `url(${url})`;
}

//FORM

const form = useForm({
    name: '',
    main_image: null,
    logo: null,
    description: '',
    website: '',
    contact_phone: '',
    contact_email: '',
    address: '',
    city: '',
    state: '',
    postal_code: '',
    country: '',
})

const submitForm = () => {

    emits('data-submit', form)

}

</script>

<style lang="scss" scoped>

</style>
