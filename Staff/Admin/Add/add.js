// for Drag and Drop functionality
function DragDrop() {
  const uploadBox = document.getElementById("uploadBox");
  const fileInput = document.getElementById("fileInput");

  uploadBox.addEventListener("click", () => {
    fileInput.click(); // Trigger file input when upload box is clicked
  });

  // Highlight the box on dragover
  uploadBox.addEventListener("dragover", (e) => {
    e.preventDefault();
    uploadBox.classList.add("dragging");
  });

  // Remove highlight on dragleave
  uploadBox.addEventListener("dragleave", () => {
    uploadBox.classList.remove("dragging");
  });

  // Handle file drop
  uploadBox.addEventListener("drop", (e) => {
    e.preventDefault();
    uploadBox.classList.remove("dragging");

    const files = e.dataTransfer.files;
    handleFiles(files);
  });

  // Handle file input change (for file upload via button)
  fileInput.addEventListener("change", (e) => {
    const files = e.target.files;
    handleFiles(files);
  });

  function handleFiles(files) {
    if (files.length > 0) {
      const file = files[0];
      const reader = new FileReader();

      reader.onload = (e) => {
        // Create an image element
        const image = document.createElement("img");
        image.src = e.target.result;

        // Set the image styles
        image.style.width = "100%";
        image.style.height = "100%";
        image.style.objectFit = "cover"; // Ensure the image covers the box

        // Clear the upload box content and append the new image
        uploadBox.innerHTML = "";
        uploadBox.appendChild(image);
      };

      reader.readAsDataURL(file);
    }
  }
}
DragDrop();
