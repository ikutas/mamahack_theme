




/*-------------
�y�[�W�X�N���[��
-----------*/



$(function() {
    var pageTop = $('#page-top');
    pageTop.hide();
    //�X�N���[����400�ɒB�������\��
    $(window).scroll(function () {
        if($(this).scrollTop() > 400) {
            pageTop.fadeIn();
        } else {
            pageTop.fadeOut();
        }
    });
    //�X�N���[�����ăg�b�v
        pageTop.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
        });
  });

/*---------------------------
����ި��
------------------------------*/

$(document).ready(function(){
  //acordion_tree�����U���\����
  $(".acordion_tree").css("display","none");
  //trigger���N���b�N�����ƈȉ������s
  $(".trigger").click(function(){
    //�������N���b�N����trigger�̒�����.acordion_tree�����\���Ȃ�
    if($("+.acordion_tree",this).css("display")=="none"){
         //class��active���ǉ�
         $(this).addClass("active");
         //������acordion_tree���X���C�h�_�E��
         $("+.acordion_tree",this).slideDown("normal");
  }else{
    //class����active���폜
    $(this).removeClass("active");
    //�N���b�N����trigger�̒�����.acordion_tree���\�������Ă����΃X���C�h�A�b�v
    $("+.acordion_tree",this).slideUp("normal");
  }
  });
});
