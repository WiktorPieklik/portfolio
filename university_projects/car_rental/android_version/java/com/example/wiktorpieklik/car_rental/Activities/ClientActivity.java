package com.example.wiktorpieklik.car_rental.Activities;

import android.app.AlertDialog;
import android.app.FragmentManager;
import android.app.FragmentTransaction;
import android.content.DialogInterface;
import android.database.Cursor;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteException;
import android.database.sqlite.SQLiteOpenHelper;
import android.support.design.widget.FloatingActionButton;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.wiktorpieklik.car_rental.Commons.Common;
import com.example.wiktorpieklik.car_rental.Model.Car;
import com.example.wiktorpieklik.car_rental.Fragments.ClientAccountFragment;
import com.example.wiktorpieklik.car_rental.Fragments.ClientOfferListFragment;
import com.example.wiktorpieklik.car_rental.Fragments.ClientOrdersListFragment;
import com.example.wiktorpieklik.car_rental.DataBase;
import com.example.wiktorpieklik.car_rental.Model.Offer;
import com.example.wiktorpieklik.car_rental.Model.Order;
import com.example.wiktorpieklik.car_rental.R;

import java.net.CookieStore;
import java.util.ArrayList;
import java.util.List;

public class ClientActivity extends AppCompatActivity
{
    public static final String clientId="XDDDD";
    public static int clientID;
    private int clientsOrdersCount=0;
    private FloatingActionButton[] fabs2;
    private TextView[] textViews2;
    private boolean isFabOpen=false;
    public static boolean otherFragment=false;
    private ImageView background;

