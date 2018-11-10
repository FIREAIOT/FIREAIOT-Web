import Request from './Request'
import Reset from './Reset'

export default [
    {
        path: '/password/request',
        component: Request,
        name: 'passwordRequest',
        meta: {
            needsAuth: false
        }
    },      
    {
        path: '/password/reset/:token/:email',
        component: Reset,
        name: 'passwordRest',
        meta: {
            needsAuth: false
        }
    }
]