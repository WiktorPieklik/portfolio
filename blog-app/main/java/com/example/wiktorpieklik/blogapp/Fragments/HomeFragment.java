package com.example.wiktorpieklik.blogapp.Fragments;


import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.LinearLayout;

import com.example.wiktorpieklik.blogapp.Adapters.PostAdapter;
import com.example.wiktorpieklik.blogapp.Comons.Common;
import com.example.wiktorpieklik.blogapp.Models.Post;
import com.example.wiktorpieklik.blogapp.R;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.ArrayList;
import java.util.List;

/**
 * A simple {@link Fragment} subclass.
 */
public class HomeFragment extends Fragment
{

    RecyclerView postRecycler;
    PostAdapter adapter;
    DatabaseReference dbRef;

    public HomeFragment()
    {
        // Required empty public constructor
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState)
    {
        // Inflate the layout for this fragment
        View layout = inflater.inflate(R.layout.fragment_home, container, false);

        dbRef = Common.firebaseDb.getReference(Common.POST_KEY);


        postRecycler = layout.findViewById(R.id.postsRecycler);
        postRecycler.setLayoutManager(new LinearLayoutManager(getActivity()));
        postRecycler.setHasFixedSize(true);

        return layout;
    }

    @Override
    public void onStart()
    {
        super.onStart();
        //getting list of posts

        dbRef.addValueEventListener(new ValueEventListener()
        {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot)
            {
                Common.posts.clear();
                for(DataSnapshot snap : dataSnapshot.getChildren())
                {
                    Post post = snap.getValue(Post.class);
                    Common.posts.add(post);
                }

                adapter = new PostAdapter(Common.posts, getActivity());
                postRecycler.setAdapter(adapter);
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError)
            {

            }
        });
    }
}
