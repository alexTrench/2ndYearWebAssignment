function displayJSONexampl( obj ){
    'use strict';
    // create variables, declared at the top of the function
    var retText = "<h2>Employees</h2>",
        employees = obj.company.employee,
        nEmployees = obj.company.employee.length,
        n, currentEmployee;
    // loop through the employees
    for (n = 0; n < nEmployees; n += 1) {
        // store the current employee for easy reference
        currentEmployee = employees[n];
        // add the employee info to the return variable
        retText += "<p>name: " +currentEmployee.name +
            "<br/>id: " + currentEmployee.id +
            ", gender: " + currentEmployee.gender +
            ", age: " + currentEmployee.age +
            "</p>";
    }
    // write the return text variable into the display element on the html page
    document.getElementById('offers').innerHTML = retText;
}
function displayJSON(obj) {
    'use strict';

    var retText = "<h2>Books</h2>",
        books = obj.bookTitle,
        cat = obj.catDesc,
        price = obj.bookPrice;

    retText += "<p>Title: " +obj.bookTitle +
        "<br/>Description: " + obj.catDesc +
        ", Price: " + obj.bookPrice +
        "</p>";


    document.getElementById('offers').innerHTML = retText;
}
