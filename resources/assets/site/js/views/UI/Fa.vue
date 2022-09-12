<template>
    <i :class="['fa-'+name, 'fa'+type]"></i>
</template>

<script>
export default {
    name: "Fa",
    props: {
        name: {
            type: String
        },
        type: {
            type: String
        }
    }
}
</script>

<style scoped>

</style>
