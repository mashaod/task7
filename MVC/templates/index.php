<html>
<head>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>%TITLE%</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->	
</head>
<body>
  <div class="container" style="width:50%">
  <div><h2>Contact Form</h2></div>
  <div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS_SEND%</strong></div>
  <div style="color: #47d631; font-size: 15px;"><strong>%SUCCESS%</strong></div>
  <!--<div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS%</strong></div>-->
  	
  <form role="form" method="POST" action="index.php">
    <div class="form-group has-success has-feedback">
      <label for="InputName">Name</label>
      <input type="text" class="form-control" name="name" id="InputName" placeholder="Name" value="%NAME%">
      <label class="control-label" for="InputName"><div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS_NAME%</strong></div></label> 
    </div>
  	
    <div class="form-group has-success has-feedback">
      <label for="selectList">Subject</label>
      <select class="form-control" name="subject" id="selectList">
        <option %SUBJECT_0% value="0">%THEAM_0%</option>
        <option %SUBJECT_1% value="1">%THEAM_1%</option>
        <option %SUBJECT_2% value="2">%THEAM_2%</option>
        <option %SUBJECT_3% value="3">%THEAM_3%</option>  
      </select>
      <label class="control-label" for="selectList"><div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS_SUBJECT%</strong></div></label>
    </div>
  	
    <div class="form-group has-success has-feedback">
      <label for="InputEmail">Email</label>
      <input type="email" class="form-control" id="InputEmail" name="email" placeholder="Enter email" value="%EMAIL%">
      <label class="control-label" for="InputEmail"><div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS_EMAIL%</strong></div></label> 
    </div>
  	
    <div class="form-group has-success has-feedback">
      <label for="textMessage">Message</label>
      <textarea class="form-control" rows="3" id="textMessage" name="message">%MESSAGE%</textarea>
      <label class="control-label" for="textMessage"><div style="color: #FF0000; font-size: 15px;"><strong>%ERRORS_MESSAGE%</strong></div></label> 
    </div>
  	
    <button type="submit" class="btn btn-default" name="submit">Send</button>	
  </form>	

  </div>
</body>
</html>
