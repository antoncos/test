<script lang="ts">

import RatesTable from "../components/RatesTable.vue";
import {Currency} from "../types/currency.js";
import {CurrenciesService} from "../service/CurrenciesService";

export default {
    components: {RatesTable},
    data() {
        return {
            currencies: null as Currency[] | null
        }
    },
    methods: {
        async getCurrencies() {
            if (!this.currencies) {
                this.currencies = await CurrenciesService.getRates();
            }
        }
    },
    mounted() {
        this.getCurrencies();
    }
}

</script>

<template>
    <h1 class="title">
        Курсы криптовалют
    </h1>
    <div id="content">
        <RatesTable :currencies="this.currencies"></RatesTable>
    </div>
</template>

<style scoped lang="less">


.title {
    color: #555;
    font-size: 1.2em;
    text-align: center;
    font-weight: 500;
    width: 100%;
    padding: 10px 0;

}


button {
    padding: 8px 16px;
    border: 0;
    border-radius: 5px;
    cursor: pointer;
    background: #1976d2;
    color: #FFF;
    text-transform: uppercase;
}

.p-paginator {
    justify-content: center !important;
}
</style>
