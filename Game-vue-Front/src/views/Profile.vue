<template>
    <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
        <p class="text-2xl text-gray-400 dark:text-gray-500">
            Hi {{ userData.name }} Welcome to the game! Enjoy your gaming experience.


        </p>
    </div>
    <div class="card flex align-items-center justify-content-center">
        <Card class="w-full">
            <template #header>
                <Avatar  icon="pi pi-user" class="mr-2 " size="xlarge" shape="circle" />
            </template>
            <template #title> Advanced Card </template>
            <template #subtitle> Card subtitle </template>
            <template #content>
                <p class="m-0">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore sed consequuntur error repudiandae
                    numquam deserunt quisquam repellat libero asperiores earum nam nobis, culpa ratione quam perferendis
                    esse, cupiditate neque
                    quas!
                </p>
            </template>
            <template #footer>
                <Button icon="pi pi-check" label="Save" />
                <Button icon="pi pi-times" label="Cancel" severity="secondary" style="margin-left: 0.5em" />
            </template>
            <!-- <div class="flex items-center justify-center">
                    <Avatar icon="pi pi-user" class="mr-2" size="xlarge" shape="circle" />

                </div> -->

        </Card>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import Card from 'primevue/card';
import Avatar from 'primevue/avatar';


const userData = ref(JSON.parse(localStorage.getItem('userData')) || null);
onMounted(() => {
    // Check local storage for user data when the component is mounted
    userData.value = JSON.parse(localStorage.getItem('userData')) || null;
});

</script>

