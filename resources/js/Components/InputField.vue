<script setup>
const model = defineModel({
    type: null,
    required: true,
});

defineProps({
    label: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: "text",
    },
    errorMessage: String,
});
</script>

<template>
    <div class="mb-4">
        <label class="label">{{ label }}</label>

        <input
            :type="type"
            v-model="model"
            class="w-full p-2 border rounded outline-none"
            :class="{ '!ring-red-500': errorMessage }"
        />
        <small class="error" v-if="errorMessage">{{ errorMessage }}</small>
    </div>
</template>
