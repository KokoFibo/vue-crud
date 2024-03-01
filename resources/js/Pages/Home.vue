<script setup>
// import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";
import { Link } from "@inertiajs/vue3";

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
                            <Link :href="route('create')"
                                ><button class="btn btn-secondary">
                                    Create
                                </button></Link
                            >
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id" class="hover">
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>
                            <Link :href="route('edit', user.id)"
                                ><button class="btn btn-warning">
                                    Edit
                                </button></Link
                            >
                            <!-- bisa pakai 'method=delete' lalu di route pake 'delete', atau -->
                            <!-- tanpa 'method=delete' tapi di route pake 'get' -->
                            <Link
                                :href="route('delete', user.id)"
                                method="delete"
                                ><button class="btn btn-error">
                                    Delete
                                </button></Link
                            >
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
