<template>
    <Head title="Count Down" />

    <div class="relative w-full overflow-x-hidden bg-[#25100a]">
        <!-- Background Image -->
        <img src="/img/turd_reich__Led_by_Donkeys.png" class="mx-auto block h-auto min-h-screen w-auto min-w-full" alt="Background" />

        <!-- Overlay Content -->
        <div class="pointer-events-none fixed inset-0">
            <div class="pointer-events-auto relative isolate pt-14">
                <div class="mx-auto max-w-7xl px-6 lg:px-8">
                    <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                        <div class="mb-8 flex justify-center">
                            <div class="relative rounded-full px-3 py-1 text-sm/6 text-gray-400 ring-1 ring-white/10 hover:ring-white/20">
                                Tangerine Wank Maggot.
                                <button @click="showNames = true" class="font-semibold text-white">
                                    <span class="absolute inset-0" aria-hidden="true" />And more names... <span aria-hidden="true">&rarr;</span>
                                </button>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="text-3xl font-semibold tracking-tight text-balance text-white sm:text-7xl">
                                <template v-if="howLong"> {{ howLong.years }} years, {{ howLong.months }} months, {{ howLong.days }} days </template>
                                <template v-else> Loading... </template>
                            </h1>
                            <p class="mt-8 text-lg font-medium text-pretty text-gray-400 sm:text-xl/8">till he leaves office (2029 January 20th)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Side Panel for the scrollable list of names -->
        <Transition name="slide-fade">
            <div
                v-if="showNames"
                class="fixed inset-y-0 right-0 z-50 flex w-full max-w-sm flex-col bg-black/80 p-6 shadow-2xl ring-1 ring-white/10 backdrop-blur-md"
            >
                <div class="mb-6 flex items-center justify-between">
                    <h2 class="text-2xl font-semibold text-white">Names of the Turd</h2>
                    <button @click="showNames = false" class="p-2 text-gray-400 hover:text-white">
                        <span class="sr-only">Close menu</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Add Name Form -->
                <form @submit.prevent="submit" class="mb-8 space-y-4">
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300">New name for the Turd</label>
                            <input
                                v-model="form.name"
                                type="text"
                                name="name"
                                id="name"
                                class="mt-1 block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-white/10 ring-inset focus:ring-2 focus:ring-indigo-500 focus:ring-inset sm:text-sm/6"
                                placeholder="Mango Mussolini"
                                required
                            />
                            <div v-if="form.errors.name" class="mt-1 text-sm text-red-400">{{ form.errors.name }}</div>
                        </div>
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-300">Your name (optional)</label>
                            <div class="mt-1 flex gap-2">
                                <input
                                    v-model="form.author"
                                    type="text"
                                    name="author"
                                    id="author"
                                    class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-white/10 ring-inset focus:ring-2 focus:ring-indigo-500 focus:ring-inset sm:text-sm/6"
                                    placeholder="Visitor"
                                />
                                <button
                                    type="submit"
                                    :disabled="form.processing"
                                    class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold whitespace-nowrap text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 disabled:opacity-50"
                                >
                                    Add Name
                                </button>
                            </div>
                            <div v-if="form.errors.author" class="mt-1 text-sm text-red-400">{{ form.errors.author }}</div>
                        </div>
                    </div>
                </form>

                <div class="custom-scrollbar flex-1 overflow-y-auto border-t border-white/10 pt-6 pr-2">
                    <ul class="space-y-4 text-lg text-gray-300">
                        <li v-for="item in names" :key="item.id" class="flex flex-col">
                            <span>{{ item.name }}</span>
                            <span class="text-xs text-gray-500 italic" v-if="item.author">by {{ item.author }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </Transition>
    </div>
</template>

<script setup lang="ts">
import { DateTime } from 'luxon';
import { onMounted, ref } from 'vue';
import { Head, useForm } from '@inertiajs/vue3';

defineProps<{
    names: Array<{ id: number; name: string; author: string }>;
}>();

const end_of_trump = DateTime.fromISO('2029-01-20T12:00:00', { zone: 'Europe/Copenhagen', conversionAccuracy: 'longterm' });
const tick = () => {
    return end_of_trump.diff(DateTime.now(), 'months').shiftTo('years', 'months', 'weeks', 'days', 'hours', 'minutes', 'seconds').toObject();
};

const howLong = ref<any>(null);
const showNames = ref(false);
howLong.value = tick();

const form = useForm({
    name: '',
    author: '',
});

const submit = () => {
    form.post(route('trump-names.store'), {
        onSuccess: () => form.reset(),
    });
};

onMounted(() => {
    setInterval(() => {
        howLong.value = tick();
    }, 1000);
});
</script>

<style scoped>
.slide-fade-enter-active,
.slide-fade-leave-active {
    transition:
        transform 0.4s ease-out,
        opacity 0.4s ease-out;
}

.slide-fade-enter-from,
.slide-fade-leave-to {
    transform: translateX(100%);
    opacity: 0;
}

.custom-scrollbar::-webkit-scrollbar {
    width: 6px;
}

.custom-scrollbar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.05);
}

.custom-scrollbar::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 3px;
}

.custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.3);
}
</style>
