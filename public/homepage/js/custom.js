$(document).on('click','.language-btn a',function(){
    var lang = $(this).text();
    $('.language-btn-active > a').text(lang);
});