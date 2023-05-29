

  function addDateBirth() {
    var inputFields = document.getElementById("input-fields");
    var newField = document.createElement("div");
    newField.innerHTML = '<div class="mb-3 flex items-center mb-1"><input type="date" class="form-control relative" id="field" name="field"></div>';
    inputFields.appendChild(newField);
    }
  
    
  function addGender() {
    var inputFields = document.getElementById("input-fields");
    var newField = document.createElement("div");
    newField.innerHTML = '<div class="mb-3" style="height:50px;"><input class="form-check-input gap-3 ms-4" type="radio" name="flexRadioDefault" id="flexRadioDefault1">Male<input class="form-check-input ms-4" type="radio" name="flexRadioDefault" id="flexRadioDefault1">Female<input class="form-check-input ms-4" type="radio" name="flexRadioDefault" id="flexRadioDefault1">Others</div>';
    inputFields.appendChild(newField);
    }

    function addWebsite() {
        var inputFields = document.getElementById("input-fields");
        var newField = document.createElement("div");
        newField.innerHTML = '<div class="mb-3"><input type="text" class="form-control " id="website" name="website" placeholder="abc.com"></div>';
        inputFields.appendChild(newField);
        }
      
 function addLinkedin() {
 var inputFields = document.getElementById("input-fields");
var newField = document.createElement("div");
newField.innerHTML = '<div class="mb-3"><input type="text" class="form-control " id="linkedin" name="linkedin" placeholder="linkedin.com/@pandeysubash404"></div>';
inputFields.appendChild(newField);
}

      
function addCustom() {
 var inputFields = document.getElementById("input-fields");
 var newField = document.createElement("div");
 newField.innerHTML = '<div class="mb-3"><div class="mb-5"><input type="text" class="form-control " id="linkedin" name="linkedin" placeholder="Field Name"></div><input type="text" class="form-control " id="field" name="field"></div>';
 inputFields.appendChild(newField);
}
 

/*
function addSkill() {
var inputFields = document.getElementById("skillField");
var newField = document.createElement("div");
newField.innerHTML = '<form class="row g-3"><div class="col-12"><label for="inputNamel" class="form-label">Skill</label><input type="text" class="form-control" id="inputNamel"></div><div class="col-md-4"><label for="customRange2" class="form-label">Level</label><input type="range" class="form-range" min="0" max="5" id="customRange2"></div></form>';
inputFields.appendChild(newField);
}
  
function addHobbies() {
var inputFields = document.getElementById("hobbiesField");
var newField = document.createElement("div");
newField.innerHTML = '<form class="row g-3"><div class="col-12"><label for="inputNamel" class="form-label">Hobbies</label><input type="text" class="form-control" id="inputNamel"></div></form>';
inputFields.appendChild(newField);
}
 
function addEmployement() {
  var inputFields = document.getElementById("employementField");
  var newField = document.createElement("div");
  newField.innerHTML = '<form class="row g-3" ><div class="col-12"><label for="inputNamel" class="form-label">Position</label><input type="text" class="form-control" id="inputNamel"></div><div class="col-md-6"><label for="inputName2" class="form-label">Employer</label><input type="text" class="form-control" id="inputName2"></div><div class="col-md-6"><label for="inputName3" class="form-label">City</label><input type="text" class="form-control" id="inputName3"></div><div class="col-md-6"><label for="inputEmail4" class="form-label">Start Date</label><input type="date" class="form-control" id="inputEmail4"></div><div class="col-md-6"><label for="inputPhone" class="form-label">End Date</label><input type="date" class="form-control" id="inputPhone"></div></form>';
  inputFields.appendChild(newField);
  }

// function addEmployement() {
//   var inputFields = document.getElementById("employmentField");
//   var newField = document.createElement("div");
//   newField.innerHTML = '<form class="row g-3"><div class="col-12"><label for="inputName" class="form-label">Position</label><input type="text" class="form-control" id="inputName"></div><div class="col-md-6"><label for="inputEmployer" class="form-label">Employer</label><input type="text" class="form-control" id="inputEmployer"></div><div class="col-md-6"><label for="inputCity" class="form-label">City</label><input type="text" class="form-control" id="inputCity"></div><div class="col-md-6"><label for="inputStartDate" class="form-label">Start Date</label><input type="date" class="form-control" id="inputStartDate"></div><div class="col-md-6"><label for="inputEndDate" class="form-label">End Date</label><input type="date" class="form-control" id="inputEndDate"></div><div class="col-md-6"><button type="button" class="btn btn-danger" onclick="deleteEmployment(this)">Delete</button></div></form>';
//   inputFields.appendChild(newField);
// }

// function deleteEmployment(button) {
//   var field = button.parentNode.parentNode.parentNode;
//   field.parentNode.removeChild(field);
// }

/*
  function addEducation() {
    var inputFields = document.getElementById("educationField");
    var newField = document.createElement("div");
    newField.innerHTML = ' <form class="row g-3"><div class="col-12"><label for="inputNamel" class="form-label">Education</label><input type="text" class="form-control" id="inputNamel"></div><div class="col-md-6"><label for="inputName2" class="form-label">School</label><input type="text" class="form-control" id="inputName2"></div><div class="col-md-6"><label for="inputName3" class="form-label">City</label><input type="text" class="form-control" id="inputName3"></div><div class="col-md-6"><label for="inputEmail4" class="form-label">Start Date</label><input type="date" class="form-control" id="inputEmail4"></div><div class="col-md-6"><label for="inputPhone" class="form-label">End Date</label><input type="date" class="form-control" id="inputPhone"></div></form>';
    inputFields.appendChild(newField);
    }
    function addEducation() {
      var inputFields = document.getElementById("educationField");
      var newField = document.createElement("div");
      newField.innerHTML = '<div class="col-12"><label for="inputNamel" class="form-label">Education</label><input type="text" class="form-control" id="inputNamel"></div><div class="col-md-6"><label for="inputName2" class="form-label">School</label><input type="text" class="form-control" id="inputName2"></div><div class="col-md-6"><label for="inputName3" class="form-label">City</label><input type="text" class="form-control" id="inputName3"></div><div class="col-md-6"><label for="inputEmail4" class="form-label">Start Date</label><input type="date" class="form-control" id="inputEmail4"></div><div class="col-md-6"><label for="inputPhone" class="form-label">End Date</label><input type="date" class="form-control" id="inputPhone"></div>';
      inputFields.appendChild(newField);
      }

    */