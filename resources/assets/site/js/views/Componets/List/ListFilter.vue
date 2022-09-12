<template>
    <div class="converter__list-filter filter">
        <FilterDropdown :filters="filters" @newFilterSearchParams="newFilterSearchParams"/>
        <input type="text"
               @input="searchCurrencies"
               v-model="value"
               class="filter__input"
               placeholder="Введите слова...">
    </div>
</template>

<script>

import FilterDropdown from "../Filter/FilterDropdown";

export default {
    name: "ListFilter",
    data: () => ({
        value: null,
        filters:
            [
                {
                    label: 'Name',
                    title: 'Название валюты'
                },
                {
                    label: 'NumCode',
                    title: 'Цифровой код валюты'
                },
                {
                    label: 'CharCode',
                    title: 'Буквенный код валюты'
                },
            ]
    }),
    components: {FilterDropdown},
    methods: {
        searchCurrencies(e) {
            this.value = e.target.value
            this.$emit('search', this.value)
        },
        newFilterSearchParams(item) {
            let params = this.filters.find(el => el.title === item)
            this.$emit('newSearchParams', params)
            this.value = ''
        }
    }
}
</script>

