<template>
    <Head :title="t('title')" />

    <div class="page-root relative">

        <!-- Language Switcher -->
        <div class="fixed top-4 right-4 z-50 flex gap-2">
            <Link
                v-for="lang in ['en', 'da', 'es']"
                :key="lang"
                :href="route('locale.update', { locale: lang })"
                class="rounded-md px-2 py-1 text-xs font-bold transition-colors"
                :class="sharedProps.locale === lang ? 'bg-indigo-600 text-white' : 'bg-black/50 text-gray-400 hover:bg-black/70 hover:text-white'"
            >
                {{ lang.toUpperCase() }}
            </Link>
        </div>

        <!-- Fixed badge -->
        <div class="pointer-events-none fixed inset-x-0 top-14 z-20 flex justify-center">
            <div class="pointer-events-auto relative rounded-full px-3 py-1 text-sm/6 text-gray-400 ring-1 ring-white/10 hover:ring-white/20">
                {{ t('badge_text') }}
                <button @click="showNames = true" class="font-semibold text-white">
                    <span class="absolute inset-0" aria-hidden="true" />{{ t('and_more_names') }}
                    <span aria-hidden="true">&rarr;</span>
                </button>
            </div>
        </div>

        <!-- Scrollable content -->
        <div class="relative z-10">

            <!-- Hero: main countdown + midterm countdown -->
            <section class="flex min-h-screen flex-col items-center justify-center px-6 pt-14 text-center">
                <h1 class="text-3xl font-semibold tracking-tight text-balance text-white sm:text-7xl">
                    <template v-if="howLong">
                        {{ t('hero_years', { years: howLong.years, months: howLong.months, days: howLong.days }) }}
                    </template>
                    <template v-else>{{ t('loading') }}</template>
                </h1>
                <p class="mt-8 text-lg font-medium text-pretty text-gray-400 sm:text-xl/8">
                    {{ t('till_he_leaves') }}
                </p>

                <!-- Midterm countdown -->
                <div class="mt-10 rounded-2xl bg-black/50 px-8 py-6 ring-1 ring-white/10 backdrop-blur-sm">
                    <p class="text-xs font-semibold uppercase tracking-widest text-blue-400">{{ t('sooner_relief') }}</p>
                    <p class="mt-2 text-xl font-semibold text-white sm:text-3xl">
                        <template v-if="tillMidterms">
                            {{ t('midterm_countdown', { months: tillMidterms.months, days: tillMidterms.days }) }}
                        </template>
                    </p>
                    <p class="mt-2 text-sm text-gray-400">{{ t('till_midterms') }}</p>
                </div>

                <!-- Scroll nudge -->
                <div class="mt-14 animate-bounce text-gray-500">
                    <svg class="mx-auto h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                    </svg>
                    <p class="mt-1 text-xs uppercase tracking-widest">{{ t('whats_at_stake') }}</p>
                </div>
            </section>

            <!-- What are midterms + congressional distribution -->
            <section class="px-6 py-20">
                <div class="mx-auto max-w-5xl">

                    <!-- Explainer -->
                    <div class="mb-16 rounded-2xl bg-indigo-950/60 p-8 ring-1 ring-indigo-500/20">
                        <h3 class="mb-3 text-xl font-bold text-white" v-html="t('what_are_midterms_title')"></h3>
                        <p class="leading-relaxed text-gray-300" v-html="t('what_are_midterms_body')"></p>
                    </div>

                    <!-- Balance of Power -->
                    <h2 class="mb-2 text-center text-3xl font-bold text-white">{{ t('balance_of_power_title') }}</h2>
                    <p class="mb-10 text-center text-gray-400">
                        {{ t('balance_of_power_subtitle') }}
                    </p>

                    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">

                        <!-- Senate -->
                        <div class="rounded-2xl bg-gray-900/80 p-8 ring-1 ring-white/10">
                            <h3 class="mb-1 text-xl font-bold text-white">
                                {{ t('senate_title') }} <span class="text-base font-normal text-gray-400">· {{ t('senate_seats') }}</span>
                            </h3>
                            <p class="mb-6 text-sm text-gray-400">
                                {{ t('senate_description') }}
                            </p>

                            <p class="mb-2 text-xs font-semibold uppercase tracking-widest text-gray-500">{{ t('now_119th') }}</p>
                            <div class="mb-3 flex flex-wrap gap-1">
                                <div v-for="i in 53" :key="'sr' + i" class="h-3.5 w-3.5 rounded-sm bg-red-500" :title="t('republican')"></div>
                                <div v-for="i in 47" :key="'sd' + i" class="h-3.5 w-3.5 rounded-sm bg-blue-500" :title="t('democrat')"></div>
                            </div>
                            <div class="mb-8 flex gap-5 text-sm text-gray-300">
                                <span class="flex items-center gap-1.5">
                                    <span class="inline-block h-3 w-3 rounded-sm bg-red-500"></span>{{ t('republican') }} <strong class="text-white">53</strong>
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <span class="inline-block h-3 w-3 rounded-sm bg-blue-500"></span>{{ t('democrat') }} <strong class="text-white">47</strong>
                                </span>
                            </div>

                            <p class="mb-2 text-xs font-semibold uppercase tracking-widest text-gray-500">{{ t('history_repeats') }}</p>
                            <div class="mb-3 flex flex-wrap gap-1">
                                <div v-for="i in 50" :key="'spr' + i" class="h-3.5 w-3.5 rounded-sm bg-red-500"></div>
                                <div v-for="i in 50" :key="'spd' + i" class="h-3.5 w-3.5 rounded-sm bg-blue-500"></div>
                            </div>
                            <div class="mb-3 flex gap-5 text-sm text-gray-300">
                                <span class="flex items-center gap-1.5">
                                    <span class="inline-block h-3 w-3 rounded-sm bg-red-500"></span>{{ t('republican') }} <strong class="text-white">50</strong>
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <span class="inline-block h-3 w-3 rounded-sm bg-blue-500"></span>{{ t('democrat') }} <strong class="text-white">50</strong>
                                </span>
                            </div>
                            <p class="text-xs leading-relaxed text-gray-500">
                                {{ t('senate_history_note') }}
                            </p>
                        </div>

                        <!-- House -->
                        <div class="rounded-2xl bg-gray-900/80 p-8 ring-1 ring-white/10">
                            <h3 class="mb-1 text-xl font-bold text-white">
                                {{ t('house_title') }} <span class="text-base font-normal text-gray-400">· {{ t('house_seats') }}</span>
                            </h3>
                            <p class="mb-6 text-sm text-gray-400">
                                {{ t('house_description') }}
                            </p>

                            <p class="mb-2 text-xs font-semibold uppercase tracking-widest text-gray-500">{{ t('now_119th') }}</p>
                            <div class="mb-3 flex flex-wrap gap-0.5">
                                <div v-for="i in 220" :key="'hr' + i" class="h-2.5 w-2.5 rounded-sm bg-red-500"></div>
                                <div v-for="i in 215" :key="'hd' + i" class="h-2.5 w-2.5 rounded-sm bg-blue-500"></div>
                            </div>
                            <div class="mb-8 flex gap-5 text-sm text-gray-300">
                                <span class="flex items-center gap-1.5">
                                    <span class="inline-block h-3 w-3 rounded-sm bg-red-500"></span>{{ t('republican') }} <strong class="text-white">220</strong>
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <span class="inline-block h-3 w-3 rounded-sm bg-blue-500"></span>{{ t('democrat') }} <strong class="text-white">215</strong>
                                </span>
                            </div>

                            <p class="mb-2 text-xs font-semibold uppercase tracking-widest text-gray-500">{{ t('history_repeats') }}</p>
                            <div class="mb-3 flex flex-wrap gap-0.5">
                                <div v-for="i in 198" :key="'hpr' + i" class="h-2.5 w-2.5 rounded-sm bg-red-500"></div>
                                <div v-for="i in 237" :key="'hpd' + i" class="h-2.5 w-2.5 rounded-sm bg-blue-500"></div>
                            </div>
                            <div class="mb-3 flex gap-5 text-sm text-gray-300">
                                <span class="flex items-center gap-1.5">
                                    <span class="inline-block h-3 w-3 rounded-sm bg-red-500"></span>{{ t('republican') }} <strong class="text-white">198</strong>
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <span class="inline-block h-3 w-3 rounded-sm bg-blue-500"></span>{{ t('democrat') }} <strong class="text-white">237</strong>
                                </span>
                            </div>
                            <p class="text-xs leading-relaxed text-gray-500">
                                {{ t('house_history_note') }}
                            </p>
                        </div>

                    </div>

                    <p class="mt-8 text-center text-xs text-gray-600">
                        {{ t('projections_note') }}
                    </p>

                    <!-- Current forecasts -->
                    <div class="mt-20">
                        <h2 class="mb-2 text-center text-3xl font-bold text-white">{{ t('actual_forecasts_title') }}</h2>
                        <p class="mb-10 text-center text-gray-400">{{ t('actual_forecasts_subtitle') }}</p>

                        <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-2">
                            <div class="rounded-2xl bg-gray-900/80 p-8 ring-1 ring-white/10">
                                <h3 class="mb-3 text-lg font-bold text-white" v-html="t('house_forecast_title')"></h3>
                                <p class="leading-relaxed text-gray-300" v-html="t('house_forecast_body')"></p>
                            </div>
                            <div class="rounded-2xl bg-gray-900/80 p-8 ring-1 ring-white/10">
                                <h3 class="mb-3 text-lg font-bold text-white" v-html="t('senate_forecast_title')"></h3>
                                <p class="leading-relaxed text-gray-300" v-html="t('senate_forecast_body')"></p>
                            </div>
                        </div>

                        <div class="mb-8 rounded-2xl bg-gray-900/80 p-6 ring-1 ring-white/10 text-center">
                            <p class="text-gray-300" v-html="t('prediction_markets')"></p>
                        </div>

                        <div class="flex flex-wrap justify-center gap-3">
                            <a href="https://www.racetothewh.com/house" target="_blank" rel="noopener noreferrer"
                               class="rounded-full bg-indigo-600 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-indigo-500">
                                Race to the WH →
                            </a>
                            <a href="https://www.newsweek.com/us-midterms-tracker-most-competitive-races-odds-forecast-prediction-11945456" target="_blank" rel="noopener noreferrer"
                               class="rounded-full bg-white/10 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-white/20">
                                Newsweek Midterms Tracker →
                            </a>
                            <a href="https://www.270towin.com/2026-house-election-predictions/" target="_blank" rel="noopener noreferrer"
                               class="rounded-full bg-white/10 px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-white/20">
                                270toWin →
                            </a>
                        </div>
                    </div>

                    <!-- Q&A thread -->
                    <div class="mx-auto mt-20 max-w-3xl">
                        <h2 class="mb-10 text-center text-3xl font-bold text-white">{{ t('questions_title') }}</h2>

                        <div class="space-y-6">

                            <!-- Q1 -->
                            <div class="flex items-start gap-4">
                                <span class="mt-1 shrink-0 text-3xl">😤</span>
                                <div class="rounded-2xl rounded-tl-sm bg-orange-950/70 p-6 ring-1 ring-orange-500/20">
                                    <p class="italic leading-relaxed text-gray-200">
                                        {{ t('q1_text') }}
                                    </p>
                                </div>
                            </div>

                            <!-- A1 -->
                            <div class="flex flex-row-reverse items-start gap-4">
                                <span class="mt-1 shrink-0 text-3xl">🤖</span>
                                <div class="rounded-2xl rounded-tr-sm bg-indigo-950/70 p-6 ring-1 ring-indigo-500/20">
                                    <p class="mb-4 leading-relaxed text-gray-300">
                                        {{ t('a1_intro') }}
                                    </p>
                                    <ul class="space-y-3 text-gray-300">
                                        <li v-html="t('a1_point1')"></li>
                                        <li v-html="t('a1_point2')"></li>
                                        <li v-html="t('a1_point3')"></li>
                                        <li v-html="t('a1_point4')"></li>
                                        <li v-html="t('a1_point5')"></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Q2 -->
                            <div class="flex items-start gap-4">
                                <span class="mt-1 shrink-0 text-3xl">😤</span>
                                <div class="rounded-2xl rounded-tl-sm bg-orange-950/70 p-6 ring-1 ring-orange-500/20">
                                    <p class="italic leading-relaxed text-gray-200">
                                        {{ t('q2_text') }}
                                    </p>
                                </div>
                            </div>

                            <!-- A2 -->
                            <div class="flex flex-row-reverse items-start gap-4">
                                <span class="mt-1 shrink-0 text-3xl">🤖</span>
                                <div class="rounded-2xl rounded-tr-sm bg-indigo-950/70 p-6 ring-1 ring-indigo-500/20">
                                    <p class="mb-3 font-semibold text-white">{{ t('a2_intro') }}</p>
                                    <p class="mb-4 leading-relaxed text-gray-300">
                                        {{ t('a2_point1') }}
                                    </p>
                                    <p class="mb-4 leading-relaxed text-gray-300">
                                        {{ t('a2_point2') }}
                                    </p>
                                    <p class="mb-4 leading-relaxed text-gray-300">
                                        {{ t('a2_point3') }}
                                    </p>
                                    <p class="mb-3 font-medium text-gray-200">{{ t('a2_why_intro') }}</p>
                                    <ul class="space-y-3 text-gray-300">
                                        <li v-html="t('a2_why1')"></li>
                                        <li v-html="t('a2_why2')"></li>
                                        <li v-html="t('a2_why3')"></li>
                                    </ul>
                                    <p class="mt-4 text-sm italic text-gray-500">
                                        {{ t('a2_outro') }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section>

        </div>

        <!-- Side Panel for scrollable list of names -->
        <Transition name="slide-fade">
            <div
                v-if="showNames"
                class="fixed inset-y-0 right-0 z-50 flex w-full max-w-sm flex-col bg-black/80 p-6 shadow-2xl ring-1 ring-white/10 backdrop-blur-md"
            >
                <div class="mb-6 flex items-center justify-between">
                    <h2 class="text-2xl font-semibold text-white">{{ t('names_title') }}</h2>
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
                            <label for="name" class="block text-sm font-medium text-gray-300">{{ t('add_name_label') }}</label>
                            <input
                                v-model="form.name"
                                type="text"
                                name="name"
                                id="name"
                                class="mt-1 block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm/6"
                                placeholder="Mango Mussolini"
                                required
                            />
                            <div v-if="form.errors.name" class="mt-1 text-sm text-red-400">{{ form.errors.name }}</div>
                        </div>
                        <div>
                            <label for="author" class="block text-sm font-medium text-gray-300">{{ t('author_label') }}</label>
                            <div class="mt-1 flex gap-2">
                                <input
                                    v-model="form.author"
                                    type="text"
                                    name="author"
                                    id="author"
                                    class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm/6"
                                    :placeholder="t('visitor_placeholder')"
                                />
                                <button
                                    type="submit"
                                    :disabled="form.processing"
                                    class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold whitespace-nowrap text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500 disabled:opacity-50"
                                >
                                    {{ t('add_name_button') }}
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
                            <span class="text-xs italic text-gray-500" v-if="item.author">{{ t('by_author', { author: item.author }) }}</span>
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
import { Head, useForm, usePage, Link } from '@inertiajs/vue3';
import { SharedData } from '@/types';

const props = defineProps<{
    names: Array<{ id: number; name: string; author: string }>;
}>();

const { props: sharedProps } = usePage<SharedData>();
const t = (key: string, replace: Record<string, any> = {}) => {
    let translation = sharedProps.translations.welcome[key] || key;
    Object.keys(replace).forEach((rKey) => {
        translation = translation.replace(`:${rKey}`, replace[rKey]);
    });
    return translation;
};

const end_of_trump = DateTime.fromISO('2029-01-20T12:00:00', { zone: 'Europe/Copenhagen', conversionAccuracy: 'longterm' });
const midterms_date = DateTime.fromISO('2026-11-03T00:00:00', { zone: 'America/New_York', conversionAccuracy: 'longterm' });

const tick = () =>
    end_of_trump.diff(DateTime.now(), 'months').shiftTo('years', 'months', 'weeks', 'days', 'hours', 'minutes', 'seconds').toObject();

const tickMidterm = () =>
    midterms_date.diff(DateTime.now(), 'months').shiftTo('months', 'days', 'hours', 'minutes', 'seconds').toObject();

const howLong = ref<any>(tick());
const tillMidterms = ref<any>(tickMidterm());
const showNames = ref(false);

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
        tillMidterms.value = tickMidterm();
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

.page-root {
    background-image: url('/img/turd_reich__Led_by_Donkeys.png');
    background-size: cover;
    background-position: top center;
    background-color: #25100a;
}
</style>
