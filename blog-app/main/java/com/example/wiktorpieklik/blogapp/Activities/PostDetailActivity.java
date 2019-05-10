package com.example.wiktorpieklik.blogapp.Activities;

import android.support.annotation.NonNull;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.text.format.DateFormat;
import android.view.View;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.example.wiktorpieklik.blogapp.Adapters.CommentAdapter;
import com.example.wiktorpieklik.blogapp.Comons.Common;
import com.example.wiktorpieklik.blogapp.Models.Comment;
import com.example.wiktorpieklik.blogapp.R;
import com.google.android.gms.tasks.OnFailureListener;
import com.google.android.gms.tasks.OnSuccessListener;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;
import java.util.Locale;

public class PostDetailActivity extends AppCompatActivity
{

    ImageView postImg, currentUserImg, userPostImg;
    TextView postDescription, postDate, postTitle;
    EditText comment;
    Button addComment;

    RecyclerView commentsRecycler;
    CommentAdapter adapter;
    private List<Comment> comments = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_post_detail);

        //setting status bar transparent
        getWindow().setFlags(WindowManager.LayoutParams.FLAG_LAYOUT_NO_LIMITS, WindowManager.LayoutParams.FLAG_LAYOUT_NO_LIMITS);
        getSupportActionBar().hide();


        //init views
        postImg = findViewById(R.id.post_detail_img);
        currentUserImg = findViewById(R.id.post_detail_currentuser_img);
        userPostImg = findViewById(R.id.post_detail_userImg);
        postDescription = findViewById(R.id.post_detail_description);
        postDate = findViewById(R.id.post_detail_date);
        postTitle = findViewById(R.id.post_detail_title);
        comment = findViewById(R.id.post_detail_comment);
        addComment = findViewById(R.id.post_detail_add_button);
        commentsRecycler = findViewById(R.id.comment_recyclerView);


        //set content to views
        Glide.with(this)
                .load(Common.currentPost.getPicture())
                .into(postImg);

        Glide.with(this)
                .load(Common.currentPost.getUserPhoto())
                .into(userPostImg);

        Glide.with(this)
                .load(Common.currentUser.getPhotoUrl())
                .into(currentUserImg);

        postTitle.setText(Common.currentPost.getTitle());
        postDescription.setText(Common.currentPost.getDescription());
        postDate.setText(postStampToString((long)Common.currentPost.getTimeStamp()));


        addComment.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                DatabaseReference commentReference = Common.firebaseDb.getReference(Common.COMMENT_KEY).child(Common.currentPost.getPostKey()).push();
                String commentContent = comment.getText().toString();
                final Comment commentObj = new Comment(commentContent, Common.currentUser.getUid(), Common.currentUser.getPhotoUrl().toString(), Common.currentUser.getDisplayName());

                commentReference.setValue(commentObj)
                        .addOnSuccessListener(new OnSuccessListener<Void>()
                        {
                            @Override
                            public void onSuccess(Void aVoid)
                            {
                                showMessage("Comment added successfuly");
                                comment.setText("");
                            }
                        }).addOnFailureListener(new OnFailureListener()
                {
                    @Override
                    public void onFailure(@NonNull Exception e)
                    {
                        showMessage("Fail" + e.getMessage());
                    }
                });
            }
        });
        initRecyclerView();
    }

    private void initRecyclerView()
    {
        commentsRecycler.setHasFixedSize(true);
        commentsRecycler.setLayoutManager(new LinearLayoutManager(this));

        Common.firebaseDb.getReference(Common.COMMENT_KEY).child(Common.currentPost.getPostKey())
                .addValueEventListener(new ValueEventListener()
                {
                    @Override
                    public void onDataChange(@NonNull DataSnapshot dataSnapshot)
                    {
                        comments.clear();
                        for(DataSnapshot snap : dataSnapshot.getChildren())
                        {
                            Comment commentObj = snap.getValue(Comment.class);
                            comments.add(commentObj);
                        }
                        adapter = new CommentAdapter(PostDetailActivity.this, comments);
                        commentsRecycler.setAdapter(adapter);
                    }

                    @Override
                    public void onCancelled(@NonNull DatabaseError databaseError)
                    {

                    }
                });
    }

    private void showMessage(String prompt)
    {
        Toast.makeText(this, prompt, Toast.LENGTH_SHORT).show();
    }

    private String postStampToString(long timeStamp)
    {
        Calendar calendar = Calendar.getInstance(Locale.getDefault());
        calendar.setTimeInMillis(timeStamp);
        String date = DateFormat.format("dd-MM-yyyy HH:mm", calendar).toString();
        return date;
    }
}
