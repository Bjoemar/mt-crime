$('.slick-list').slick({
  dots: false,
  infinite: true,
  speed: 300,
  autoplay: true,
  autoplaySpeed: 2000,
  slidesToShow: 4,
  slidesToScroll: 4,
  prevArrow : false,
  nextArrow : false,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});


let hideError = () => {
  setTimeout(()=>{
    $('.error').html('');
  },5000)
};





$(document).on('click' , '#open-gif-setting', function() {
    let val = $(this).val();
    let url = encodeURI('partials/gif.php');
    window.open(url,'addcontent',"height=700,width=1200");
});

$(document).on('click' , '#addContent', function() {
    let val = $(this).val();
    let url = encodeURI('mtcrimeform.php');
    window.open(url,'addcontent',"height=700,width=900");
});

$(document).on('click' , '#update-content' , function(){
  let url = encodeURI('mtupdateform.php');
  window.open(url,'updateContent',"height=700,width=900");
})


$(document).ready(function(){
  $(document).on('click','.reply-popup', function(){
    $('.reply-box').hide();
    // console.log($(this).parent().
    $(this).parent().parent().find(".reply-box").toggle();
  });

  $('.reply-popup-all').click(function(){
      $('.reply-box').hide();
  })
});



$(document).on('click', '#submitComment' , function(){
    let comment = $('#userComment').val();
    let type_id = $(this).val();
    $.ajax({
      url : 'lib/comment.php',
      method : 'post',
      data : {'comment' : comment , 'type_id' : type_id},
      success:function(data){
        if (data == 0) {
          $('.error').html('Something is not right try again later.');
          hideError();
        } else {
          let obj = JSON.parse(data);
          let object = obj[0];
           let commentBox = $('.sampleCommentBox').clone();
           console.log(commentBox[0]);
           $(commentBox[0]).show();
           $(commentBox[0]).find('.comment-txt').html(object['comment']);
           $(commentBox[0]).find('.commenter-name a').html(object['name']);
           $(commentBox[0]).find('.commenter-name span').html('Just Now');
           
          $('.comment_append').prepend(commentBox);
          $('#userComment').val('');
        }
      }
    })

})

$(document).on('click','.submitReply', function(){
    let comment_id = $(this).val();
    let type_id = $(this).data('id');
    let input = $(this).prev();
    let reply = $(input).val();
    let elem = $(this);
    $.ajax({
      url : 'lib/comment.php',
      method : 'post',
      data : {'reply' : reply , 'comment_id' : comment_id , 'type_id' : type_id},
      success:function(data){
        if (data == 0) {
          alert('Something is wrong please try again later');
        } else {
          let obj = JSON.parse(data);
          let object = obj[0];
          let commentBox = $('.sampleReplyComment').last().clone();
           $(commentBox[0]).show();
           $(commentBox[0]).find('.comment-txt').html(object['reply']);
           $(commentBox[0]).find('.commenter-name a').html(object['name']);
           $(commentBox[0]).find('.commenter-name span').html('Just Now');
           $(elem[0]).parent().parent().parent().find('.reply_holder').prepend(commentBox);
           $(input).val('');
        }
      }
    })
})

let edit_comment = false;

$(document).on('click','.modify-comment',function(){
    if (edit_comment) {
      let comment = $(this).parent().prev().find('label');
      let new_comment = $(this).parent().prev().find('input');
      let update = $(new_comment[0]).val();
      let commentid = $(this).val();
      $(comment[0]).show();
      $(new_comment[0]).hide();
      edit_comment = false;
      
      $.ajax({
        url : 'lib/comment.php',
        method : 'post',
        data : {'new_comment' : update , 'comment_id' : commentid},
        success:function(data) {
          $(comment[0]).html(data);
        }
      })

    } else {
      $(this).parent().prev().find('label').hide();
      $(this).parent().prev().find('input').show();
      edit_comment = true;

    }
});

$(document).on('click' , '.remove-comment' , function(){
    let comment_id = $(this).val();
    let parent = $(this).parent().parent();
    $(parent).html('Comment Sucessfuly Removed.');
    setTimeout(function(){
        $(parent).remove();
    },5000)
    $.ajax({
      url : 'lib/comment.php',
      method : 'post',
      data : {'delete_id' : comment_id},
    });
});

$(document).ready(function(){

  $('.summernoteImageChange img').addClass('img-fluid');
  
  $('#delete-checked-content').click(function(){


    let len = $('input[name="delete-content[]"]').length;
    let contentID = [];
    for (i = 0; i < len; i++) 
    {
      let elem = $('input[name="delete-content[]"]')[i];
      if ($(elem).is(":checked"))
      {
          let id = $(elem).val();
          contentID.push(id);
      }
    }

    if (contentID.length > 0 ) {

      $.ajax({
          url : 'lib/delete.php',
          method : 'post',
          data : {'contentID' : contentID},
          success:function(data){
            window.history.back();
          }
      })
    } else {
      alert('PLEASE SELECT A DATA TO DELETE!');
    }




  })

  $('#check-all-delete-content').click(function(){
      // $('input[name="delete-content[]"]').check();
      $('input[name="delete-content[]').prop('checked', true);
  });



  $(document).on('click' , '#delete-IDcontent' , function(){
    let IDcontent = $(this).val();
    $.ajax({
      url : 'lib/delete.php',
      method : 'POST',
      data : {'IDcontent' : IDcontent},
      success:function(data){
        window.history.back();
      }
    })
  })
})

$('.collapse').collapse();

  $('.summer-text-area').summernote({
    height: 100,
    toolbar : false,
  });
