package com.example.wiktorpieklik.drinkshop.Adapters;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.wiktorpieklik.drinkshop.Database.ModelDB.Favourite;
import com.example.wiktorpieklik.drinkshop.R;
import com.squareup.picasso.Picasso;

import java.util.List;

public class FavouriteAdapter extends RecyclerView.Adapter<FavouriteAdapter.FavouriteViewHolder>
{
    Context context;
    List<Favourite> favourites;

    public FavouriteAdapter(Context context, List<Favourite> favourites)
    {
        this.context = context;
        this.favourites = favourites;
    }

    @NonNull
    @Override
    public FavouriteViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType)
    {
        View layout = LayoutInflater.from(context).inflate(R.layout.fav_item_layout, parent, false);
        return new FavouriteViewHolder(layout);
    }

    @Override
    public void onBindViewHolder(@NonNull FavouriteViewHolder holder, int position)
    {
        Picasso.with(context)
                .load(favourites.get(position).link)
                .into(holder.img_product);
        holder.product_name.setText(favourites.get(position).name);
        holder.product_price.setText(new StringBuilder("$").append(favourites.get(position).price).toString());
    }

    @Override
    public int getItemCount()
    {
        return favourites.size();
    }

    class FavouriteViewHolder extends RecyclerView.ViewHolder
    {
        ImageView img_product;
        TextView product_price, product_name;

        public FavouriteViewHolder(View view)
        {
            super(view);
            img_product = view.findViewById(R.id.img_product);
            product_price = view.findViewById(R.id.txt_price);
            product_name = view.findViewById(R.id.txt_product_name);
        }
    }
}
