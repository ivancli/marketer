/**
 * Created by Ivan on 15/04/2017.
 */
require('../bootstrap');

import Vue from 'vue';

//region container templates
import defaultTemplate from '../components/layouts/Default.vue';
import navbarTemplate from '../components/partials/Navbar.vue';
import contentTemplate from '../components/Partials/Content.vue';
//endregion

//region partials
import pageTitleTemplate from '../components/partials/ContentPartials/PageTitle.vue';
import breadcrumbTemplate from '../components/partials/ContentPartials/Breadcrumb.vue';
import pageContentTemplate from '../components/partials/ContentPartials/PageContent.vue';
//endregion

import mainContent from '../components/app/Index.vue';

import store from '../stores/app/index';

const sl = new Vue({
    el: '#marketer',
    components: {
        defaultTemplate,
        navbarTemplate,
        contentTemplate,
        pageTitleTemplate,
        breadcrumbTemplate,
        pageContentTemplate,
        mainContent
    },
    store
});
