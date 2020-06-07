<?php

$content = '<div class="row">
      <div class="col-xs-12"></div>
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Article List</h3>
        </div>
        <div class="box-body">
          <table id="articles" class="table table-borderd table-hover">
            <thead>
            <tr>
              <th>id</th>
              <th>user_id</th>
              <th>headline</th>
              <th>content</th>
              <th>last_edited</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            </tfoot>
          </table>
        </div>
      </div>
    </div>';
include ('../mainpage.php');
?>
<!-- page script -->
<script>
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "../api/article/read.php",
            dataType: 'json',
            success: function (data) {
                var response="";
                for(var article in data) {
                    response += "<tr>"+
                        "<td>"+data[article].id+"</td>"+
                        "<td>"+data[article].user_id+"</td>"+
                        "<td>"+data[article].headline+"</td>"+
                        "<td>"+data[article].content+"</td>"+
                        "<td>"+data[article].last_edited+"</td>"+
                        "<td><a href='update.php?id="+data[article].id+"'>Edit</a> | <a href='#' onClick=Remove('"+data[article].id+"')>Remove</a></td>"+
                        "</tr>";
                }
                $(response).appendTo($("#articles"));
            }
        });
    });
    function Remove(id) {
        var result = confirm("Are your sure?");
        if (result == true) {
            $.ajax({
                type: "POST",
                url: "../api/article/delete.php",
                dataType: 'json',
                data: {
                    id: id
                },
                error: function (result) {
                    alert(result.responseText);
                },
                success: function (result) {
                    if(result['status'] == true) {
                        alert("Successfully Removed Article!");
                        window.location.href = '/testsite/article';
                    }
                    else {
                        alert(result['message']);
                    }

                }
            });
        }
    }
</script>