<script setup>
import { useForm } from "@inertiajs/vue3";

import InputField from "../../Components/InputField.vue";

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
    avatar: null,
    previews: null,
});

const change = (event) => {
    form.avatar = event.target.files[0];
    form.previews = URL.createObjectURL(event.target.files[0]);
};

const register = () => {
    form.post(route("register"), {
        preserveScroll: true,
        onError: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="- Register" />

    <div class="flex items-center justify-center min-h-[calc(100vh-120px)]">
        <div class="w-1/2 p-5 bg-gray-300 rounded-md shadow-lg">
            <h1 class="text-center text-xl font-semibold mb-5">
                Register a new account
            </h1>
            <form @submit.prevent="register">
                <div class="grid place-items-center">
                    <div
                        class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-400"
                    >
                        <label
                            for="avatar"
                            class="absolute inset-0 grid content-center cursor-pointer"
                        >
                            <img
                                :src="
                                    form.previews
                                        ? form.previews
                                        : 'storage/avatar/default_profile.jpg'
                                "
                                class="object-cover w-28 h-28"
                                alt="Profile Image"
                            />
                        </label>
                        <input type="file" id="avatar" @input="change" hidden />
                    </div>
                    <small>{{ form.errors.avatar }}</small>
                </div>

                <InputField
                    label="name"
                    :errorMessage="form.errors.name"
                    v-model="form.name"
                />
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
                <InputField
                    label="password confirmation"
                    type="password"
                    v-model="form.password_confirmation"
                />

                <div>
                    <p class="text-slate-600 mb-2">
                        Already have an account?
                        <a :href="route('login')" class="text-link">Login</a>
                    </p>
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="primary-btn w-full p-2 rounded bg-blue-500 text-white"
                    >
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>
