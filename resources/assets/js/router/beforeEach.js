import store from '../store'

const beforeEach = ((to, from, next) => {
    store.dispatch('auth/checkTokenExists').then(() => {
        if(to.meta.onlyGuest){
            next({ name: 'home' })
        }

        next()
    }).catch(() => {
        if(to.meta.needsAuth){
            next({ name: 'login', query: { redirect: to.fullPath } });
            return
        }

        next()
    });
});

export default beforeEach;