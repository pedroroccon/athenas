<template>
    <nav class="pagination-container">
        <ul class="pagination mb-0">
            <li class="page-item"><button class="btn" type="button" @click="onClickPreviousPage" :disabled="isInFirstPage">Anterior</button></li>

            <!-- Agrupamento das páginas próximas -->
            <!--<li v-for="page in pages" class="page-item">
                <button class="page-link" type="button" @click="onClickPage(page.name)" :disabled="page.isDisabled" :class="{ active: isPageActive(page.name) }">
                    {{ page.name }}
                </button>
            </li>-->

            <li class="page-item"><button class="btn" type="button" @click="onClickNextPage" :disabled="isInLastPage">Próxima</button></li>
        </ul>
    </nav>
</template>

<style>
    .page-link.active {
        color: #fff;
        background: #007bff;
    }
    .page-link:disabled.active {
        opacity: 1;
    }
    .page-link:disabled {
        cursor: deny;
        opacity: .25;
    }
</style>

<script>
    export default {

        props: {
            maxVisiblePages: {
                type: Number, 
                required: false, 
                default: 3
            }, 
            totalPages: {
                type: Number, 
                required: true
            }, 
            total: {
                type: Number, 
                required: true
            }, 
            perPage: {
                type: Number, 
                required: true
            }, 
            currentPage: {
                type: Number, 
                required: true
            }
        }, 
        computed: {

            startPage() {
                if (this.currentPage === 1) {
                    return 1;
                }

                if (this.currentPage === this.totalPages) { 
                    return this.totalPages - this.maxVisiblePages + 1;
                }

                return this.currentPage - 1;
            },

            endPage() {
                return Math.min(this.startPage + this.maxVisiblePages - 1, this.totalPages);
            },
            pages() {
                const range = [];

                for (let i = this.startPage; i <= this.endPage; i+= 1 ) {
                    range.push({
                        name: i,
                        isDisabled: i === this.currentPage 
                    });
                }
                
                return range;
            },
            isInFirstPage() {
                return this.currentPage === 1;
            },
            isInLastPage() {
                return this.currentPage === this.totalPages;
            },
        },
        methods: {

            onClickFirstPage() {
                this.$emit('pagechanged', 1);
            }, 
            onClickPreviousPage() {
                this.$emit('pagechanged', this.currentPage - 1);
            }, 
            onClickPage(page) {
                this.$emit('pagechanged', page);
            }, 
            onClickNextPage() {
                this.$emit('pagechanged', this.currentPage + 1);
            }, 
            onClickLastPage() {
                this.$emit('pagechanged', this.totalPages);
            }, 
            isPageActive(page) {
                return this.currentPage === page;
            },
        }
    }
</script>
