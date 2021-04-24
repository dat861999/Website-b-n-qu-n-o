<!-- <!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Draggable - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  #draggable { width: 150px; height: 150px; padding: 0.5em; }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#draggable" ).draggable();
  } );
  </script>

  <style>
    img {
    width: 100%;
    }
</style>
</head>
<body>
    <div id="draggable" class="ui-widget-content">
        <body>
            <img src="img/cart-page/product-1.jpg" alt="HTML5 icon" style="width:800; height:800;">      
        </body>        
    </div>
</body>
</html> -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Droppable - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  #droppable { width: 300px; height: 533.8px; padding: 0.5em; float: left; margin: 10px ; }
  #draggable { width: 150px; height: 150px; padding: 0em; float: left; margin: 10px 10px 10px 0; }
 
 
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#draggable" ).draggable();
    $( "#droppable" ).droppable({
      drop: function( event, ui ) {
        $( this )
          .addClass( "ui-state-highlight" )
          .find( "p" )
            .html( "Dropped!" );
      }
    });
  } );
  </script>
  <style>
    img {
    width: 100%;
    }
</style>
</head>
<body>
 

<?php
include 'connect/connect.php';
if($_GET['MSHH'] != "") {
  $MSHH=$_GET['MSHH'];
  $query = "SELECT * FROM hanghoa,nhomhanghoa WHERE hanghoa.MaNhom=nhomhanghoa.MaNhom
  and hanghoa.MSHH= '$MSHH'";
  $results = mysqli_query($con, $query);
  while ($row =mysqli_fetch_assoc($results)) {
    echo '
    <div id="draggable" class="ui-widget-content">
      <body>
          <img src="'.$row["Hinh"].'" alt="HTML5 icon" >      
      </body>   
  </div>
';
  }
}
else {
    
}
?>
 
<div id="droppable" class="ui-widget-header">
        <body>
            <img src="img/cart-page/mannequin.jpg" alt="HTML5 icon" >      
        </body>   
</div>
 
 
</body>
</html>