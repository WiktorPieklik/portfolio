package com.example.wiktorpieklik.drinkshop.Database.DataSource;

import com.example.wiktorpieklik.drinkshop.Database.ModelDB.Card;

import java.util.List;

import io.reactivex.Flowable;

public interface ICardRepository
{
    Flowable<List<Card>> getCardItems();
    Flowable<List<Card>> getCardItemById(int cardItemId);
    int getCardCount();
    void emptyCard();
    void insertToCards(Card... cards);
    void updateCard(Card card);
    void deleteCard(Card card);
}
