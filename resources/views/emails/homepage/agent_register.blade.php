<!DOCTYPE html>
<html lang="en">

<head>
  <title></title>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <style>
    .email-section {
      position: relative;
      top: 50%;
      transform: translateY(30%);
      width: 50%;
      margin: 0 auto;
    }

    a:hover {
      color: #ef145d !important;
    }

    .email-header {
      text-align: center;
      margin-bottom: 40px;
    }

    .email-logo img {
      margin: 0 auto;
    }

    .form-submit {
      margin-top: 15px;
    }

    .has-submit-email-btn {
      text-align: center;
    }

    .email-footer {
      text-align: center;
      background: #333;
      color: white;
      min-height: 50px;
      width: 100%;
      margin-top: 100px;
      line-height: 48px;
      font-family: tahoma;
    }

    .email-logo img {
      width: 130px;
    }

    .email-submit {
      background: #ef145d;
      color: white;
      border: none;
      border-radius: 5px;
      min-width: 150px;
      height: 40px;
      margin-top: 25px;
      transition: 0.4s !important;
      cursor: pointer;
      padding: 0 15px;
      font-size: 18px;
      font-family: tahoma;
    }

    .email-description {
      font-family: tahoma;
      line-height: 28px;
      font-size: 17px;
    }

    @media (max-width: 991px) {
      .email-section {
        width: 70%;
      }
    }

    @media (max-width: 767px) {
      .email-section {
        width: 85%;
      }
    }

    @media (max-width: 575px) {
      .email-section {
        width: 98%;
      }
    }
  </style>
</head>


<div class="email-section">
  <div class="email-header">
    <div class="email-logo"><img src="https://tripserb2b.com/agent/img/logo.png" alt=""></div>
  </div>
  <div class="email-description">
    <p>Hello,</p>
    <p>Please verify your email address <a href="">{{$user->email}}</a>, by clicking on the button below</p>
    <div class="has-submit-email-btn">

      <a class="email-submit" href="http://tripserb2b.com/agents/verify/email/{{$user->id}}/{{$token}}">
        verify your email address</a>
    </div>
  </div>
  <div class="email-footer">
    <div>Copyright tripserb2b 2020</div>
  </div>
</div>


</body>

</html>
