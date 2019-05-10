package com.example.wiktorpieklik.drinkshop.Database.DataSource;

import com.example.wiktorpieklik.drinkshop.Database.Local.FavouriteDAO;
import com.example.wiktorpieklik.drinkshop.Database.ModelDB.Favourite;

import java.util.List;

import io.reactivex.Flowable;

public class FavouriteRepository implements IFavouriteRepository
{
    private FavouriteDAO favouriteDAO;
    private static FavouriteRepository instance;

    public FavouriteRepository(FavouriteDAO favouriteDAO)
    {
        this.favouriteDAO = favouriteDAO;
    }

    public static FavouriteRepository getInstance(FavouriteDAO favouriteDAO)
    {
        if(instance == null)
            instance = new FavouriteRepository(favouriteDAO);
        return instance;
    }

    @Override
    public Flowable<List<Favourite>> getFavourites()
    {
        return favouriteDAO.getFavourites();
    }

    @Override
    public int isFavourite(int itemId)
    {
        return favouriteDAO.isFavourite(itemId);
    }

    @Override
    public void insert(Favourite... favourites)
    {
        favouriteDAO.insert(favourites);
    }

    @Override
    public void delete(Favourite favourite)
    {
        favouriteDAO.delete(favourite);
    }
}
