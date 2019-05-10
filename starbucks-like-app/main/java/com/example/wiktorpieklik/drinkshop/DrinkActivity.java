package com.example.wiktorpieklik.drinkshop;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.GridLayoutManager;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.wiktorpieklik.drinkshop.Adapters.DrinkAdapter;
import com.example.wiktorpieklik.drinkshop.Model.Drink;
import com.example.wiktorpieklik.drinkshop.Retrofit.IDrinkShopAPI;
import com.example.wiktorpieklik.drinkshop.Utils.Common;

import java.util.List;

import io.reactivex.android.schedulers.AndroidSchedulers;
import io.reactivex.disposables.CompositeDisposable;
import io.reactivex.functions.Consumer;
import io.reactivex.schedulers.Schedulers;

public class DrinkActivity extends AppCompatActivity
{
    IDrinkShopAPI mService;

    RecyclerView drinkRecycler;
    TextView bannerName;

    //RxJava

    CompositeDisposable compositeDisposable = new CompositeDisposable();

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_drink);

        mService = Common.getApi();
        drinkRecycler = findViewById(R.id.recycler_drinks);
        drinkRecycler.setLayoutManager(new GridLayoutManager(this, 2));
        drinkRecycler.setHasFixedSize(true);

        bannerName = findViewById(R.id.txt_menu_name);

        loadListDrink(Common.currentCategory.getId());
        bannerName.setText(Common.currentCategory.getName());

    }

    private void loadListDrink(String id)
    {
        compositeDisposable.add(mService.getDrinks(id)
        .subscribeOn(Schedulers.io())
        .observeOn(AndroidSchedulers.mainThread())
        .subscribe(new Consumer<List<Drink>>()
        {
            @Override
            public void accept(List<Drink> drinks) throws Exception
            {
                displayDrinks(drinks);
            }
        }, new Consumer<Throwable>()
        {
            @Override
            public void accept(Throwable throwable) throws Exception
            {
                Toast.makeText(DrinkActivity.this, throwable.getMessage(), Toast.LENGTH_SHORT).show();
            }
        }));
    }

    private void displayDrinks(List<Drink> drinks)
    {
        DrinkAdapter adapter = new DrinkAdapter(this, drinks);
        drinkRecycler.setAdapter(adapter);
    }
}
