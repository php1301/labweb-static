$(document).ready(function () {

	var newImage;
	  $('#upload').change(function () {
		var fileSelected = document.getElementById('upload').files;
		if (fileSelected.length > 0) {
			var fileToLoad = fileSelected[0];
			var fileReader = new FileReader();
			fileReader.onload = function(fileLoaderEvent) {
				var srcData = fileLoaderEvent.target.result;
				newImage = document.createElement('img');
				newImage.src = srcData;
			}
			fileReader.readAsDataURL(fileToLoad);
		}
	  })
	  var listKyNag = [];
	  $("#them").on("click", function () {
		var temp = {
		  kynang: $("#kynang").val(),
		  mucdo: $("#mucdo").val(),
		};
		if ($("#kynang").val()) {
		  listKyNag.push(temp);
		  $("#kynang").val("");
		}
	  });
	  $("#dangky").on("click", function () {
	 
		temp = {
		  hoten: $("#hoten").val(),
		  diachi: $("#diachi").val(),
		  sdt: $("#sdt").val(),
		  email: $("#email").val(),
		  nghe: $("#nghe").val(),
		  anh:  newImage.outerHTML,
		  listKyNang: listKyNag,
		};
		sessionStorage.setItem("dulieu", JSON.stringify(temp));
	  });
	});