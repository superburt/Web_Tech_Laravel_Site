<?php
Route::get('/', function(){
    $sql = "SELECT post.*, COUNT(comment.post_id) as Comment_Count
    FROM post LEFT JOIN comment ON post.id=comment.Post_ID  GROUP BY post.id, comment.Post_ID";
    $posts = DB::select($sql);
    return view('posts.post_list')->with('posts', $posts);
});
// the sql in this route selects the left side of a join with post and comment, where post id = comment.post_id and this selects the count of this,
// so it counts the number of times (comments) there is an intersection, and we then dispaly this with posts. (ie, select all posts, with number of comments)

Route::get('unique_users', function(){
    $sql = "SELECT DISTINCT name from post order by name";
    $posts = DB::select($sql);
    return view('posts.unique_users')->with('posts', $posts);
});
//this route simply selects unique names from post and orders them by name. Returns the view with the variable stored inside it.


Route::get('recent_posts', function(){
    $sql = "select * from post where Date > (SELECT DATE('now', '-7 day'))";
    $posts = DB::select($sql);
    return view('posts.recent_posts')->with('posts', $posts);
});

//Selects recent posts by using sql command to find posts created within the last 7 days. Stores this to a variable, passes this variable to the view.

Route::get('user_posts/{Name}', function($Name){
    $sql="select * from post where Name = ?";
    $posts = DB::select($sql, array($Name));
    return view('posts.user_posts')->with('posts', $posts);
});

// shows posts made by a user. 

Route::get('post_detail/{id}', function($id){
    $post = get_post($id);
    $sql="select *from comment where Post_ID = $id";
    $comments = DB::select($sql);
    return view('posts.post_detail')->with('post', $post)->with('comments', $comments);
});

// shows the comments of a post and all of it's details.

Route::get('add_post', function(){
    return view("posts.add_post");
});

//this route returns the add_post view

Route::get('Documentation', function(){
    return view('posts.Documentation');
});

//this route returns the documentation view

Route::post('add_comment_action', function(){
    $Icon = request('Icon');
    $Name = request('Name');
    $Body = request('Body');
    $Date = request('Date');
    $Post_ID = request('Post_ID');
    $id = add_comment($Icon, $Name, $Body, $Date, $Post_ID);
    if ($id){
        return redirect(url("/"));
    } else {
        die("error while adding comment");
    }
});

// route posts to the database, takes input from the add_comment form, and then redirects to the home page on enter

Route::post('add_post_action', function(){
    $Icon = request('Icon');
    $Title = request('Title');
    $Name = request('Name');
    $Body = request('Body');
    $Date = request('Date');
    $id = add_post($Icon, $Title, $Name, $Body, $Date);
    if ($id){
        return redirect(url("/"));
    } else {
        die("error while adding post");
    }
});

//this route posts to the database, takes input from the add_post form, and then redirects to the home page on enter

Route::get('update_post/{id}', function($id){
    $post = get_post($id);
    return view("posts.update_post")->with('post',$post);
});

//this route gets the id from the url, passes it to the update post view

Route::post('update_post_action', function(){
    $Icon = request('Icon');
    $Title = request('Title');
    $Name = request('Name');
    $Body = request('Body');
    $Date = request('Date');
    $id = request('id');
    update_post($id, $Icon, $Title, $Name, $Body, $Date);
    $post = get_post($id);
    return view('posts.post_detail')->with('post', $post);
});

// this route posts to the database -- updates to a post based the update_post function, returns the view post_detail with update post variable

Route::get('delete_post/{id}', function($id){
    $id = request('id');
    $post = delete_post($id);
    return redirect(url("/"));
});

//this route deletes a post and then redirects to the homepage

Route::get('delete_comment/{id}', function($id){
    $id = request('id');
    $comment=delete_comment($id);
    return redirect(url("/"));
});
//this route deletes a comment and then redirects to the homepage

function update_post($id, $Icon, $Title, $Name, $Body, $Date){
    $sql ="update post set Icon = ?, Title = ?, Name = ?, Body = ?, Date = ? where id = ? ";
    DB::update($sql, array($Icon, $Title, $Name, $Body, $Date, $id));
    $post = get_post($id);
}
//this function updates a post based off of the given user input within the view, and then saves this update to the database

function add_post($Icon, $Title, $Name, $Body, $Date){
    $sql = "insert into post (Icon, Title, Name, Body, Date) values (?, ?, ?, ?, ?)";
    DB::insert($sql, array($Icon, $Title, $Name, $Body, $Date));
    $id = DB::getPdo()->lastInsertId();
    return($id);
}
//this function adds a post, and assigns it a new ID based off of the last inserted id for post

function add_comment($Icon, $Name, $Body, $Date, $Post_ID){
    $sql = "insert into comment(Icon, Name, Body, Date, Post_ID) values (?, ?, ?, ?, ?)";
    DB::insert($sql, array($Icon, $Name, $Body, $Date, $Post_ID));
    $id = DB::getPdo()->lastInsertID();
    return($id);
} 
//this function adds a comment, and assigns it a new ID based off of the last inserted id for comment

function get_post($id){
    $sql = "select * from post where id=?";
    $posts = DB::select($sql, array($id));
    if (count($posts)!=1){
        die("Something has gone wrong:$sql");
    }
    $post = $posts[0];
    return $post;
}
//this function gets posts according to the provided id

function delete_post($id){
    $sql="delete from comment where Post_ID = ?";
    DB::delete($sql, array($id));
    $sql="delete from post where id = ?";
    DB::delete($sql, array($id));
}

//this function deletes a post from the database based on the given value for the variable $id

function delete_comment($id){
    $sql="delete from comment where id = ?";
    DB::delete($sql, array($id));
}

//this function deletes a comment from the database based on the given value for the variable $id