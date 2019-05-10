package com.example.wiktorpieklik.drinkshop;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.widget.Button;

import com.example.wiktorpieklik.drinkshop.Adapters.CardAdapter;
import com.example.wiktorpieklik.drinkshop.Database.ModelDB.Card;
import com.example.wiktorpieklik.drinkshop.Utils.Common;

import java.util.List;

import io.reactivex.android.schedulers.AndroidSchedulers;
import io.reactivex.disposables.CompositeDisposable;
import io.reactivex.functions.Consumer;
import io.reactivex.schedulers.Schedulers;

public class CardActivity extends AppCompatActivity
{

    RecyclerView recycler_card;
    Button btn_place_order;

    CompositeDisposable compositeDisposable;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_card);

        compositeDisposable = new CompositeDisposable();
        recycler_card = findViewById(R.id.recycler_card);
        recycler_card.setLayoutManager(new LinearLayoutManager(this));
        recycler_card.setHasFixedSize(true);
        btn_place_order = findViewById(R.id.button_place_order);

        loadCardItems();
    }

    private void loadCardItems()
    {
        compositeDisposable.add(Common.cardRepository.getCardItems()
        .subscribeOn(Schedulers.io())
        .observeOn(AndroidSchedulers.mainThread())
        .subscribe(new Consumer<List<Card>>()
        {
            @Override
            public void accept(List<Card> cards) throws Exception
            {
                displayCardItems(cards);
            }
        }));
    }

    private void displayCardItems(List<Card> cards)
    {
        CardAdapter adapter = new CardAdapter(cards, this);
        recycler_card.setAdapter(adapter);
    }

    @Override
    protected void onDestroy()
    {
        super.onDestroy();
        compositeDisposable.clear();
    }
}
