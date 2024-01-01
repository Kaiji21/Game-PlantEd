<template>
    <div id="faq" class="container mx-auto px-5 md:w-4/5">
        <section class="py-16 pt-18">
            <div class="w-4/5 md:w-3/5 mx-auto">
                <h2 class="text-3xl md:text-4xl font-theme-heading font-medium text-center">Top Players</h2>
                <p class="text-theme-grayish-blue text-center mt-7 font-theme-content text-lg">
                    Discover our top-performing players and see how they've mastered the game. Can you make it to the
                    leaderboard?
                </p>
            </div>


            <div class="w-full lg:w-3/5 mx-auto">
                <div class="card">
                    <Carousel :value="users" :numVisible="1" :numScroll="1" :responsiveOptions="responsiveOptions">
                        <template #item="slotProps">
                            <div class="border-1 surface-border border-round m-2 text-center py-5 px-3">
                                <div class="mb-3">
                                    <Avatar icon="pi pi-user" class="mr-2" size="xlarge" shape="circle" />

                                </div>
                                <div>
                                    <h4 class="mb-1">{{ slotProps.data.name }}</h4>
                                    <h6 class="mt-0 mb-3">Level : {{ slotProps.data.level_id }}</h6>
                                    <Tag :value="slotProps.data.total_points" severity="Success"  />

                                    <div class="mt-5 flex align-items-center justify-content-center gap-2">

                                    </div>
                                </div>
                            </div>
                        </template>
                    </Carousel>
                </div>

            </div>
        </section>
    </div>
</template>

<script setup>

import Tag from 'primevue/tag';
import { FwbRating } from 'flowbite-vue'
import { FwbBadge } from 'flowbite-vue'

import Avatar from 'primevue/avatar';
import { ref, onMounted } from "vue";
import PlayerService from "../data/Topplayers";  // Import player service
import Carousel from 'primevue/carousel';


const users = ref([]);

onMounted(async () => {
    try {
        // Fetch top players from API
        const response = await PlayerService.getTopPlayers();

        if (response.status && response.users) {
            // Update the users value with the retrieved data
            users.value = response.users;
        } else {
            console.error("Error retrieving top players:", response.message);
        }
    } catch (error) {
        console.error("Error fetching top players:", error);
    }
});
</script>
