import $ from 'jquery'

export default class Header {
  constructor() {
    this.$header = $('.header');
  }

  init() {
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
    if(idsStr != null){
      let idsArr = idsStr.split(",")
      $('.cart-link').append(`<span class="badge">${idsArr.length}</span>`)
    }
    
  }
    
}