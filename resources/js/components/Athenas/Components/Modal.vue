<template>
    <div class="m-backgrop">
        <div class="m-container">
            <h2 class="h5">
                <slot name="header"></slot>
            </h2>
            <button type="button" class="btn m-close" @click="close"><i class="far fa-times-circle fa-fw"></i></button>
            <hr>
            <slot name="body">

            </slot>
        </div>
    </div>
</template>

<style>
    .m-backgrop {
        position: fixed;
        display: flex;
        align-items: center;
        justify-content: center;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: rgba(0, 0, 0, .5);
    }
    .m-container {
        position: relative;
        padding: 20px;
        width: 75%;
        max-width: 600px;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, .25) 0 0 100px;
        background: white;
        box-sizing: border-box;
    }
    .m-close {
        position: absolute;
        top: 0;
        right: 0;
        cursor: pointer;
        font-size: 20px;
        opacity: .5;
        padding: 20px;
        display: flex;
        align-items: center;
    }
</style>

<script>
    export default {

        methods: {
            close() {
                this.$emit('close');
            }
        }
    }
</script>
