<template>
    <nav v-if="pagination.total > 30" aria-label="Page navigation example">
        <ul class="pagination">
            <li>
                <a v-if="pagination.prevPage" class="pagination__link" href="#"
                   @click.prevent="switchingFilms(pagination.prevPage)">
                    Назад
                </a>
            </li>
            <li class="pagination__item" v-for="link in pagination.links">
                <a class="pagination__link"
                   :class="{'active': pagination.currentPage === +link.label}"
                   href="#"
                   @click.prevent="switchingFilms(link.url)">
                    {{ link.label }}
                </a>
            </li>
            <li>
                <a v-if="pagination.nextPage" class="pagination__link" href="#"
                   @click.prevent="switchingFilms(pagination.nextPage)">
                    Вперед
                </a>
            </li>
        </ul>
    </nav>
</template>

<script>

import {mapGetters, mapActions} from 'vuex'

export default {
    name: "Pagination",
    data() {
        return {}
    },
    methods: {
        switchingFilms(url) {
            if (localStorage.getItem('filter')) {
                let filter = JSON.parse(localStorage.getItem('filter'))
                Object.keys(filter).forEach(el => {
                    if (filter[el].length) {
                        url = url + `&${el}=${filter[el].toString()}`
                    }
                })
            }
            this.getFilms({newUrl: url})
        },
        ...mapActions(['getFilms']),
    },
    computed: {
        ...mapGetters(['pagination'])
    },
}
</script>

<style scoped>

</style>
