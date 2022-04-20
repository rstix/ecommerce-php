import $ from 'jquery'

export default class Cart {
  constructor() {
    this.$cart = $('.cart');
  }

  init() {
    this._addListeners()
    
  }

  _addListeners() {
    this.$cart.find(".remove").on('click',(e) =>{
      this._removeItemsFromStorage($(e.target).data('id'))
    })
  }

  _removeItemsFromStorage(id) {
    let idsStr = localStorage.getItem('ids');
    let idsArr = idsStr.split(",")
    idsArr = this._removeItemAll(idsArr, `${id}`)
    $('#ids').val(idsArr.join());
    localStorage.setItem('ids', idsArr.join())
    $('.cart-link').submit();
  }

  _removeItemAll(arr, value) {
    let i = 0;
    while (i < arr.length) {
      if (arr[i] === value) {
        arr.splice(i, 1);
      } else {
        ++i;
      }
    }
    return arr;
  }
}