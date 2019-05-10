package com.example.wiktorpieklik.blogapp.Adapters;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.text.format.DateFormat;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.example.wiktorpieklik.blogapp.Comons.Common;
import com.example.wiktorpieklik.blogapp.Models.Comment;
import com.example.wiktorpieklik.blogapp.R;

import java.util.Calendar;
import java.util.List;
import java.util.Locale;

public class CommentAdapter extends RecyclerView.Adapter<CommentAdapter.CommentViewHolder>
{
    private Context context;
    private List<Comment> comments;

    public CommentAdapter(Context context, List<Comment> comments)
    {
        this.context = context;
        this.comments = comments;
    }

    @NonNull
    @Override
    public CommentViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i)
    {
        View layout = LayoutInflater.from(context).inflate(R.layout.comment_layout, viewGroup, false);
        return new CommentViewHolder(layout);
    }

    @Override
    public void onBindViewHolder(@NonNull CommentViewHolder holder, int i)
    {
        Glide.with(context)
                .load(Common.currentUser.getPhotoUrl())
                .into(holder.userImg);
        holder.userName.setText(Common.currentUser.getDisplayName());
        holder.comment.setText(comments.get(i).getContent());
        holder.time.setText(timeStampToString((long)comments.get(i).getTimeStamp()));
    }

    @Override
    public int getItemCount()
    {
        return comments.size();
    }

    class CommentViewHolder extends RecyclerView.ViewHolder
    {
        TextView userName, comment, time;
        ImageView userImg;
        public CommentViewHolder(View view)
        {
            super(view);
            userName = view.findViewById(R.id.comment_user_name);
            comment = view.findViewById(R.id.comment_content);
            userImg = view.findViewById(R.id.comment_user_img);
            time = view.findViewById(R.id.comment_time);
        }
    }

    private String timeStampToString(long timeStamp)
    {
        Calendar calendar = Calendar.getInstance(Locale.getDefault());
        calendar.setTimeInMillis(timeStamp);
        String date = DateFormat.format("dd-MM-yyy HH:mm", calendar).toString();
        return date;
    }
}
