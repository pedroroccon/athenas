<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categorias</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Código</th>
                                        <th>Nome</th>
                                        <th class="text-center">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(category, index) in registers" :key="category.id">
                                        <td>{{ category.code }}</td>
                                        <td><strong>{{ category.name }}</strong></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-link">Editar</button>
                                            <button @click="remove(index)" type="button" class="btn btn-sm btn-link">Remover</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Paginação dos resultados -->
                    <div class="card-footer" v-if="registers.hasOwnProperty('meta')">
                        <pagination
                            :total-pages="registers.meta.last_page"
                            :total="registers.meta.total"
                            :per-page="registers.meta.per_page"
                            :current-page="page"
                            @pagechanged="onPageChange"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        data() {
            return {
                registers: {}, 
                isLoading: false, 

                // Form está disponível globalmente 
                // por definição no arquivo app.js
                form: new Form({
                    code: '', 
                    name: '', 
                })
            }
        },
        methods: {

            // Read
            get() {
                
                axios.get('/athenas/api/category').then(response => {
                    this.registers = response.data.data;
                }).catch(error => console.log(error))
            },
            remove(index) {
                axios.delete('/athenas/api/category/' + this.registers[index].id).then(response => {
                    this.get();
                });
            }, 
        }, 
        mounted() {
            this.get();
        }
    }
</script>
