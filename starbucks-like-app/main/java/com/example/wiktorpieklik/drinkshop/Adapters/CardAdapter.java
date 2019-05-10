package com.example.wiktorpieklik.drinkshop.Adapters;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.cepheuen.elegantnumberbutton.view.ElegantNumberButton;
import com.example.wiktorpieklik.drinkshop.Database.ModelDB.Card;
import com.example.wiktorpieklik.drinkshop.R;
import com.example.wiktorpieklik.drinkshop.Utils.Common;
import com.squareup.picasso.Picasso;

import java.util.List;

public class CardAdapter extends RecyclerView.Adapter<CardAdapter.ViewHolder>
{
    List<Card> cards;
    Context context;

    public CardAdapter(List<Card> cards, Context context)
    {
        this.cards = cards;
        this.context = context;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType)
    {
        CardView layout = (CardView)LayoutInflater.from(context).inflate(R.layout.card_item_layout, parent, false);
        return new ViewHolder(layout);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, final int position)
    {
        CardView cardView = holder.cardView;
        ImageView img = cardView.findViewById(R.id.img_product);
        TextView name = cardView.findViewById(R.id.txt_product_name);
        TextView sugar_ice = cardView.findViewById(R.id.txt_sugar_ice);
        TextView price = cardView.findViewById(R.id.txt_price);
        ElegantNumberButton count = cardView.findViewById(R.id.txt_amount);

        Picasso.with(context)
                .load(cards.get(position).link)
                .into(img);

        count.setNumber(String.valueOf(cards.get(position).amount));
        price.setText(new StringBuilder("$").append(cards.get(position).price));
        name.setText(new StringBuilder(cards.get(position).name));
        sugar_ice.setText(new StringBuilder("Sugar: ")
        .append(cards.get(position).sugar).append(" %").append("\n")
        .append("Ice: ").append(cards.get(position).ice).append(" %").toString());


        //Auto save item when values change
        count.setOnValueChangeListener(new ElegantNumberButton.OnValueChangeListener()
        {
            @Override
            public void onValueChange(ElegantNumberButton view, int oldValue, int newValue)
            {
                Card card = cards.get(position);
                card.amount = newValue;
                Common.cardRepository.updateCard(card);
            }
        });
    }

    @Override
    public int getItemCount()
    {
        return cards.size();
    }

    class ViewHolder extends RecyclerView.ViewHolder
    {
        CardView cardView;
        public ViewHolder(CardView c)
        {
            super(c);
            cardView = c;
        }
    }
}
