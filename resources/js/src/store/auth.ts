import {reactive} from 'vue'
import axios from "axios";
import {Registration} from "../types/registration";

interface AuthState {
    isAuthenticated: boolean
    username: string
}

const state = reactive<AuthState>({
    isAuthenticated: false,
    username: ''
})

const login = async (login: string, password: string) => {
    try {
        const response = await axios.post('/api/auth/login', {
            email: login,
            password: password,
        });
        if (response.status === 200) {
            state.isAuthenticated = true
            state.username = response.data.name
            return true
        }
    }catch (error){
        console.error(error)
    }
    return false
}

const logout = async () => {
    const response = await axios.delete('/api/auth/logout');
    if (response.status === 200) {
        state.isAuthenticated = false
        state.username = ''
    }
}

const register = async (data: Registration): Promise<boolean> => {
    try {
        const response = await axios.post('/api/auth/register', {
            name: data.name,
            email: data.email,
            password: data.password,
            password_confirmation: data.password_confirmation,
        });
        state.isAuthenticated = true
        state.username = response.data.name
        console.log(response.data);
        return true
    } catch (error) {
        console.error(error);
    }
    return false
}

export default {
    state,
    login,
    logout,
    register
}
