<script lang="ts">
import axios from 'axios';
import {Registration} from "../types/registration";
import auth from "../store/auth";
import router from "../router";
import Toast from "primevue/toast";
import {useToast} from "primevue/usetoast";

export default {
    components: {Toast},
    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            toast: useToast()
        };
    },
    methods: {
        async register() {
            const item: Registration = {
                name: this.name,
                email: this.email,
                password: this.password,
                password_confirmation: this.password_confirmation
            }
            if (await auth.register(item)) {
                this.toast.add({severity: 'success', detail: 'Успешная регистрация', life: 1000})
                await router.push('/')
            } else {
                this.toast.add({severity: 'error', detail: 'Неверные данные', life: 1000})
            }
        },
    },
};
</script>

<template>
    <Toast/>
    <h1 class="title">
        Регистрация
    </h1>
    <div id="content">
        <form @submit.prevent="register">
            <input v-model="name" type="text" placeholder="Name"/>
            <input v-model="email" type="email" placeholder="Email"/>
            <input v-model="password" type="password" placeholder="Password"/>
            <input v-model="password_confirmation" type="password" placeholder="Confirm Password"/>
            <button type="submit"><span>Зарегистрироваться</span></button>
        </form>
    </div>
</template>

<style scoped lang="less">
</style>
