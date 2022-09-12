<template>
    <div class="converter__list-switchers">
         <span class="switcher__title">
        Отношение к 1 RUB
         </span>
        <div class="converter__list-switcher"
             :class="{disabled}"
             @click="switchSetting">
            <span class="switcher switcher--red">Выкл</span>
            <span class="switcher switcher--green">Вкл</span>
        </div>
    </div>
</template>

<script>
export default {
    name: "ListSwitcher",
    data: () => ({
        disabled: true
    }),
    mounted() {
        this.disabled = JSON.parse(localStorage.getItem('relationToRuble'))
    },
    methods: {
        switchSetting() {
            this.disabled = !this.disabled
            console.log(this.disabled)
            localStorage.setItem('relationToRuble', JSON.stringify(this.disabled))
            this.$emit('switch')
        }
    },
}
</script>
