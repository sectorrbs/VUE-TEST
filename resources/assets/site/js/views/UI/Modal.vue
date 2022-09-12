<template>
    <div class="modal" :class="{show}">
        <div class="modal__window">
            <div class="modal__window-text">
                {{ text }}
            </div>
            <div class="modal__window-actions">
                <div @click="closeModal" class="btn btn-gray">Отмена</div>
                <div @click="startAction" class="btn">Да</div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Modal",
    data() {
        return {
            id: null,
            action: null,
            text: null,
            show: null
        }
    },
    props: ['class'],
    methods: {
        openModal(data) {
            this.id = data.id
            this.show = true
            this.text = data.text
            this.action = data.action
        },
        closeModal() {
            this.show = false
        },
        startAction() {
            this.action()
            this.closeModal()
        }
    },
}
</script>

