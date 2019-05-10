package com.example.wiktorpieklik.car_rental.Activities;

import android.app.FragmentTransaction;
import android.database.Cursor;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.Toast;

import com.example.wiktorpieklik.car_rental.Commons.Common;
import com.example.wiktorpieklik.car_rental.Model.Car;
import com.example.wiktorpieklik.car_rental.Fragments.CarsListFragment;
import com.example.wiktorpieklik.car_rental.Model.Client;
import com.example.wiktorpieklik.car_rental.DataBase;
import com.example.wiktorpieklik.car_rental.Model.Offer;
import com.example.wiktorpieklik.car_rental.Fragments.OfferListFragment;
import com.example.wiktorpieklik.car_rental.Model.Order;
import com.example.wiktorpieklik.car_rental.Fragments.OwnerMainMenuFragment;
import com.example.wiktorpieklik.car_rental.R;

public class OwnerActivity extends AppCompatActivity
{
    public static boolean menuOn=true;
    public static boolean carsOn=false;
    public static boolean offersOn=false;
    public static boolean addOferOn=false;
    public static boolean orderDetailsOn=false;
    private int usersCount=0;
    private int carsCount=0;
    static int carsInOfferCount=0;
    private int offersCount=0;
    private static int ordersCount=0;


    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_owner);
        bringMenuBack();

        try
        {
            ////////zliczanie klientow w bazie poza adminem (id!=1)
            SQLiteOpenHelper helper = new DataBase(this);
            SQLiteDatabase db = helper.getReadableDatabase();
            Cursor client = db.query("CLIENTS", new String[]{"*"}, "_id>?", new String[]{"1"},null,null,null);
            usersCount = client.getCount();
            client.close();
            db.close();
            //clients = new Client[usersCount];
            //////////////

        }catch(SQLException ex)
        {
            Toast.makeText(this,"Błąd "+ex.toString(),Toast.LENGTH_LONG).show();
        }

        displayUsers();
        loadCarsTable();
        loadOffersTable();
        loadOrdersTable();
    }

    @Override
    public void onBackPressed()
    {
        if(addOferOn)
        {
            loadCarsTable();
            loadOffersTable();
        }
        if(menuOn)
        {
            finish();
        }
        else
        {
            bringMenuBack();
            menuOn=true;
            carsOn=false;
            offersOn=false;
            addOferOn=false;
        }
    }

    private void displayUsers()
    {
       // int i=0;
        try
        {
            SQLiteOpenHelper helper = new DataBase(this);
            SQLiteDatabase db = helper.getReadableDatabase();
            Cursor userDetails = db.query("CLIENTS", new String[]{"*"}, "_id>?", new String[]{"1"},null,null,null);
            Common.clients.clear();
            while(userDetails.moveToNext())
            {
                Common.clients.add(new Client(userDetails.getInt(0),
                        userDetails.getString(1),
                        userDetails.getString(2),
                        userDetails.getString(3),
                        userDetails.getString(4),
                        userDetails.getString(5),
                        userDetails.getString(6),
                        userDetails.getString(7)));
              //  i++;
            }
            userDetails.close();
            db.close();
        }catch(SQLException ex)
        {
           Toast.makeText(this,"Błąd: "+ex.toString(),Toast.LENGTH_LONG).show();
        }
    }

    private void loadCarsTable()
    {
        SQLiteOpenHelper helper = new DataBase(this);
        SQLiteDatabase db = helper.getReadableDatabase();
        //Cursor carsCursor = db.query("CARS", new String[]{"*"},null,null,null,null,null);
        carsCount=0;

            try
            {
                Cursor carsCursor2 = db.query("CARS", new String[]{"*"},null,null,null,null,null);
                Common.cars.clear();
                Common.carsInOffer.clear();
                int i=0;
                Car car = null;
                while(carsCursor2.moveToNext())
                {
                    car = new Car(carsCursor2.getString(1),
                            carsCursor2.getString(2),
                            carsCursor2.getInt(3),
                            carsCursor2.getFloat(4),
                            carsCursor2.getFloat(5),
                            carsCursor2.getInt(6),
                            carsCursor2.getString(7),
                            carsCursor2.getString(8),
                            carsCursor2.getString(9),
                            carsCursor2.getInt(0),
                            carsCursor2.getInt(10),
                            carsCursor2.getInt(11));

                    Common.cars.add(car);
                    if(carsCursor2.getInt(11) != 1)
                    {
                        Common.carsInOffer.add(Common.cars.get(i));
                    }
                    i++;
                }

                carsCursor2.close();
                db.close();
                carsInOfferCount=Common.carsInOffer.size();

            }catch(SQLException ex)
            {
                Toast.makeText(this,"Błąd: "+ex.toString(), Toast.LENGTH_LONG).show();
            }
        }

    public void loadOffersTable()
    {
        SQLiteOpenHelper helper = new DataBase(this);
        SQLiteDatabase db = helper.getReadableDatabase();
        offersCount=0;

            Car car = null;
            try
            {
                Cursor offerCursor2 = db.query("OFFERS", new String[]{"*"}, "AVAILABLE=?", new String[]{"0"},null,null,null);
                Common.offers.clear();
                //int i=0;
                while(offerCursor2.moveToNext())
                {
                    int carId = offerCursor2.getInt(1);
                    car = findCar(carId, db);

                    Common.offers.add(new Offer(offerCursor2.getInt(0),
                            offerCursor2.getFloat(2), car));
                }

                offerCursor2.close();
                db.close();

            }catch(SQLException ex)
            {
                Toast.makeText(this,"Błąd: "+ex.toString(),Toast.LENGTH_LONG).show();
            }
        }

    private Car findCar(int carId, SQLiteDatabase db)
    {
        Car car = null;
        Cursor carCursor = db.query("CARS",
                new String[]{"*"}, "_id=?",
                new String[]{(String.valueOf(carId))},
                null,
                null,
                null);
        while(carCursor.moveToNext())
        {
            car = new Car(carCursor.getString(1),
                    carCursor.getString(2),
                    carCursor.getInt(3),
                    carCursor.getFloat(4),
                    carCursor.getFloat(5),
                    carCursor.getInt(6),
                    carCursor.getString(7),
                    carCursor.getString(8),
                    carCursor.getString(9),
                    carCursor.getInt(0),
                    carCursor.getInt(10),
                    carCursor.getInt(11));
        }
        carCursor.close();
        return car;
    }

    //}

    public void loadOrdersTable()
    {
        SQLiteOpenHelper helper = new DataBase(getApplication());
        SQLiteDatabase db = helper.getWritableDatabase();
        ordersCount=0;
        try
        {
         Cursor data = db.query("ORDERS", new String[]{"*"},null,null,null,null,null);
         Common.orders.clear();
         while(data.moveToNext())
         {
             Common.orders.add(new Order(data.getInt(0),
                     data.getString(1),
                     data.getString(2),
                     data.getFloat(3),
                     data.getFloat(4),
                     data.getInt(5),
                     data.getInt(6),
                     data.getInt(7)));
         }
         data.close();
         db.close();

        }catch(SQLException ex)
        {
            Toast.makeText(getApplication(),"Błąd: "+ex.toString(),Toast.LENGTH_LONG).show();
        }
    }

    private void bringMenuBack()
    {
        OwnerMainMenuFragment fragment = new OwnerMainMenuFragment();
        FragmentTransaction ft = getFragmentManager().beginTransaction();
        ft.replace(R.id.mainContainer, fragment);
        ft.addToBackStack(null);
        ft.setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE);
        ft.commit();
    }

    @Override
    public void onResume()
    {
        super.onResume();
        loadCarsTable();
        loadOffersTable();
        loadOrdersTable();

        if(carsOn)     //ma za zadanie przywrócić CarListFragment po wyjściu z CarDetailsActivity
        {
            CarsListFragment fragment2 = new CarsListFragment();
            FragmentTransaction ft = getFragmentManager().beginTransaction();
            ft.replace(R.id.mainContainer,fragment2);
            ft.addToBackStack(null);
            ft.setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE);
            ft.commit();
        }
        if(offersOn)
        {
            OfferListFragment fragment = new OfferListFragment();
            FragmentTransaction ft = getFragmentManager().beginTransaction();
            ft.replace(R.id.mainContainer,fragment);
            ft.addToBackStack(null);
            ft.setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE);
            ft.commit();
        }
        if(menuOn)
        {
            bringMenuBack();
            addOferOn=false;
        }
    }
}
