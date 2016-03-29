
document.getElementById('create_node').onclick = function modal() {
	document.getElementById('modal_div').style.display = 'block';
};



var viewNode = document.getElementsByClassName('view_node');
console.log(viewNode);
for (var i=0; i<viewNode.length; i++) {


	//Обработка статуса и окрашивание элементов
	//console.log(viewNode[i].childNodes[3].innerText)

	var colorStatus;
	if (viewNode[i].childNodes[3].innerText == 'onlearn') {
		var colorStatus = '#E8D571';
	} else if (viewNode[i].childNodes[3].innerText == 'inuse'){
		var colorStatus = '#57C0FF';
	} else {
		var colorStatus = '#FFF';
	}

	viewNode[i].childNodes[1].style.color = colorStatus;
	viewNode[i].childNodes[5].style.color = colorStatus;
	viewNode[i].style.borderTop = "5px solid" + colorStatus;
	//Обработка статуса и окрашивание элементов




	// обработка клика для создания Li-элемента
	viewNode[i].childNodes[7].onclick = function() {
		console.log(this);
		document.getElementById('modal_div2').style.display = 'block';
		var parentId = this.parentNode.childNodes[9].innerHTML;
		document.getElementById('parent_id').value = parentId;
	};
	// обработка клика для создания Li-элемента
}
