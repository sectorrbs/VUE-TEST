import {createRouter, createWebHistory} from 'vue-router'
import Index from './views/Index'
import NewsIndex from './views/news/Index'
import ArticlesIndex from './views/articles/Index'
import NavigationIndex from './views/navigation/Index'
import ProductsIndex from './views/products/Index'
import CatalogIndex from './views/catalog/Index'
import NotFound from './views/NotFound';

const routes = [
    {
        path: '/admin/home',
        name: 'home',
        component: Index
    },
    {
        path: '/admin/nav',
        name: 'admin.nav',
        component: NavigationIndex
    },
    {
        path: '/admin/news',
        name: 'admin.news',
        component: NewsIndex
    },
    {
        path: '/admin/articles',
        name: 'admin.articles',
        component: ArticlesIndex
    },
    {
        path: '/admin/catalog',
        name: 'admin.catalog',
        component: CatalogIndex
    },
    {
        path: '/admin/products',
        name: 'admin.products',
        component: ProductsIndex
    },
    {
        path: '/:pathMatch(.*)',
        component: NotFound
    }
]

const router = createRouter({
    routes,
    history: createWebHistory(process.env.BASE_URL)
})

export default router
