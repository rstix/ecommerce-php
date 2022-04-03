import $ from 'jquery'

export default class Header {
  constructor() {
    console.log(1)
    this.$header = $('.header');
  }

  init() {
    console.log(this.$header)
  }
}