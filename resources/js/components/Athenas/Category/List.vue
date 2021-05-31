<template>
    <div class="categories">
        <button type="button" @click="showCreateForm" class="btn btn-primary mb-4">Adicionar categoria</button>

        <div class="card card-body shadow-lg rounded">
            <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th class="text-center actions">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(category, index) in registers.data" :key="category.id">
                            <td>{{ category.code }}</td>
                            <td><strong>{{ category.name }}</strong></td>
                            <td class="text-center actions">
                                <button type="button" class="btn btn-sm btn-link" @click="showEditForm(index)"><i class="far fa-edit fa-fw"></i></button>
                                <button type="button" class="btn btn-sm btn-link" @click="remove(index)"><i class="far fa-trash-alt fa-fw text-danger"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Paginação dos resultados -->
            <hr>
            <div class="d-lg-flex align-items-center justify-content-between" v-if="registers.hasOwnProperty('meta')">
                <small class="mt-4 mt-lg-0 d-block">{{ registers.meta.total }} registro(s) encontrado(s). Página {{ page }} de {{ registers.meta.last_page }}</small>
                <pagination
                    :total-pages="registers.meta.last_page"
                    :total="registers.meta.total"
                    :per-page="registers.meta.per_page"
                    :current-page="page"
                    @pagechanged="onPageChange"
                />
            </div>
        </div>

        <Create @created="created" ref="createForm" />
        <Edit @updated="updated" ref="editForm" />
    </div>
</template>

<script>

    import Create from './Create.vue';
    import Edit from './Edit.vue';

    export default {
        data() {
            return {
                page: 1, 
                registers: {}, 
            }
        },
        components: {
            Create, 
            Edit, 
        }, 
        methods: {

            getRegisters() {
                axios.get('/athenas/api/category' + '?page=' + this.page).then(response => {
                    this.registers = response.data
                }).catch(error => console.log(error))
            },
            showCreateForm() {
                this.$refs.createForm.isShowing = true
            }, 
            showEditForm(index) {
                this.$refs.editForm.isShowing = true;
                this.$refs.editForm.fill(this.registers.data[index])
            }, 
            created() {
                this.$refs.createForm.isShowing = false
                this.getRegisters()
            }, 
            updated() {
                this.$refs.editForm.isShowing = false
                this.getRegisters()
            }, 
            remove(index) {
                axios.delete('/athenas/api/category/' + this.registers.data[index].id).then(response => {
                    this.getRegisters()
                });
            }, 
            onPageChange(page) {
                this.page = page
                this.getRegisters()
            }

        }, 
        mounted() {
            this.getRegisters()
        }
    }
</script>
