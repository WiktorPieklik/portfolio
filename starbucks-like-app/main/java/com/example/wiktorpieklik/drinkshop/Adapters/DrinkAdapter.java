package com.example.wiktorpieklik.drinkshop.Adapters;

import android.app.AlertDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.support.annotation.NonNull;
import android.support.v7.widget.CardView;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.CompoundButton;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.RadioButton;
import android.widget.TextView;
import android.widget.Toast;

import com.cepheuen.elegantnumberbutton.view.ElegantNumberButton;
import com.example.wiktorpieklik.drinkshop.Database.ModelDB.Card;
import com.example.wiktorpieklik.drinkshop.Database.ModelDB.Favourite;
import com.example.wiktorpieklik.drinkshop.Interfaces.IItemClickListener;
import com.example.wiktorpieklik.drinkshop.Model.Drink;
import com.example.wiktorpieklik.drinkshop.R;
import com.example.wiktorpieklik.drinkshop.Utils.Common;
import com.google.gson.Gson;
import com.squareup.picasso.Picasso;

import java.util.List;

public class DrinkAdapter extends RecyclerView.Adapter<DrinkAdapter.DrinkViewHolder>
{
    Context context;
    List<Drink> drinks;

    public DrinkAdapter(Context context, List<Drink> drinks)
    {
        this.context = context;
        this.drinks = drinks;
    }

