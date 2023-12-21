<template>
    <fwb-navbar>
        <template #logo>
            <fwb-navbar-logo alt="Time Master Logo"
                image-url="https://seeklogo.com/images/U/universite-cadi-ayyad-marrakech-maroc-logo-CCE5BB11B1-seeklogo.com.png"
                link="#">
                Time-Master
            </fwb-navbar-logo>
        </template>
        <template #default="{ isShowMenu }">
            <fwb-navbar-collapse :is-show-menu="isShowMenu">
                <fwb-navbar-link is-active link="#">
                    Home
                </fwb-navbar-link>
                <fwb-navbar-link link="#">
                    Services
                </fwb-navbar-link>
                <fwb-navbar-link link="#">
                    Contact
                </fwb-navbar-link>
            </fwb-navbar-collapse>
        </template>
        <template #right-side>
            <fwb-button @click="showModal">
                Get started
            </fwb-button>
        </template>
    </fwb-navbar>
    <Signinmodal :showModal="isShowModal" />
</template>

<script setup>
import {
    FwbButton,
    FwbNavbar,
    FwbNavbarCollapse,
    FwbNavbarLink,
    FwbNavbarLogo,
} from 'flowbite-vue'
import Signinmodal from './SigninModal.vue'
import { ref } from 'vue'

const isShowModal = ref(false);

function showModal() {
    isShowModal.value = !isShowModal.value;
}


</script>
