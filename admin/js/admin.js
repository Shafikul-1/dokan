/**
 * Admin User Page Fucntion Start
 */
// Action Button Show hide
function actionBTN() {
  const CDuserShow = document.querySelector(".CDuserShow");
  CDuserShow.classList.toggle("hidden");
}
// Time Button Show hide
function timeUserView() {
  const CDuserShow = document.querySelector(".timeAll");
  CDuserShow.classList.toggle("hidden");
}
// User Add Form Button Show
function userAddFormShow() {
  const userAddingForm = document.querySelector(".userAddingForm");
  userAddingForm.classList.replace("top-[-69rem]", "top-[-0rem]");
}
// User Add Form Button Close
function userAddFormClose() {
  const userAddingForm = document.querySelector(".userAddingForm");
  userAddingForm.classList.replace("top-[-0rem]", "top-[-69rem]");
}

// Check Form Data Is Empty And Password Match
function checkForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var pass = document.getElementById("pass").value;
    var conPass = document.getElementById("conPass").value;
    var date = document.getElementById("date").value;
    var userComment = document.getElementById("userComment").value;
    var userRoll = document.getElementById("userRoll").value;
  
    if (
      name !== "" &&
      email !== "" &&
      pass !== "" &&
      conPass !== "" &&
      date !== "" &&
      userComment !== "" &&
      userRoll !== ""
    ) {
      if (pass === conPass) {
        // If all fields are filled and passwords match
        document.getElementById("submit").classList.add("cursor-pointer", "bg-green-400", "hover:bg-green-600");
        return true;
      } else {
        // If passwords don't match
        document.getElementById("submit").classList.remove("cursor-pointer", "bg-red-400", "hover:bg-red-600");
        alert("Password and Confirm Password do not match!");
        return false;
      }
    } else {
      // If any field is empty
      document.getElementById("submit").classList.remove("cursor-pointer", "bg-pink-400", "hover:bg-pink-600");
      alert("Please fill in all fields.");
      return false;
    }
  }
  
  // Check Button Disable And Submit
  document.addEventListener("input", function () {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var pass = document.getElementById("pass").value;
    var conPass = document.getElementById("conPass").value;
    var date = document.getElementById("date").value;
    var userComment = document.getElementById("userComment").value;
    var userRoll = document.getElementById("userRoll").value;
  
    if (
      name !== "" &&
      email !== "" &&
      pass !== "" &&
      conPass !== "" &&
      date !== "" &&
      userComment !== "" &&
      userRoll !== ""
    ) {
      document.getElementById("submit").disabled = false;
      document.getElementById("submit").classList.add("cursor-pointer", "bg-green-400", "hover:bg-green-700");
    } else {
      document.getElementById("submit").disabled = true;
      document.getElementById("submit").classList.remove("cursor-pointer", "bg-green-400", "hover:bg-green-700");
    }
  });


/**
 * Admin User Page Fucntion Start
 */