    Animation fabOpen, fabClose, rotateClockwise, rotateAntiClock;
    FloatingActionButton ordersFab, offersFab, mainFab, accountFab;
    TextView orderTxt, offerTxt, accountTxt;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_client);

        initViews();
        clientID = (Integer)getIntent().getExtras().get(clientId);

        loadOffersTable();
        loadOrdersTable();
    }

    private void initViews()
    {
        fabOpen = AnimationUtils.loadAnimation(this,R.anim.fab_open);
        fabClose = AnimationUtils.loadAnimation(this,R.anim.fab_close);
        rotateClockwise = AnimationUtils.loadAnimation(this, R.anim.rotate_clockwise);
        rotateAntiClock = AnimationUtils.loadAnimation(this, R.anim.rotate_anticlockwise);

        ordersFab = findViewById(R.id.ordersFabButton);
        offersFab = findViewById(R.id.offersFabButton);
        mainFab = findViewById(R.id.mainFabButton);
        accountFab = findViewById(R.id.myAccountFabButton);
        FloatingActionButton[] fabs={accountFab,ordersFab,offersFab};
        fabs2=fabs;

        orderTxt = findViewById(R.id.orderTxt);
        offerTxt = findViewById(R.id.offerTxt);
        accountTxt = findViewById(R.id.accountTxt);
        textViews2 = new TextView[]{accountTxt, orderTxt, offerTxt};
        background = findViewById(R.id.background);
    }

    public void showOffers()
    {
        ClientOfferListFragment fragment = new ClientOfferListFragment();
        FragmentTransaction ft = getFragmentManager().beginTransaction();
        ft.replace(R.id.clientMainContainer,fragment);
        ft.addToBackStack(null);
        ft.setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE);
        ft.commit();
        otherFragment=true;
    }
    public void fabClicked(View view)
    {
        if(!otherFragment)
        {
            if (isFabOpen)
            {
                mainFab.startAnimation(rotateAntiClock);
                for (int i = 0; i < fabs2.length; i++)
                {
                    fabs2[i].startAnimation(fabClose);
                    fabs2[i].setVisibility(View.GONE);
                    textViews2[i].startAnimation(fabClose);
                }
                isFabOpen = false;
            } else
            {
                mainFab.startAnimation(rotateClockwise);
                for (int i = 0; i < fabs2.length; i++)
                {
                    fabs2[i].startAnimation(fabOpen);
                    fabs2[i].setVisibility(View.VISIBLE);
                    textViews2[i].startAnimation(fabOpen);
                }
                isFabOpen = true;
            }
        }
    }

    public void loadOrdersTable()
    {
        SQLiteOpenHelper helper = new DataBase(this);
        SQLiteDatabase db = helper.getReadableDatabase();
        Cursor order1 = db.query("ORDERS", new String[]{"*"}, "CLIENTID=?", new String[]{Integer.toString(clientID)},null,null,null);
        Common.clientOrders.clear();
        clientsOrdersCount=0;
        try
        {
            while(order1.moveToNext())
            {
                Common.clientOrders.add(new Order(order1.getInt(0),
                        order1.getString(1),
                        order1.getString(2),
                        order1.getFloat(3),
                        order1.getFloat(4),
                        order1.getInt(5),
                        order1.getInt(6),
                        order1.getInt(7)));
            }
            order1.close();
            db.close();

        }catch(SQLiteException ex)
        {
            Toast.makeText(this,"Błąd: " + ex.toString(),Toast.LENGTH_LONG).show();
        }

    }
    public void fabClicked2(View view)
    {
        if(view.getVisibility()==View.VISIBLE)
        {
            switch (view.getId())
            {
                case R.id.offersFabButton:
                    fabClicked(view);
                    showOffers();
                    break;
                case R.id.ordersFabButton:
                    ClientOrdersListFragment fragment2 = new ClientOrdersListFragment();
                    FragmentTransaction ft2 = getFragmentManager().beginTransaction();
                    ft2.replace(R.id.clientMainContainer, fragment2);
                    ft2.addToBackStack(null);
                    ft2.setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE);
                    ft2.commit();
                    fabClicked(view);
                    otherFragment = true;
                    break;
                case R.id.myAccountFabButton:
                    ClientAccountFragment fragment = new ClientAccountFragment();
                    FragmentTransaction ft = getFragmentManager().beginTransaction();
                    ft.replace(R.id.clientMainContainer, fragment);
                    ft.addToBackStack(null);
                    ft.setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE);
                    ft.commit();
                    fabClicked(view);
                    otherFragment = true;
                    break;
            }
        }
    }
    public void loadOffersTable()
    {
        loadCarsTable();
        try
        {
            SQLiteOpenHelper helper = new DataBase(this);
            SQLiteDatabase db = helper.getReadableDatabase();
            Cursor offerCursor = db.query("OFFERS", new String[]{"*"}, "AVAILABLE=?", new String[]{"0"}, null, null, null);
            Common.offers.clear();
            while (offerCursor.moveToNext())
            {
                int cardId = offerCursor.getInt(1);
                findCar(cardId, db);
                Common.offers.add(new Offer(offerCursor.getInt(0),
                        offerCursor.getFloat(2),
                        findCar(cardId, db)));
            }
            offerCursor.close();
            db.close();
        }catch(SQLiteException ex)
        {
            Toast.makeText(this,"Błąd: "+ex.toString(),Toast.LENGTH_LONG).show();
        }
    }

    private Car findCar(int cardId, SQLiteDatabase db)
    {
        Car car = null;
        Cursor carCursor = db.query("CARS",
                new String[]{"*"}, "_id=?",
                new String[]{(String.valueOf(cardId))},
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

    public void loadCarsTable()
    {
        try
        {
            SQLiteOpenHelper helper = new DataBase(this);
            SQLiteDatabase db = helper.getReadableDatabase();
            Cursor cursor = db.query("CARS",new String[]{"*"},null,null,null,null,null);
            Common.cars.clear();
            while(cursor.moveToNext())
            {
                Common.cars.add(new Car(cursor.getString(1),
                        cursor.getString(2),
                        cursor.getInt(3),
                        cursor.getFloat(4),
                        cursor.getFloat(5),
                        cursor.getInt(6),
                        cursor.getString(7),
                        cursor.getString(8),
                        cursor.getString(9),
                        cursor.getInt(0),
                        cursor.getInt(10),
                        cursor.getInt(11)));
            }
            cursor.close();
            db.close();
        }catch(SQLiteException ex)
        {
            Toast.makeText(this,"Błąd: "+ex.toString(),Toast.LENGTH_LONG).show();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu)
    {
        getMenuInflater().inflate(R.menu.menu_client,menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item)
    {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("Uwaga");
        builder.setMessage("Czy na pewno chcesz usunąć konto?");
        builder.setPositiveButton("Tak", new DialogInterface.OnClickListener()
        {
            @Override
            public void onClick(DialogInterface dialog, int which)
            {
                try
                {
                    SQLiteOpenHelper helper = new DataBase(getApplicationContext());
                    SQLiteDatabase db = helper.getReadableDatabase();
                    db.delete("CLIENTS","_id=?", new String[]{Integer.toString(clientID)});
                    db.delete("ORDERS","CLIENTID=?", new String[]{Integer.toString(clientID)});
                    db.close();
                    Toast.makeText(getApplicationContext(),"Pomyślnie usunięto konto",Toast.LENGTH_SHORT).show();
                    finish();
                }catch(SQLiteException ex)
                {
                    Toast.makeText(getApplicationContext(),"Błąd: "+ex.toString(),Toast.LENGTH_LONG).show();
                }
            }
        });
        builder.setNegativeButton("Nie", new DialogInterface.OnClickListener()
        {
            @Override
            public void onClick(DialogInterface dialog, int which)
            {
                dialog.dismiss();
            }
        });
        AlertDialog dialog = builder.create();
        dialog.show();
        return super.onOptionsItemSelected(item);
    }

    @Override
    public void onResume()
    {
        super.onResume();
        loadOffersTable();
        loadOrdersTable();
        FragmentManager fm = getFragmentManager();
        for(int i=0;i<fm.getBackStackEntryCount();i++) ///usuwa historie fragmentow w backStacku
        {
            fm.popBackStack();
        }
        otherFragment=false;
    }
}
