


// Add cancel reply button on comment form
jQuery(function ($) {
    $(".comment-reply-link", ".comment-body").on("click", function () {
      $("#cancel-comment-reply-link")
        .insertAfter(".form-submit")
        .addClass("button")
        .show();
    });
  
    $("#cancel-comment-reply-link").on("click", function () {
      $(this).hide();
    });
  });
  
  // Handle like and dislike
  // Add click event to like-button
  jQuery(document).ready(function ($) {
    $(".like-button").on("click", function (e) {
      e.preventDefault();
      var $this = $(this);
  
      // Send AJAX request
      $.ajax({
        type: "post",
        dataType: "json",
        url: ajax_object.ajax_url,
        data: {
          action: "like",
          nonce: $this.data("nonce"),
          comment_id: $this.data("comment-id"),
        },
        success: function (response) {
          //update the count of the element
          var like_count = response.data.like_count;
          var dislike_count = response.data.dislike_count;
          var like_count_elem = $this.siblings(".like-count");
          var dislike_count_elem = $this.siblings(".dislike-count");
          like_count_elem.attr("data-count", like_count);
          dislike_count_elem.attr("data-count", dislike_count);
          like_count_elem.text(like_count);
          dislike_count_elem.text(dislike_count);
        },
      });
    });
    // Add click event to dislike-button
    $(".dislike-button").on("click", function (e) {
      e.preventDefault();
      var $this = $(this);
  
      // Send AJAX request
      $.ajax({
        type: "post",
        dataType: "json",
        url: ajax_object.ajax_url,
        data: {
          action: "dislike",
          nonce: $this.data("nonce"),
          comment_id: $this.data("comment-id"),
        },
        success: function (response) {
          //update the count of the element
          var like_count = response.data.like_count;
          var dislike_count = response.data.dislike_count;
          var like_count_elem = $this.siblings(".like-count");
          var dislike_count_elem = $this.siblings(".dislike-count");
          like_count_elem.attr("data-count", like_count);
          dislike_count_elem.attr("data-count", dislike_count);
          like_count_elem.text(like_count);
          dislike_count_elem.text(dislike_count);
        },
      });
    });
  });
  