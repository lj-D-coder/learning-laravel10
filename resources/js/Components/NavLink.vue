<script setup>
import { computed } from "vue";
import { Link } from "@inertiajs/vue3";

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
        ? "flex items-center px-5 py-2 rounded-lg border-indigo-400 dark:border-indigo-600 text-sm font-medium leading-5 text-indigo-700 bg-pink-200 dark:text-indigo-700 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out"
        : "flex items-center px-5 py-2 rounded-lg border-transparent text-sm font-medium leading-5 text-gray-700 dark:text-gray-700 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none focus:text-gray-700 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-gray-700 transition duration-150 ease-in-out"
);
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
