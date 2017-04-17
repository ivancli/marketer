<template>
    <div class="loading">
        <div class="loading-backdrop"></div>
        <img src="../../../images/loading.svg" class="loading-core">
        <div class="loading-text">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.info('Loading.vue is mounted.');
        }
    }
</script>

<style>
    .loading-backdrop {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-color: #000;
        -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
        filter: alpha(opacity=50);
        -moz-opacity: 0.5;
        -khtml-opacity: 0.5;
        opacity: 0.5;
        z-index: 1999;
    }

    .loading .loading-core {
        position: fixed;
        top: 50%;
        left: 50%;
        margin-left: -60px;
        margin-top: -60px;
        z-index: 2000;
    }

    .loading .loading-text {
        z-index: 2000;
        position: fixed;
        top: 50%;
        text-align: center;
        margin-top: 50px;
        color: #fff;
        font-size: 20px;
        font-weight: bold;
        width: 100%;
    }
</style>