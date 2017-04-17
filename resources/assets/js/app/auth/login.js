/**
 * Created by Ivan on 16/04/2017.
 */
require('../../bootstrap');

import Vue from 'vue';

//region container templates
import defaultTemplate from '../../components/layouts/Default.vue';
import contentTemplate from '../../components/Partials/Content.vue';
//endregion

//region partials
import pageContentTemplate from '../../components/partials/ContentPartials/PageContent.vue';
//endregion

import mainContent from '../../components/app/auth/Login.vue';

import store from '../../stores/app/auth/login';

const sl = new Vue({
    el: '#marketer',
    components: {
        defaultTemplate,
        contentTemplate,
        pageContentTemplate,
        mainContent
    },
    store
});
