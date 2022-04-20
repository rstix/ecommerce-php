import $ from 'jquery'

import Header from './sections/header';
import ProductList from './sections/product-list';
import Cart from './sections/cart';


$(function() {
  new ProductList().init();
  new Header().init();
  new Cart().init();
})
