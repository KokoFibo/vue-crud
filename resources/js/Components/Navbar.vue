<script setup>
import { Link } from "@inertiajs/vue3";
import NavLink from "@/Components/NavLink.vue";
</script>

<template>
    <nav>
        <div class="bg-blue-500 h-10 w-full flex items-center justify-center">
            <ul class="flex gap-3 text-white">
                <li><Link :href="route('home')">Home</Link></li>
                <li><Link :href="route('about')">About us</Link></li>
                <li><Link :href="route('contact')">Contact</Link></li>
                <li>
                    <Link :href="route('logout')" method="post" as="button"
                        >Logout</Link
                    >
                </li>
            </ul>
        </div>
    </nav>
</template>
