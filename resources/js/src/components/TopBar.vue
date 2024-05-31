<script lang="ts">
import {defineComponent} from 'vue';
import router from "../router";
import auth from "../store/auth";

export default defineComponent({
    name: "TopBar",
    props: {
        isAuthenticated: {
            type: Boolean,
            required: true,
        },
        username: {
            type: String,
            default: ''
        }
    },
    methods: {
        router() {
            return router
        },
        async logout() {
            try {
                await auth.logout()
            } catch (error) {
                console.error(error)
            }
        }
    }
})
</script>

<template>
    <div id="topbar">
        <div class="logo" @click="router().push('/')">
        </div>
        <div class="user">
            <div v-if="!isAuthenticated">
                <nav>
                    <router-link to="/login">Войти</router-link>
                    <router-link to="/register">Регистрация</router-link>
                </nav>
            </div>
            <div v-else>
                {{ username }} <a href="#" @click="logout">Выйти</a>
            </div>
        </div>
    </div>
</template>

<style scoped lang="less">
#topbar {
    display: flex;
    justify-content: space-between;
    padding: 20px;
    align-items: center;
}

.logo{
    width: 50px;
    height: 50px;
    background: url('../assets/logo.svg') no-repeat;
    background-size: contain;
    cursor: pointer;
}
</style>
