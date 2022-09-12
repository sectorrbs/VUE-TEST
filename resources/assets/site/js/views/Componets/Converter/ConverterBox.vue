<template>
    <div class="converter__box" ref="dropdown" :data-key="box.Key" :data-type="box.Type">
        <div class="converter__box-title"
             @click.stop="activateDropDown"
             :class="{opened: box.CharCode !== 'RUS'}">
            {{ box.Name }}
            <Fa :type="'s'"
                :name="'chevron-down converter__box-icon'"/>
            <div class="converter__box-currencies" v-if="box.CharCode !== 'RUS'">
                <ConverterCurrency :currency="currency"
                                   @click.stop="selectNewItem(currency)"
                                   v-for="currency in currencies"
                                   :key="currency.NumCode"/>
            </div>
        </div>
        <input type="number"
               :readonly="isSelect"
               :class="{disabled: isSelect}"
               @input="updateInput"
               class="converter__box-input"
               :value="box.Value">
    </div>
</template>

<script>

import ConverterCurrency from "./ConverterCurrency";
import {dropdownMixin} from "../../../mixins/dropdownMixin";

export default {
    name: "ConverterBox",
    data: () => ({
        selectCountry: null
    }),
    props: {
        box: {
            type: Object,
            default: null
        },
        currencies: {
            type: Object,
            default: null
        },
    },
    components: {ConverterCurrency},
    methods: {
        selectNewItem(currency) {
            this.dropdownHide()
            let params = {
                currency,
                Type: this.$refs.dropdown.dataset.type,
                Key: this.$refs.dropdown.dataset.key,
            }
            this.$emit('newCurrency', params)
        },
        updateInput(e) {
            this.$emit('newValue', e.target.value, this.box.Key)
        }
    },
    computed: {
        isSelect() {
            return this.box.Type === 'select'
        },
    },
    mixins: [dropdownMixin],
}
</script>
