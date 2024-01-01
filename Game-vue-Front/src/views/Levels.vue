
<template class="bg-green-300">
    <div class="flex items-center justify-center my-10">
        <ProgressBar class="w-1/2" :value="progress" :showValue="false"></ProgressBar>
    </div>
    <div class="card flex align-items-center justify-content-center">

        <Card class=" w-1/2 mx-auto">
            <template #header>
                <div class="flex items-center">
                    <div class="card w-48 h-48 mx-10 mt-8 overflow-hidden rounded-lg shadow-md">
                        <img alt="user header" src="https://upload.wikimedia.org/wikipedia/commons/b/b4/Avocado_seeds.png"
                            class="w-full h-full object-cover " />
                    </div>
                    <div class="ml-4">
                        <h2 class="text-xl font-semibold">Chose the corret answer</h2>
                        <p class="text-gray-600">identify the correct plant species associated with each seed</p>
                    </div>
                </div>
            </template>


            <template #content>
                <div class="grid grid-cols-4 gap-5">
                    <!-- Card 1 -->
                    <Card class="w-full p-4" @click="checkAnswer(1)">
                        <template #content>
                            <p>Abricot</p>

                        </template>
                    </Card>

                    <Card class="w-full p-4" @click="checkAnswer(2)">
                        <template #content>
                            <p>Avocat</p>

                        </template>
                    </Card>

                    <Card class="w-full p-4" @click="checkAnswer(3)">
                        <template #content>
                            <p>Tomate</p>

                        </template>
                    </Card>

                    <Card class="w-full p-4" @click="checkAnswer(3)">
                        <template #content>
                            <p>Peach</p>

                        </template>
                    </Card>
                </div>
            </template>

            <template #footer>
                <div class="flex justify-center">
                    <Button icon="pi pi-check" label="Start" @click="startProgress" class=" bg-blue-300 p-3 mr-3" />
                    <Button icon="pi pi-times" label="Save" class=" bg-green-400 p-3 mr-3" style="margin-left: 0.5em" />
                </div>
            </template>

        </Card>

    </div>
</template>

<script setup>
</script>


<script setup>
import { ref, onMounted } from 'vue';
import Card from 'primevue/card';
import Carousel from 'primevue/carousel';
import Tag from 'primevue/tag';
import ProgressBar from 'primevue/progressbar';
import Button from 'primevue/button';
import Swal from "sweetalert2";





const userSelectedAnswer = ref(null);
const correctAnswer = ref(2); // Change this to the correct answer index (1, 2, 3, or 4)

const userData = ref(JSON.parse(localStorage.getItem('userData')) || null);
onMounted(() => {
    // Check local storage for user data when the component is mounted
    userData.value = JSON.parse(localStorage.getItem('userData')) || null;
    // startProgress();
});
let progressInterval;

const progress = ref(0);

    const startProgress = () => {
      const totalTime = 60 * 1000; // 1 minute in milliseconds
      const interval = 100; // Update interval in milliseconds
      const steps = totalTime / interval;
      let currentStep = 0;

       progressInterval = setInterval(() => {
        currentStep++;
        progress.value = (currentStep / steps) * 100;

        if (currentStep === steps) {
          clearInterval(progressInterval);
        }
      }, interval);
    };
const checkAnswer = (selected) => {
    clearInterval(progressInterval); // Stop the progress

  userSelectedAnswer.value = selected;

  if (selected === correctAnswer.value) {
    Swal.fire({
            icon: "success",
            title: "Thank You",
            text: `you have chosed the correct answer`,
        });
    console.log('Correct answer selected!');
  } else {
    Swal.fire({
            icon: "error",
            title: "false",
            text: `you have chosed the false answer the correct answer is 2`,
        });
    console.log('Wrong answer selected!');
  }
};

</script>
