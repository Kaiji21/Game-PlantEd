<script setup>

import features from '../data/features.js';
import { ref } from 'vue';

let isOpen = ref(1);

</script>

<template>
    <!-- Features Section Start -->
    <div id="features" class="container mx-auto px-5">
        <section class="py-3">
            <div class="w-4/5 md:w-3/5 mx-auto">
                <h2 class="text-3xl md:text-4xl font-semibold font-theme-heading text-center">Features</h2>
                <p class="text-theme-grayish-blue text-center mt-7 font-theme-content text-lg">
                    Explore a world of agricultural knowledge with PlantEd's unique features designed to elevate your
                    learning experience. Engage in structured quizzes covering plant species, growth requirements, and
                    cultivation practices through our Quiz Modules. Navigate personalized learning paths with Adaptive
                    Learning, tailoring difficulty levels based on your performance. Foster collaboration and friendly
                    competition with Peer Comparison.
                </p>
            </div>

            <div class="mt-10">
                <ul class="flex flex-col items-center md:flex-row justify-center font-theme-heading">
                    <li v-for="feature in features" :key="feature.id"
                        :class="isOpen === feature.id ? 'md:border-b-4 md:border-theme-secondary' : ''"
                        class="w-full md:w-56 cursor-pointer hover:text-theme-secondary transition duration-200 border-b-2 border-t-2 md:border-t-0 flex justify-center">
                        <a @click.prevent="isOpen = feature.id" href="#"
                            :class="isOpen === feature.id ? ' border-theme-secondary' : ''"
                            class="py-5  md:border-b-0 border-b-4">{{ feature.name }}</a>
                    </li>
                </ul>
            </div>

            <div class="mt-16">
                <!-- Tab Content -->
                <template v-for="feature in features" :key="feature.id">
                    <div v-show="isOpen === feature.id" class="grid gap-32 lg:grid-cols-2 items-center">
                        <div class="relative">
                            <img class="z-10 w-full" :src="feature.details.imageUrl" />

                        </div>
                        <div>
                            <h3 class="font-theme-heading text-2xl md:text-3xl font-medium text-center lg:text-left">{{
                                feature.details.title }}</h3>
                            <p class="mt-7 font-theme-content text-lg text-theme-grayish-blue text-center lg:text-left">{{
                                feature.details.description }}</p>

                        </div>
                    </div>
                </template>
                <!-- Tab Content -->
            </div>
        </section>
    </div>
<!-- Features Section End --></template>
