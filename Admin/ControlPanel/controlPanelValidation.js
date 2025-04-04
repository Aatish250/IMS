document.addEventListener("DOMContentLoaded", function () {
  // Staff elements
  const usernameInput = document.getElementById("username");
  const passwordInput = document.getElementById("password");

  // Category elements
  const categoryInput = document.getElementById("category");

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

  usernameInput.addEventListener("input", function () {
    validateInput(this, "username");
  });

  passwordInput.addEventListener("input", function () {
    validateInput(this, "password");
  });

  categoryInput.addEventListener("input", function () {
    validateInput(this, "category");
  });
});
