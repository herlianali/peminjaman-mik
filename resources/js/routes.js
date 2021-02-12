import AllPosts from './AllUser.vue';
import AddPost from './AddUser.vue';
import EditPost from './EditUser.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllPosts
    },
    {
        name: 'add',
        path: '/add',
        component: AddPost
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditPost
    }
];