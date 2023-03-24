<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <input type="date" name="date" id="date" class="form-control">
    <button id="btns">Click me</button>
</body>
</html>
<script>

   const date = document.getElementById('date');
   const databaseDate = @json($bookdate);
   date.addEventListener("change", function () {

       const selectedDate = date.value;
       for (var property in databaseDate) {
           // console.log(databaseDate[property]);
           if (databaseDate.hasOwnProperty(property)) {
               var propertyValue = databaseDate[property];
               if (propertyValue == selectedDate) {
                   // alert("data sama");
                   const alertDiv = document.createElement('div');
                   alertDiv.classList.add('alert', 'alert-danger');
                   alertDiv.textContent = 'This is an alert message!';

                   const alertWrapper = document.createElement('div');
                   alertWrapper.appendChild(alertDiv);

                   document.body.appendChild(alertWrapper);

                   setTimeout(() => {
                       alertWrapper.remove();
                       location.reload();
                   }, 5000);
               }
           }
       }
       //    console.log(selectedDate);
   });
</script>