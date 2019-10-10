/**
 * Created by Alexander on 17/11/2017.
 */
//a.	Make the text saying “I have read and agree to the terms and conditions” change to the colour black and remove the bold if the user checks the terms and conditions checkbox, and return to the original formatting if they uncheck the checkbox
window.addEventListener('load', function initialise () {
    'use strict';
    var frm = document.getElementById('userdetails');

    var checkReadTerms = function () {
        var submit = this.form.querySelector('input[type=submit]');
        submit.disabled = !this.checked;
        /* use ternary if to change the parent label colour based on
         whether the checkbox is checked or not.
         In fact I should also check the parentNode type to ensure
         it's a label.
         */
        this.parentNode.style.color = (this.checked) ? 'red' : '';
    };

    frm.hasreadterms.onchange = checkReadTerms;
});

//b.	The form’s submit button should be disabled until the user has checked the checkbox to say that they have read and agree to the terms and conditions
function SumbmitButton(){
    if(document.orderForm.termsChkbx.checked){

    }

}
//c.	It should not be possible to submit the form if the user does not enter a value into the text entry fields, e.g. for surname or company, and at least one book has not been selected

//d.	The dynamically created form contains details of different books. Next to each is a checkbox that has been given a data-price attribute corresponding to the price of a particular book. The user is also given the choice of collection method for the books which is selected via a radio button, each with a corresponding price.

//Use JavaScript to calculate the total cost of the order based on the book checkboxes that are selected and the choice of delivery method. The total cost should be displayed appropriately to allow the user to consider the cost before committing themselves to making an order. If the user un-checks all of the books that they had previously checked, the total cost should always go back to zero

//e.	A select box has been provided to do with the type of customer. It (“Customer  Type”) allows the user to select whether they are a standard customer or a corporate customer (a business).