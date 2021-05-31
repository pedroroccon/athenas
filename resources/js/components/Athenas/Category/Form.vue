<template>
    <div>
        <div class="form-group">
            <label for="code">Código</label>
            <input v-model="form.code" type="text" name="code" class="form-control">
            <small class="text-danger py-1 d-block" v-if="form.errors.has('code')" v-text="form.errors.get('code')"></small>
        </div>
        <div class="form-group">
            <label for="name">Nome da categoria</label>
            <input v-model="form.name" type="text" name="name" class="form-control">
            <small class="text-danger py-1 d-block" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></small>
        </div>
        <hr>
        <button @click="submit" class="btn btn-success btn-lg"><i class="far fa-save fa-fw mr-1"></i> Salvar</button>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                form: new Form({
                    code: '', 
                    name: '', 
                })
            }
        }, 
        methods: {

            fill(params) {
                this.form.code = params.code
                this.form.name = params.name
            }, 
            submit() {
                this.$emit('submitted', this.form)
            }
        }
    }
</script>
