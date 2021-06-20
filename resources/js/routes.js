
import AddCategory from './components/AddCategory.vue';
import AddProduct from './components/AddProduct.vue';
import Products from './components/Products.vue';

  
export const routes = [
    {
        name: 'home',
        path: '/',
        component: Products
    },
    {
        name: 'add-product',
        path: '/add-product',
        component: AddProduct
    },
    {
        name: 'add-category',
        path: '/add-category',
        component: AddCategory
    }
];