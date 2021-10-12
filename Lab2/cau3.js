$(document).ready(function () {
  
  var listhoadon1 = [];
  var listhoadon2 = [];
  var listhoadon3 = [];
  var gia = {
    bunbo: 20000,
    hutieu: 18000,
    banhcanh: 17000,
    phobo: 19000,
    nuoi: 15000,
    banhmi: 12000,
    banhcuon: 15000,
    cafe1: 12000,
    cafe2: 15000,
    chanhday: 13000,
    chanhmuoi: 12000,
    ximuoi: 14000,
    suatuoi: 13000,
    camvat: 17000,
  };
  var weekday = new Array("Chủ Nhật", "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7");
  var Timenow = new Date($.now());
  var Ngay = `${
    weekday[Timenow.getDay()]
  },${Timenow.toLocaleDateString()},${Timenow.getHours()}:${Timenow.getMinutes()}`;
  $("#time").html(Ngay);
  var SoBan = "ban1";
  $("#chon_ban").change(function () {
    SoBan = $(this).children("option:selected").val();
  });
  $("#chon_food").change(function () {
    var loai = $(this).children("option:selected").val();
    var text_mon = $(this).children("option:selected").text();
    var loailist;
    if (SoBan === "ban1") {
      loailist = listhoadon1;
    } else if (SoBan === "ban2") {
      loailist = listhoadon2;
    } else {
      loailist = listhoadon3;
    }
    temp = { ban: SoBan, Loai: loai, TenMon: text_mon, SL: 1, Gia: gia[loai] };
    flag = true;
    loailist = loailist.map((item) => {
      if (item.Loai === loai) {
        item.SL += 1;
        flag = false;
      }
      return item;
    });
    if (flag) loailist.push(temp);

    html = `  <tr>
    <td><p>Món</p></td>
    <td><p>SL</p></td>
    <td><p>Tiền</p></td>
    <td><p></p></td>
  </tr>`;
    var tongtien = 0;
    loailist.map((item) => {
      tongtien += item.Gia * item.SL;
      html += `
        <tr id="${item.Loai}">
        <td>${item.TenMon}</td>
        <td><input class="textinp" type="text"value='${item.SL}'></td>
        <td><input class="textinp" type="text"value='${item.Gia * item.SL}'></td>
        <td>
          <p>
            <button class="delete">Xóa</button>
          </p>
        </td>
      </tr>`;
    });
    html += `<tr>
    <td>Tổng tiền</td>
    <td colspan="3" id="tongtien">${tongtien}</td>
  </tr>`;

    if (SoBan === "ban1") {
      $("#ban1").html(html);
      listhoadon1 = loailist;
    } else if (SoBan === "ban2") {
      $("#ban2").html(html);
      listhoadon2 = loailist;
    } else {
      $("#ban3").html(html);
      listhoadon3 = loailist;
    }
  });
  $(".bang").on("click", "button", function () {
    var Loai = $(this).parent().parent().parent();
    var Ban = $(this).parent().parent().parent().parent();
    var SoBan = Ban.attr("id");
    var loailist = [];
    if (SoBan === "ban1") {
      loailist = listhoadon1;
    } else if (SoBan === "ban2") {
      loailist = listhoadon2;
    } else {
      loailist = listhoadon3;
    }
    loailist.forEach((item, index) => {
      if (item.Loai === Loai.attr("id")) {
        var tong = Ban.children("tr").children("#tongtien");
        tong.text(  tong.text() - item.Gia * item.SL);
        var arryA = loailist.slice(0, index);
        var arryB = loailist.slice(index + 1, loailist.length);
        loailist = [...arryA, ...arryB];
      }
    });

    Loai.remove();
    if (SoBan === "ban1") {
      listhoadon1 = loailist;
    } else if (SoBan === "ban2") {
      listhoadon2 = loailist;
    } else {
      listhoadon3 = loailist;
    }
  });
  $(".in").on("click", function () {

    var loailist = [];
    var SoBan = $(this).parent().children("table").attr("id");
    var Ban = $(this).parent().children("table");
    var tong = Ban.children("tr").children("#tongtien").text();
    if (SoBan === "ban1") {
      loailist = listhoadon1;
    } else if (SoBan === "ban2") {
      loailist = listhoadon2;
    } else {
      loailist = listhoadon3;
    }
    var tt = {
      ngay: Ngay,
      nv:"Nguyen Van A",
      Ban:SoBan === "ban1"?1:SoBan === "ban2"?2:3,
      ListMon:loailist, 
      Tong:tong
    };
    sessionStorage.setItem("List1", JSON.stringify(tt));
    $(location).attr("href", "./hoadon3.html");
  });
});
