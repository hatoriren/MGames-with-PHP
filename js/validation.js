$(document).ready(function () {
    // Динамічне перемикання між формами
    const signUpButton = $("#signUpButton");
    const signInButton = $("#signInButton");
    const signInForm = $("#signIn");
    const signUpForm = $("#signUp");

    signUpButton.on("click", function () {
        signInForm.hide();
        signUpForm.show();
        signUpForm.css("padding-left", "100px");
    });

    signInButton.on("click", function () {
        signUpForm.hide();
        signInForm.show();
        signInForm.css("padding-left", "100px");
    });

    // Валідація форм
    $("form").on("submit", function (e) {
        const formId = $(this).parent().parent().attr("id");
        let isValid = true;

        // Спільна логіка для обох форм
        const emailInput = $(`#${formId} #email`);
        const passwordInput = $(`#${formId} #password`);
        const emailError = $(`#${formId} #email-error`);
        const passwordError = $(`#${formId} #password-error`);

        // Очистка помилок
        emailError.text("");
        passwordError.text("");

        // Валідація email
        const emailValue = emailInput.val().trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailValue || !emailRegex.test(emailValue)) {
            emailError.text("Please enter a valid email address.");
            isValid = false;
        }

        // Валідація пароля
        const passwordValue = passwordInput.val();
        if (!passwordValue || passwordValue.length < 8) {
            passwordError.text("Your password must contain at least 8 characters.");
            isValid = false;
        }

        // Якщо валідація провалена, зупиняємо форму
        if (!isValid) {
            e.preventDefault();
            return;
        }

        // AJAX-запити залежно від форми
        if (formId === "signIn") {
            // Логіка логування
            e.preventDefault();
            $.ajax({
                url: "login_process.php", // Серверний скрипт для логування
                type: "POST",
                data: {
                    email: emailValue,
                    password: passwordValue,
                },
                dataType: "json",
                success: function (response) {
                    if (response.error) {
                        emailError.text(response.error); // Вивід помилки
                    } else if (response.redirect) {
                        window.location.href = response.redirect; // Перенаправлення на index.html
                    }
                },
                error: function () {
                    emailError.text("Server error. Please try again later.");
                },
            });
        } else if (formId === "signUp") {
            // Логіка реєстрації
            e.preventDefault();
            const fName = $("#signUp #fName").val();
            const lName = $("#signUp #lName").val();

            $.ajax({
                url: "register_process.php", // Серверний скрипт для реєстрації
                type: "POST",
                data: {
                    fName: fName,
                    lName: lName,
                    email: emailValue,
                    password: passwordValue,
                    signUp: true,
                },
                dataType: "json",
                success: function (response) {
                    if (response.error) {
                        emailError.text(response.error); // Вивід помилки
                    } else if (response.redirect) {
                        alert("Registration successful! Redirecting...");
                        window.location.href = response.redirect; // Перенаправлення на index.html
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error("AJAX error:", jqXHR.responseText, textStatus, errorThrown);
                    emailError.text("Server error. Please try again later.");
                },
            });
        }
    });
});
