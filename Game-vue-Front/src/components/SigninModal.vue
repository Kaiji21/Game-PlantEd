<template>
    <!-- <fwb-button @click="showModal">
        Open modal
    </fwb-button> -->

    <fwb-modal v-if="internalShowModal" @close="closeModal">
        <template #header>
            <div class="flex items-center text-lg">
                Terms of Service
            </div>
        </template>
        <template #body>
            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                With less than a month to go before the European Union enacts new consumer privacy laws for its citizens,
                companies around the world are updating their terms of service agreements to comply.
            </p>
            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant
                to ensure a common set of data rights in the European Union. It requires organizations to notify users as
                soon as possible of high-risk data breaches that could personally affect them.
            </p>
        </template>
        <template #footer>
            <div class="flex justify-between">
                <fwb-button @click="closeModal" color="alternative">
                    Decline
                </fwb-button>
                <fwb-button @click="closeModal" color="green">
                    I accept
                </fwb-button>
            </div>
        </template>
    </fwb-modal>
</template>

<script lang="ts" setup>
import { ref,defineProps,watch  } from 'vue'
import { FwbButton, FwbModal } from 'flowbite-vue'

const props = defineProps(['showModal']);
const internalShowModal = ref(false);

function closeModal() {
  internalShowModal.value = false;
}

watch(() => props.showModal, (newValue) => {
  internalShowModal.value = newValue;
});
</script>
