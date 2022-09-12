export const actions = {
    async getCurrencies({commit}) {
        const url = `https://www.cbr-xml-daily.ru/daily_json.js?base=AUD`
        try {
            const res = await axios.get(url)
            console.log(res.data.Valute)
            commit('setCurrencies', res.data.Valute)

        } catch (e) {
            console.log(e.response)
        }
    }
}
