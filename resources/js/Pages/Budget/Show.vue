<script >
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm, usePage} from '@inertiajs/inertia-vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import {ref} from "vue";

const props = defineProps({
	budget: Object,
});
export default defineComponent({
	setup(){
		const dialog = ref(false);


		const openImportDialog = () => this.dialog = true;
	}
})



</script>

<template>
	<Head title="Create budget"/>

	<AuthenticatedLayout>
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">Budget {{ budget?.name }}</h2>
		</template>

		<div class="py-4">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-right">
				<PrimaryButton v-on:click="openImportDialog()">IMPORT</PrimaryButton>
				<Link
					:href="route('budget.create')"
					class="inline-flex items-center px-4 py-2 pl-10 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
				>
					SHARE
				</Link>
			</div>
		</div>

		<div class="py-4">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
				<div class="p-4 sm:p-8 bg-white  shadow sm:rounded-lg">



				</div>
			</div>
		</div>

		<div v-if="dialog" id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
			<div class="relative w-full h-full max-w-2xl md:h-auto">
				<!-- Modal content -->
				<div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
					<!-- Modal header -->
					<div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
						<h3 class="text-xl font-semibold text-gray-900 dark:text-white">
							Terms of Service
						</h3>
						<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
							<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
							<span class="sr-only">Close modal</span>
						</button>
					</div>
					<!-- Modal body -->
					<div class="p-6 space-y-6">
						<p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
							With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
						</p>
						<p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
							The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
						</p>
					</div>
					<!-- Modal footer -->
					<div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
						<button data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
						<button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
					</div>
				</div>
			</div>
		</div>
	</AuthenticatedLayout>
</template>
