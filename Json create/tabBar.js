// tab-bar
const $ = document.querySelector.bind(document);
const $$ = document.querySelectorAll.bind(document);

var tabs = $('.tabs');
var tabItems = $$('.tab-item');
var newTabBtn = $('.new-tab-btn');


function addNewTab() {
    tabs.innerHTML += `<div class="tab-item " onclick="setActiveTab()">
    <p class="tab-item--title">1977</p>
    <i class='tab-item--close bx bx-x'></i>
  </div>`;
}

function setActiveTab(_this) {
    $('.tab-item.active').classList.remove('active');
    console.log(_this)
}