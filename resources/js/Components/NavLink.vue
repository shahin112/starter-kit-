<script setup>
defineProps({
    routeName: String,
    componentName: String,
});
</script>

<template>
    <Link
        :href="route(routeName)"
        class="nav-link"
        :class="{ 'bg-slate-700': $page.component === componentName }"
        preserve-scroll
    >
        <slot></slot>
    </Link>
</template>
