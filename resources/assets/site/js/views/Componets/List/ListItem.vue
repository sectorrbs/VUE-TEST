<template>
    <div class="converter__list" :id="itemCurrency.ID">
        <div class="converter__list-item converter__list-numcode item--numcode">
            {{ itemCurrency.NumCode }}
        </div>
        <div class="converter__list-item converter__list-charcode item--charcode">
            {{ itemCurrency.CharCode }}
        </div>
        <div class="converter__list-item converter__list-nominal item--nominal">
            {{ itemCurrency.Nominal }}
        </div>
        <div class="converter__list-item converter__list-name item--name">
            {{ itemCurrency.Name }}
        </div>
        <div class="converter__list-item converter__list-value item--value">
            {{ currentValue }}
            <span class="converter__list-previous">
                       ({{ changesValue }})
                        <Fa v-if="changesValue > 0" :type="'s'"
                            :name="'sort-up converter__list-arrow arrow--up'"/>
                        <Fa v-if="changesValue < 0" :type="'s'"
                            :name="'sort-down converter__list-arrow arrow--down'"/>
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: "ListItem",
    props: ['keyCurrency', 'itemCurrency', 'relationToRuble'],
    computed: {
        currentValue() {
            if (this.relationToRuble) {
                return (1 / this.itemCurrency.Value).toFixed(5)
            }
            return this.itemCurrency.Value
        },
        previousValue() {
            if (this.relationToRuble) {
                return (1 / this.itemCurrency.Previous).toFixed(5)
            }
            return this.itemCurrency.Previous
        },
        changesValue() {
            let value = (this.currentValue - this.previousValue).toFixed(5)
            if (value > 0) {
                return `+${value}`
            } else {
                return value
            }
        }
    }
}
</script>
