<script setup>
import { Link } from '@inertiajs/vue3';
import {computed} from "vue";

const props = defineProps({
    href: {
        type: String,
        required: true,
    },
    active: {
        type: Boolean,
    },
});

const classes = computed(() =>
    props.active
        ? 'block w-full px-4 py-2 text-start text-sm leading-5 text-indigo-700 bg-indigo-50 transition duration-150 ease-in-out focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 hover:text-indigo-800 hover:bg-indigo-100'
        : 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100 focus:bg-gray-100 focus:outline-none'
);
</script>

<template>
    <Link
        :href="href"
        :class="classes"
    >
        <slot />
    </Link>
</template>
