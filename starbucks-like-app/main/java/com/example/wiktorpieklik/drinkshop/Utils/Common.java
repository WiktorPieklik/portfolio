package com.example.wiktorpieklik.drinkshop.Utils;

import com.example.wiktorpieklik.drinkshop.Database.DataSource.CardRepository;
import com.example.wiktorpieklik.drinkshop.Database.DataSource.FavouriteRepository;
import com.example.wiktorpieklik.drinkshop.Model.Category;
import com.example.wiktorpieklik.drinkshop.Model.Drink;
import com.example.wiktorpieklik.drinkshop.Model.User;
import com.example.wiktorpieklik.drinkshop.Retrofit.IDrinkShopAPI;
import com.example.wiktorpieklik.drinkshop.Retrofit.RetrofitClient;

import java.util.ArrayList;
import java.util.List;

public class Common
{
    //In Emulator localhost is equal to 10.0.2.2
    public static final String BASE_URL = "http://10.0.2.2/drinkshop/";

    public static final String TOPPING_MENU_ID = "7";

    public static User currentUser = null;
    public static Category currentCategory = null;

    public static List<Drink> toppingList = new ArrayList<>();
    public static double toppingPrice = .0;
    public static List<String> addedToppings = new ArrayList<>();

    public static int cupSize = -1; //-1 mean error (no choice), 0 - M size, 1 - L size
    public static int sugarLevel = -1; //-1 error
    public static int iceLevel = -1; //same as above

    //Database
    public static CardRepository cardRepository;
    public static FavouriteRepository favouriteRepository;

    public static IDrinkShopAPI getApi()
    {
        return RetrofitClient.getClient(BASE_URL).create(IDrinkShopAPI.class);
    }
}
