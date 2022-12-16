import { createRouter, createWebHistory } from "vue-router";

//admin
import homeAdminIndex from '../components/admin/home/indexPage.vue';
import aboutAdminIndex from '../components/admin/about/index.vue';
import servicesAdminIndex from '../components/admin/services/index.vue';
import skillsAdminIndex from '../components/admin/skills/index.vue';
import educationsAdminIndex from '../components/admin/education/index.vue';
import experiencesAdminIndex from '../components/admin/experience/index.vue';
import projectsAdminIndex from '../components/admin/project/index.vue';
import projectsAdminNew from '../components/admin/project/new.vue';
import projectsAdminUpdate from '../components/admin/project/update.vue';
import testimonialsAdminIndex from '../components/admin/testimonial/index.vue';
import testimonialsAdminNew from '../components/admin/testimonial/new.vue';
import testimonialsAdminUpdate from '../components/admin/testimonial/update.vue';
import messagesAdminIndex from '../components/admin/message/index.vue';
import usersAdminIndex from '../components/admin/user/index.vue';
import usersAdminProfile from '../components/admin/user/profile.vue';
//Pages

import login from '../components/auth/login.vue';
import notFound from '../components/notFound.vue';



const routes = [
    
    //admin
    {
        path: '/admin/home',
        name: 'adminHome',
        component: homeAdminIndex,
        meta:{
            requiresAuth:true,
        }
    },

    {
        path: '/admin/about',
        name: 'adminAbout',
        component: aboutAdminIndex,
        meta:{
            requiresAuth:true,
        }
    },

    {
        path: '/admin/services',
        name: 'adminServices',
        component: servicesAdminIndex,
        meta:{
            requiresAuth:true,
        }
    },

    {
        path: '/admin/skills',
        name: 'adminSkills',
        component: skillsAdminIndex,
        meta:{
            requiresAuth:true,
        }
    },

    {
        path: '/admin/educations',
        name: 'adminEducations',
        component: educationsAdminIndex,
        meta:{
            requiresAuth:true,
        }
    },

    {
        path: '/admin/experiences',
        name: 'adminExperiences',
        component: experiencesAdminIndex,
        meta:{
            requiresAuth:true,
        }
    },

    {
        path: '/admin/projects',
        name: 'adminProjects',
        component: projectsAdminIndex,
        meta:{
            requiresAuth:true,
        }
    },


    {
        path: '/admin/projects/new',
        name: 'adminProjectsNew',
        component: projectsAdminNew,
        meta:{
            requiresAuth:true,
        }
    },

    
    {
        path: '/admin/projects/update/:id',
        name: 'adminProjectsUpdate',
        component: projectsAdminUpdate,
        meta:{
            requiresAuth:true,
        },
        props: true,
    },
    
    {
        path: '/admin/testimonials',
        name: 'adminTestimonialsIndex',
        component: testimonialsAdminIndex,
        meta:{
            requiresAuth:true,
        },
    },
    
    {
        path: '/admin/testimonials/new',
        name: 'adminTestimonialsNew',
        component: testimonialsAdminNew,
        meta:{
            requiresAuth:true,
        }
    },

    
    {
        path: '/admin/testimonials/update/:id',
        name: 'adminTestimonialsUpdate',
        component: testimonialsAdminUpdate,
        meta:{
            requiresAuth:true,
        },
        props: true,
    },

    
    {
        path: '/admin/messages',
        name: 'adminMessagesIndex',
        component: messagesAdminIndex,
        meta:{
            requiresAuth:true,
        },
    },

    
    {
        path: '/admin/users',
        name: 'adminUsersIndex',
        component: usersAdminIndex,
        meta:{
            requiresAuth:true,
        },
    },
    
    {
        path: '/admin/users/profile',
        name: 'adminUsersProfile',
        component: usersAdminProfile,
        meta:{
            requiresAuth:true,
        },
    },

    //login
    {
        path: '/',
        name: 'Login',
        component: login,
        meta:{
            requiresAuth:false,
        }
    },
    
    //Not Found
    {
        path : '/:pathMatch(.*)*',
        component : notFound,
        name : 'notFound',
        meta:{
            requiresAuth:false,
        }
    }
]

const router = createRouter({
    history : createWebHistory(),
    routes,
});

router.beforeEach((to, from) =>{
    document.title = to.meta.title;
    if(to.meta.requiresAuth && !localStorage.getItem('token')){
        return { name : 'Login' }
    }

    if(to.meta.requiresAuth == false && localStorage.getItem('token')){
        return { name : 'adminHome' }
    }
})

export default router;