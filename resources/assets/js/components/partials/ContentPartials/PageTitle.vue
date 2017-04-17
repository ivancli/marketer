<template>

    <div id="page-title">
        <h1 class="page-header text-overflow">Off-Canvas Navigation</h1>

        <!--Searchbox-->
        <div class="searchbox">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" placeholder="Search..">
                <span class="input-group-btn">
                                <button class="text-muted" type="button"><i class="demo-pli-magnifi-glass"></i></button>
                            </span>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        mounted(){
            console.info('PageTitle.vue is mounted.');
        }
    }
</script>

<style>

</style>