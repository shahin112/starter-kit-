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

                <div
                    v-if="$page.props.auth.user"
                    class="flex items-center gap-2"
                >
                    <img
                        class="avatar"
                        :src="
                            $page.props.auth.user.avatar
                                ? 'storage/' + $page.props.auth.user.avatar
                                : 'storage/avatar/default_profile.jpg'
                        "
                        alt=""
                    />
                    <Link
                        
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="nav-link"
                        >Logout</Link
                    >
                </div>

                <div v-else class="flex gap-3">
                    <NavLink routeName="register" componentName="Auth/Register">
                        Register</NavLink
                    >
                    <NavLink routeName="login" componentName="Auth/Login">
                        Login</NavLink
                    >
                </div>
            </div>
        </nav>
    </header>

    <main class="p-6 mx-auto max-w-screen-lg">
        <slot />
    </main>
</template>
