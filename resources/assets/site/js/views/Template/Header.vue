<template>
    <header class="header">
        <div class="container">
            <div class="header__inner">
                <router-link :to="{name: 'list'}" class="header__link">
                    Список валют
                </router-link>
                <router-link :to="{name: 'converter'}" class="header__link">
                    Конвертер валют
                </router-link>
            </div>
        </div>

    </header>
</template>

<script>

export default {
    name: "Header",
}
</script>

