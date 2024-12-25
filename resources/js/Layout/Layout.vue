<script setup>
import {
    HomeIcon,
    UsersIcon,
    InboxIcon,
    BuildingOfficeIcon,
} from "@heroicons/vue/24/solid";
</script>

<template>
    <div class="h-screen overflow-hidden">
        <div class="header">
            <div class="logo">Your logo</div>
            <div class="title">name or tittle of your app</div>
        </div>

        <div class="bg-gray-600 flex h-full">
            <div class="flex flex-col w-60 bg-[#2f365f]">
                <div
                    class="nav-item"
                    :class="{
                        'text-white': $page.component === 'Dashboard',
                    }"
                >
                    <HomeIcon class="h-5 w-5" />

                    <Link
                        :href="route('dashboard')"
                        class="nav-link"
                        preserve-scroll
                    >
                        Dashboard
                    </Link>
                </div>

                <div
                    class="nav-item"
                    :class="{
                        'text-white': $page.component === 'Organization',
                    }"
                >
                    <BuildingOfficeIcon class="h-5 w-5" />

                    <Link
                        :href="route('organization')"
                        class="nav-link"
                        preserve-scroll
                    >
                        Organizations
                    </Link>
                </div>
                <div
                    class="nav-item"
                    :class="{
                        'text-white': $page.component === 'Contracts',
                    }"
                >
                    <UsersIcon class="h-5 w-5" />

                    <Link
                        :href="route('contracts')"
                        class="nav-link"
                        preserve-scroll
                    >
                        Contracts
                    </Link>
                </div>
                <div
                    class="nav-item"
                    :class="{
                        'text-white': $page.component === 'Reports',
                    }"
                >
                    <InboxIcon class="h-5 w-5" />

                    <Link
                        :href="route('reports')"
                        class="nav-link"
                        preserve-scroll
                    >
                        Reposts
                    </Link>
                </div>
            </div>

            <main class="w-full h-full bg-[#f3f4f6] p-6">
                <slot />
            </main>
        </div>
    </div>
</template>
