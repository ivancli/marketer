<template>
    <header id="navbar">
        <div id="navbar-container" class="boxed">

            <!--Brand logo & name-->
            <!--================================-->
            <div class="navbar-header">
                <a href="index.html" class="navbar-brand">
                    <img src="../../../images/logo.png" alt="Nifty Logo" class="brand-icon">
                    <div class="brand-title">
                        <span class="brand-text">Marketer</span>
                    </div>
                </a>
            </div>
            <!--================================-->
            <!--End brand logo & name-->


            <!--Navbar Dropdown-->
            <!--================================-->
            <div class="navbar-content clearfix">
                <ul class="nav navbar-top-links pull-left" v-if="isAuthenticated">
                    <li>
                        <a href="#">
                            <i class="fa fa-tachometer"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle mega-dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-tags"></i>
                            Products
                        </a>
                        <div class="dropdown-menu dropdown-menu-md">
                            <div class="nano">
                                <div class="nano-content">
                                    <ul class="head-list">
                                        <li>
                                            <a class="media" href="#">
                                                <div class="media-left">
                                                    <i class="demo-pli-file-edit icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-nowrap">All Products</div>
                                                    <small class="text-muted">Manage a list of products</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="media" href="#">
                                                <div class="media-left">
                                                    <i class="demo-pli-file-edit icon-2x"></i>
                                                </div>
                                                <div class="media-body">
                                                    <div class="text-nowrap">Product Meta</div>
                                                    <small class="text-muted">Manage products meta data</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-file-text-o"></i>
                            Reports
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-top-links pull-right">
                    <li class="dropdown" v-if="isAuthenticated">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                            <span class="pull-right hidden-lg hidden-md hidden-sm">
                                <i class="fa fa-user"></i>
                            </span>
                            <div class="username hidden-xs" v-text="user.fullName"></div>
                        </a>


                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right panel-default">

                            <!-- Dropdown heading  -->
                            <div class="pad-all bord-btm">
                                <p class="text-main mar-btm"><span class="text-bold">750GB</span> of 1,000GB Used</p>
                                <div class="progress progress-sm">
                                    <div class="progress-bar" style="width: 70%;">
                                        <span class="sr-only">70%</span>
                                    </div>
                                </div>
                            </div>


                            <!-- User dropdown menu -->
                            <ul class="head-list">
                                <li>
                                    <a href="#">
                                        <i class="demo-pli-male icon-lg icon-fw"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="badge badge-danger pull-right">9</span>
                                        <i class="demo-pli-mail icon-lg icon-fw"></i> Messages
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-success pull-right">New</span>
                                        <i class="demo-pli-gear icon-lg icon-fw"></i> Settings
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="demo-pli-information icon-lg icon-fw"></i> Help
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="demo-pli-computer-secure icon-lg icon-fw"></i> Lock screen
                                    </a>
                                </li>
                            </ul>

                            <!-- Dropdown footer -->
                            <div class="pad-all text-right">
                                <a href="/logout" class="btn btn-primary">
                                    Logout
                                </a>
                            </div>
                        </div>
                    </li>
                    <li v-else><a href="/login">Login</a></li>
                </ul>
            </div>
            <!--================================-->
            <!--End Navbar Dropdown-->

        </div>
    </header>
</template>

<script>
    export default{
        data(){
            return {}
        },
        mounted(){
            console.info("Navbar.vue is mounted.");
        },
        methods: {},
        computed: {
            user(){
                return typeof user != 'undefined' ? user : null;
            },
            isAuthenticated(){
                return this.user != null;
            }
        }
    }
</script>

<style>

</style>