<script setup>
// import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";
import { Link } from "@inertiajs/vue3";
import Pagination1 from "@/Components/Pagination1.vue";

defineProps({
    name: String,
    users: Object,
});
</script>

<template>
    <Head title="Home" />
    <Navbar />
    <h1 class="text-3xl text-green-500">Home</h1>
    <h1 class="text-3xl text-green-500">Welcome {{ name }}</h1>
    <div class="max-w-7xl m-auto">
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>
                            <Link :href="route('home.create')"
                                ><button class="btn btn-secondary">
                                    Create
                                </button></Link
                            >
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users.data" :key="user.id" class="hover">
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                            <Link :href="route('home.edit', user.id)"
                                ><button class="btn btn-warning">
                                    Edit
                                </button></Link
                            >
                            <!-- bisa pakai 'method=delete' lalu di route pake 'delete', atau -->
                            <!-- tanpa 'method=delete' tapi di route pake 'get' -->
                            <!-- Tambahkan except('show') di web route resource -->
                            <Link
                                :href="route('home.destroy', user.id)"
                                method="DELETE"
                                ><button class="btn btn-error">
                                    Delete
                                </button></Link
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- <Pagination1 class="mt-6" :links="users.links" /> -->
            <!-- Paginator -->
            <div class="mt-6">
                <template v-for="link in users.links">
                    <Link
                        :class="
                            link.active
                                ? 'px-1 font-semibold bg-gray-700 text-white rounded'
                                : 'px-1'
                        "
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
                <!-- <div> -->
                <p>
                    Showing page {{ users.current_page }} of
                    {{ users.last_page }}
                </p>
                <p>
                    Data {{ users.from }} to {{ users.to }} of
                    {{ users.total }}
                </p>
                <!-- </div> -->
            </div>

            <!-- <div class="mt-6">
                <template>
                    <Component
                        :is="link.url ? 'Link' : 'span'"
                        v-for="link in users.links"
                        :href="link.url"
                        v-html="link.label"
                    ></Component>
                </template>
            </div> -->
        </div>
    </div>
</template>
