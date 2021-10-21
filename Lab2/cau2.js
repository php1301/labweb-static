////

$(document).ready(function () {
  var listBill = [];
  var price = {
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
          listBill.push(temp);
        }
      }

      $("#tinhtien").on("click", function () {
        var totalBill = 0;
        var Date = $("input[name=buoi]:checked").val();
        var html = `  <tr>
        <td>Các món đã dùng</td>
        <td>Tiền</td>
      </tr>`;
        listBill.map((item) => {
          html += `<tr>
                <td>
                ${item.title}
                </td>
                <td>
                ${(price[item.value] * Date).toFixed(0)}
                </td>
                </tr>`;
          totalBill += price[item.value] * Date;
        });
        html += `<tr>
            <td>
            Tổng Tiền
            </td>
            <td>
            ${totalBill.toFixed(0)} vnđ
            </td>
            </tr>`;
        $("#hoadon").html(html);
      });
    }
  });
});
