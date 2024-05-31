import {Currency} from "../types/currency";
import axios from "axios";

export const UserService = {
    async current(): Promise<Currency[]> {
        try {
            const response = await axios.get('/api/user')
            return response.data
        } catch (error) {
            console.error("Ошибка при получении данных:", error)
        }
        return [] as Currency[]
    }
}
