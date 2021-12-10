
var tabs = $('.tabs');
var tabItems = $('.tab-item')
var newTabBtn = document.querySelector('.new-tab-btn');

var inputLocalTime = document.querySelector('input[name="localtime"]');
var inputTitle = document.querySelector('input[name="title"]');
var inputDescription = document.querySelector('textarea[name="description"]');
var inputBackground = document.querySelector('input[name="background"]');

var tabItemsLength = 1;
var data = [{
	title: '',
	description: '',
	localtime: '',
	background: ''
}];

inputLocalTime.oninput = function() {
	var activeTab = document.querySelector('.tab-item.active .tab-item--title');
	var value = this.value.split('/');
	activeTab.innerHTML = value[value.length - 1];
}

newTabBtn.onclick = function() {
	var item = $(`<div class="tab-item" tab-id="${tabItemsLength}" onclick="setActiveTab(${tabItemsLength})">
	<p class="tab-item--title">${tabItemsLength + 1}</p>
	<i class='tab-item--close bx bx-x' onclick="deleteTab(${tabItemsLength})"></i>
	</div>`)
	tabs.append(item);
	data.push({
		title: '',
		description: '',
		localtime: '',
		background: ''
	})
	console.log(data)
	setActiveTab(tabItemsLength)
	inputLocalTime.focus();
	tabItemsLength++;
	scrollIntoView();
}

function deleteTab(id, event) {
	console.log(event)
	// setActiveTab(id + 1);
	// $(`.tab-item[tab-id="${id}"]`).remove();
	// data[id] = {};

}

function setActiveTab(id) {
	var activeTab = document.querySelector('.tab-item.active');
	var activeId = activeTab.getAttribute('tab-id')
	if(id == activeId) {
		return;
	}
	saveData();
	clearData();
	manageClass(id);
	loadData(id);
	
}

function manageClass(id) {
	var activeTab = document.querySelector('.tab-item.active');
	document.querySelector(`.tab-item[tab-id="${id}"]`).classList.add('active')
	activeTab.classList.remove('active')
}

function saveData() {
	var activeTab = document.querySelector('.tab-item.active');
	var activeId = activeTab.getAttribute('tab-id')
	var temp = {
		title: inputTitle.value,
		description: inputDescription.value,
		localtime: inputLocalTime.value,
		background: inputBackground.value
	}
	data[activeId] = temp;
}

function clearData() {
	inputTitle.value = '';
	inputDescription.value = '';
	inputLocalTime.value = '';
	inputBackground.value = '';
}


function loadData(id) {
	var temp = data[id];
	inputTitle.value = temp.title;
	inputDescription.value = temp.description;
	inputLocalTime.value = temp.localtime;
	inputBackground.value = temp.background;
}

function save() {
	var blob = new Blob([JSON.stringify(data)],
	{ type: "text/plain;charset=utf-8" });
	saveAs(blob, "static.json");
}

function scrollIntoView(id) {
	setTimeout(() => {
		document.querySelector('.tab-item.active').scrollIntoView({
			behavior: 'smooth',
			block: 'center'
		})
	}, (300));
}

var isActive = false;
var addOnBtn = document.querySelector('.add-on-btn');
var addOn = document.querySelector('.add-on')
var addOnLeft = document.querySelector('.add-on-left')
var addOnPrevious = document.querySelector('.add-on-previous')
var addOnNext = document.querySelector('.add-on-next')
var addOnRight = document.querySelector('.add-on-right')

addOnBtn.onclick = function() {
	if(isActive) {
		addOnBtn.classList.remove('active');
		addOn.style.right = '-50px';
		addOn.style.opacity = '0';
	}
	else {
		addOnBtn.classList.add('active');
		addOn.style.right = "var(--tabbar-width)";
		addOn.style.opacity = '1';
	}
	isActive = !isActive;
}

addOnLeft.onclick = function () {
	var activeTab = document.querySelector('.tab-item.active');
	var activeId = activeTab.getAttribute('tab-id')
	activeId = parseInt(activeId) - 10;
	setActiveTab(manageID(activeId))
}
addOnPrevious.onclick = function () {
	var activeTab = document.querySelector('.tab-item.active');
	var activeId = activeTab.getAttribute('tab-id')
	activeId--;
	setActiveTab(manageID(activeId))
}
addOnNext.onclick = function () {
	var activeTab = document.querySelector('.tab-item.active');
	var activeId = activeTab.getAttribute('tab-id')
	activeId++;
	setActiveTab(manageID(activeId))
}
addOnRight.onclick = function () {
	var activeTab = document.querySelector('.tab-item.active');
	var activeId = activeTab.getAttribute('tab-id')
	activeId = parseInt(activeId) + 10;
	setActiveTab(manageID(activeId))
}

function manageID(id) {
	if(id < 0) id = 0;
	else if(id >= tabItemsLength) id = tabItemsLength - 1;
	scrollIntoView(id);
	return id;
}