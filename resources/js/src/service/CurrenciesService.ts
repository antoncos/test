import axios from "axios";
import {Currency} from "../types/currency";

export const CurrenciesService = {
    async getRates(): Promise<Currency[]> {
        try {
            const response = await axios.get('/api/currencies')
            return response.data
        } catch (error) {
            console.error("Ошибка при получении данных:", error)
        }
        return [] as Currency[]
    }
}
