<script setup>
import NavLink from "../Components/NavLink.vue";
</script>

<template>
    <header class="bg-slate-800 text-white">
        <nav
            class="py-4 px-2 mx-auto max-w-screen-lg flex items-center justify-between"
        >
            <div class="flex w-full justify-between items-center">
                <NavLink routeName="home" componentName="Home"> Home</NavLink>
                <NavLink routeName="register" componentName="Auth/Register">
                    Register</NavLink
                >
            </div>
        </nav>
    </header>

    <main class="p-6 mx-auto max-w-screen-lg">
        <slot />
    </main>
</template>
