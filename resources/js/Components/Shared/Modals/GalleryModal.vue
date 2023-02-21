<script setup>
import Modal from './Modal.vue';

const emit = defineEmits(['close']);

defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    maxWidth: {
        type: String,
        default: '2xl',
    },
    closeable: {
        type: Boolean,
        default: true,
    },
});

const close = () => {
    emit('close');
};
</script>

<template>
    <Modal
        :show="show"
        :max-width="maxWidth"
        :closeable="closeable"
        @close="close"
    >
        <div class="bg-black w-full bg-opacity-60  px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="">
                

                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                 

                    <div class="mt-2">
                        <slot name="content" />
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-row justify-end px-6 py-4 bg-black  bg-opacity-60  text-right">
            <slot name="footer" />
        </div>
    </Modal>
</template>
