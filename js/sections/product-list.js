import $ from 'jquery'

export default class ProductList {
  constructor() {
    this.$productList = $('.product-list');
  }

  init() {
    console.log(this.$productList);
    this._addListeners();
  }

  _addListeners() {
    this.$productList.find(".add-to-cart").on('click',(e) => {

      this._addProduct($(e.target).data('id'))
      this._increaseQty()
    })
  }

  _addProduct(id){
    let ids = localStorage.getItem('ids')
    localStorage.setItem('ids', (ids != null ? ids+',': '') +id)
  }

  _increaseQty(){
    let qty = $('.shopping-cart').data('q')
    $('.shopping-cart').data('q',parseInt(qty)+1)
    if(qty == 0){
      $('.cart-link').append(`<span class="badge">1</span>`)
    }else{
      $('.badge').text(parseInt(qty)+1)
    }
  }
}