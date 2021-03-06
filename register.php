<!DOCTYPE html>
<html>

  <head>
    <title>Registration Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/patient_form.css">
    <script src="js/patient_form.js"></script>

  <body>

    <div class="testbox">
      <form action="/">
        <div class="banner">
          <h1>Fill up the registration form</h1>
        </div>



        <p>Registration details</p>
        <div class="item">
          <label for="name">First Name<span>*</span></label>
          <input id="name" type="text" name="name" required />
        </div>

        <div class="item">
          <label for="lname">Last Name</label>
          <input id="lname" type="text" name="lname" />
        </div>

        <div class="question">
          <label>Gender</label>
          <div class="question-answer">
            <div>
              <input type="radio" value="none" id="radio_1" name="gender" />
              <label for="radio_1" class="radio"><span>Male</span></label>
            </div>
            <div>
              <input type="radio" value="none" id="radio_2" name="gender" />
              <label for="radio_2" class="radio"><span>Female</span></label>
            </div>
          </div>
        </div>

        <div class="item">
          <label asp-for="DOB">Date of Birth<span>*</span></label>
          <input type="date" asp-for="DOB" asp-format="{0:yyyy-MM-dd}" id="DOB" name="DOB" required />
          <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="item">
          <label for="Age">Age</label>
          <input asp-for="Age" id="age" name="age" type="text" readonly />
        </div>

        <div class="item">
          <p>Blood Group <span>*</span></p>
          <select>
            <option selected value="" disabled></option>
            <option value="ap">A+</option>
            <option value="an">A-</option>
            <option value="bp">B+</option>
            <option value="bn">B-</option>
            <option value="op">O+</option>
            <option value="on">O-</option>
            <option value="abp">AB+</option>
            <option value="abn">AB-</option>
            <option value="ot">other</option>
          </select>
        </div>

        <div class="item">
          <label for="phone">Phone<span>*</span></label>
          <input id="phone" type="number" name="phone" required />
        </div>

        

        <div class="item">
          <label for="address">Address</label>
          <input id="address" type="text" name="address" />
        </div>

        <div class="item">
          <label for="city">City<span>*</span></label>
          <input id="city" type="text" name="city" required />
        </div>
        <div class="item">
          <label for="state">State<span>*</span></label>
          <input id="state" type="text" name="state" required />
        </div>
        <div class="item">
          <label for="zip">Zip<span>*</span></label>
          <input id="zip" type="text" name="zip" required />
        </div>

        <div class="item">
          <label for="hist">Any Medical history (optional)</label>
          <input id="hist" type="text" name="hist" />
        </div>

        <div class="btn-block">
          <button type="submit" href="/">SUBMIT</button>
        </div>
      </form>
    </div>
  </body>
</html>