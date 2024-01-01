<template>
    <div class="card mx-10 my-10">
        <Card>
            <template #title> Hello {{ userData.name}}

            </template>
            <template #content>
                <p class="mb-5">
                    Welcome to PlantEd - The Ultimate Agricultural Learning Experience!
                </p>
                <p class="mb-5">
                    Let the learning begin! Explore, learn, and cultivate your knowledge with PlantEd. Have fun and grow
                    with us!
                </p>
                <div class="card">
                    <Carousel :value="levels" :numVisible="3" :numScroll="3">
                        <template #item="slotProps">
                            <router-link :to="`/level/${slotProps.data.id}`">
                                <div class=" card text-left rounded-lg p-5 space-y-2 relative">
                                    <img class="h-50 w-full object-cover rounded-md" :src="slotProps.data.details.imageUrl"
                                        alt="" style="width: 361.319px; height: 237.951px;">
                                    <div class="absolute -top-1 right-0">
                                        <i class=" pi pi-lock fa-5x" style="font-size: 1.5rem"  ></i>
                                    </div>
                                    <p class="text-black font-theme-heading text-xl uppercase">{{ slotProps.data.name }}</p>
                                    <p class="mt-2 text-2xl theme-heading font-semibold text-black">{{ slotProps.data.details.title }}</p>
                                    <p class="mt-2 mb-4 theme-heading font-normal text-xl text-black">{{
                                        slotProps.data.details.description }}
                                    </p>
                                    <div>
                                        <Tag :value="slotProps.data.details.category"
                                            :severity="slotProps.data.details.category == 'easy' ? 'success' : 'warning'" />
                                    </div>
                                </div>

                            </router-link>



                        </template>
                    </Carousel>
                </div>
            </template>
        </Card>
    </div>




</template>

<script setup>
import { ref, onMounted } from 'vue';
import Card from 'primevue/card';
import Carousel from 'primevue/carousel';
import levels from '../data/levelsdata.js';
import Tag from 'primevue/tag';
// import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";




const userData = ref(JSON.parse(localStorage.getItem('userData')) || null);
onMounted(() => {
    // Check local storage for user data when the component is mounted
    console.log(levels)
    userData.value = JSON.parse(localStorage.getItem('userData')) || null;
});

</script>
