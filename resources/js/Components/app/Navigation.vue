<template>
    <nav class="min-w-[200px]">
        <div class="h-[80px] px-3 flex items-center gap-3">
        <Link href="/">
            <ApplicationLogo
                class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
            />
        </Link>
            LaraStorage
        </div>
        <div class="px-3">
            <CreateNewDropdown />
            <div class="py3">
                <NavLink href="">My files</NavLink>
                <NavLink href="">My files</NavLink>
                <NavLink href="">My files</NavLink>
            </div>
        </div>

    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
import ApplicationLogo from '../ApplicationLogo.vue';
import CreateNewDropdown from './CreateNewDropdown.vue';
import NavLink from '../NavLink.vue';
</script>

<style>

</style>
