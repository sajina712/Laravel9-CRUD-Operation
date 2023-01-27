import './bootstrap';

import { createApp } from "vue";
import BooksGrid from './components/BooksGrid'
const app = createApp({})
app.component('books-grid', BooksGrid);
app.mount('#app')
