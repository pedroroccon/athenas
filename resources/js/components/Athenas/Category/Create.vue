<template>
    <!-- Modals -->
    <modal v-show="isShowing" @close="close">
        <template v-slot:header>
            Adicionar nova categoria
        </template>
        <template v-slot:body>
            <CategoryForm @submitted="save" ref="categoryForm"/>
        </template>
    </modal>
</template>

<script>

    import CategoryForm from './Form.vue';

    export default {
        data() {
            return {
                isShowing: false
            }
        }, 
        components: {
            CategoryForm
        }, 
        methods: {
            save(params) {
                axios.post('/athenas/api/category', params.data()).then(response => {
                    this.$refs.categoryForm.form.reset()
                    this.$emit('created')
                }).catch((error) => {
                    params.errors.record(error.response.data.errors)
                })
            }, 
            close() {
                this.isShowing = false
            }, 
        }
    }
</script>
