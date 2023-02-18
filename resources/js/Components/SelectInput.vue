<script setup>
import {  ref } from 'vue';

defineProps(['modelValue', 'title', 'items']);

defineEmits(['update:modelValue']);

const input = ref(null);

</script>

<template>
	<select
			:value="modelValue"
			class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
		<option v-for="item of items" :key="item" value="item.id">
			{{ item.name }}
		</option>
	</select>
</template>
