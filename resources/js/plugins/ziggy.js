export default {
    /**
     *
     * @param {import('vue').AppContext} app
     */
    install(app) {
        app.config.globalProperties.$route = route;
    },
};
