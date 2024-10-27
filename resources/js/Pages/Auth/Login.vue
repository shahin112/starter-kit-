<script setup>
import { useForm } from "@inertiajs/vue3";

import InputField from "../../Components/InputField.vue";

const form = useForm({
    email: "",
    password: "",
});

const login = () => {
    form.post(route("login"), {
        preserveScroll: true,
        onError: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="- Login" />

    <div class="flex items-center justify-center min-h-[calc(100vh-120px)]">
        <div class="w-1/2 p-5 bg-gray-300 rounded-md shadow-lg">
            <h1 class="text-center text-xl font-semibold mb-5">
                Login your account
            </h1>
            <form @submit.prevent="login">
                <InputField
                    label="email"
                    type="email"
                    :errorMessage="form.errors.email"
                    v-model="form.email"
                />
                <InputField
                    label="password"
                    type="password"
                    :errorMessage="form.errors.password"
                    v-model="form.password"
                />

                <div>
                    <p class="text-slate-600 mb-2">
                        Do not have an account
                        <a :href="route('register')" class="text-link">Register</a>
                    </p>
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="primary-btn w-full p-2 rounded bg-blue-500 text-white"
                    >
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
