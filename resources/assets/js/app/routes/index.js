import home from '../pages/home/routes';
import login from '../pages/login/routes';
import terms from '../pages/terms/routes';
import errors from '../pages/errors/routes';
import privacy from '../pages/privacy/routes';
import contact from '../pages/contact/routes';
import password from '../pages/password/routes';
import dashboard from '../pages/dashboard/routes';

export default [
    ...home,
    ...login,
    ...terms,
    ...privacy,
    ...contact,
    ...password,
    ...dashboard,
    ...errors, // should be at the end!
]