import {createStore} from 'vuex'
import Currencies from './modules/currencies/index'

const store = createStore({
    modules: {
        Currencies
    }
})

export default store
