function cancel() {
    window.location.href = "profile.php";
};

function but_del() {
    let accept = prompt("Для подтверждения введите свой пароль: ");
    let pass = document.querySelector('.data-php').getAttribute('data-pass');
    if (accept == pass) {
        window.location.href = "vendor/del_acc.php";
    } else {
        alert("Неверный пароль!");
    }
};