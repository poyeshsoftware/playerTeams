import IndexPage from "../pages/IndexPage";
import Dashboard from "../pages/Dashboard";
import store from "../store/index";

export default {
    mode: 'history',
    routes: [
        {
            path: '/',
            component: IndexPage,
            name: 'index',
            beforeEnter: (to, from, next) => {
                if(store.state.authenticated === true) {
                    next('/dashboard');
                } else {
                    next();
                }
            }
        },
        {
            path: '/dashboard',
            component: Dashboard,
            name: 'dashboard',
            beforeEnter: (to, from, next) => {
                if(store.state.authenticated === false) {
                    next('/');
                } else {
                    next();
                }
            }
        },
    ]
}
