<script lang="ts">
import {defineComponent} from "vue";
import router from "../router";
import auth from "../store/auth";
import {useToast} from "primevue/usetoast";
import Toast from "primevue/toast";

export default defineComponent({
    components: {Toast},
    data() {
        return {
            email: '' as string,
            password: '' as string,
            toast: useToast()
        };
    },
    methods: {
        async login() {
            if (await auth.login(this.email, this.password)) {
                this.toast.add({severity: 'success', detail: 'Успешная авторизация', life: 1000})
                await router.push('/')
            } else {
                this.toast.add({severity: 'error', detail: 'Неверные данные', life: 1000})
            }
        }
    },
})
</script>

<template>
    <Toast/>
    <div>
        <h1 class="title">
            Авторизация
        </h1>
        <div id="content">
            <form @submit.prevent="login">
                <input v-model="email" type="email" placeholder="Email"/>
                <input v-model="password" type="password" placeholder="Password"/>
                <button type="submit"><span>Войти</span></button>
            </form>
        </div>
    </div>
</template>

<style scoped lang="less">

</style>
