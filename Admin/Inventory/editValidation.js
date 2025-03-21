// Function to update the Image
function previewImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      document.getElementById("preview-image").src = e.target.result;
    };

    reader.readAsDataURL(input.files[0]);
  }
}

// Function to clear error message after a delay
function clearErrorAfterDelay(errorElement, delay = 2000) {
  setTimeout(() => {
    errorElement.textContent = "";
  }, delay);
}

function validateForm() {
  let isValid = true;

  // Validate title (alphanumeric with spaces)
  const title = document.getElementById("itemTitle").value.trim();
  const titleError = document.getElementById("titleError");
  if (!title || !/^[a-zA-Z0-9\s]+$/.test(title)) {
    titleError.textContent =
      "Title must contain only letters, numbers, and spaces";
    clearErrorAfterDelay(titleError);
    isValid = false;
  } else if (title.length < 5) {
    titleError.textContent = "Title must be at least 5 characters long";
    clearErrorAfterDelay(titleError);
    isValid = false;
  } else {
    titleError.textContent = "";
  }

  // Validate price (positive number)
  const price = document.getElementById("priceInput").value;
  const priceError = document.getElementById("priceError");
  if (!price || price <= 0) {
    priceError.textContent = "Price must be a positive number";
    clearErrorAfterDelay(priceError);
    isValid = false;
  } else {
    priceError.textContent = "";
  }

  // Validate quantity (positive integer)
  const quantity = document.getElementById("qty").value;
  const quantityError = document.getElementById("quantityError");
  if (!quantity || quantity < 0 || !Number.isInteger(parseFloat(quantity))) {
    quantityError.textContent = "Quantity must be a non-negative integer";
    clearErrorAfterDelay(quantityError);
    isValid = false;
  } else {
    quantityError.textContent = "";
  }

  // Validate location (proper address format)
  const location = document.getElementById("locationInput").value.trim();
  const locationError = document.getElementById("locationError");
  // Address validation: at least street number/name and city
  // Example: "123 Main St, City" or similar format
  const addressRegex = /^[a-zA-Z0-9\s,.-]{5,}$/;
  if (!location) {
    locationError.textContent = "Location cannot be empty";
    clearErrorAfterDelay(locationError);
    isValid = false;
  } else if (!addressRegex.test(location)) {
    locationError.textContent = "Please enter a valid address format";
    clearErrorAfterDelay(locationError);
    isValid = false;
  } else {
    locationError.textContent = "";
  }

  // Validate description (10-50 characters)
  const description = document.getElementById("description").value.trim();
  const descriptionError = document.getElementById("descriptionError");
  if (!description) {
    descriptionError.textContent = "Description cannot be empty";
    clearErrorAfterDelay(descriptionError);
    isValid = false;
  } else if (description.length < 10) {
    descriptionError.textContent = "Description must be at least 10 characters";
    clearErrorAfterDelay(descriptionError);
    isValid = false;
  } else if (description.length > 50) {
    descriptionError.textContent = "Description cannot exceed 50 characters";
    clearErrorAfterDelay(descriptionError);
    isValid = false;
  } else {
    descriptionError.textContent = "";
  }

  return isValid;
}

function resetForm() {
  document.getElementById("editItemForm").reset();
  // Clear all error messages
  const errorElements = document.getElementsByClassName("error-message");
  for (let i = 0; i < errorElements.length; i++) {
    errorElements[i].textContent = "";
  }
}
