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

  $('.vote-btn').click(function(){
    data = {
      id: $(this).attr('data-id'),
      vote: $(this).attr('data-vote'),
      _token: $('input[name=_token]').val()
    }
     $.ajax({
        url:'/post/vote',
        method:'post',
        data: data,
        success: function(response) {
          if(response == 'success'){ 
            if(data.vote == "like"){
              $('#likeShow').html(parseInt($('#likeShow').html()) + 1);
            } else {
              $('#likeShow').html(parseInt($('#likeShow').html()) - 1);
            }

          }
        }

     });

  });

});
