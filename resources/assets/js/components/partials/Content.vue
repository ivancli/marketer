<template>
    <div class="boxed">
        <div id="content-container">
            <slot name="page-title"></slot>
            <slot name="breadcrumb"></slot>
            <slot name="page-content"></slot>
        </div>
    </div>
</template>

<script>
    export default{
        mounted(){
            console.info("Content.vue is mounted.");
        }
    }
</script>

<style>

</style>