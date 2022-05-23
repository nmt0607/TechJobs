const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

$('#click_advance').click(function() {
    $("i", this).toggleClass("fa fa-filter fa fa-times");
});
$('#clickc_advance').click(function() {
    $("i", this).toggleClass("fa fa-angle-down fa fa-angle-up");
});
$('#clickc2_advance').click(function() {
    $("i", this).toggleClass("fa fa-angle-down fa fa-angle-up");
});
$('#clickc3_advance').click(function() {
    $("i", this).toggleClass("fa fa-angle-down fa fa-angle-up");
});
$('#clickc4_advance').click(function() {
    $("i", this).toggleClass("fa fa-angle-down fa fa-angle-up");
});
$('#clickc1_advance1').click(function() {
    $("i", this).toggleClass("fa fa-angle-down fa fa-angle-up");
});
$('#clickc1_advance2').click(function() {
    $("i", this).toggleClass("fa fa-angle-down fa fa-angle-up");
});
$('#clickc1_advance3').click(function() {
    $("i", this).toggleClass("fa fa-angle-down fa fa-angle-up");
});
$('#clickc1_advance4').click(function() {
    $("i", this).toggleClass("fa fa-angle-down fa fa-angle-up");
});


let dropArea = document.getElementById("drop-area");
let filesDone = 0;
let filesToDo = 0;
let progressBar = document.getElementById("progress-bar");


function preventDefaults(e) {
  e.preventDefault();
  e.stopPropagation();
}


function highlight(e) {
  dropArea.classList.add("highlight");
}

function unhighlight(e) {
  dropArea.classList.remove("highlight");
}

function handleDrop(e) {
  let dt = e.dataTransfer;
  let files = dt.files;

  handleFiles(files);
}
// function handleFiles(files) {
//   [...files].forEach(uploadFile);
// }

function previewFile(file) {
  let reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onloadend = function () {
    let img = document.createElement("img");
    img.src = reader.result;
    document.getElementById("gallery").appendChild(img);
  };
}
function initializeProgress(numfiles) {
  progressBar.value = 0;
  filesDone = 0;
  filesToDo = numfiles;
}

function progressDone() {
  filesDone++;
  progressBar.value = (filesDone / filesToDo) * 100;
}



