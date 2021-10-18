$(document).ready(function () {
	if (window.location.pathname === "/result7.html") {
		var diaChi = localStorage.getItem("address");
		var dienThoai = localStorage.getItem("phone");
		var email = localStorage.getItem("email");
		var ngheNghiep = localStorage.getItem("job");
		var anhDaiDien = localStorage.getItem("avatar");
		var skillInfoHtml = localStorage.getItem("skillInfoHtml");
		$(".info-avatar").attr("src", anhDaiDien);
		$(".info-job").text(`Nghề nghiệp: ${ngheNghiep}`);
		$(".info-address").text(`Địa chỉ: ${diaChi}`);
		$(".info-email").text(`Email: ${email}`);
		$(".info-phone").text(`Phone: ${dienThoai}`);
		$(".info-skills").append(skillInfoHtml);
	}
	if ($(".skill-list-item").length === 0) {
		$(".skills-list").css({ border: "0px solid" });
	}
	$(".add-skill").on("click", function (e) {
		var skillName = $("#skill-name").val();
		var mucDo = $("#muc-do").val();

		var html = `<div class="skill-list-item" style="display: flex;">
        <p class="skill-name-item"> kỹ năng: ${skillName} - </p>
        <p class="skill-rate-item">&nbsp; Mức độ: ${mucDo}</p>`;
		$(".skills-list").append(html);
	});
	$(".form").on("submit", function (e) {
		e.preventDefault();
		var hoVaTen = localStorage.setItem("name", $("#name").val());
		var diaChi = localStorage.setItem("address", $("#address").val());
		var dienThoai = localStorage.setItem("phone", $("#phone").val());
		var email = localStorage.setItem("email", $("#email").val());
		var ngheNghiep = localStorage.setItem("job", $("#job").val());
		var anhDaiDien = localStorage.getItem("avatar");
		var skillInfoHtml = "";
		$(".info-avatar").attr("src", anhDaiDien);

		var skillArr = $(".skills-list").children();
		$(".info-skills").empty();
		skillArr.each(function (index, value) {
			var skillNameItem = $(this).find(".skill-name-item").text().slice(9, -2);
			var skilRateItem = $(this)
				.find(".skill-rate-item")
				.text()
				.split("Mức độ: ")[1];
			skillInfoHtml += ` <p style="background-color: white;">${skillNameItem}</p>
            <div class="w3-light-grey">
            <div class="w3-container w3-blue" style="width:${skilRateItem}%">${skilRateItem}%</div>
            </div><br>`;
			$(".info-skills").append(skillInfoHtml);
		});
		localStorage.setItem("skillInfoHtml", skillInfoHtml);
		window.location.href = "/result7.html";
	});
});
