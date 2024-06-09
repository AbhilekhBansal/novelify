<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Order Placed</title>
  <style>
    body{
      font-family: Arial, Helvetica, sans-serif
    }
   .cntr{
    margin: auto;
    justify-content: center;
    display: grid;
    padding-top: 50px;
   }
   .btn_conti{
    border: 1px solid red;
    background: none;
    color: black;

  }
  .btn_conti:hover{
    color:aliceblue;
    background: #ff6464
  }
  .or_id{
    color: red;
  }
  </style>
</head>
<body>
  
    <div class="cntr">
      <h1>Your Order has been placed</h1>
      <h2>Order Id:- <span class="or_id">{{session('ORDER_ID')}}</span></h2>
      <a href="/"><button class="btn_conti">Go Home</button></a>
    </div>
   
  
</body>
</html>





 
