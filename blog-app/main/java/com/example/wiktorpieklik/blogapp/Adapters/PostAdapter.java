package com.example.wiktorpieklik.blogapp.Adapters;

import android.content.Context;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.example.wiktorpieklik.blogapp.Activities.PostDetailActivity;
import com.example.wiktorpieklik.blogapp.Comons.Common;
import com.example.wiktorpieklik.blogapp.Interfaces.IItemClicked;
import com.example.wiktorpieklik.blogapp.Models.Post;
import com.example.wiktorpieklik.blogapp.R;

import java.util.List;

public class PostAdapter extends RecyclerView.Adapter<PostAdapter.PostViewHolder>
{
    private List<Post> posts;
    private Context context;

    public PostAdapter(List<Post> posts, Context context)
    {
        this.posts = posts;
        this.context = context;
    }

    @NonNull
    @Override
    public PostViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType)
    {
        View layout = LayoutInflater.from(context).inflate(R.layout.row_post_item_layout, parent,false);
        return new PostViewHolder(layout);
    }

    @Override
    public void onBindViewHolder(@NonNull PostViewHolder holder, final int position)
    {
        TextView title = holder.postTitle;
        final ImageView postImage = holder.postImg;
        ImageView userImage = holder.userImg;

        title.setText(posts.get(position).getTitle());

        Glide.with(context)
                .load(posts.get(position).getPicture())
                .into(postImage);
        Glide.with(context)
                .load(posts.get(position).getUserPhoto())
                .into(userImage);

        holder.setListener(new IItemClicked()
        {
            @Override
            public void onClick(View view)
            {
                Common.currentPost = posts.get(position);
                context.startActivity(new Intent(context, PostDetailActivity.class));
            }
        });

    }

    @Override
    public int getItemCount()
    {
        return posts.size();
    }

    class PostViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener
    {
        private IItemClicked listener;
        TextView postTitle;
        ImageView postImg, userImg;
        public PostViewHolder(View view)
        {
            super(view);

            postTitle = view.findViewById(R.id.row_post_title);
            postImg = view.findViewById(R.id.row_post_img);
            userImg = view.findViewById(R.id.row_user_img);

            view.setOnClickListener(this);
        }

        public void setListener(IItemClicked listener)
        {
            this.listener = listener;
        }

        @Override
        public void onClick(View v)
        {
            if(listener != null)
                listener.onClick(v);
        }
    }
}
