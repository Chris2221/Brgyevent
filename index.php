<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Event Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container mt-5">
      <h2 class="mb-4">Event Registration Form</h2>
      <?php
        if(isset($_POST['submit'])){
          // Get form data
          $event_type = $_POST['event_type'];
          $event_title = $_POST['event_title'];
          $event_date = $_POST['date'];
          $event_description = $_POST['description'];
          $event_limit = $_POST['limit'];
          
          // Connect to database
          $conn = mysqli_connect("localhost", "root", "", "db_mapulanglupa");
          
          // Insert data into database
          $sql = "INSERT INTO tbl_event (event_type, event_title, event_date, event_description, event_limit, event_DateCreated) 
                  VALUES ('$event_type', '$event_title', '$event_date', '$event_description', '$event_limit', NOW())";
          $result = mysqli_query($conn, $sql);
          
          // Check if data was inserted successfully
          if($result){
            echo '<div class="alert alert-success" role="alert">Event was successfully registered.</div>';
          } else {
            echo '<div class="alert alert-danger" role="alert">Error: Unable to register event.</div>';
          }
          
          // Close database connection
          mysqli_close($conn);
        }
      ?>
      <form method="post">
        <div class="form-group">
          <label for="event_type">Event Type:</label>
          <select class="form-control" id="event_type" name="event_type">
            <option value="">--Select Event Type--</option>
            <option value="conference">Conference</option>
            <option value="seminar">Seminar</option>
            <option value="workshop">Workshop</option>
            <option value="webinar">Webinar</option>
          </select>
        </div>
        <div class="form-group">
          <label for="event_title">Event Title:</label>
          <input type="text" class="form-control" id="event_title" name="event_title" placeholder="Enter event title">
        </div>
        <div class="form-group">
          <label for="date">Date:</label>
          <input type="date" class="form-control" id="date" name="date">
        </div>
        <div class="form-group">
          <label for="image">Image:</label>
          <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="form-group">
          <label for="description">Description:</label>
          <textarea class="form-control" id="description" name="description" rows="5" placeholder="Enter event description"></textarea>
        </div>
        <div class="form-group">
          <label for="limit">Limit:</label>
          <input type="number" class="form-control" id="limit" name="limit" placeholder="Enter event limit">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
