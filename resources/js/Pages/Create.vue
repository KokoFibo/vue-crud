<script setup>
// import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm } from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";

const form = useForm({
    name: "",
    email: "",
    password: "",
});
</script>

<template>
    <Head title="Create" />
    <Navbar />

    <div class="card w-96 bg-base-100 shadow-xl m-auto mt-10">
        <div class="card-body">
            <h2 class="card-title">Create User Data</h2>
            <form
                @submit.prevent="form.post('/store')"
                class="form-control"
                method="POST"
            >
                <input
                    type="text"
                    placeholder="Name"
                    name="name"
                    v-model="form.name"
                    class="input input-bordered w-full max-w-xs mt-3"
                />
                <span v-if="$page.props.errors.name" class="text-red-500">{{
                    $page.props.errors.name
                }}</span>
                <input
                    type="email"
                    placeholder="Email"
                    name="email"
                    v-model="form.email"
                    class="input input-bordered w-full max-w-xs mt-3"
                />
                <span v-if="$page.props.errors.email" class="text-red-500">{{
                    $page.props.errors.email
                }}</span>

                <input
                    type="password"
                    placeholder="Password"
                    name="password"
                    v-model="form.password"
                    class="input input-bordered w-full max-w-xs mt-3"
                />
                <span v-if="$page.props.errors.password" class="text-red-500">{{
                    $page.props.errors.password
                }}</span>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary mt-3" type="submit">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<style></style>
