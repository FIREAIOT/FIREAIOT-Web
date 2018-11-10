import NotFound from './NotFound'
import NotAuthorized from './NotAuthorized'

export default [
    {
        path: '/not-authorized-area',
        component: NotAuthorized,
        name: '403',
        meta: {
            needsAuth: false
        }
    },
    {
        path: '*',
        component: NotFound,
        name: '404',
        meta: {
            needsAuth: false
        }
    }
]