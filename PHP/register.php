<!DOCTYPE html>
<html>
<head>
    <title>Send an Email</title>
</head>
<body>

	<center>
		<h4 class="sent-notification"></h4>

		<form id="myForm" action=register.php methed="post">
			<h2>Send an Email</h2>

			<label>Name</label>
			<input id="name" name="name type="text" placeholder="Enter Name">
			<br><br>

			<label>Send Email</label>
			<input id="email" name="addressEmail" placeholder="Enter Email">
            <button id="addEmail" name="addEmail" type="button">ADD</button>
            <button id="removeEmail" name="removeEmail" type="button">REMOVE</button>
            <div id="listEmail"></div>
			<br><br>

			<label>Subject</label>
			<input id="subject" type="text" placeholder=" Enter Subject"> 
			<br><br>

			<button type="button" name="Submit" onclick="sendEmail()" value="Send An Email">Submit</button> 
		</form>
	</center>

	<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">

        var listEmail = [];
        $('#addEmail').click(function(){
            $Email = $('#email')

            if($Email.val() == ""){
                return

            }else{

            listEmail.push($Email.val());
            console.log(listEmail);
            $('#listEmail').append("<p>" + $Email.val() +  "</p>") ;
            $Email.val("")

            }
        })

        $('#removeEmail').click(function(){
           listEmail.pop();
           console.log(listEmail);
           $('#listEmail').find("p").last().remove();
        })

        function sendEmail() {
            var name = $("#name");
            var subject = $("#subject");

            //clear Email
            $('#listEmail').find("p").remove();
            var sendEmail = listEmail.slice();
            listEmail= [];
            console.log(sendEmail)

            if (isNotEmpty(name) && isNotEmpty(subject)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       emails: sendEmail,
                       subject: subject.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>

</body>
</html>
                           