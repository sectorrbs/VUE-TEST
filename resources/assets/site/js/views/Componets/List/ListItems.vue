<template>
    <div class="converter__lists">
        <div class="converter__lists-bar">
            <ListFilter @search="setSearchValue" @newSearchParams="setNewSearchParams"/>
            <ListSwitcher @switch="switchRelation"/>
        </div>
        <ListHeaders/>
        <ListItem :itemCurrency="currency"
                  :keyCurrency="key"
                  :relationToRuble="relationToRuble"
                  v-for="(currency, key) in currenciesFiltered"
                  :key="key"/>
    </div>
</template>

<script>

import ListItem from './ListItem'
import ListHeaders from './ListHeaders'
import ListSwitcher from './ListSwitcher'
import ListFilter from './ListFilter'

export default {
    name: "ListItems",
    data: () => ({
        relationToRuble: false,
        searchParams: 'Name',
        searchValue: null
    }),
    mounted() {
        this.relationToRuble = JSON.parse(localStorage.getItem('relationToRuble'))
    },
    components: {ListItem, ListHeaders, ListSwitcher, ListFilter},
    props: {
        currencies: {
            type: Object, Array,
            default: null
        }
    },
    methods: {
        switchRelation() {
            this.relationToRuble = !this.relationToRuble
        },
        setNewSearchParams(params) {
            this.searchParams = params.label
            console.log(this.searchParams)
        },
        setSearchValue(value) {
            this.searchValue = value
        }
    },
    computed: {
        currenciesFiltered() {
            let filteredCurrencies = []
            if (this.searchValue) {
                Object.keys(this.currencies).forEach(el => {
                    if ((this.currencies[el][this.searchParams].toLowerCase())
                        .includes(this.searchValue.toLowerCase())) {
                        filteredCurrencies.push(this.currencies[el])
                    }
                })
                return filteredCurrencies
            } else {
                return this.currencies
            }
        }
    }
}
</script>

