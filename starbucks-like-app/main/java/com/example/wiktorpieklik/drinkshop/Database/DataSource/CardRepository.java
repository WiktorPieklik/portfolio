package com.example.wiktorpieklik.drinkshop.Database.DataSource;

import com.example.wiktorpieklik.drinkshop.Database.Local.CardDAO;
import com.example.wiktorpieklik.drinkshop.Database.ModelDB.Card;

import java.util.List;

import io.reactivex.Flowable;

public class CardRepository implements ICardRepository
{
    private CardDAO cardDAO;
    private static CardRepository instance;

    public static CardRepository getInstance(CardDAO cardDAO)
    {
        if(instance == null)
            instance = new CardRepository(cardDAO);
        return instance;
    }

    public CardRepository(CardDAO cardDAO)
    {
        this.cardDAO = cardDAO;
    }


    @Override
    public Flowable<List<Card>> getCardItems()
    {
        return cardDAO.getCardItems();
    }

    @Override
    public Flowable<List<Card>> getCardItemById(int cardItemId)
    {
        return cardDAO.getCardItemById(cardItemId);
    }

    @Override
    public int getCardCount()
    {
        return cardDAO.getCardCount();
    }

    @Override
    public void emptyCard()
    {
        cardDAO.emptyCard();
    }

    @Override
    public void insertToCards(Card... cards)
    {
        cardDAO.insertToCards(cards);
    }

    @Override
    public void updateCard(Card card)
    {
        cardDAO.updateCard(card);
    }

    @Override
    public void deleteCard(Card card)
    {
        cardDAO.deleteCard(card);
    }
}
