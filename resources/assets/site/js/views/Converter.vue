<template>
    <div class="converter">
        <div class="container">
            <div class="converter__wrapper">
                <ConverterBox @newCurrency="setNewCurrency"
                              @newValue="setNewValue"
                              :currencies="currencies"
                              :box="items.leftBox"/>
                <ConverterAction @swap="swapCurrencies"/>
                <ConverterBox @newCurrency="setNewCurrency"
                              @newValue="setNewValue"
                              :currencies="currencies"
                              :box="items.rightBox"/>
            </div>
        </div>
    </div>
</template>

<script>

import {mapGetters, mapActions} from 'vuex'
import ConverterBox from "./Componets/Converter/ConverterBox";
import ConverterAction from "./Componets/Converter/ConverterAction";

export default {
    name: "Converter",
    data: () => ({
            currentFixedCurrencyValue: null,
            currentFixedCurrencyNominal: null,
            items: {
                leftBox: {
                    Key: 'leftBox',
                    Type: 'only',
                    CharCode: 'RUS',
                    Name: 'Российский рубль',
                    Value: 1,
                },
                rightBox: {
                    Key: 'rightBox',
                    Type: 'select',
                    CharCode: 'USD',
                    Name: 'Американский доллар',
                    Value: 1
                }
            }
        }
    ),
    mounted() {
        this.getCurrencies()
    },
    beforeUpdate() {
        this.getDefaultCurrencies()
    },
    components: {ConverterBox, ConverterAction},
    methods: {
        ...mapActions(['getCurrencies']),
        setNewCurrency(params) {

            this.items[params.Key].Type = params.Type
            this.items[params.Key].CharCode = params.currency.CharCode
            this.items[params.Key].Name = params.currency.Name
            this.currentFixedCurrencyNominal =  params.currency.Nominal
            this.currentFixedCurrencyValue = params.currency.Value
            if(params.Key === 'rightBox'){
                this.items[params.Key].Value =  params.currency.Nominal
            }
            this.calculation(params.Key)
        },
        setNewValue(val, key) {
            this.items[key].Value = val
            this.calculation(key)
        },
        getDefaultCurrencies() {
            Object.keys(this.currencies).forEach(currency => {
                if (this.currencies[currency].CharCode === this.items.rightBox.CharCode) {
                    this.items.rightBox.Value = this.currentFixedCurrencyNominal = this.currencies[currency].Nominal
                    this.items.leftBox.Value = this.currencies[currency].Value
                    this.currentFixedCurrencyValue = this.currencies[currency].Value
                    return true;
                }
            })
        },
        calculation(key) {
            let currency = null
            if (this.items[key].CharCode === 'RUS') {
                Object.keys(this.items).forEach(item => {
                    if (this.items[item].Type !== 'RUS') {
                        currency = this.items[item]
                    }
                })
                currency.Value = +(this.items[key].Value / this.currentFixedCurrencyValue).toFixed(4) * this.currentFixedCurrencyNominal
            } else {
                Object.keys(this.items).forEach(item => {
                    if (this.items[item].CharCode === 'RUS') {
                        currency = this.items[item]
                    }
                })
                if (this.items[key].Type === 'select') {
                    this.items[key].Value = +(currency.Value / this.currentFixedCurrencyValue).toFixed(4) * this.currentFixedCurrencyNominal
                } else {
                    currency.Value = +(this.items[key].Value * this.currentFixedCurrencyValue).toFixed(4) * this.currentFixedCurrencyNominal
                }
            }
        },
        swapCurrencies() {
            let leftBox = Object.assign({}, this.items.leftBox)
            let rightBox = Object.assign({}, this.items.rightBox)

            this.items.leftBox.CharCode = rightBox.CharCode
            this.items.leftBox.Name = rightBox.Name
            this.items.leftBox.Value = rightBox.Value

            this.items.rightBox.CharCode = leftBox.CharCode
            this.items.rightBox.Name = leftBox.Name
            this.items.rightBox.Value = leftBox.Value
        },
    },
    computed: {
        ...mapGetters(['currencies'])
    }
}
</script>
