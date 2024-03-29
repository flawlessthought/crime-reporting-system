<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<style>
   body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
   }
   * {
      box-sizing: border-box;
   }
   .openChatBtn {
      background-color: rgb(123, 28, 179);
      color: white;
      padding: 16px 20px;
      border: none;
      font-weight: 500;
      font-size: 18px;
      cursor: pointer;
      opacity: 0.8;
      position: fixed;
      bottom: 23px;
      right: 28px;
      width: 280px;
   }
   .openChat {
      display: none;
      position: fixed;
      bottom: 0;
      right: 15px;
      border: 3px solid #ff08086b;
      z-index: 9;
   }
   form {
      max-width: 300px;
      padding: 15px;
      background-color: white;
   }
   form textarea {
      width: 100%;
      font-size: 18px;
      padding: 15px;
      margin: 5px 0 22px 0;
      border: none;
      font-weight: 500;
      background: #d5e7ff;
      color: rgb(0, 0, 0);
      resize: none;
      min-height: 200px;
   }
   form textarea:focus {
      background-color: rgb(219, 255, 252);
      outline: none;
   }
   form .btn {
      background-color: rgb(34, 197, 107);
      color: white;
      padding: 16px 20px;
      font-weight: bold;
      border: none;
      cursor: pointer;
      width: 100%;
      margin-bottom: 10px;
      opacity: 0.8;
   }
   form .close {
      background-color: red;
   }
   form .btn:hover, .openChatBtn:hover {
      opacity: 1;
   }
</style>
</head>
<body>
<button class="openChatBtn" onclick="openForm()">Chat</button>
<div class="openChat">
<form>
<h1>Chat</h1>
<label for="msg"><b>Message</b></label>
<textarea placeholder="Type message.." name="msg" required></textarea>
<button type="submit" class="btn">Send</button>
<button type="button" class="btn close" onclick="closeForm()">
Close
</button>
</form>
</div>
<script>
   document .querySelector(".openChatBtn") .addEventListener("click", openForm);
   document.querySelector(".close").addEventListener("click", closeForm);
   function openForm() {
      document.querySelector(".openChat").style.display = "block";
   }
   function closeForm() {
      document.querySelector(".openChat").style.display = "none";
   }
</script>
</body>
</html>