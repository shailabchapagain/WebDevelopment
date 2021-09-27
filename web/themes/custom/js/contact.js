
var input = document.querySelector("#contactform-phonenumber");
window.intlTelInput(input, {
    // any initialisation options go here
    defaultCountry: "pt",
    preferredCountries: ['pt', 'us', 'np'],
    responsiveDropdown: true
});

$("#contactform-country").countrySelect({
    defaultCountry: "pt",
    preferredCountries: ['pt', 'us', 'np'],
    responsiveDropdown: true
});
