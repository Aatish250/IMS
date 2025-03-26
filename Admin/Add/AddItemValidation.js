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

  // Title validation - letters and spaces only, 3-50 chars
  if (!title.value.match(/^[A-Za-z\s]{3,50}$/)) {
    showError(title, "Title must be 3-50 letters only");
    isValid = false;
  }

  // Price validation - positive number only
  if (!price.value || price.value <= 0) {
    showError(price, "Price must be greater than 0");
    isValid = false;
  }

  // Quantity validation - positive integer only
  if (
    !quantity.value ||
    quantity.value <= 0 ||
    !Number.isInteger(Number(quantity.value))
  ) {
    showError(quantity, "Quantity must be a positive whole number");
    isValid = false;
  }

  // Location validation - alphanumeric and spaces, 3-100 chars
  if (!location.value || !location.value.match(/^[a-zA-Z0-9\s,.-]{5,}$/)) {
    showError(
      location,
      "Location must be 3-100 characters. Allowed: letters, numbers, spaces, and symbols (-, ., #, /, ,)"
    );
    isValid = false;
  }

  // Description validation - minimum 10 chars
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
    // Check file type
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

  // Tag validation
  if (!tag.value) {
    showError(tag, "Please select a tag");
    isValid = false;
  }

  // Category validation
  if (!category.value) {
    showError(category, "Please select a category");
    isValid = false;
  }

  return isValid;
}

// Show error message below input
/**
 * Shows an error message below an input field
 * @param {HTMLElement} input - The input element to show error for
 * @param {string} message - The error message to display
 */
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

  // Remove error message after 3 seconds
  setTimeout(() => {
    errorDiv.remove();
  }, 3000);
}

/**
 * Form submission handler
 * Prevents form submission if validation fails
 */
document.querySelector(".add-form").addEventListener("submit", function (e) {
  if (!validateForm()) {
    e.preventDefault(); // Prevent form submission
  }
});

/**
 * Clear error messages when user starts typing
 * Adds input listeners to all form fields
 */
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
