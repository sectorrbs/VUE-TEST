<template>
    <div class="converter__box-currency">
        {{ currency.Name }}
    </div>
</template>

<script>
export default {
    name: "ConverterCurrency",
    props: {
        currency: {
            type: Object,
            default: null
        }
    }
}
</script>

