<?php
$content = '<div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Write an Article</h3>
      </div>
      <form role="form">
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputID">ID</label>
            <input type="text" id="id" class="form-control" placeholder="Enter ID">
          </div>
          <div class="form-group">
            <label for="exampleInputUserID">UserID</label>
            <input type="text" id="user_id" class="form-control" placeholder="Enter UserID">
          </div>
          <div class="form-group">
            <label for="exampleInputHeadline">headline</label>
            <input type="text" id="headline" class="form-control" placeholder="Enter Headline">
          </div>
          <div class="form-group">
            <label for="exampleInputContent">Content</label>
            <textarea rows="5" cols="15" id="content" class="form-control" placeholder="content here">
          </div>
          </div>
      </form>
    </div>';
include "../mainpage.php";
?>
<script>
    function WriteArticle() {
        $.ajax({
            type: "POST",
            url: '../api/article/create.php',
            dataType: 'json',
            data: {
                id: $('id').val(),
                user_id: $('user_id').val(),
                headline: $('headline').val(),
                content: $('content').val()
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if(result['status'] == true) {
                    alert("Successfully Published an Article!");
                    window.location.href = '/testsite/article';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>
