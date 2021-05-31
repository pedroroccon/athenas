class Errors {

    /**
     * Cria uma nova instância de Errors
     */
    constructor() {
        this.errors = {};
    }

    /**
     * Determina se o erro existe para um determinado 
     * campo.
     *
     * @param {string} field
     */
    has(field) {
        return this.errors.hasOwnProperty(field);
    }

    /**
     * Determina se há algum erro.
     */
    any() {
        return Object.keys(this.errors).length > 0;
    }

    /**
     * Retorna a mensagem de erro para o campo.
     *
     * @param {string} field
     */
    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    /**
     * Grava os novos erros.
     *
     * @param {object} errors
     */
    record(errors) {
        this.errors = errors;
    }

    /**
     * Limpa todos os campos com erro.
     *
     * @param {string|null} field
     */
    clear(field) {
        if (field) {
            delete this.errors[field];

            return;
        }

        this.errors = {};
    }
}

class Form {

    /**
     * Cria uma nova instância de Form.
     *
     * @param {object} data
     */
    constructor(data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }
        this.errors = new Errors();
    }

    /**
     * Retorna todos os dados relevantes 
     * do formulário.
     */
    data() {
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }
        return data;
    }

    /**
     * Reseta os campos do formulário.
     */
    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }

        this.errors.clear();
    }
}

export default Form;