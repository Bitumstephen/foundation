// function  SendMail() {
//     var params = {
//         from_name : document.getElementById("from_name").value,
//         email_id : document.getElementById("email_id").value,
//         message : document.getElementById("message").value,
//     }
//     emailjs.Send("service_dxbrwlc", "template_p1qkrva", params).then(function(res){
//         alert("Successful thanks" + res.status);
//     });
// }
function sendEmail() {
  // Get form values
  var userName = document.getElementById("username").value;
  var senderEmail = document.getElementById("email").value;
  var userPhone = document.getElementById("phone").value;
  var message = document.getElementById("message").value;

  // Form data to send
  var formData = {
      'username': userName,
      'email': senderEmail,
      'phone': userPhone,
      'message': message
  };

  // Send email using AJAX
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'mail.php', true);
  xhr.setRequestHeader('Content-Type', 'application/json');
  xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
          // Handle response
          var response = JSON.parse(xhr.responseText);
          if (response.success) {
              alert('Email sent successfully!');
          } else {
              alert('Failed to send email. Please try again.');
          }
      }
  };
  xhr.send(JSON.stringify(formData));
}
