<template>
    <div class="mt-6">
        <template v-for="link in links" :key="link.id">
            <component
                :is="link.url ? 'InertiaLink' : 'span'"
                class="px-1"
                :href="link.url"
                v-html="link.label"
                :class="{ 'text-gray-300': !link.url }"
            ></component>
        </template>
    </div>
</template>

<script setup>
// import { Link } from "@inertiajs/vue3";
import { Link as InertiaLink } from "@inertiajs/vue3";

defineProps({
    links: Array,
});
</script>
