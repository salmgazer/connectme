var ctrUrl = "controller/controller.php?cmd=";

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
    var strUrl = ctrUrl+"1";
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        alert("No results");
        return;
    }
    alert("Yes, some posts");
    displayPosts(objResult.posts);
}

function displayPosts(posts){
    for(var i = 0; i < posts.length; i++){
        //display here
    }
}

//search all posts
function searchPosts(){
    var strUrl = ctrUrl+"2";
    objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        alert("no such posts");
        return;
    }
    displayPosts(objResult.posts);
}

function getPostCategories(){

}
