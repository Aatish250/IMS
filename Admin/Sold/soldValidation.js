// Get form elements
const sellForm = document.querySelector(".sell-form");
const titleInput = document.querySelector('input[name="title"]');
const priceInput = document.querySelector('input[name="price"]');

// Create error message elements
const titleError = document.createElement("div");
titleError.style.color = "red";
titleError.style.fontSize = "12px";
titleInput.parentNode.appendChild(titleError);

const priceError = document.createElement("div");
priceError.style.color = "red";
priceError.style.fontSize = "12px";
priceInput.parentNode.appendChild(priceError);

// Function to show error for 3 seconds
function showError(element, message, inputField) {
  element.textContent = message;
  inputField.style.borderColor = "red";
  setTimeout(() => {
    element.textContent = "";
    inputField.style.borderColor = "";
  }, 3000);
}

// Add form submit handler
sellForm.addEventListener("submit", (e) => {
  let isValid = true;

  // Validate title
  const titleRegex = /^[a-zA-Z][a-zA-Z0-9\s]*$/;
  if (!titleInput.value.trim()) {
    showError(titleError, "Title is required", titleInput);
    isValid = false;
  } else if (!titleRegex.test(titleInput.value.trim())) {
    showError(
      titleError,
      "Title must start with a letter and contain only letters and numbers",
      titleInput
    );
    isValid = false;
  }

  // Validate price
  if (!priceInput.value) {
    showError(priceError, "Price is required", priceInput);
    isValid = false;
  } else if (priceInput.value <= 0) {
    showError(priceError, "Price must be greater than 0", priceInput);
    isValid = false;
  }

  // Prevent form submission if validation fails
  if (!isValid) {
    e.preventDefault();
  }
});

// Add input handlers for live validation
titleInput.addEventListener("input", () => {
  const titleRegex = /^[a-zA-Z][a-zA-Z0-9\s]*$/;
  if (titleInput.value.trim() && titleRegex.test(titleInput.value.trim())) {
    titleInput.style.borderColor = "";
    titleError.textContent = "";
  }
});

priceInput.addEventListener("input", () => {
  if (priceInput.value > 0) {
    priceInput.style.borderColor = "";
    priceError.textContent = "";
  }
});
