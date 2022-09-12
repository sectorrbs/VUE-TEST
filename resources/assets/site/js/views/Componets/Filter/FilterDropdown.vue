<template>
    <div class="filter__dropdown" ref="dropdown">
        <div class="filter__dropdown-select"
             @click.stop="activateDropDown">
            {{ select }}
            <Fa :type="'s'"
                :name="'chevron-down filter__dropdown-arrow'"/>
        </div>
        <div class="filter__dropdown-items">
            <div class="filter__dropdown-item"
                 v-for="filter in items"
                 @click="selectNewItem"
                 :key="filter.label">
                {{ filter.title }}
            </div>
        </div>
    </div>
</template>

<script>

import {dropdownMixin} from "../../../mixins/dropdownMixin";

export default {
    name: "ListFilterDropdown",
    props: {
        filters: {
            type: Array,
            default: null,
        }
    },
    mounted() {
        this.select = this.filters[0].title
    },
    methods: {
        selectNewItem(e) {
            this.select = e.target.innerHTML
            this.dropdownHide()
            this.$emit('newFilterSearchParams', this.select)
        },
    },
    computed: {
        items() {
            return this.filters.filter(el => el.title !== this.select)
        }
    },
    mixins: [dropdownMixin]
}
</script>

