<template>
    <Header/>
    <router-view></router-view>
</template>

<script>

import Header from './views/Template/Header'

export default {
    name: "App",
    components: {
        Header
    }
}
</script>

