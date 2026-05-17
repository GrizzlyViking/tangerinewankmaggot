<template>
    <Head title="Count Down" />

    <div class="page-root relative">

        <!-- Fixed badge -->
        <div class="pointer-events-none fixed inset-x-0 top-14 z-20 flex justify-center">
            <div class="pointer-events-auto relative rounded-full px-3 py-1 text-sm/6 text-gray-400 ring-1 ring-white/10 hover:ring-white/20">
                Tangerine Wank Maggot.
                <button @click="showNames = true" class="font-semibold text-white">
                    <span class="absolute inset-0" aria-hidden="true" />And more names...
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
                        {{ howLong.years }} years, {{ howLong.months }} months, {{ howLong.days }} days
                    </template>
                    <template v-else>Loading...</template>
                </h1>
                <p class="mt-8 text-lg font-medium text-pretty text-gray-400 sm:text-xl/8">
                    till he leaves office (2029 January 20th)
                </p>

                <!-- Midterm countdown -->
                <div class="mt-10 rounded-2xl bg-black/50 px-8 py-6 ring-1 ring-white/10 backdrop-blur-sm">
                    <p class="text-xs font-semibold uppercase tracking-widest text-blue-400">Sooner relief</p>
                    <p class="mt-2 text-xl font-semibold text-white sm:text-3xl">
                        <template v-if="tillMidterms">
                            {{ tillMidterms.months }} months, {{ tillMidterms.days }} days
                        </template>
                    </p>
                    <p class="mt-2 text-sm text-gray-400">till the midterm elections (November 3, 2026)</p>
                </div>

                <!-- Scroll nudge -->
                <div class="mt-14 animate-bounce text-gray-500">
                    <svg class="mx-auto h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 9l-7 7-7-7" />
                    </svg>
                    <p class="mt-1 text-xs uppercase tracking-widest">what's at stake</p>
                </div>
            </section>

            <!-- What are midterms + congressional distribution -->
            <section class="px-6 py-20">
                <div class="mx-auto max-w-5xl">

                    <!-- Explainer -->
                    <div class="mb-16 rounded-2xl bg-indigo-950/60 p-8 ring-1 ring-indigo-500/20">
                        <h3 class="mb-3 text-xl font-bold text-white">🤔 Wait — what even <em>are</em> midterms?</h3>
                        <p class="leading-relaxed text-gray-300">
                            Halfway through a president's 4-year term, Americans vote for
                            <strong class="text-white">all 435 seats</strong> in the House of Representatives and roughly
                            <strong class="text-white">a third of the 100 Senate seats</strong>. It's essentially a national
                            report card on the president. Historically, the president's party almost always loses seats —
                            it rarely removes a president outright, but it can make their remaining two years considerably
                            more miserable. Think of it as democracy clearing its throat loudly.
                        </p>
                    </div>

                    <!-- Balance of Power -->
                    <h2 class="mb-2 text-center text-3xl font-bold text-white">The Balance of Power</h2>
                    <p class="mb-10 text-center text-gray-400">
                        Republicans currently control both chambers of Congress. Here's what that looks like — and what history suggests may change.
                    </p>

                    <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">

                        <!-- Senate -->
                        <div class="rounded-2xl bg-gray-900/80 p-8 ring-1 ring-white/10">
                            <h3 class="mb-1 text-xl font-bold text-white">
                                Senate <span class="text-base font-normal text-gray-400">· 100 seats</span>
                            </h3>
                            <p class="mb-6 text-sm text-gray-400">
                                Need 51 to control. Only ~34 seats are up in 2026 — the rest vote in 2028 or 2030.
                            </p>

                            <p class="mb-2 text-xs font-semibold uppercase tracking-widest text-gray-500">Now (119th Congress)</p>
                            <div class="mb-3 flex flex-wrap gap-1">
                                <div v-for="i in 53" :key="'sr' + i" class="h-3.5 w-3.5 rounded-sm bg-red-500" title="Republican"></div>
                                <div v-for="i in 47" :key="'sd' + i" class="h-3.5 w-3.5 rounded-sm bg-blue-500" title="Democrat"></div>
                            </div>
                            <div class="mb-8 flex gap-5 text-sm text-gray-300">
                                <span class="flex items-center gap-1.5">
                                    <span class="inline-block h-3 w-3 rounded-sm bg-red-500"></span>Republican <strong class="text-white">53</strong>
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <span class="inline-block h-3 w-3 rounded-sm bg-blue-500"></span>Democrat <strong class="text-white">47</strong>
                                </span>
                            </div>

                            <p class="mb-2 text-xs font-semibold uppercase tracking-widest text-gray-500">If history repeats (post-midterms)</p>
                            <div class="mb-3 flex flex-wrap gap-1">
                                <div v-for="i in 50" :key="'spr' + i" class="h-3.5 w-3.5 rounded-sm bg-red-500"></div>
                                <div v-for="i in 50" :key="'spd' + i" class="h-3.5 w-3.5 rounded-sm bg-blue-500"></div>
                            </div>
                            <div class="mb-3 flex gap-5 text-sm text-gray-300">
                                <span class="flex items-center gap-1.5">
                                    <span class="inline-block h-3 w-3 rounded-sm bg-red-500"></span>Republican <strong class="text-white">50</strong>
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <span class="inline-block h-3 w-3 rounded-sm bg-blue-500"></span>Democrat <strong class="text-white">50</strong>
                                </span>
                            </div>
                            <p class="text-xs leading-relaxed text-gray-500">
                                A 50/50 Senate is still technically Republican-controlled — the Vice President (also Republican) casts tie-breaking votes.
                                But every single vote becomes a white-knuckle situation. Progress!
                            </p>
                        </div>

                        <!-- House -->
                        <div class="rounded-2xl bg-gray-900/80 p-8 ring-1 ring-white/10">
                            <h3 class="mb-1 text-xl font-bold text-white">
                                House of Representatives <span class="text-base font-normal text-gray-400">· 435 seats</span>
                            </h3>
                            <p class="mb-6 text-sm text-gray-400">
                                Need 218 to control. All 435 seats are on the ballot every two years — a full reset.
                            </p>

                            <p class="mb-2 text-xs font-semibold uppercase tracking-widest text-gray-500">Now (119th Congress)</p>
                            <div class="mb-3 flex flex-wrap gap-0.5">
                                <div v-for="i in 220" :key="'hr' + i" class="h-2.5 w-2.5 rounded-sm bg-red-500"></div>
                                <div v-for="i in 215" :key="'hd' + i" class="h-2.5 w-2.5 rounded-sm bg-blue-500"></div>
                            </div>
                            <div class="mb-8 flex gap-5 text-sm text-gray-300">
                                <span class="flex items-center gap-1.5">
                                    <span class="inline-block h-3 w-3 rounded-sm bg-red-500"></span>Republican <strong class="text-white">220</strong>
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <span class="inline-block h-3 w-3 rounded-sm bg-blue-500"></span>Democrat <strong class="text-white">215</strong>
                                </span>
                            </div>

                            <p class="mb-2 text-xs font-semibold uppercase tracking-widest text-gray-500">If history repeats (post-midterms)</p>
                            <div class="mb-3 flex flex-wrap gap-0.5">
                                <div v-for="i in 198" :key="'hpr' + i" class="h-2.5 w-2.5 rounded-sm bg-red-500"></div>
                                <div v-for="i in 237" :key="'hpd' + i" class="h-2.5 w-2.5 rounded-sm bg-blue-500"></div>
                            </div>
                            <div class="mb-3 flex gap-5 text-sm text-gray-300">
                                <span class="flex items-center gap-1.5">
                                    <span class="inline-block h-3 w-3 rounded-sm bg-red-500"></span>Republican <strong class="text-white">198</strong>
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <span class="inline-block h-3 w-3 rounded-sm bg-blue-500"></span>Democrat <strong class="text-white">237</strong>
                                </span>
                            </div>
                            <p class="text-xs leading-relaxed text-gray-500">
                                Based on the historical average of ~25 seat losses for the president's party. A Democratic House can block
                                legislation, reject the budget, and — if feeling dramatic — impeach. Again.
                            </p>
                        </div>

                    </div>

                    <p class="mt-8 text-center text-xs text-gray-600">
                        Projections based on historical averages, not a crystal ball. American democracy has a habit of surprising everyone — including Americans.
                    </p>

                    <!-- Current forecasts -->
                    <div class="mt-20">
                        <h2 class="mb-2 text-center text-3xl font-bold text-white">The Actual Forecasts</h2>
                        <p class="mb-10 text-center text-gray-400">Not historical averages — what the data is saying right now.</p>

                        <div class="mb-6 grid grid-cols-1 gap-6 lg:grid-cols-2">
                            <div class="rounded-2xl bg-gray-900/80 p-8 ring-1 ring-white/10">
                                <h3 class="mb-3 text-lg font-bold text-white">🏛️ The House</h3>
                                <p class="leading-relaxed text-gray-300">
                                    Democrats are the <strong class="text-white">clear favourite</strong> to reclaim the majority.
                                    Models give them roughly a <strong class="text-blue-400">73% chance</strong> —
                                    and they only need to flip <strong class="text-white">3 seats</strong>.
                                    Redistricting battles in Florida, Tennessee, and Virginia are adding complexity.
                                </p>
                            </div>
                            <div class="rounded-2xl bg-gray-900/80 p-8 ring-1 ring-white/10">
                                <h3 class="mb-3 text-lg font-bold text-white">🏛️ The Senate</h3>
                                <p class="leading-relaxed text-gray-300">
                                    Republicans hold a 53–47 majority. Democrats are expected to benefit from
                                    the typical midterm headwinds against the president's party.
                                    Key battlegrounds: <strong class="text-white">Georgia, Maine, and Michigan</strong>.
                                </p>
                            </div>
                        </div>

                        <div class="mb-8 rounded-2xl bg-gray-900/80 p-6 ring-1 ring-white/10 text-center">
                            <p class="text-gray-300">
                                <strong class="text-white">Prediction markets</strong> (Kalshi, Polymarket) give Democrats a slight overall edge —
                                but most individual races remain competitive.
                            </p>
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
                        <h2 class="mb-10 text-center text-3xl font-bold text-white">The Questions Everyone Is Asking</h2>

                        <div class="space-y-6">

                            <!-- Q1 -->
                            <div class="flex items-start gap-4">
                                <span class="mt-1 shrink-0 text-3xl">😤</span>
                                <div class="rounded-2xl rounded-tl-sm bg-orange-950/70 p-6 ring-1 ring-orange-500/20">
                                    <p class="italic leading-relaxed text-gray-200">
                                        "Trump is utterly awful and completely lacks any notion of competence —
                                        and Americans are STILL voting for him???"
                                    </p>
                                </div>
                            </div>

                            <!-- A1 -->
                            <div class="flex flex-row-reverse items-start gap-4">
                                <span class="mt-1 shrink-0 text-3xl">🤖</span>
                                <div class="rounded-2xl rounded-tr-sm bg-indigo-950/70 p-6 ring-1 ring-indigo-500/20">
                                    <p class="mb-4 leading-relaxed text-gray-300">
                                        There are several well-documented explanations — none of which require Americans to be stupid:
                                    </p>
                                    <ul class="space-y-3 text-gray-300">
                                        <li><strong class="text-white">Partisan identity beats performance</strong> — Party affiliation functions like tribal identity. People filter the same events completely differently depending on which team they're on.</li>
                                        <li><strong class="text-white">Fractured information environments</strong> — A significant portion of the electorate lives in a genuinely different media reality and may never encounter the critiques that seem obvious from outside.</li>
                                        <li><strong class="text-white">No compelling alternative</strong> — Pointing out someone is bad isn't the same as giving people something to vote <em>for</em>. Democrats have struggled with economic messaging in particular.</li>
                                        <li><strong class="text-white">Chaos as a feature, not a bug</strong> — For voters who distrust institutions, someone who breaks everything isn't disqualifying. It's the point.</li>
                                        <li><strong class="text-white">Midterms lag</strong> — The forecasts actually <em>do</em> reflect public dissatisfaction. It just takes time to translate into votes, and gerrymandering cushions the seat count.</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Q2 -->
                            <div class="flex items-start gap-4">
                                <span class="mt-1 shrink-0 text-3xl">😤</span>
                                <div class="rounded-2xl rounded-tl-sm bg-orange-950/70 p-6 ring-1 ring-orange-500/20">
                                    <p class="italic leading-relaxed text-gray-200">
                                        "My objection isn't that Trump is politically right. Orbán is strategically sharp.
                                        Meloni is genuinely competent. My objection is that Trump is dumber than any
                                        person I have ever heard of."
                                    </p>
                                </div>
                            </div>

                            <!-- A2 -->
                            <div class="flex flex-row-reverse items-start gap-4">
                                <span class="mt-1 shrink-0 text-3xl">🤖</span>
                                <div class="rounded-2xl rounded-tr-sm bg-indigo-950/70 p-6 ring-1 ring-indigo-500/20">
                                    <p class="mb-3 font-semibold text-white">Fair point — and an important distinction:</p>
                                    <p class="mb-4 leading-relaxed text-gray-300">
                                        Political right ≠ incompetent. These are completely orthogonal axes.
                                    </p>
                                    <p class="mb-4 leading-relaxed text-gray-300">
                                        Orbán is a genuinely shrewd political operator — you can find his policies deeply
                                        objectionable and still acknowledge he executes on his agenda effectively.
                                        Meloni navigates coalition politics skillfully and presents coherently.
                                        Thatcher. Reagan. Political effectiveness doesn't require you to agree with the politics.
                                    </p>
                                    <p class="mb-4 leading-relaxed text-gray-300">
                                        Trump is a genuinely different phenomenon. The usual "populist right" frameworks
                                        don't quite fit — because most of those leaders demonstrate a functional grasp of
                                        policy and strategy. Trump's relationship with cause-and-effect and factual
                                        consistency appears to operate differently.
                                    </p>
                                    <p class="mb-3 font-medium text-gray-200">So why does it work anyway?</p>
                                    <ul class="space-y-3 text-gray-300">
                                        <li><strong class="text-white">Performance over substance</strong> — A significant portion of voters respond to how he makes them <em>feel</em>, not policy competence.</li>
                                        <li><strong class="text-white">Anti-intellectualism as a feature</strong> — Decades of cultural drift made "sounds like an expert" a liability in parts of America, not an asset.</li>
                                        <li><strong class="text-white">Chaos as the point</strong> — For voters who distrust institutions, breaking everything isn't disqualifying.</li>
                                    </ul>
                                    <p class="mt-4 text-sm italic text-gray-500">
                                        Plenty of serious American commentators — left AND right — share exactly this bafflement.
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
                                class="mt-1 block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm/6"
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
                                    class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm/6"
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
                            <span class="text-xs italic text-gray-500" v-if="item.author">by {{ item.author }}</span>
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
