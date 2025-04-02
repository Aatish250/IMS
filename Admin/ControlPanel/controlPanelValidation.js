document.addEventListener("DOMContentLoaded", function () {
  // Staff elements
  const staffForm = document.querySelector("#add-staff-section form");
  const usernameInput = document.getElementById("username");
  const passwordInput = document.getElementById("password");

  // Category elements
  const categoryForm = document.querySelector("#add-category-section form");
  const categoryInput = document.getElementById("category");

  // Defining validation patterns
  const patterns = {
    username: {
      regex: /^[a-zA-Z0-9_]{3,20}$/,
      message:
        "Username must be 3-20 characters long and can only contain letters, numbers, and underscores",
    },
    password: {
      regex:
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/,
      message:
        "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character",
    },
    category: {
      regex: /^[a-zA-Z\s]{2,50}$/,
      message:
        "Category must be 2-50 characters long and can only contain letters",
    },
  };

  // Function to validate input fields
  function validateInput(input, type) {
    const value = input.value.trim();
    const pattern = patterns[type];
    const isValid = pattern.regex.test(value);

    input.setCustomValidity(isValid ? "" : pattern.message);
    return isValid;
  }

  // Add input event listeners for real-time validation
  usernameInput.addEventListener("input", function () {
    validateInput(this, "username");
  });

  passwordInput.addEventListener("input", function () {
    validateInput(this, "password");
  });

  categoryInput.addEventListener("input", function () {
    validateInput(this, "category");
  });

  // Staff form submission validation
  staffForm.addEventListener("submit", function (e) {
    const username = usernameInput.value.trim();
    const password = passwordInput.value;

    // Check if fields are empty
    if (!username || !password) {
      e.preventDefault();
      flashMessage("Please fill in all fields", 3);
      return;
    }

    // Validate username and password
    if (!validateInput(usernameInput, "username")) {
      e.preventDefault();
      flashMessage("Invalid username format", 3);
      return;
    }

    if (!validateInput(passwordInput, "password")) {
      e.preventDefault();
      flashMessage("Invalid password format", 3);
      return;
    }
  });

  // Category form submission validation
  categoryForm.addEventListener("submit", function (e) {
    const category = categoryInput.value.trim();

    // Check if category field is empty
    if (!category) {
      e.preventDefault();
      flashMessage("Please enter a category name", 3);
      return;
    }

    // Validate category
    if (!validateInput(categoryInput, "category")) {
      e.preventDefault();
      flashMessage("Invalid category format", 3);
      return;
    }
  });
});
