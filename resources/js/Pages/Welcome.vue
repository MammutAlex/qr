<script setup>
import {ref} from 'vue';
import {Head, Link, useForm} from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const form = useForm({
    first_name: '',
    last_name: '',
    phone: '',
    email: '',
    website: '',
    linkedin: '',
    facebook: '',
    telegram: ''
});

const generateQR = () => {
    form.post(route('qr.store'));
};
</script>

<template>
    <Head title="Bigness card QR generator"/>

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div v-if="canLogin&& false" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                  class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                Dashboard
            </Link>

            <template v-else>
                <Link :href="route('login')"
                      class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Log in
                </Link>

                <Link v-if="canRegister" :href="route('register')"
                      class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Register
                </Link>
            </template>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <FormSection @submitted="generateQR">
                <template #title>
                    Bigness card QR generator
                </template>

                <template #description>
                    Create and Share Custom QR Codes Easily!
                </template>

                <template #form>
                    <!-- Last Name -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="first_name" value="First Name"/>
                        <TextInput
                            id="first_name"
                            v-model="form.first_name"
                            type="text"
                            class="mt-1 block w-full"
                            autocomplete="name"
                        />
                        <InputError :message="form.errors.first_name" class="mt-2"/>
                    </div>
                    <!-- Last Name -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="first_name" value="Last Name"/>
                        <TextInput
                            id="first_name"
                            v-model="form.last_name"
                            type="text"
                            class="mt-1 block w-full"
                            autocomplete="name"
                        />
                        <InputError :message="form.errors.last_name" class="mt-2"/>
                    </div>
                    <!-- Phone -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="phone" value="Phone"/>
                        <TextInput
                            id="first_name"
                            v-model="form.phone"
                            type="text"
                            class="mt-1 block w-full"
                            autocomplete="phone"
                        />
                        <InputError :message="form.errors.phone" class="mt-2"/>
                    </div>
                    <!-- Email -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="email" value="Email"/>
                        <TextInput
                            id="email"
                            v-model="form.email"
                            type="text"
                            class="mt-1 block w-full"
                            autocomplete="email"
                        />
                        <InputError :message="form.errors.email" class="mt-2"/>
                    </div>
                    <!-- Website -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="website" value="Website"/>
                        <TextInput
                            id="website"
                            v-model="form.website"
                            type="text"
                            class="mt-1 block w-full"
                            autocomplete="website"
                        />
                        <InputError :message="form.errors.website" class="mt-2"/>
                    </div>
                    <!-- Linkedin -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="linkedin" value="Linkedin"/>
                        <TextInput
                            id="website"
                            v-model="form.linkedin"
                            type="text"
                            class="mt-1 block w-full"
                            autocomplete="linkedin"
                        />
                        <InputError :message="form.errors.linkedin" class="mt-2"/>
                    </div>
                    <!-- Linkedin -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="facebook" value="Facebook"/>
                        <TextInput
                            id="website"
                            v-model="form.facebook"
                            type="text"
                            class="mt-1 block w-full"
                            autocomplete="facebook"
                        />
                        <InputError :message="form.errors.facebook" class="mt-2"/>
                    </div>
                    <!-- Telegram -->
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="telegram" value="Telegram"/>
                        <TextInput
                            id="telegram"
                            v-model="form.telegram"
                            type="text"
                            class="mt-1 block w-full"
                            autocomplete="telegram"
                        />
                        <InputError :message="form.errors.telegram" class="mt-2"/>
                    </div>
                </template>

                <template #actions>
                    <ActionMessage :on="form.recentlySuccessful" class="mr-3">
                        Saved.
                    </ActionMessage>

                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Generate
                    </PrimaryButton>
                </template>
            </FormSection>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
