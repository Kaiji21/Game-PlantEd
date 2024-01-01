<script setup>
import { FwbButton } from 'flowbite-vue'
</script>
<template style="bg-F3E4DB">
    <!-- Hero Section Start -->
    <div class="container mx-auto px-5 overflow-x-hidden lg:overflow-x-visible">
        <section class="grid grid-cols-none lg:grid-cols-2 pb-16  items-center bg-F3E4DB ">
            <div class="lg:w-5/6 order-2 lg:order-none">
                <h1 class="text-4xl xl:text-5xl font-bold font-theme-heading text-center lg:text-left">Master Time, Unlock Potential</h1>
                <p class="lg:text-xl mt-10 font-theme-content text-theme-grayish-blue text-center lg:text-left">Embark on a journey of time management mastery. Complete tasks, earn rewards, and rise to the challenge. Are you ready to unlock your true potential?</p>
                <div class="flex justify-center lg:justify-start mt-10">
                    <fwb-button href="https://google.com" style="background-color: #97562D !important;" target="_blank" size="xl" >PLAY NOW</fwb-button>
                </div>
            </div>
            <div class="relative order-1 lg:order-none mb-20 lg:mt-0 lg:mb-0 lg:-mr-10">
                <img class="z-10 w-full" src="../assets/imgs/Time management-bro.svg" />
            </div>
        </section>
    </div>
    <!-- Hero Section End -->
</template>
