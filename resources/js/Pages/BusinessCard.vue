<script setup>
import {Head} from '@inertiajs/vue3';
import {EnvelopeIcon, PhoneIcon} from '@heroicons/vue/20/solid'

defineProps({
    card: Object,
});

</script>

<template>
    <Head title="Bigness card QR generator"/>

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

        <div class="grid grid-cols-1 gap-6">
            <div class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow">
                <div class="flex flex-1 flex-col p-8">
                    <h3 class="mt-6 text-sm font-medium text-gray-900">{{ card.first_name }}</h3>
                    <dl class="mt-1 flex flex-grow flex-col justify-between">
                        <dt class="sr-only">Title</dt>
                        <dd class="text-sm text-gray-500" v-if="card.email">{{ card.email }}</dd>
                    </dl>
                </div>
                <div>
                    <div class="flex border-b border-gray-200">
                        <div class="flex w-0 flex-1">
                            <a :href="route('qr.code',{qr:card.id,type:'card'})"
                               class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                Card
                            </a>
                        </div>
                    </div>
                    <div class="flex border-b border-gray-200" v-if="card.website">
                        <div class="flex w-0 flex-1">
                            <a :href="route('qr.code',{qr:card.id,type:'website'})"
                               class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                Website
                            </a>
                        </div>
                    </div>
                    <div class="flex border-b border-gray-200" v-if="card.facebook">
                        <div class="flex w-0 flex-1">
                            <a :href="route('qr.code',{qr:card.id,type:'facebook'})"
                               class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                Facebook
                            </a>
                        </div>
                    </div>
                    <div class="flex border-b border-gray-200" v-if="card.linkedin">
                        <div class="flex w-0 flex-1">
                            <a :href="route('qr.code',{qr:card.id,type:'linkedin'})"
                               class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                Linkedin
                            </a>
                        </div>
                    </div>
                    <div class="flex border-b border-gray-200" v-if="card.telegram">
                        <div class="flex w-0 flex-1">
                            <a :href="route('qr.code',{qr:card.id,type:'telegram'})"
                               class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                Telegram
                            </a>
                        </div>
                    </div>
                </div>
            </div>
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
