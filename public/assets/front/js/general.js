$(document).ready(function(){
  tinymce.init({
    selector: 'textarea#post',
    height: "380"
  });

  $('.reply-comment').click(function(){
    var html = $(this).parent().parent().find('.replyform');
    $('.replyform').hide('slow');
    html.show('slow');
  });
});
