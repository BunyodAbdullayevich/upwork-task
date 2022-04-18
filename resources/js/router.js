import {createRouter, createWebHistory} from 'vue-router';

import Home from './components/Home';
import Login from './components/auth/Login';
import Register from './components/auth/Register';
import Logout from './components/auth/Logout';
import Product from "./components/Product";

const router = createRouter({
   history: createWebHistory(),
    routes: [
        {
            path: '/home',
            alias: '/',
            component: Home
        },
        {
            path: '/products',
            component: Product
        },
        {
            path: '/login',
            component: Login
        },
        {
            path: '/register',
            component: Register
        },
        {
            path: '/logout',
            component: Logout
        },
    ]
});

export default router
