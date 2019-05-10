package com.example.wiktorpieklik.drinkshop;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;

import com.example.wiktorpieklik.drinkshop.Adapters.FavouriteAdapter;
import com.example.wiktorpieklik.drinkshop.Database.ModelDB.Favourite;
import com.example.wiktorpieklik.drinkshop.Utils.Common;

import java.util.List;

import io.reactivex.Scheduler;
import io.reactivex.android.schedulers.AndroidSchedulers;
import io.reactivex.disposables.CompositeDisposable;
import io.reactivex.functions.Consumer;
import io.reactivex.schedulers.Schedulers;

public class FavouriteListActivity extends AppCompatActivity
{

    RecyclerView recyclerFav;
    CompositeDisposable compositeDisposable;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_favourite_list);

        compositeDisposable = new CompositeDisposable();
        recyclerFav = findViewById(R.id.recycler_fav);
        recyclerFav.setHasFixedSize(true);
        recyclerFav.setLayoutManager(new LinearLayoutManager(this));

        loadFavourites();
    }

    private void loadFavourites()
    {
        compositeDisposable.add(Common.favouriteRepository.getFavourites()
        .subscribeOn(Schedulers.io())
        .observeOn(AndroidSchedulers.mainThread())
        .subscribe(new Consumer<List<Favourite>>()
        {
            @Override
            public void accept(List<Favourite> favourites) throws Exception
            {
                loadItems(favourites);
            }
        }));
    }

    private void loadItems(List<Favourite> favourites)
    {
        FavouriteAdapter adapter = new FavouriteAdapter(this, favourites);
        recyclerFav.setAdapter(adapter);
    }
}
