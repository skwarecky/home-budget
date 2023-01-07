<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm, usePage} from '@inertiajs/inertia-vue3';
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import SelectInput from "@/Components/SelectInput.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps({
	types: Array,
});

const form = useForm({
	name_short: '',
	name: '',
	type_id: null,
});



</script>

<template>
	<Head title="Create budget"/>

	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Create budget</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
				<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">


					<form @submit.prevent="form.post(route('budget.store'))" class="mt-6 space-y-6">
						<div>
							<InputLabel for="name" value="Code" />

							<TextInput
								id="name"
								type="text"
								class="mt-1 block w-full"
								v-model="form.name_short"
								required
								autofocus
								autocomplete="name"
							/>

							<InputError class="mt-2" :message="form.errors.name_short" />
						</div>

						<div>
							<InputLabel for="name" value="Name" />

							<TextInput
								id="name"
								type="text"
								class="mt-1 block w-full"
								v-model="form.name"
								required
								autofocus
								autocomplete="name"
							/>

							<InputError class="mt-2" :message="form.errors.name" />
						</div>

						<div>
							<InputLabel for="name" value="Type" />

							<SelectInput
								id="name"
								type="text"
								class="mt-1 block w-full"
								v-model="form.type_id"
								:items="types"
								required
								autofocus
								autocomplete="name"
							/>

							<InputError class="mt-2" :message="form.errors.type_id" />
						</div>
						<div class="flex items-center gap-4">
							<PrimaryButton :disabled="form.processing">Save</PrimaryButton>
						</div>

					</form>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>
