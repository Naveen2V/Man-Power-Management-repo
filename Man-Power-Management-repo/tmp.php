<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<input type="button" onclick="ConfirmDelete()">
</body>
<script>
    function ConfirmDelete()
{
  var t=confirm("Are you sure you want to delete?");
  if(t){
      console.log("Delete deleted")
  }
}
</script>
</html>