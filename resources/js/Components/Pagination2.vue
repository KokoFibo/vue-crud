<template>
    <div class="mt-6">
        <template v-for="link in links">
            <Link
                class="px-1"
                v-if="link.url"
                :href="link.url"
                v-html="link.label"
            />
            <span
                :class="link.url ? '' : 'text-gray-300'"
                v-else
                v-html="link.label"
            ></span>
        </template>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
// import { Link as InertiaLink } from "@inertiajs/vue3";

const props = defineProps({
    links: Array,
});
</script>
