document.getElementById('signForm').addEventListener('submit', async (event) => {
    event.preventDefault();

    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const mobile = document.getElementById('mobile').value.trim();
    const password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirmPassword').value.trim();

    const msg = document.getElementById('message');

    // Reset courses array before populating it
    let courses = [];

    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        if (checkbox.checked) {
            courses.push(checkbox.value);
        }
    });

    const formData = {
        Name: name,
        Email: email,
        Mobile: mobile,
        Course: JSON.stringify(courses),
        Password: password,
        ConfirmPassword: confirmPassword
    };

    const validateFormData = (formData) => {
        let isValid = true;
    
        const nameError = document.getElementById('nameError');
        const emailError = document.getElementById('emailError');
        const mobileError = document.getElementById('mobileError');
        const courseError = document.getElementById('courseError');
        const passwordError = document.getElementById('passwordError');
        const confirmPasswordError = document.getElementById('confirmPasswordError');
    
        // Reset error messages
        nameError.textContent = "";
        emailError.textContent = "";
        mobileError.textContent = "";
        courseError.textContent = "";
        passwordError.textContent = "";
        confirmPasswordError.textContent = "";
    
        if (formData.Name === '') {
            nameError.textContent = 'Name is required';
            isValid = false;
        } else if (formData.Name.length < 3) {
            nameError.textContent = "Name must be at least 3 characters";
            isValid = false;
        }
    
        if (formData.Email === '') {
            emailError.textContent = 'Email is required';
            isValid = false;
        } else if (!formData.Email.includes('@')) {
            emailError.textContent = 'Email is not valid';
            isValid = false;
        }
    
        const valid = /[4-9]/;
        if (!valid.test(formData.Mobile.charAt(0))) {
            mobileError.textContent = 'Mobile number is not valid';
            isValid = false;
        } else if (formData.Mobile.length !== 10 || isNaN(formData.Mobile)) {
            mobileError.textContent = 'Mobile number must be exactly 10 digits';
            isValid = false;
        }
    
        if (courses.length === 0) {
            courseError.textContent = 'Please select at least one course';
            isValid = false;
        }
    
        if (formData.Password === '') {
            passwordError.textContent = 'Password is required';
            isValid = false;
        }
    
        if (formData.Password !== formData.ConfirmPassword) {
            confirmPasswordError.textContent = 'Passwords do not match';
            isValid = false;
        }
    
        return isValid;
    };

    if (validateFormData(formData)) {
        // Form is valid, you can submit the form here
        document.getElementById('signForm').submit(); ;
    }
});
