<?php
$main_content = '<div class="row">
                <!-- left column -->
                <div class="col-md-12">
                  <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Update Doctor</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputHeadline">Headline</label>
                          <input type="text" class="form-control" id="headline" placeholder="New Headline">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputContent">Content</label>
                          <input type="text" class="form-control" id="content" placeholder="Edit the content">
                        </div>
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                        <input type="button" class="btn btn-primary" onClick="UpdateArticle()" value="Update"></input>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
                </div>
              </div>';

include('../mainpage.php');
?>
<script>
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            // important: $_GET['id'] here is defined by a["href"] in ./index.php
            // use $_GET['varname'] to get those url part after '?'
            // e.p.: '?id=2' -> $_GET['id'] = 2
            url: "../api/article/read_single.php?id=<?php echo $_GET['id']; ?>",
            dataType: "json",
            success: function (data) {
                // set the values of form fields
                $('#headline').val(data['headline']);
                $('#content').val(data['content']);
            },
            error: function (data) {
                console.log(result);
            }
        });
    });
    function UpdateArticle() {
        $.ajax({
            type: "POST",
            url: "../api/article/update.php",
            dataType: "json",
            // POST data needed for updating
            data: {
                id: <?php echo $_GET['id']; ?>,
                // val() get the current value of first element
                // in the set of matched elements
                headline: $('#headline').val(),
                content: $('#content').val()
            },
            error: function (result) {
                alert(result.responseText);
            },
            success: function (result) {
                if(result['status'] == true) {
                    alert("Successfully Edited!");
                    window.location.href = '/testsite/article';
                }
                else {
                    alert(result['message']);
                }
            }
        });
    }
</script>
