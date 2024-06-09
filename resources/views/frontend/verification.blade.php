<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Email Verification</title>
  <style>
    /* The Modal */
  .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto; /* Enable scroll if needed */
  background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
  }
  
  /* Modal Content */
  .modal-content {
    background-color: #fefefe;
    color: #df5656;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 35%;
  }
  
  /* Close Button */
  .close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  }
  
  .close:hover,
  .close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
  }
  .btn_conti{
    border: 1px solid red;
    background: none;
    color: black;

  }
  .btn_conti:hover{
    color:aliceblue;
    background: #df5656
  }
  </style>
</head>
<body>
  <div id="myModal" class="modal">
    <div class="modal-content">
    <span class="close">&times;</span>
    <p>Your Email has been Verified</p><br>
    <a href="/"><button class="btn_conti">Continue here</button></a>
    </div>
    </div>
    <script>
      // Get the modal element
      const modal = document.getElementById("myModal");
      
      // Get the close button element
      const closeBtn = document.getElementsByClassName("close")[0];
      
      // Function to show the modal pop-up
      function showModal() {
      modal.style.display = "block";
      }
      
      // Function to hide the modal pop-up
      function hideModal() {
      modal.style.display = "none";
      }
      
      // Show the modal when the website opens
      showModal();
      
      // Close the modal when the close button is clicked
      closeBtn.addEventListener("click", hideModal);
      
      // Close the modal when the user clicks anywhere outside the modal
      window.addEventListener("click", function(event) {
      if (event.target == modal) {
      hideModal();
      }
      });
      </script>
</body>
</html>





 
