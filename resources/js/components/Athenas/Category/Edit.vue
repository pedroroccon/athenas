<template>
    <!-- Modals -->
    <modal v-show="isShowing" @close="close">
        <template v-slot:header>
            Editar categoria
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
                index: null, 
                isShowing: false
            }
        }, 

        components: {
            CategoryForm
        }, 
        methods: {
            save(params) {
                axios.put('/athenas/api/category/' + this.index, params.data()).then(response => {
                    this.$refs.categoryForm.form.reset()
                    this.$emit('updated')
                }).catch((error) => {
                    params.errors.record(error.response.data.errors)
                })
            }, 
            fill(params) {
                this.index = params.id;
                this.$refs.categoryForm.fill(params)
            }, 
            close() {
                this.isShowing = false
            }, 
        }
    }
</script>
