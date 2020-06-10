<?php
$main_content = '<div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Publish an Article</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputUserID">UserID</label>
                          <input type="text" class="form-control" id="user_id" placeholder="Enter UserID">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputHeadline">Headline</label>
                          <input type="text" class="form-control" id="headline" placeholder="Enter Headline">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputContent">Content</label>
                          <input type="text" class="form-control" id="content" placeholder="Content Here">
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="WriteArticle()" value="Submit"></input>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
                </div>
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
                // #user_id means <id="user_id">
                user_id: $('#user_id').val(),
                headline: $('#headline').val(),
                content: $('#content').val()
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if(result['status'] == true) {
                    alert("Successfully Published an Article!");
                    window.location.href = '/testsite/Article';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>
