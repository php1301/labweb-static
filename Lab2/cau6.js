$(document).ready(function(){
    var weekday = new Array("Chủ Nhật", "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7");
  var timeNow = new Date($.now());
  var dateNow = `${weekday[timeNow.getDay()]},${timeNow.toLocaleDateString()},${timeNow.getHours()}:${timeNow.getMinutes()}`;
    $('#register').on("click",function(){
      
        var temp={
            hoten:$('.hoten').val(),
            diachi:$('.diachi').val(),
            dienthoai:$('.dienthoai').val(),
            tour:$('#tour').children('option:selected').text(),
            tourval:$('#tour').children('option:selected').val(),
            nguoilon:$('.nguoilon').val(),
            treem:$('.treem').val(),
            ngaydangki:dateNow,
            hotennv:'Nguyễn Văn A',
            ghichu:$('#ghichu').val()
        }
        sessionStorage.setItem('dulieu',JSON.stringify(temp))

    })

})