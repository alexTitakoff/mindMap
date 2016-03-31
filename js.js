
document.getElementById('create_node').onclick = function modal() {
	document.getElementById('modal_div').style.display = 'block';
};



var viewNode = document.getElementsByClassName('view_node');
console.log(viewNode);
for (var i=0; i<viewNode.length; i++) {


	//Обработка статуса и окрашивание элементов
	//console.log(viewNode[i].childNodes[3].innerText)

	var colorStatus;
	if (viewNode[i].childNodes[3].innerText == 'b_onlearn') {
		var colorStatus = '#E8D571';
	} else if (viewNode[i].childNodes[3].innerText == 'a_inuse'){
		var colorStatus = '#6FB950';
	} else {
		var colorStatus = '#FFF';
	}

	viewNode[i].childNodes[1].style.color = colorStatus;
	viewNode[i].childNodes[5].style.color = colorStatus;
	viewNode[i].style.borderTop = "5px solid" + colorStatus;
	//Обработка статуса и окрашивание элементов




	// обработка клика для создания Li-элемента  для установки индентификационной связи с родителем
	viewNode[i].childNodes[7].onclick = function() {
		console.log(this);
		document.getElementById('modal_div2').style.display = 'block';
		var parentId = this.parentNode.childNodes[9].innerHTML;
		document.getElementById('parent_id').value = parentId;
	};
	// обработка клика для создания Li-элемента  для установки индентификационной связи с родителем
}



//Обрабодка статусов и просто компонентов для SUBNode

var subNode = document.getElementsByClassName('subnode');
for (var j=0; j<subNode.length; j++) {


	//окрашивание статусной метки
	var statusColor;
	if (subNode[j].childNodes[3].innerText == 'b_onlearn') {
		var  statusColor = '#E8D571';
	} else if (subNode[j].childNodes[3].innerText == 'a_inuse'){
		var  statusColor = '#6FB950';
	} else if (subNode[j].childNodes[3].innerText == 'inplans'){
		var  statusColor = '#76D7DF';
	} else {
		var  statusColor = '#FFF';
	}

	subNode[j].childNodes[1].style.background = statusColor;
	//окрашивание статусной метки


	//Интерфейс обработка и появление

	subNode[j].childNodes[7].style.left = '-120%';
	subNode[j].childNodes[7].style.display = 'none';	
	subNode[j].childNodes[5].onclick = function() {
		console.log(this.parentNode.childNodes[7]);
		if (this.parentNode.childNodes[7].style.display == 'none') {

			var elem2 = this.parentNode.childNodes[7];
			this.parentNode.childNodes[7].style.display = 'inline-block';
			setTimeout(function() {
				elem2.style.transition = '0.4s left linear';
				elem2.style.left = '0%';		
			}, 300);

			

		} else {
			var elem = this.parentNode.childNodes[7];
			this.parentNode.childNodes[7].style.left = '-120%';
			this.parentNode.childNodes[7].style.transition = '0.4s left linear';	
			setTimeout(function() {
				elem.style.display = 'none';		
			}, 300);
			

		};
		

	};


	//Интерфейс обработка и появление









}

//Обрабодка статусов и просто компонентов для SUBNode