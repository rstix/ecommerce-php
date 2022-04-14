import $ from 'jquery'

export default class Header {
  constructor() {
    console.log(1)
    this.$header = $('.header');
  }

  init() {
    console.log('header script')
    this._addListeners()
    this._countItems()
  }

  _addListeners() {
    this.$header.find(".cart-link").on('click',() =>{
      $('#ids').val(localStorage.getItem('ids'));
      $('.cart-link').submit();
    })
  }

  _countItems(){
    let idsStr = localStorage.getItem('ids');
    let idsArr = idsStr.split(",")
    $('.cart-link').append(`<span class="badge">${idsArr.length}</span>`)
  }
    
}