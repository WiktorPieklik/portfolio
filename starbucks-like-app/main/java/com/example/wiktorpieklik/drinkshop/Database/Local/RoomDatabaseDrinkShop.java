package com.example.wiktorpieklik.drinkshop.Database.Local;

import android.arch.persistence.room.Database;
import android.arch.persistence.room.Room;
import android.arch.persistence.room.RoomDatabase;
import android.content.Context;

import com.example.wiktorpieklik.drinkshop.Database.ModelDB.Card;
import com.example.wiktorpieklik.drinkshop.Database.ModelDB.Favourite;

@Database(entities = {Card.class, Favourite.class}, version = 1)
public abstract class RoomDatabaseDrinkShop extends RoomDatabase
{
    public abstract CardDAO cardDAO();
    public abstract FavouriteDAO favouriteDAO();
    private static RoomDatabaseDrinkShop instance;

    public static RoomDatabaseDrinkShop getInstance(Context context)
    {
        if(instance == null)
            instance = Room.databaseBuilder(context, RoomDatabaseDrinkShop.class, "DrinkShopDB")
                    .allowMainThreadQueries()
                    .build();
        return instance;
    }
}
