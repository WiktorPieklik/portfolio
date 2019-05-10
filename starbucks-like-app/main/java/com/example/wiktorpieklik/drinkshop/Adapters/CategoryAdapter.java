package com.example.wiktorpieklik.drinkshop.Adapters;

import android.content.Context;
import android.content.Intent;
import android.support.annotation.NonNull;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.wiktorpieklik.drinkshop.DrinkActivity;
import com.example.wiktorpieklik.drinkshop.Interfaces.IItemClickListener;
import com.example.wiktorpieklik.drinkshop.Model.Category;
import com.example.wiktorpieklik.drinkshop.R;
import com.example.wiktorpieklik.drinkshop.Utils.Common;
import com.squareup.picasso.Picasso;

import java.util.List;

public class CategoryAdapter extends RecyclerView.Adapter<CategoryAdapter.CategoryViewHolder>
{
    List<Category> categories;
    Context context;

    public CategoryAdapter(Context context, List<Category> categories)
    {
        this.context = context;
        this.categories = categories;
    }

    @NonNull
    @Override
    public CategoryViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType)
    {
        CardView cardView =(CardView)LayoutInflater.from(context).inflate(R.layout.menu_item_layout, null, false);
        return new CategoryViewHolder(cardView);
    }

    @Override
    public void onBindViewHolder(@NonNull CategoryViewHolder holder, final int position)
    {
        CardView cardView = holder.cardView;
        TextView name = cardView.findViewById(R.id.txt_menu_name);
        ImageView image = cardView.findViewById(R.id.image_product);

        Picasso.with(context)
                .load(categories.get(position).getLink())
                .into(image);
        name.setText(categories.get(position).getName());

        holder.setItemClickListener(new IItemClickListener()
        {
            @Override
            public void onClick(View view)
            {
                Common.currentCategory = categories.get(position);
                context.startActivity(new Intent(context, DrinkActivity.class));
            }
        });
    }

    @Override
    public int getItemCount()
    {
        return categories.size();
    }

    public class CategoryViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener
    {
        CardView cardView;
        IItemClickListener listener;

        public CategoryViewHolder(CardView c)
        {
            super(c);
            cardView = c;
            cardView.setOnClickListener(this);
        }

        @Override
        public void onClick(View v)
        {
            if(listener != null)
                listener.onClick(v);
        }

        public void setItemClickListener(IItemClickListener listener)
        {
            this.listener = listener;
        }
    }
}
