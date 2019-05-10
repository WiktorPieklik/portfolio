package com.example.wiktorpieklik.blogapp.Comons;

import com.example.wiktorpieklik.blogapp.Models.Post;
import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.storage.FirebaseStorage;

import java.util.ArrayList;
import java.util.List;

public class Common
{
    public static FirebaseAuth mAuth = FirebaseAuth.getInstance();
    public static FirebaseDatabase firebaseDb = FirebaseDatabase.getInstance();
    public static FirebaseStorage storage = FirebaseStorage.getInstance();

    public static FirebaseUser currentUser;

    public static List<Post> posts = new ArrayList<>();
    public static Post currentPost;

    public static String POST_KEY = "Posts";
    public static String COMMENT_KEY = "Comment";
    public static String USER_PHOTOS = "usersPhotos";
    public static String POST_IMG = "blog_images";
}
