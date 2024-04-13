document.addEventListener("DOMContentLoaded", function () {
  // Toggle the side navigation menu
  const menuIcon = document.querySelector(".menu-icon");
  const nav = document.querySelector("nav");

  menuIcon.addEventListener("click", function () {
      nav.classList.toggle("active");
  });

  // Set up the event listener for the file input change
  const fileInput = document.getElementById('file-upload');
  if (fileInput) {
      fileInput.addEventListener('change', function () {
          var file = this.files[0];
          if (file) {
              console.log("File selected:", file.name); // Logging the file name for debug
              var reader = new FileReader();
              reader.onload = function (e) {
                  console.log("File read successful"); // Log success
                  document.getElementById('profilePic').src = e.target.result;
              };
              reader.onerror = function (e) {
                  console.error("Error reading file:", e); // Log any error during the read
              };
              reader.readAsDataURL(file);
          } else {
              console.log("No file selected or an error occurred");
          }
      });
  } else {
      console.error("File input element not found");
  }
});

function previewImage() {
  var file = document.getElementById("file-upload").files[0];
  if (file) {
    var reader = new FileReader();
    reader.onload = function (e) {
      document.getElementById("profilePic").src = e.target.result;
    };
    reader.readAsDataURL(file);
  }
}

