let validateEmail = (email) => {
    let email_regex = /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
    return email_regex.test(email);
}

let validateName = (name) => {
    let name_regex = /^[a-zA-Z ]+$/;
    return name_regex.test(name);
}