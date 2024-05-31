<script lang="ts">
import {Currency} from "../types/currency";
import {defineComponent, PropType, ref} from "vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import Paginator from "primevue/paginator";
import {FilterMatchMode} from "primevue/api";
import IconField from "primevue/iconfield";
import InputText from "primevue/inputtext";

export default defineComponent({
    name: "RatesTable",
    components: {DataTable, Column, Paginator, IconField, InputText},
    props: {
        currencies: {
            type: Array as PropType<Currency[]>,
            required: true
        }
    },
    data() {
        return {
            filters: ref({
                global: {value: null, matchMode: FilterMatchMode.CONTAINS},
                code: {value: null, matchMode: FilterMatchMode.CONTAINS},
                name: {value: null, matchMode: FilterMatchMode.CONTAINS}
            }),
        }
    },
})
</script>

<template>
    <div>
        <DataTable v-model:filters="filters" :value="currencies" paginator :rows="20" :rowsPerPageOptions="[10, 20, 50]"
                   :globalFilterFields="['code', 'name']" filterDisplay="row">
            <Column field="code" header="Код" sortable style="font-weight: bold;">
                <template #body="{ data }">
                    {{ data.code }}
                </template>
                <template #filter="{ filterModel, filterCallback }">
                    <InputText v-model="filterModel.value" @input="filterCallback()" type="text" class="p-column-filter" placeholder="Поиск..." />
                </template>
            </Column>
            <Column field="name" header="Название" sortable>
                <template #body="{ data }">
                        <span>{{ data.name }}</span>
                </template>
                <template #filter="{ filterModel, filterCallback }">
                    <InputText v-model="filterModel.value" type="text" @input="filterCallback()" class="p-column-filter" placeholder="Поиск..." />
                </template>
            </Column>
            <Column field="price" header="Price" sortable>
                <template #body="item">
                    ${{ item.data.price }}
                </template>
            </Column>
        </DataTable>
    </div>
</template>

<style scoped lang="less">


table {
    font-family: Roboto, Serif;
    padding: 0;
    margin: 0;
    border-spacing: 0;
    width: 100%;

    thead {
        position: sticky;
        top: 0px;
    }

    tbody {
        margin-top: 40px
    }

    tr {

        th {
            padding: 10px;
            text-align: left;
            background: #2d3748;
            color: #FFF;
        }

        td {
            padding: 5px;
            border-bottom: 1px solid #eee;
        }

        &:hover {
            background: #eee;
        }
    }
}
</style>
