// Form validation functions
function validateForm() {
  let isValid = true;
  const title = document.querySelector('input[name="item-title"]');
  const price = document.querySelector('input[name="price"]');
  const quantity = document.querySelector('input[name="quantity"]');
  const location = document.querySelector('input[name="location"]');
  const description = document.querySelector('textarea[name="description"]');
  const fileInput = document.querySelector('input[name="img"]');
  const tag = document.querySelector('select[name="tag"]');
  const category = document.querySelector('select[name="category_id"]');

  if (!title.value.match(/^[A-Za-z0-9\s,.!?-]{3,50}$/)) {
    showError(
      title,
      "Title must be 3-50 characters (letters, numbers, spaces, and basic punctuation)"
    );
    isValid = false;
  }

  if (!price.value || price.value <= 0) {
    showError(price, "Price must be greater than 0");
    isValid = false;
  }

  if (
    !quantity.value ||
    quantity.value <= 0 ||
    !Number.isInteger(Number(quantity.value))
  ) {
    showError(quantity, "Quantity must be a positive whole number");
    isValid = false;
  }

  if (!location.value || !location.value.match(/^[a-zA-Z0-9\s,.-]{5,}$/)) {
    showError(
      location,
      "Location must be 3-100 characters. Allowed: letters, numbers, spaces, and symbols (-, ., #, /, ,)"
    );
    isValid = false;
  }

  if (description.value.length < 10) {
    showError(description, "Description must be at least 10 characters");
    isValid = false;
  }

  // Image validation
  if (fileInput.files.length === 0) {
    showError(fileInput, "Please select an image");
    isValid = false;
  } else {
    const file = fileInput.files[0];
    if (!file.type.match(/^image\/(jpeg|jpg|png|gif)$/)) {
      showError(fileInput, "Please select a valid image file (JPG, PNG, GIF)");
      isValid = false;
    }
    // Check file size (max 10MB)
    if (file.size > 10 * 1024 * 1024) {
      showError(fileInput, "Image size should be less than 10MB");
      isValid = false;
    }
  }

  if (!tag.value) {
    showError(tag, "Please select a tag");
    isValid = false;
  }

  if (!category.value) {
    showError(category, "Please select a category");
    isValid = false;
  }
  return isValid;
}

function showError(input, message) {
  // Check if error div already exists, otherwise create new one
  const errorDiv = input.nextElementSibling?.classList.contains("error-message")
    ? input.nextElementSibling
    : document.createElement("div");

  errorDiv.className = "error-message";
  errorDiv.style.color = "red";
  errorDiv.style.fontSize = "12px";
  errorDiv.style.marginTop = "5px";
  errorDiv.textContent = message;

  // Insert error div after input if it doesn't exist
  if (!input.nextElementSibling?.classList.contains("error-message")) {
    input.parentNode.insertBefore(errorDiv, input.nextSibling);
  }

  setTimeout(() => {
    errorDiv.remove();
  }, 3000);
}

document.querySelector(".add-form").addEventListener("submit", function (e) {
  if (!validateForm()) {
    e.preventDefault();
  }
});

const inputs = document.querySelectorAll("input, textarea, select");
inputs.forEach((input) => {
  input.addEventListener("input", function () {
    // Find and remove error message if it exists
    const errorDiv = this.nextElementSibling;
    if (errorDiv?.classList.contains("error-message")) {
      errorDiv.remove();
    }
  });
});
