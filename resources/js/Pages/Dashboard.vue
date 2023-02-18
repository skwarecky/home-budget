<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, Link} from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia'

const props = defineProps({
	budgets: Array,
});

const showBudget = (id) => Inertia.visit(route('budget.show', {id: id}))

</script>

<template>
	<Head title="Dashboard"/>

	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Dashboard
			</h2>
		</template>

		<div class="py-4">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-right">
					<Link
						:href="route('budget.create')"
						class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
					>
						CREATE BUDGET
					</Link>
			</div>
		</div>

		<div class="py-4">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div class="grid grid-cols-3 gap-4">
					<div class="px-6 py-4 bg-white" v-for="budget of budgets" v-on:click="showBudget(budget.id)">
						<div class="font-bold text-xl mb-2">
							{{ budget.name_short }}
						</div>
						<p class="text-gray-700 text-base">
							{{ budget.name }}
						</p>
						<!-- TODO calculate balance of budget in scale of current month -->
						<p class="text-gray-700 text-right text-xl">
							1235 PLN
						</p>
					</div>
				</div>
			</div>
		</div>

	</AuthenticatedLayout>
</template>
