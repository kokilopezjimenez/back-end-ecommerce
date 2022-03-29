
		function LabelScript(elem) {
			if (elem.value == "") {
				showLabel(elem);
			} else if (elem.value != "") {
				hideLabel(elem);
			}

		}
		function showLabel(elem){
			var idVal = elem.id;
			var labels = document.getElementsByTagName('label');
			var label;
			for (var i = 0; i < labels.length; i++) {
				if (labels[i].htmlFor == idVal)
					label = labels[i];
			}
			label.setAttribute('class', 'floating-label');
		}
		function hideLabel(elem){
			var idVal = elem.id;
			var labels = document.getElementsByTagName('label');
			var label;
			for (var i = 0; i < labels.length; i++) {
				if (labels[i].htmlFor == idVal)
					label = labels[i];
			}
			label.setAttribute('class', 'floating-label labelTop ');
		}

