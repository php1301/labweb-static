$(document).ready(function () {
  $('#tinhluong').on('click',function(){
     $('.outp').html(`<span>
      ${($('#luong').val()*$('#heso').val()*1.0).toFixed(0)}
     </span>`)
  })

})