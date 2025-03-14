// Function to show error messages
function showError(input, message) {
  const errorElement = document.getElementById(`${input}Error`);
  if (errorElement) {
    errorElement.textContent = message;
    errorElement.style.display = "block";
    input.classList.add("error-input");
  }
}

// Function to clear error messages
function clearError(input) {
  const errorElement = document.getElementById(`${input}Error`);
  if (errorElement) {
    errorElement.textContent = "";
    errorElement.style.display = "none";
    input.classList.remove("error-input");
  }
}

// Get form elements
const form = document.getElementById("editItemForm");
const titleInput = document.getElementById("titleInput");
const priceInput = document.getElementById("priceInput");
const quantityInput = document.getElementById("qty");
const locationInput = document.getElementById("locationInput");
const descriptionInput = document.getElementById("descriptionInput");

// Add input event listeners to clear errors when user types
titleInput.addEventListener("input", function () {
  clearError(titleInput);
});

priceInput.addEventListener("input", function () {
  clearError(priceInput);
});

quantityInput.addEventListener("input", function () {
  clearError(quantityInput);
});

locationInput.addEventListener("input", function () {
  clearError(locationInput);
});

descriptionInput.addEventListener("input", function () {
  clearError(descriptionInput);
});

// Form submission validation
form.addEventListener("submit", function (event) {
  let hasErrors = false;

  // Validate title
  if (titleInput.value.trim() === "") {
    showError(title, "Title is required");
    hasErrors = true;
  } else if (!/^[A-Za-z0-9\s]+$/.test(titleInput.value)) {
    showError(title, "Title can only contain letters, numbers and spaces");
    hasErrors = true;
  }

  // Validate price
  if (priceInput.value.trim() === "") {
    showError(price, "Price is required");
    hasErrors = true;
  } else if (isNaN(priceInput.value) || parseFloat(priceInput.value) <= 0) {
    showError(price, "Price must be a positive number");
    hasErrors = true;
  }

  // Validate quantity
  if (quantityInput.value.trim() === "") {
    showError(quantity, "Quantity is required");
    hasErrors = true;
  } else if (
    !Number.isInteger(parseFloat(quantityInput.value)) ||
    parseInt(quantity.value) < 0
  ) {
    showError(quantity, "Quantity must be a non-negative integer");
    hasErrors = true;
  }

  // Validate location
  if (locationInput.value.trim() === "") {
    showError(location, "Location is required");
    hasErrors = true;
  }

  // Validate description
  if (descriptionInput.value.trim() === "") {
    showError(description, "Description is required");
    hasErrors = true;
  }

  // Prevent form submission if there are errors
  if (hasErrors) {
    event.preventDefault();
  }
});
