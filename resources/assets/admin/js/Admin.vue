<template>
    <router-link :to="{name: 'admin.nav'}">Навигация</router-link>
    <router-link :to="{name: 'admin.news'}">Новости</router-link>
    <router-link :to="{name: 'admin.articles'}">Статьи</router-link>
    <router-link :to="{name: 'admin.catalog'}">Каталог</router-link>
    <router-link :to="{name: 'admin.products'}">Продукты</router-link>
    <router-view></router-view>
</template>

<script>
export default {
    name: "Admin"
}
</script>

<style scoped>

</style>
