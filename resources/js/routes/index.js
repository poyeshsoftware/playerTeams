import IndexPage from "../pages/IndexPage";
import Dashboard from "../pages/Dashboard";
import store from "../store/index";
import TeamsPage from "../pages/TeamsPage";
import AddTeamPage from "../pages/AddTeamPage";
import AddPlayerPage from "../pages/AddPlayerPage";

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
            path: '/players',
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
        {
            path: '/players/add',
            component: AddPlayerPage,
            name: 'addPlayer',
            beforeEnter: (to, from, next) => {
                if(store.state.authenticated === false) {
                    next('/');
                } else {
                    next();
                }
            }
        },
        {
            path: '/players/edit/:id',
            component: AddPlayerPage,
            name: 'editPlayer',
            props: true,
            beforeEnter: (to, from, next) => {
                if(store.state.authenticated === false) {
                    next('/');
                } else {
                    next();
                }
            }
        },
        {
            path: '/teams',
            component: TeamsPage,
            name: 'teams',
            beforeEnter: (to, from, next) => {
                if(store.state.authenticated === false) {
                    next('/');
                } else {
                    next();
                }
            }
        },
        {
            path: '/teams/add',
            component: AddTeamPage,
            name: 'addTeam',
            beforeEnter: (to, from, next) => {
                if(store.state.authenticated === false) {
                    next('/');
                } else {
                    next();
                }
            }
        },{
            path: '/teams/edit/:id',
            component: AddPlayerPage,
            name: 'editTeam',
            props: true,
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
