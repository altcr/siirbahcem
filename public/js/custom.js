/*CUSTOM JAVASCRIPT FILE*/

$(document).ready(function() {

  $("button#user-text-add-btn-open").click(function(event) {
    $("div#user-text-add-div").slideToggle();
  });

  $("a#notification-count-a").click(function(event) {
    $.ajax({
      url: 'bildirim-sifirlama',
      type: 'GET'
    })
    .done(function(result) {
      if(result==1){
        $("span#notification-count").html("");
      }
    });
  });

  $("#tema-color li").click(function(event) {
    var deger=$(this).data("theme");
    $.ajax({
      url: 'tema-secim/'+deger,
      type: 'GET',
    })
    .done(function(result) {
      if(result==1){
        location.reload();
      }
    });
  });

  $("button#comment-add-btn").click(function(event) {
    var name=$("input[name=name]").val();
    var formVeri=$("form#comment-form").serialize();

    $.ajax({
      url: '/comment-add',
      type: 'post',
      data: formVeri
    })
    .done(function(result) {
      if(result==='Ok'){
        swal(
          "Başarı",
          "Yorumunuz başarıyla yapıldı. Gerekli kontrollerin ardından yayınlanacaktır..",
          "success"
        )
        $("form#comment-form")[0].reset();
      }
      else if(result==='Empty'){
        swal(
          "Hata",
          "Lütfen boş alan bırakmayınız!",
          "error"
        )
      }
      else{
        swal(
          "Hatalı",
          "Bir hata oluştu!",
          "error"
        )
        $("form#comment-form")[0].reset();
      }
    })
    .fail(function() {
      swal(
        "Hatalı",
        "Bir hata oluştu!",
        "error"
      )
      $("form#comment-form")[0].reset();
    });
  });

  var veriSil = function(link, a_index, a_id){
    swal({
      title: 'Silmek istiyor musunuz?',
      text: "Bir kayıt silmek üzeresiniz!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Evet, Sil!',
      cancelButtonText: "Vazgeç"
    }).then(function () {
      $.ajax({
        url: link,
        type: 'GET'
      })
      .done(function(result) {
        if(result==1){
          swal(
            'SİLİNDİ!',
            'Kayıt başarıyla silindi.',
            'success'
          )
          $("a#"+a_id).eq(a_index).parent('td').parent('tr').remove();
        }
        else{
          swal(
            'SİLİNEMEDİ!',
            'Bir hata oluştu.',
            'error'
          )
        }
      })
      .fail(function() {
        swal(
          'SİLİNEMEDİ!',
          'Bir hata oluştu.',
          'error'
        )
      });
    });
  }


  /*TEXT DELETE*/
  $("a#btn-del-txt").click(function(event) {
    var txt_id=$(this).data("id");
    var a_id=$(this).attr("id");
    var a_index=$("a#btn-del-txt").index(this);
    veriSil("text/delete/"+txt_id, a_index, a_id);
  });

  /*USER TEXT DELETE*/
  $("a#btn-del-user-txt").click(function(event) {
    var txt_id=$(this).data("id");
    var a_id=$(this).attr("id");
    var a_index=$("a#btn-del-user-txt").index(this);
    veriSil("user/text/delete/"+txt_id, a_index, a_id);
  });

  /*CATEGORY DELETE*/
  $("a#btn-del-category").click(function(event) {
    var category_id=$(this).data("id");
    var a_id=$(this).attr("id");
    var a_index=$("a#btn-del-category").index(this);
    veriSil("category/delete/"+category_id, a_index, a_id);
  });

  /*ADMIN DELETE*/
  $("a#btn-del-admin").click(function(event) {
    var admin_id=$(this).data("id");
    var a_id=$(this).attr("id");
    var a_index=$("a#btn-del-admin").index(this);
    veriSil("admin/delete/"+admin_id, a_index, a_id);
  });

  /*COMMENT DELETE*/
  $("a#btn-del-comment").click(function(event) {
    var comment_id=$(this).data("id");
    var a_id=$(this).attr("id");
    var a_index=$("a#btn-del-comment").index(this);
    veriSil("comment/delete/"+comment_id, a_index, a_id);
  });

  /*COMMENT CHECK*/
  $("a#btn-check-comment").click(function(event) {
    var comment_id=$(this).data("id");
    var a_id=$(this).attr("id");
    var a_index=$("a#btn-check-comment").index(this);

    $.ajax({
      url: 'comment/check/'+comment_id,
      type: 'GET'
    })
    .done(function(result) {
      if(result==1){
        swal(
          'ONAYLANDI!',
          'Yorum başarıyla onaylandı.',
          'success'
        )
        $("a#"+a_id).eq(a_index).parent('td').parent('tr').remove();
      }
      else{
        swal(
          'ONAYLANAMADI!',
          'Bir hata oluştu.',
          'error'
        )
      }
    })
    .fail(function() {
      swal(
        'ONAYLANAMADI!',
        'Bir hata oluştu.',
        'error'
      )
    });
  });

  /*TEXT CHECK*/
  $("a#btn-check-user-txt").click(function(event) {
    var text_id=$(this).data("id");
    var a_id=$(this).attr("id");
    var a_index=$("a#btn-check-user-txt").index(this);

    $.ajax({
      url: 'user/text/check/'+text_id,
      type: 'GET'
    })
    .done(function(result) {
      if(result==1){
        swal(
          'ONAYLANDI!',
          'Yazı/Şiir başarıyla onaylandı.',
          'success'
        )
        $("a#"+a_id).eq(a_index).parent('td').parent('tr').remove();
      }
      else{
        swal(
          'ONAYLANAMADI!',
          'Bir hata oluştu.',
          'error'
        )
      }
    })
    .fail(function() {
      swal(
        'ONAYLANAMADI!',
        'Bir hata oluştu.',
        'error'
      )
    });
  });

});
