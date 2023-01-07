<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import {Link, useForm} from '@inertiajs/inertia-vue3';

const theme = ref('light')

function onClick () {
	theme.value = theme.value === 'light' ? 'dark' : 'light'
}

const form = useForm({});

function logout(){
	this.form.post(route('logout'));
}
</script>

<template>
    <div>
		<v-app :theme="theme">
			<v-app-bar :elevation="2">
				<ApplicationLogo height="60px" class="ml-3 mr-3"/>
				<v-app-bar-title>Home budget</v-app-bar-title>

					<Link :href="route('dashboard')">
						<v-btn variant="flat">
							Dashboard
						</v-btn>
					</Link>
					<Link :href="route('profile.edit')">
						<v-btn variant="flat">
							Profile
						</v-btn>
					</Link>
				<Link  @click="logout()">
					<v-btn variant="flat">
						Wyloguj
					</v-btn>
				</Link>
				<v-spacer></v-spacer>

				<v-btn
					:prepend-icon="theme === 'light' ? 'mdi-weather-sunny' : 'mdi-weather-night'"
					@click="onClick"
				>Toggle Theme</v-btn>
			</v-app-bar>

        	<!-- Page Content -->
			<v-main>
				<v-container>
					<slot></slot>
				</v-container>
			</v-main>
		</v-app>
    </div>
</template>
