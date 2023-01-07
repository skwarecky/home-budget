<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
	<v-container full-width>
		<v-layout >
				<v-card >
					<v-toolbar color="primary" >
						<v-toolbar-title>Login</v-toolbar-title>
					</v-toolbar>
					<v-text-field label="Email" v-model="email"/>
					<v-text-field label="Password" v-model="password" />
					<v-footer>
						<div>
							<v-btn color="primary" v-on:click="login()">Login</v-btn>
							<p>I don't have account: <a>Register</a></p>
						</div>
					</v-footer>
				</v-card>
		</v-layout>
	</v-container>
</template>
