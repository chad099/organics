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

  $("#imgUploadBtn").click(function() {
      $("input[name='thumbnail_image']").click();
  });

  $('#open_image_upload_btn').click(function(){
    $('#profile_image_form input[name=profile_image]').click();
  });

  $('#profile_image_form input[name=profile_image]').change(function() {

      var file_data = $("#profile_image_form input[name=profile_image]").prop("files")[0];
      var form_data = new FormData();
      form_data.append("file", file_data);
      form_data.append("_token", $("#profile_image_form input[name=_token]").val())
      $.ajax({
        url: '/profile-setting/upload_image',
        cache: false,
        contentType: false,
        processData: false,
        type: 'post',
        data : form_data,
        success: function(response) {
            console.log('This is response', response);
            if(response.error) {
              alert(response.message);
            }

            $('#open_image_upload_btn img').attr('src', '/assets/front/profileImages/'+ JSON.parse(response).profile_image);
        }
      });


  });

});