    @NonNull
    @Override
    public DrinkViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType)
    {
        CardView cardView = (CardView)LayoutInflater.from(context).inflate(R.layout.drink_item_layout, null);
        return new DrinkViewHolder(cardView);
    }

    @Override
    public void onBindViewHolder(@NonNull DrinkViewHolder holder, final int position)
    {
        CardView cardView = holder.cardView;
        ImageView image = cardView.findViewById(R.id.image_product_drink);
        TextView name = cardView.findViewById(R.id.txt_drink_name);
        TextView price = cardView.findViewById(R.id.txt_price);
        ImageView button = cardView.findViewById(R.id.btn_add_cart);
        final ImageView btn_favourites = cardView.findViewById(R.id.btn_favourite);
        button.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                showAddToCardDialog(position);
            }
        });

        price.setText(new StringBuilder("$").append(drinks.get(position).getPrice()));
        name.setText(drinks.get(position).getName());

        Picasso.with(context)
                .load(drinks.get(position).getLink())
                .into(image);

        holder.setItemClickListener(new IItemClickListener()
        {
            @Override
            public void onClick(View view)
            {
                Toast.makeText(context, "Clicked", Toast.LENGTH_SHORT).show();
            }
        });

        //Favourite system
        if(Common.favouriteRepository.isFavourite(Integer.parseInt(drinks.get(position).getId())) == 1)
            btn_favourites.setImageResource(R.drawable.ic_favorite_white_24dp);
        else
            btn_favourites.setImageResource(R.drawable.ic_favorite_border_white_24dp);

        btn_favourites.setOnClickListener(new View.OnClickListener()
        {
            @Override
            public void onClick(View v)
            {
                if(Common.favouriteRepository.isFavourite(Integer.parseInt(drinks.get(position).getId())) != 1)
                {
                    addOrRemoveFavourite(drinks.get(position), true);
                    btn_favourites.setImageResource(R.drawable.ic_favorite_white_24dp);
                }
                else
                {
                    addOrRemoveFavourite(drinks.get(position), false);
                    btn_favourites.setImageResource(R.drawable.ic_favorite_border_white_24dp);
                }
            }
        });
    }

    private void addOrRemoveFavourite(Drink drink, boolean add)
    {
        Favourite favourite = new Favourite();
        favourite.id = Integer.parseInt(drink.getId());
        favourite.link = drink.getLink();
        favourite.name = drink.getName();
        favourite.menuId = Integer.parseInt(drink.getMenuId());
        favourite.price = Double.parseDouble(drink.getPrice());

        if(add)
            Common.favouriteRepository.insert(favourite);
        else
            Common.favouriteRepository.delete(favourite);

    }


    private void showAddToCardDialog(final int position)
    {
        Common.addedToppings.clear();
        Common.toppingPrice = 0.0;

        AlertDialog.Builder builder = new AlertDialog.Builder(context);
        View layout = LayoutInflater.from(context).inflate(R.layout.add_to_card_layout,null,false);
        ImageView product = layout.findViewById(R.id.img_card_product);
        final ElegantNumberButton count = layout.findViewById(R.id.btn_count);
        TextView name = layout.findViewById(R.id.txt_card_product_name);
        EditText comment = layout.findViewById(R.id.edt_comment);

        RadioButton sizeM = layout.findViewById(R.id.radio_sizeM);
        RadioButton sizeL = layout.findViewById(R.id.radio_sizeL);

        sizeM.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener()
        {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked)
            {
                if(isChecked)
                    Common.cupSize = 0;
            }
        });

        sizeL.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener()
        {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked)
            {
                if(isChecked)
                    Common.cupSize = 1;
            }
        });

        RadioButton sugar100 = layout.findViewById(R.id.radio_sugar100);
        RadioButton sugar70 = layout.findViewById(R.id.radio_sugar70);
        RadioButton sugar50 = layout.findViewById(R.id.radio_sugar50);
        RadioButton sugar30 = layout.findViewById(R.id.radio_sugar30);
        RadioButton sugarfree = layout.findViewById(R.id.radio_sugarfree);

        sugar30.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener()
        {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked)
            {
                if(isChecked)
                    Common.sugarLevel = 30;
            }
        });

        sugar50.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener()
        {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked)
            {
                if(isChecked)
                    Common.sugarLevel = 50;
            }
        });

        sugar70.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener()
        {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked)
            {
                if(isChecked)
                    Common.sugarLevel = 70;
            }
        });

        sugar100.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener()
        {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked)
            {
                if(isChecked)
                    Common.sugarLevel = 100;
            }
        });

        sugarfree.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener()
        {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked)
            {
                if(isChecked)
                    Common.sugarLevel = 0;
            }
        });

        RadioButton ice100 = layout.findViewById(R.id.radio_ice100);
        RadioButton ice70 = layout.findViewById(R.id.radio_ice70);
        RadioButton ice50 = layout.findViewById(R.id.radio_ice50);
        RadioButton ice30 = layout.findViewById(R.id.radio_ice30);
        RadioButton icefree = layout.findViewById(R.id.radio_icefree);

        ice30.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener()
        {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked)
            {
                if(isChecked)
                    Common.iceLevel = 30;
            }
        });

        ice50.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener()
        {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked)
            {
                if(isChecked)
                    Common.iceLevel = 50;
            }
        });

        ice70.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener()
        {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked)
            {
                if(isChecked)
                    Common.iceLevel = 70;
            }
        });

        ice100.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener()
        {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked)
            {
                if(isChecked)
                    Common.iceLevel = 100;
            }
        });

        icefree.setOnCheckedChangeListener(new CompoundButton.OnCheckedChangeListener()
        {
            @Override
            public void onCheckedChanged(CompoundButton buttonView, boolean isChecked)
            {
                if(isChecked)
                    Common.iceLevel = 0;
            }
        });

        RecyclerView recyclerTopping = layout.findViewById(R.id.recycler_topping);
        recyclerTopping.setLayoutManager(new LinearLayoutManager(context));
        recyclerTopping.setHasFixedSize(true);
        MultiCheckAdapter adapter = new MultiCheckAdapter(context, Common.toppingList);
        recyclerTopping.setAdapter(adapter);

        Picasso.with(context)
                .load(drinks.get(position).getLink())
                .into(product);
        name.setText(drinks.get(position).getName());
        builder.setView(layout);
        builder.setPositiveButton("Add to card", new DialogInterface.OnClickListener()
        {
            @Override
            public void onClick(DialogInterface dialog, int which)
            {
                if(Common.cupSize == -1)
                {
                    Toast.makeText(context, "Please choose size of cup", Toast.LENGTH_SHORT).show();
                    return;
                }

                if(Common.sugarLevel == -1)
                {
                    Toast.makeText(context, "Please choose sugar level", Toast.LENGTH_SHORT).show();
                    return;
                }

                if(Common.iceLevel == -1)
                {
                    Toast.makeText(context, "Please choose ice level", Toast.LENGTH_SHORT).show();
                    return;
                }

                showConfrimDialog(position, count.getNumber());
                dialog.dismiss();
            }
        });

        builder.show();
    }

    private void showConfrimDialog(final int position, final String number)
    {
        AlertDialog.Builder builder = new AlertDialog.Builder(context);
        View layout = LayoutInflater.from(context).inflate(R.layout.confrim_add_to_card_layout,null,false);

        //views
        ImageView product = layout.findViewById(R.id.img_product);
        final TextView name = layout.findViewById(R.id.txt_card_product_name);
        final TextView price = layout.findViewById(R.id.txt_card_product_price);
        TextView sugar = layout.findViewById(R.id.txt_sugar);
        TextView ice = layout.findViewById(R.id.txt_ice);
        final TextView topping_extra = layout.findViewById(R.id.txt_topping_extra);

        //settng data
        Picasso.with(context)
                .load(drinks.get(position).getLink())
                .into(product);

        name.setText(new StringBuilder(drinks.get(position).getName()).append(Common.cupSize == 0? " Size M": " Size L").toString());
        ice.setText(new StringBuilder("Ice: ").append(Common.iceLevel).append("%").toString());
        sugar.setText(new StringBuilder("Sugar: ").append(Common.sugarLevel).append("%").toString());

        double d_price = (Double.parseDouble(drinks.get(position).getPrice()) * Double.parseDouble(number)) + Common.toppingPrice;
        if(Common.cupSize == 1)
            d_price += 3.0;

        price.setText(new StringBuilder("$").append(d_price).toString());
        StringBuilder topping_final = new StringBuilder("");
        for(String line: Common.addedToppings)
            topping_final.append(line).append("\n");
        topping_extra.setText(topping_final.toString());

        final double finalD_price = d_price;
        builder.setPositiveButton("Confrim", new DialogInterface.OnClickListener()
        {
            @Override
            public void onClick(DialogInterface dialog, int which)
            {
                Common.addedToppings.clear();
                Common.toppingPrice = 0.0;
                dialog.dismiss();

                try
                {
                    //Add to SQL
                    //Create new Card item
                    Card card = new Card();
                    card.name = name.getText().toString();
                    card.amount = Integer.parseInt(number);
                    card.ice = Common.iceLevel;
                    card.sugar = Common.sugarLevel;
                    card.price = finalD_price;
                    card.toppingExtras = topping_extra.getText().toString();
                    card.link = drinks.get(position).getLink();

                    //Add to DB
                    Common.cardRepository.insertToCards(card);
                    Log.d("Drink_DEBUG", new Gson().toJson(card));

                    Toast.makeText(context, "Item added successfully", Toast.LENGTH_SHORT).show();
                }
                catch(Exception ex)
                {
                    Toast.makeText(context, ex.getMessage(), Toast.LENGTH_SHORT).show();
                }
            }
        });

        builder.setView(layout);
        builder.show();
    }


    @Override
    public int getItemCount()
    {
        return drinks.size();
    }

    public class DrinkViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener
    {
        CardView cardView;
        IItemClickListener listener;
        public DrinkViewHolder(CardView c)
        {
            super(c);
            cardView = c;
            cardView.setOnClickListener(this);
        }

        @Override
        public void onClick(View v)
        {
            listener.onClick(v);
        }

        public void setItemClickListener(IItemClickListener iItemClickListener)
        {
            listener = iItemClickListener;
        }
    }
}
