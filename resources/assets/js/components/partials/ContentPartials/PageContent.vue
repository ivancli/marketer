<template>
    <div id="page-content">
        <slot name="content-body"></slot>
    </div>
</template>

<script>
    export default{
        mounted(){
            console.info('PageContent.vue is mounted.');
        }
    }
</script>

<style>

</style>