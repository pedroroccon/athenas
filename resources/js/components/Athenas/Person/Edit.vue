<template>
    <!-- Modals -->
    <modal v-show="isShowing" @close="close">
        <template v-slot:header>
            Editar pessoa
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
                index: null, 
                isShowing: false
            }
        }, 

        components: {
            PersonForm
        }, 
        methods: {
            save(params) {
                axios.put('/athenas/api/person/' + this.index, params.data()).then(response => {
                    this.$refs.personForm.form.reset()
                    this.$emit('updated')
                }).catch((error) => {
                    params.errors.record(error.response.data.errors)
                })
            }, 
            fill(params) {
                this.index = params.id;
                this.$refs.personForm.fill(params)
            }, 
            close() {
                this.isShowing = false
            }, 
        }
    }
</script>
