$(document).ready(function () {
  var ListCho = [];
  $("#cho_ngoi").change(function () {
    var cho = $(this).children("option:selected");
    var flag = true;
    var temp = {
      TenCho: cho.text(),
      Choval: cho.val(),
    };
    ListCho.map((item) => {
      if (item.Choval === temp.Choval) {
        flag = false;
      }
    });

    if (flag) ListCho.push(temp);
  });
  $("form").on("submit", function () {
    var NgayDat = $("#ngay").val();
    var Phim = $("#phim").children("option:selected").text();
    var SuatChieu = $("#suatchieu").children("option:selected").text();
    var SuatChieuVal = $("#suatchieu").children("option:selected").val();
    var PhongchieuText = $("#phongchieu").children("option:selected").text();
    var PhongchieuGia = $("#phongchieu").children("option:selected").val();
    var Bill = {
      Ten: "Nguyen Van A",
      NgayDat: NgayDat,
      Phim: Phim,
      SuatChieu: SuatChieu,
      SuatChieuVal: SuatChieuVal,
      PhongchieuText: PhongchieuText,
      PhongchieuGia: PhongchieuGia,
      ListCho: ListCho,
    };
    sessionStorage.setItem("Bill4", JSON.stringify(Bill));
  });
});
