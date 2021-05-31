<template>
    <div>
        <div class="form-group">
            <label for="code">Código</label>
            <input v-model="form.code" type="text" name="code" class="form-control">
            <small class="text-danger py-1 d-block" v-if="form.errors.has('code')" v-text="form.errors.get('code')"></small>
        </div>
        <div class="form-group">
            <label for="name">Nome da pessoa</label>
            <input v-model="form.name" type="text" name="name" class="form-control">
            <small class="text-danger py-1 d-block" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></small>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input v-model="form.email" type="text" name="email" class="form-control">
            <small class="text-danger py-1 d-block" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></small>
        </div>
        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select v-model="form.category_id" name="category_id" id="category_id" class="form-control">
                <option value="">Por favor, selecione...</option>
                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
            </select>
            <small class="text-danger py-1 d-block" v-if="form.errors.has('category_id')" v-text="form.errors.get('category_id')"></small>
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
                    email: '', 
                    category_id: '', 
                }), 
                categories: {}
            }
        }, 
        methods: {
            getCategories() {
                axios.get('athenas/api/category').then(response => {
                    this.categories = response.data.data
                }).catch(error => console.log(error))
            }, 
            fill(params) {
                this.form.code = params.code
                this.form.name = params.name
                this.form.email = params.email
                this.form.category_id = params.category.id
            }, 
            submit() {
                this.$emit('submitted', this.form)
            }
        }, 
        mounted() {
            this.getCategories()
        }
    }
</script>
