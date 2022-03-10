//name validation starts
function name_validation(){
    
    'use strict';
        var userid_name = document.getElementById("name");
        var userid_value = document.getElementById("name").value;
        var userid_length = userid_value.length;
        if(userid_length<5 || userid_length>20)
    {
    document.getElementById('name_err').innerHTML = 'Value must not be less than 5 characters and greater than 20 characters';
    userid_name.focus();
    document.getElementById('name_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('name_err').innerHTML = 'Valid name';
    document.getElementById('name_err').style.color = "#00AF33";
    }
    }
    //user id validation ends

//description validation starts
function description_validation(){
    
    'use strict';
        var userid_description = document.getElementById("description");
        var userid_value = document.getElementById("description").value;
        var userid_length = userid_value.length;
        if(userid_length<15 || userid_length>1000)
    {
    document.getElementById('desc_err').innerHTML = 'Value must not be less than 15 characters and greater than 1000 characters';
    userid_name.focus();
    document.getElementById('desc_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('desc_err').innerHTML = 'Valid description';
    document.getElementById('desc_err').style.color = "#00AF33";
    }
    }
    //user id validation ends

//categories validation starts
function categories_validation(){
    
    'use strict';
        var categories_name = document.getElementById("add_category_form");
        var categories_value = document.getElementById("add_category_form").value;
        var categories_length = categories_value.length;
        if(categories_length<7 || categories_length>30)
    {
    document.getElementById('cat_err').innerHTML = 'Value must not be less than 5 characters and greater than 30 characters';
    categories_name.focus();
    document.getElementById('cat_err').style.color = "#FF0000";
    document.getElementById("add_category_button").style.cursor = "not-allowed";
    }
    else
    {
    document.getElementById('cat_err').innerHTML = 'Valid description';
    document.getElementById('cat_err').style.color = "#00AF33";
    document.getElementById("add_category_button").style.cursor = "pointer";
    }
    }
    //Categories validation ends

    //software validation starts
function software_validation(){
    
    'use strict';
        var software_name = document.getElementById("software");
        var software_value = document.getElementById("software").value;
        var software_length = software_value.length;
        if(software_length<5 || software_length>20)
    {
    document.getElementById('soft_err').innerHTML = 'Value must not be less than 5 characters and greater than 20 characters';
    software_name.focus();
    document.getElementById('soft_err').style.color = "#FF0000";
    document.getElementById("software").style.cursor = "not-allowed";

    }
    else
    {
    document.getElementById('soft_err').innerHTML = 'Valid name';
    document.getElementById('soft_err').style.color = "#00AF33";
    document.getElementById("software").style.cursor = "pointer";
    }
    }
    //software validation ends
    
    