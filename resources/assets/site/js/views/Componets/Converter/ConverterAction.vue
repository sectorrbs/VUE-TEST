<template>
    <div class="converter__box-action" @click="this.$emit('swap')">
        <Fa :type="'s'"
            :name="'arrow-left converter__box-arrow'"/>
        <Fa :type="'s'"
            :name="'arrow-right converter__box-arrow'"/>
    </div>
</template>

<script>
export default {
    name: "ConverterAction"
}
</script>

