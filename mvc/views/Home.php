<div class="col-sm-10 col-sm-offset-1">
<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i>  Add News</button>
<div class="modal" id="addModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="Home/addNews">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add News</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group">
            <label for="Title">Title:</label>
            <input type="text" class="form-control" name="title">
          </div>
          <div class="form-group">
            <label for="Author">Author:</label>
            <input type="text" class="form-control" name="author">
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="create">Create</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>


<table class="table table-borderless table-hover table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">Time</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $i = 0;
      $news = json_decode($data["list_news"],"true");
      foreach($news as $row){
        $i++;
        echo "
        <tr>
          <th scope=\"row\">{$i}</th>
          <td>{$row["title"]}</td>
          <td>{$row["author"]}</td>
          <td>{$row["edit_time"]}</td>
          <td>
            <a href=\"#details{$row["id"]}\"  data-toggle=\"modal\"><button type=\"button\" class=\"btn btn-primary\"><i class=\"fas fa-cog\"></i></button></a>
            <a href=\"./Home/deleteNews/{$row["id"]}\"><button type=\"button\" class=\"btn btn-danger\"><i class=\"fas fa-trash\"></i></button>
          </td>
        </tr>
        ";
        echo "
        <div class=\"modal\" id=\"details{$row["id"]}\">
        <div class=\"modal-dialog\">
          <div class=\"modal-content\">
            <form method = \"POST\" action=\"Home/editNews/{$row["id"]}\">
              <!-- Modal Header -->
              <div class=\"modal-header\">
                <h4 class=\"modal-title\">Detail</h4>
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
              </div>

              <!-- Modal body -->
              <div class=\"modal-body\">
                
                <div class=\"form-group\">
                  <label for=\"title\">Title:</label>
                  <input type=\"text\" class=\"form-control\" name=\"title\" value=\"{$row["title"]}\">
                </div>
                <div class=\"form-group\">
                  <label for=\"author\">Author:</label>
                  <input type=\"text\" class=\"form-control\" name=\"author\" value=\"{$row["author"]}\">
                </div>
                <div class=\"form-group\">
                  <label for=\"edit_user\">Edit_user:</label>
                  <input type=\"text\" class=\"form-control\" value=\"{$row["edit_user"]}\" readonly \">
                </div>
                <div class=\"form-group\">
                  <label for=\"edit_time\">Edit_time:</label>
                  <input type=\"text\" class=\"form-control\" value=\"{$row["edit_time"]}\" readonly \">
                </div>
              </div>

              <!-- Modal footer -->
              <div class=\"modal-footer\">
                <button type=\"submit\" class=\"btn btn-primary\" name=\"update\">Update</button>
                <button type=\"button\" class=\"btn btn-danger\" data-dismiss=\"modal\">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
        ";
      }
    ?>
  </tbody>
</table>
</div>

