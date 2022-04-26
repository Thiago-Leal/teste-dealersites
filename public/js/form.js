var currentTab = document.getElementById("step").value;
showTab(currentTab);

function showTab(n) {
  
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 2)) {
    document.getElementById("nextBtn").innerHTML = "Finalizar";
  } else {
    document.getElementById("nextBtn").innerHTML = "Próximo";
  }
  if (n == (x.length - 1)) {
    document.getElementById("prevBtn").style.display = "none";
    document.getElementById("nextBtn").style.display = "none";
  }
  
  fixStepIndicator(n)
}

function nextPrev(n) {
  
  var x = document.getElementsByClassName("tab"); 
  
  if (n == 1 && !validateForm()) return false;  
  
  if(n == 1 && !submitData(n)) return false;

  document.getElementsByClassName("step")[currentTab].className += " finish";
  
  x[currentTab].style.display = "none";
  
  currentTab = parseInt(currentTab) + n;
  
  if (currentTab >= x.length) {
    //  document.getElementById("regForm").submit();
    //  return false;
  }

  showTab(currentTab);
}

function validateForm() {
  
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  
  for (i = 0; i < y.length; i++) {
    
    if (y[i].value == "") {
      y[i].className += " invalid";
      valid = false;
    }
  }

  return valid; 
}

function fixStepIndicator(n) {
  
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  
  x[n].className += " active";
}

function submitData(n){

    if (n == -1) return true;
    
    var stepNumber = currentTab + 1;

    if(stepNumber == 1){
        $.post('/register/step1', {
            name: $("#name").val(),
            birthday: $("#birthday").val(),
            _token: $("#_token").val()
        }, function(data) {            
            return true;
        }).fail(function() {          
            //mostrar modal com erro
            return false;
        });
    }

    if(stepNumber == 2){
        $.post('/register/step2', {
            address: $("#address").val(),
            zipcode: $("#zipcode").val(),
            city: $("#city").val(),
            state: $("#state").val(),
            _token: $("#_token").val()
        }, function(data) {            
            return true;
        }).fail(function() {          
            //mostrar modal com erro
            return false;
        });
    }

    if(stepNumber == 3){
        $.post('/register/step3', {
            phone: $("#phone").val(),
            cellphone: $("#cellphone").val(),
            _token: $("#_token").val()
        }, function(data) {            
            return true;
        }).fail(function() {          
            //mostrar modal com erro
            return false;
        });
    }

    return true;
}