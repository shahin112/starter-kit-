<script setup>
import { router, usePage } from "@inertiajs/vue3";
import PaginationLinks from "../Components/PaginationLinks.vue";
import { onMounted, ref, watch } from "vue";
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";
import { debounce } from "lodash";

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

const props = defineProps({
    users: Object,
    searchTerm: String,
    can: Object,
});

const search = ref(props.searchTerm);

watch(
    search,
    debounce(
        (e) =>
            router.get('/', { search: e }, { preserveState: true }),
        1000
    )
);

const getDate = (date) =>
    new Date(date).toLocaleDateString("en-us", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
</script>

<template>
    <Head :title="` - ${$page.component}`" />

    <div>
        <div class="flex justify-end mb-4">
            <div class="w-1/4">
                <input type="search" placeholder="Search" v-model="search" />
            </div>
        </div>

        <table>
            <thead>
                <tr class="bg-slate-300">
                    <th>Avatar</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Registration Date</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="user in users.data" :key="user.id">
                    <td>
                        <img
                            :src="
                                user.avatar
                                    ? 'storage/' + user.avatar
                                    : 'storage/avatar/default_profile.jpg'
                            "
                            class="avatar"
                        />
                    </td>
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ getDate(user.created_at) }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div>
            <PaginationLinks :paginator="users" />
        </div>
    </div>
</template>
