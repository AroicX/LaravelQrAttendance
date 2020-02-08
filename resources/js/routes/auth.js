import React from 'react';
const Login = React.lazy(() => import('./../Pages/Auth/Login'));
const route = [
    { path: '/guest', exact: true, name: 'Login', component: Login },
  
];

export default route;