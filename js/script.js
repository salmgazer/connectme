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
    alert("confirm");
    var strUrl = ctrUrl+"3";
    var objResult = sendRequest(strUrl);
    if(objResult.result == 0){
        alert("No results");
        return;
    }
    alert("Yes, some posts");
    displayPosts(objResult.posts);
}

function displayPosts(posts){
    var myposts = "";
    for(var i = 0; i < posts.length; i++){
        myposts += '<div class="row"><div class="card white"><div class="card-content black-text"><span class="card-title black-text"></span><p>'+posts[0]['content']+'</p></div><div class="card-action"><a href="#">This is a link</a><a href="#">This is a link</a></div></div></div>';
    }
    document.getElementById("postsArea").innerHTML = myposts;
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
