var strUrl = "controller/controller.php?cmd=";
function sendRequest(u) {
    // Send request to server
    //u a url as a string
    //async is type of request
    var obj = $.ajax({url: u, async: false});
    //Convert the JSON string to object
    var result = $.parseJSON(obj.responseText);
    return result;	//return object
}

//get all posts
function getAllPosts(){

}

//search all posts
function searchPosts(){

}

function getPostCategories(){

}
