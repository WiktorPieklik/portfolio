package com.example.wiktorpieklik.drinkshop.Database.DataSource;

import com.example.wiktorpieklik.drinkshop.Database.ModelDB.Favourite;

import java.util.List;

import io.reactivex.Flowable;

public interface IFavouriteRepository
{
    Flowable<List<Favourite>> getFavourites();
    int isFavourite(int itemId);
    void delete(Favourite favourite);
    void insert(Favourite... favourites);
}
