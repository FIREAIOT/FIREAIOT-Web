import Login from './Login'

export default [
    {
        path: '/login',
        component: Login,
        name: 'login',
        meta: {
            needsAuth: false,
            onlyGuest: true
        }
    }
]