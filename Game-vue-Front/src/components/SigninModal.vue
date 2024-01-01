<template>
    <!-- <fwb-button @click="showModal">
        Open modal
    </fwb-button> -->

    <fwb-modal size="5xl" v-if="internalShowModal" @close="closeModal">
        <!-- <template #header>
            <div class="flex items-center text-lg">
                Terms of Service
            </div>
        </template> -->
        <template #body>
            <Transition name="modal">
                <div class="modal-mask">
                    <div class="h-fit bg-white px-5 py-10 rounded-xl m-auto relative" style=" transition: all 0.3s ease;">

                        <!-- Left column container with background-->
                        <div class="g-6 flex h-full flex-wrap items-center justify-center lg:justify-evenly">
                            <div class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
                                <img v-if="isLoginMode" src="../assets/imgs/Login-cuate.png" class="w-96"
                                    alt="Sample image" />
                                <img v-else src="../assets/imgs/Sign up-bro.svg" class="w-96" alt="Sample image" />
                            </div>

                            <!-- Right column container -->
                            <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
                                <h1 class="mb-1 text-3xl font-bold text-center text-[#97562D]">
                                    {{ isLoginMode ? 'Welcome Back!' : 'Unlock the Full Gaming Experience' }}

                                </h1>
                                <p class="text-[#9D9D9D] mb-4 font-normal text-base text-center leading-tight">
                                    {{ isLoginMode ? 'Log in to your account to continue.' : 'Join our gaming community to access exclusive features, level up your skills, and compete with top players.' }}

                                </p>
                                <form v-if="!isLoginMode" @submit.prevent="validateAndRegisterUser">
                                    <input type="text" v-model="name"
                                        class="bg-[#F5F5F5] block border border-[#F3E4DB] w-full p-3 rounded-lg placeholder:text-[#C0BEBE] mb-4"
                                        name="fullname" placeholder="Entrer votre nom complet" />

                                    <input type="text" v-model="email"
                                        class="bg-[#F5F5F5] block border border-[#F3E4DB] w-full p-3 rounded-lg placeholder:text-[#C0BEBE] mb-4"
                                        name="email" placeholder="Entrer votre email" />

                                    <input type="password" v-model="password"
                                        class="bg-[#F5F5F5] block border border-[#F3E4DB] w-full p-3 rounded-lg placeholder:text-[#C0BEBE] mb-4"
                                        name="password" placeholder="Entrer votre mot de passe" />
                                    <div v-if="visible" class="flex items-center justify-center w-full">
                                        <fwb-spinner color="green" size="10" />
                                    </div>



                                    <button v-if="!visible" type="submit"
                                        class="w-full text-center py-3 rounded-lg bg-[#97562D] text-white text-xl font-bold  focus:outline-none my-1">S'inscrire</button>
                                </form>
                                <form v-else @submit.prevent="loginUser">
                                    <input type="text" v-model="email"
                                        class="bg-[#F5F5F5] block border border-[#F3E4DB] w-full p-3 rounded-lg placeholder:text-[#C0BEBE] mb-4"
                                        name="email" placeholder="Entrer votre email" />

                                    <input type="password" v-model="password"
                                        class="bg-[#F5F5F5] block border border-[#F3E4DB] w-full p-3 rounded-lg placeholder:text-[#C0BEBE] mb-4"
                                        name="password" placeholder="Entrer votre mot de passe" />
                                    <div v-if="visible" class="flex items-center justify-center w-full">
                                        <fwb-spinner color="green" size="10" />
                                    </div>



                                    <button v-if="!visible" type="submit"
                                        class="w-full text-center py-3 rounded-lg bg-[#97562D] text-white text-xl font-bold  focus:outline-none my-1">S'inscrire</button>
                                </form>



                                <p class="text-center text-[#9D9D9D] text-sm font-normal">
                                    {{ isLoginMode ? "Nouveau sur le site?" : "Vous avez déjà un compte?" }}
                                    <button @click="toggleMode"
                                        class="text-[#97562D] underline underline-offset-2">
                                        {{ isLoginMode ? 'Inscrivez-vous ici' : 'Connectez-vous ici' }}
                                    </button>
                                </p>


                            </div>


                        </div>
                        <div class="dialog-overlay" v-if="errors">
                            <div class="dialog-container bg-white flex  flex-col items-center justify-center gap-2">
                                <p class="text-red-500 text-lg">{{ msg }}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </Transition>
        </template>
        <!-- <template #footer>
            <div class="flex justify-between">
                <fwb-button @click="closeModal" color="alternative">
                    Decline
                </fwb-button>
                <fwb-button @click="closeModal" color="green">
                    I accept
                </fwb-button>
            </div>
        </template> -->
    </fwb-modal>
</template>

<script lang="ts" setup>
import { ref, defineProps, watch } from 'vue'
import { FwbModal } from 'flowbite-vue'
import UserService from '../data/Userservice';
import { FwbSpinner } from 'flowbite-vue'
import { useRouter } from 'vue-router';




const props = defineProps(['showModal']);
const internalShowModal = ref(false);
const msg = ref('');
const visible = ref(false);
const errors = ref(false);
const isLoginMode = ref(false);
const router = useRouter();



var name = "";
var password = "";
var email = "";

function closeModal() {
    internalShowModal.value = false;
    errors.value = visible.value = false
}

function toggleMode() {
    isLoginMode.value = !isLoginMode.value;
    msg.value = ''; // Clear previous error message
}

async function loginUser() {
    visible.value = true;
    if (!password || !email) {
        msg.value = "Please fill in all fields.";
        errors.value = true;
        visible.value = false;
        return;
    }

    // Clear previous error message
    errors.value = false;
    msg.value = "";

    try {
        const response = await UserService.loginUser({ password, email });

        if (!response.status) {
            // Display error message
            errors.value = true;
            msg.value = response.message || "Failed to log in.";
            visible.value = false;
        } else {
            // Login successful
            const { auth_token, user } = response;


            localStorage.setItem('authToken', response.user.auth_token);

            localStorage.setItem('userData', JSON.stringify(user));
            // Reset form fields
            name = password = email = "";
            router.push({ path: '/Game' });


            // Close the modal
            closeModal();


            // Optionally, emit an event to inform the parent component about the successful login
            // $emit('user-logged-in', user);
        }
    } catch (error) {
        console.error("Error logging in:", error);
        msg.value = "An error occurred while logging in.";
        errors.value = true;
        visible.value = false;
    }
}


watch(() => props.showModal, (newValue) => {
    internalShowModal.value = newValue;
});


async function validateAndRegisterUser() {

    // Simple validation
    if (!name || !password || !email) {
        msg.value = "Please fill in all fields.";
        errors.value = true
        visible.value = false
        return;
    }

    // Clear previous error message
    errors.value = false;
    msg.value = "";


    // Call the user registration service
    const response = await UserService.registerUser({ name, password, email });

    if (!response.status) {
        // Display error message
        errors.value = true;

        msg.value = response.message || "Failed to register user.";
        visible.value = false


    } else {
        // Registration successful
        visible.value = false
        name = password = email = ''

        closeModal();

    }
}
</script>
