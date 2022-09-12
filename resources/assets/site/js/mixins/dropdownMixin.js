export const dropdownMixin = {
    data: () => ({
        select: null,
    }),
    mounted() {
        window.addEventListener('click', e => {
            this.dropdownHide()
        })
    },
    methods: {
        activateDropDown(e) {
            if (this.$refs.dropdown.classList.contains('show')) {
                this.dropdownHide()
            } else {
                this.dropdownShow()
            }
        },
        dropdownHide() {
            this.$refs.dropdown.classList.remove('show')
        },
        dropdownShow() {
            this.$refs.dropdown.classList.add('show')
        },
    }
}
