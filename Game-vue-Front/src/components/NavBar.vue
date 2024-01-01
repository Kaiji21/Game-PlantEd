<template>
    <fwb-navbar>
        <template #logo>
            <fwb-navbar-logo alt="" class="font-bold font-theme-heading"
                src="http://127.0.0.1:8000/imgs/6.png"
                link="">
                Plant-Ed
            </fwb-navbar-logo>
        </template>
        <template #default="{ isShowMenu }">
            <fwb-navbar-collapse :is-show-menu="isShowMenu">
                <fwb-navbar-link is-active link="#" class="font-theme-heading ">
                    Home
                </fwb-navbar-link>
                <fwb-navbar-link link="https://github.com/Kaiji21/Game-Time_Master-" class="font-theme-heading"
                    style="color: #A1F58D;">
                    Services
                </fwb-navbar-link>
                <fwb-navbar-link link="#" class="font-theme-heading !hover:text-#A1F58D !focus:text-#A1F58D">
                    Contact
                </fwb-navbar-link>

            </fwb-navbar-collapse>
        </template>
        <template #right-side>
            <div v-if="showGetStartedButton">
                <fwb-button @click="showModal" class="font-theme-heading" style="background-color: #A1F58D !important;">
                    Get started
                </fwb-button>
            </div>
            <div v-else>
                <Button  type="button" id="user-modal"
                    style="background-color: white; color: #9EB23B;--tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
           --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow); border: 0px !important;"
                    class="flex flex-row items-center p-2 pl-3 rounded " @click="toggle" aria-haspopup="true"
                    aria-controls="overlay_menu">
                    <Avatar :label="userData.name[0]" class="mr-2"  style="background-color:#A1F58D; color: #ffffff" shape="circle"  />

                    <div class="flex flex-col items-center">
                        <span class="font-semibold text-black">{{ userData.name }}</span>
                    </div>
                </Button>
                <Menu ref="menu" id="overlay_menu" :model="items" :popup="true" />


            </div>
        </template>
    </fwb-navbar>
    <Signinmodal :showModal="isShowModal" />
</template>

<script setup>
import { ref, onMounted, computed } from 'vue';
import Menu from 'primevue/menu';
import Avatar from 'primevue/avatar';




import {
    FwbButton,
    FwbNavbar,
    FwbNavbarCollapse,
    FwbNavbarLink,
    FwbNavbarLogo,
} from 'flowbite-vue'
import Signinmodal from './SigninModal.vue'

const isShowModal = ref(false);

function showModal() {
    isShowModal.value = !isShowModal.value;
}
const userData = ref(JSON.parse(localStorage.getItem('userData')) || null);
onMounted(() => {
    // Check local storage for user data when the component is mounted
    userData.value = JSON.parse(localStorage.getItem('userData')) || null;
});
const showGetStartedButton = computed(() => !userData.value);
const menu = ref();


const items = ref([
    {
        label: 'Options',
        items: [
            {
                label: 'Refresh',
                icon: 'pi pi-refresh'
            },
            {
                label: 'Logout',
                icon: 'pi pi-upload'
            },
            {
                label: 'Profile',
                icon: 'pi pi-user',
            },
            // {
            //     label: 'Se déconnecter',
            //     icon: 'pi pi-sign-out',
            //     // command: () => {
            //     //     this.logout()
            //     // }
            // }
        ]
    }
]);



const toggle = (event) => {
    menu.value.toggle(event);
};


</script>
