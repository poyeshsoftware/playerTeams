import IndexPage from "../pages/IndexPage";

export default {
    mode: 'history',
    routes: [
        {
            path: '/',
            component: IndexPage,
            name: 'index'
        },
    ]
}
