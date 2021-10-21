$(document).ready(function () {
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
		anh: $("#anh").val(),
		listKyNang: listKyNag,
	  };
	  sessionStorage.setItem("dulieu", JSON.stringify(temp));
	});
  });