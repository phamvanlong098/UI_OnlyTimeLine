
var tabs = $('.tabs');
var tabItems = $('.tab-item')
var newTabBtn = document.querySelector('.new-tab-btn');

newTabBtn.onclick = function() {
	var item = $(`<div class="tab-item">
	<p class="tab-item--title">1977</p>
	<i class='tab-item--close bx bx-x'></i>
	</div>`)
	tabs.append(item);
	tabItems = document.querySelectorAll('.tab-item');
}

$('.tab-item').click(function() {
	console.log('click')
})