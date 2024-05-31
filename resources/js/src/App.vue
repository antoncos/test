<script lang="ts">
import {defineComponent, onMounted} from "vue";
import TopBar from "./components/TopBar.vue";
import auth from "./store/auth";
import {useToast} from "primevue/usetoast";
import Toast from "primevue/toast";

export default defineComponent({
    components: {TopBar, Toast},
    data(vm) {
        return {
            toast: useToast()
        }
    },
    setup() {
        return {
            auth
        };
    }
});
</script>

<template>
    <Toast />
    <div id="container">
        <TopBar :isAuthenticated="auth.state.isAuthenticated" :username="auth.state.username"></TopBar>
        <div id="wrapper">
            <router-view></router-view>
        </div>
    </div>
</template>

<style scoped lang="less">
</style>
