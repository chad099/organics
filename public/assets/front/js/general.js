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
    };
    $('#loader').show();
    $('body').css('opacity', 0.5);
    var _this = $(this);
     $.ajax({
        url: $('input[name=vote_url]').val(),
        method:'post',
        data: data,
        success: function(response) {
          $('body').css('opacity', 1);
          $('#loader').hide();
          $('.vote-btn').each(function(){
            $(this).addClass('vote-btn');
          });
          if(response == 'success'){
            _this.removeClass('vote-btn');
            _this.addClass('voted');
            if(data.vote == "like"){
              $('#likeShow').html(parseInt($('#likeShow').html()) + 1);
            } else {
              $('#likeShow').html(parseInt($('#likeShow').html()) - 1);
            }
          }
        }

     });
  });

  $('body').on('click', '.voted', function(){
    alert('you have already voted.');
  });

  $("#imgUploadBtn").click(function() {
      $("input[name='thumbnail_image']").click();
  });

  $("#imgUploadBtn1").click(function() {
      $("input[name='product_image']").click();
  });

  $('#open_image_upload_btn').click(function(){
    $('#profile_image_form input[name=profile_image]').click();
  });

  $('#profile_image_form input[name=profile_image]').change(function() {
      $('#loader').show();
      $('body').css('opacity', 0.5);
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
            $('body').css('opacity', 1);
            $('#loader').hide();
            if(response && response.errors) {
              var html = '';
              $.each(response.errors.file, function(key, item) {
                  html += '<p>'+item+'</p>';
              });
              $('.errors').prepend('<div class="row" style="text-align:center; color:red;">'+html+'</div>');
            } else {
                $('#open_image_upload_btn img').attr('src', '/assets/front/profileImages/'+ JSON.parse(response).profile_image);
            }
        }
      });
  });

  $('#reset_link_btn').click(function(){
    window.location.href= '/profile-setting/changepassword';
    // $('#loader').show();
    // $('body').css('opacity', 0.5);
    // $.ajax({
    //   url: '/password/email',
    //   type: 'post',
    //   data : $('#reset_link_send_form').serialize(),
    //   success: function(response){
    //     //console.log(response);
    //     $('body').css('opacity', 1);
    //     $('#loader').hide();
    //   }
    // });
  });

  var popupSize = {
			 width: 780,
			 height: 550
	 };
   $(document).on('click', '.social-buttons > a', function(e){
       var verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
           horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);
       var popup = window.open($(this).prop('href'), 'social',
           'width='+popupSize.width+',height='+popupSize.height+
           ',left='+verticalPos+',top='+horisontalPos+
           ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');
       if (popup) {
           popup.focus();
           e.preventDefault();
       }
   });
   $('.login-required').click(function(){
     alert('Please login for vote.');
   });

   //load more users thread data
   $('.loadMoreDate').click(function(){
     data = {
       _token: $('input[name=_token]').val(),
       current_article_count: $('input[name=current_article_count]').val()
     };
     $('#loader').show();
     $('body').css('opacity', 0.5);
     $.ajax({
       url: '/profile/article',
       type: 'post',
       data: data,
       success: function(response){
         $('body').css('opacity', 1);
         $('#loader').hide();
         if(response.posts.length) {
           var html = '';
           $.each(response.posts, function(key, value){
             value.author = response.author;
             value.icon = '/assets/front/images/icon1.png';
              html += wrapHtml(value);
           });
           $('.users-article').append(html);
           $('input[name=current_article_count]').val(response.current_article_count);
         }
       }
     });
   });

   function wrapHtml(data)
   {
     return '<div class="col-sm-9"><div class="profile-page-img"><img src="'+data.icon+'" class="profile-page-imgage"><p class="activity-author"><strong>'+data.author+'</strong> started a new thread<a href="/post/'+data.id+'"><span class="trending-text"><br>'+data.title+'</span></a></p></div></div><div class="col-sm-3 gap-section"><i>10 hours ago</i></div>';

   }
});
