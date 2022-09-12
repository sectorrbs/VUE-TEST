<template>
    <div class="container">
        <ListItems :currencies="currencies"/>
    </div>
</template>

<script>

import {mapGetters, mapActions} from 'vuex'
import ListItems from './Componets/List/ListItems'

export default {
    name: "List",
    components: {ListItems},
    mounted() {
        this.getCurrencies()
        if (localStorage.getItem('relationToRuble') === undefined) {
            localStorage.setItem('relationToRuble', JSON.stringify('true'))
        }
    },
    methods: {
        ...mapActions(['getCurrencies'])
    },
    computed: {
        ...mapGetters(['currencies'])
    }
}

</script>

