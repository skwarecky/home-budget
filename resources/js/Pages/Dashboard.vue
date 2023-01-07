<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
	budgets: Array,
});

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
		<v-row>
			<v-col class="text-right">
				<Link :href="route('budget.create')">
					Create budget
				</Link>
			</v-col>
		</v-row>
		<v-row>
			<v-col cols="4" v-for="budget of budgets">
				<v-card
					class="mx-auto"
				>
					<v-card-text>
						<div>{{  budget.name_short }}</div>
						<p class="text-h5 text--primary">
							{{  budget.name }}
						</p>
						<div class="text--primary">
							budget details
						</div>
					</v-card-text>
					<v-card-actions >
						<v-btn
							variant="text"
							color="teal-accent-4"
						>
							Edit
						</v-btn>
						<v-btn
							variant="text"
							color="teal-accent-4"
						>
							Share
						</v-btn>
					</v-card-actions>
				</v-card>


			</v-col>

		</v-row>

    </AuthenticatedLayout>
</template>
