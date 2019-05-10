package com.example.wiktorpieklik.drinkshop.Database.ModelDB;

import android.arch.persistence.room.ColumnInfo;
import android.arch.persistence.room.Entity;
import android.arch.persistence.room.PrimaryKey;

import io.reactivex.annotations.NonNull;

@Entity(tableName = "Card")
public class Card
{

    @NonNull
    @PrimaryKey(autoGenerate = true)
    @ColumnInfo(name = "id")
    public int id;

    @ColumnInfo(name = "name")
    public String name;

    @ColumnInfo(name = "amount")
    public int amount;

    @ColumnInfo(name = "price")
    public double price;

    @ColumnInfo(name = "sugar")
    public int sugar;

    @ColumnInfo(name = "ice")
    public int ice;

    @ColumnInfo(name = "toppingExtras")
    public String toppingExtras;

    @ColumnInfo(name = "link")
    public String link;
}
