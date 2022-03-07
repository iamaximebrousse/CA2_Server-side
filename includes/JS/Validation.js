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
    document.getElementById('name_err').innerHTML = 'Valid user id';
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
        if(userid_length<15 || userid_length>100)
    {
    document.getElementById('desc_err').innerHTML = 'Value must not be less than 15 characters and greater than 100 characters';
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
        var categories_description = document.getElementById("categories");
        var categories_value = document.getElementById("categories").value;
        var categories_length = categories_value.length;
        if(categories_length<15 || categories_length>100)
    {
    document.getElementById('cat_err').innerHTML = 'Value must not be less than 15 characters and greater than 100 characters';
    categories_name.focus();
    document.getElementById('cat_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('cat_err').innerHTML = 'Valid description';
    document.getElementById('cat_err').style.color = "#00AF33";
    }
    }
    //user id validation ends

    
    