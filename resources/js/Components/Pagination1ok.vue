<template>
    <div class="mt-6">
        <template v-for="link in links" :key="link.id">
            <component
                :is="link.url ? 'inertia-link' : 'span'"
                class="px-1"
                :href="link.url"
                v-html="link.label"
                :class="{ 'text-gray-300': !link.url }"
            ></component>
        </template>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { Link as InertiaLink } from "@inertiajs/vue3";

export default defineComponent({
    props: {
        links: Array,
    },
    components: {
        InertiaLink,
    },
});
</script>
