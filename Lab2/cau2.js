////

$(document).ready(function () {
  var listhoadon = [];
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
  $(".choose").change(function () {
    {
      var options = $(this).children("option");
      for (var i = 0; i < options.length; i++) {
        if (options[i].selected) {
          temp = {
            title: options[i].text,
            value: options[i].value,
          };
          listhoadon.push(temp);
        }
      }

      $("#tinhtien").on("click", function () {
        var tongtien = 0;
        var html = "";
        var ngay = $("input[name=buoi]:checked").val();
        listhoadon.map((item) => {
          html += `<tr>
                <td>
                ${item.title}
                </td>
                <td>
                ${(gia[item.value] * ngay).toFixed(0)}
                </td>
                </tr>`;
          tongtien += gia[item.value] * ngay;
        });
        html += `<tr>
            <td>
            Tổng Tiền
            </td>
            <td>
            ${tongtien.toFixed(0)} đồng
            </td>
            </tr>`;
        $("#hoadon").html("");
        $("#hoadon").append(html);
      });
    }
  });
});
