package com.example.wiktorpieklik.drinkshop.Database.Local;

import android.arch.persistence.room.Dao;
import android.arch.persistence.room.Delete;
import android.arch.persistence.room.Insert;
import android.arch.persistence.room.Query;
import android.arch.persistence.room.Update;

import com.example.wiktorpieklik.drinkshop.Database.ModelDB.Card;

import java.util.List;

import io.reactivex.Flowable;

@Dao
public interface CardDAO
{
    @Query("SELECT * FROM Card")
    Flowable<List<Card>> getCardItems();

    @Query("SELECT * FROM Card WHERE id=:cardItemId")
    Flowable<List<Card>> getCardItemById(int cardItemId);

    @Query("SELECT COUNT(*) FROM Card")
    int getCardCount();

    @Query("DELETE FROM Card")
    void emptyCard();

    @Insert
    void insertToCards(Card... cards);

    @Update
    void updateCard(Card card);

    @Delete
    void deleteCard(Card card);
}
