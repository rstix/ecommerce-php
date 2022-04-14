import $ from 'jquery'

import Header from './sections/header';
import ProductList from './sections/product-list';


$(function() {
  new ProductList().init();
  new Header().init();
})
