import $ from 'jquery'

export default class ProductList {
  constructor() {
    this.$productList = $('.product-list');
  }

  init() {
    this._addListeners();
  }

  _addListeners() {
    $(".add-to-cart").on('click',(e) => {
      this._addProduct($(e.target).data('id'))
    })
  }

  _addProduct(id) {
    let ids = localStorage.getItem('ids')
    localStorage.setItem('ids', (ids != null ? ids+',': '') +id)
    let idsArr = ids != null ? ids.split(",") : []
    $('.cart-link').append(`<span class="badge">${idsArr.length + 1}</span>`)
    this._showModal()
  }

  _showModal() {
    $('.modal').addClass('show')
    setTimeout(() => {
      $('.modal').removeClass('show')
    },2500)
  }
}