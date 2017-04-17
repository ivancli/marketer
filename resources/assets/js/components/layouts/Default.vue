<template>
    <div id="container" class="effect aside-float aside-bright mainnav-out">
        <slot name="default-navbar"></slot>
        <slot name="default-content"></slot>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Default.vue is mounted.')
        }
    }
</script>