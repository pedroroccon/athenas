<template>
    <!-- Modals -->
    <modal v-show="isShowing" @close="close">
        <template v-slot:header>
            Adicionar nova pessoa
        </template>
        <template v-slot:body>
            <PersonForm @submitted="save" ref="personForm"/>
        </template>
    </modal>
</template>

<script>

    import PersonForm from './Form.vue';

    export default {
        data() {
            return {
                isShowing: false
            }
        }, 
        components: {
            PersonForm
        }, 
        methods: {
            save(params) {
                axios.post('/athenas/api/person', params.data()).then(response => {
                    this.$refs.personForm.form.reset()
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
