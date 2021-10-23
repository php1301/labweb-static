$(document).ready(function () {
  var NumTable = "ban1";
  var listBillOne = [];
  var listBillTwo = [];
  var listBillThree = [];
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
  var timeNow = new Date($.now());
  var dateNow = `${weekday[timeNow.getDay()]},${timeNow.toLocaleDateString()},${timeNow.getHours()}:${timeNow.getMinutes()}`;
  $("#time").html(dateNow);
  // xử lý lắng nghe giá trị của bàn
  $("#chon_ban").change(function () {
    NumTable = $(this).children("option:selected").val();
  });
  // Xử lý thêm món ăn và lắng nghe sự kiện chọn món
  $("#chon_food").change(function () {
    var Type = $(this).children("option:selected").val();
    var text_mon = $(this).children("option:selected").text();
    var typeList;
    var temp = { elememtTable: NumTable, Type: Type, TenMon: text_mon, SL: 1, Gia: gia[Type] };
    var flag = true;
    var tongtien = 0;
    if (NumTable === "ban1") {
      typeList = listBillOne;
    } else if (NumTable === "ban2") {
      typeList = listBillTwo;
    } else {
      typeList = listBillThree;
    }
    typeList = typeList.map((item) => {
      if (item.Type === Type) {
        item.SL += 1;
        flag = false;
      }
      return item;
    });
    if (flag) typeList.push(temp);

    html = `  <tr>
    <td><p>Món</p></td>
    <td><p>SL</p></td>
    <td><p>Tiền</p></td>
    <td class="textinp"><p></p></td></tr>`;

    typeList.map((item) => {
      tongtien += item.Gia * item.SL;
      html += `
        <tr id="${item.Type}">
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

    if (NumTable === "ban1") {
      $("#ban1").html(html);
      listBillOne = typeList;
    } else if (NumTable === "ban2") {
      $("#ban2").html(html);
      listBillTwo = typeList;
    } else {
      $("#ban3").html(html);
      listBillThree = typeList;
    }
  });
  // Xử lý xóa Element cho từng bảng
  $(".bang").on("click", "button", function () {
    var Type = $(this).parent().parent().parent();
    var elememtTable = $(this).parent().parent().parent().parent();
    var NumTable = elememtTable.attr("id");
    var typeList = [];
    if (NumTable === "ban1") {
      typeList = listBillOne;
    } else if (NumTable === "ban2") {
      typeList = listBillTwo;
    } else {
      typeList = listBillThree;
    }
    typeList.forEach((item, index) => {
      if (item.Type === Type.attr("id")) {
        var Total = elememtTable.children("tr").children("#tongtien");
        Total.text(Total.text() - item.Gia * item.SL);
        var arryA = typeList.slice(0, index);
        var arryB = typeList.slice(index + 1, typeList.length);
        typeList = [...arryA, ...arryB];
      }
    });

    Type.remove();
    if (NumTable === "ban1") {
      listBillOne = typeList;
    } else if (NumTable === "ban2") {
      listBillTwo = typeList;
    } else {
      listBillThree = typeList;
    }
  });
  // Xử lý in hóa đơn
  $(".in").on("click", function () {
    var typeList = [];
    var NumTable = $(this).parent().children("table").attr("id");
    var elememtTable = $(this).parent().children("table");
    var Total = elememtTable.children("tr").children("#tongtien").text();
    if (NumTable === "ban1") {
      typeList = listBillOne;
    } else if (NumTable === "ban2") {
      typeList = listBillTwo;
    } else {
      typeList = listBillThree;
    }
    var payBill = {
      Date: dateNow,
      staffName: "Nguyen Van A",
      NumTable: NumTable === "ban1" ? 1 : NumTable === "ban2" ? 2 : 3,
      listBill: typeList,
      Total: Total,
    };
    sessionStorage.setItem("List1", JSON.stringify(payBill));
    $(location).attr("href", "./hoadon3.html");
  });
});
