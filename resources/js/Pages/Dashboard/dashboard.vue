<script setup>
import { usePage } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";

const notify = (message) => {
    toast(message, {
        theme: "auto",
        type: "success",
        position: "top-right",
        autoClose: 2000,
        transition: "slide",
        dangerouslyHTMLString: true,
    });
};

const page = usePage();

onMounted(() => {
    if (page.props.flash?.message) {
        notify(page.props.flash.message);
    }
});
</script>

<template>
    <!-- Flash message section -->
    <div v-if="page.props.flash.message" class="alert"></div>

    <Head title="dashboard" />
    <div>
        <h1>Dashboard</h1>
    </div>
</template>
