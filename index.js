function next_step1() {
document.getElementById("firstPage").style.display = "none";
document.getElementById("secondPage").style.display = "block";
document.getElementById("thirdPage").style.display = "none";
}
function prev_step1() {
document.getElementById("firstPage").style.display = "block";
document.getElementById("secondPage").style.display = "none";
document.getElementById("thirdPage").style.display = "none";
}
function next_step2() {
document.getElementById("firstPage").style.display = "none";
document.getElementById("secondPage").style.display = "none";
document.getElementById("thirdPage").style.display = "block";
}
function prev_step2() {
document.getElementById("thirdPage").style.display = "none";
document.getElementById("secondPage").style.display = "block";
document.getElementById("firstPage").style.display = "none";
}
var previewFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('upload');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };