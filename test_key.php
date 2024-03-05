<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" href="admin_drungfirstpage.css">
  <script>
          function generatekey(){
            var randomNumberWithFixedLength = Math.floor(Math.random() * 10000).toString().padStart(5, '0');
            console.log('HN-'+ randomNumberWithFixedLength);

    // console.log('HN-'+
    //     Math.floor(Math.random()*10)+""+
    //     Math.floor(Math.random()*10)+""+
    //     Math.floor(Math.random()*10)+""+
    //     Math.floor(Math.random()*10)
    // );
    // const expireInterval = setInterval(function(){},1000);
}  
  </script>
<body>
    <button onclick="generatekey()">generate_number</button>
</body>