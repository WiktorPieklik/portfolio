package com.example.wiktorpieklik.car_rental.Activities;

import android.app.AlertDialog;
import android.content.ContentValues;
import android.content.DialogInterface;
import android.database.SQLException;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import com.example.wiktorpieklik.car_rental.Commons.Common;
import com.example.wiktorpieklik.car_rental.Model.Car;
import com.example.wiktorpieklik.car_rental.Model.Client;
import com.example.wiktorpieklik.car_rental.DataBase;
import com.example.wiktorpieklik.car_rental.Model.Order;
import com.example.wiktorpieklik.car_rental.R;

public class OrderDetailsActivity extends AppCompatActivity
{

    public static final String orderId = "xdxd";
    Order order;
    Car car;
    Client client;
    private Button discountButton;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_order_details);
        android.support.v7.app.ActionBar actionBar = getSupportActionBar();

        int orderID = (Integer) getIntent().getExtras().get(orderId);

        ////////szukanie zamówienia////////
        for (int i = 0; i < Common.orders.size(); i++)
        {
            if (Common.orders.get(i).getOrderId() == orderID)
            {
                order = Common.orders.get(i);
                break;
            }
        }
        ////////szukanie auta////////
        for (int i = 0; i < Common.cars.size(); i++)
        {
            if(Common.cars.get(i).getCarId() == order.getOrderCarID())
            {
                car = Common.cars.get(i);
                break;
            }
        }
        ///////szukanie klient//////
        for(int i=0;i<Common.clients.size();i++)
        {
            if(Common.clients.get(i).getClientId() == order.getOrderClientID())
            {
                client = Common.clients.get(i);
                break;
            }
        }
        //////////////////////////////////
        actionBar.setTitle(car.getCarInfoBrand()+" "+car.getCarInfoModel()+" - "+car.getCarInfoNumberPlate());


        TextView clientName = findViewById(R.id.orderClientName);
        TextView clientSurname = findViewById(R.id.orderClientSurname);
        TextView clientPhoneNo = findViewById(R.id.orderClientPhoneNo);
        TextView clientIdentityCard = findViewById(R.id.orderClientIdentityCard);
        TextView clientEmail = findViewById(R.id.orderClientEmail);

        TextView orderDateOfPurchase = findViewById(R.id.orderDateOfPurchase);
        TextView orderDateOfReturn = findViewById(R.id.orderDateOfReturn);
        TextView orderPrice = findViewById(R.id.orderPrice);
        TextView orderDiscount = findViewById(R.id.orderDiscount);

        clientName.setText("Imię:  "+client.getClientName());
        clientSurname.setText("Nazwisko:  "+client.getClientSurname());
        clientPhoneNo.setText("Nr telefonu:  "+client.getClientPhoneNo());
        clientIdentityCard.setText("Nr dowodu:  "+client.getClientIdentityCard());
        clientEmail.setText(client.getClientEmail());

        orderDateOfPurchase.setText("Od:  "+order.getOrderDateOfPurchase());
        orderDateOfReturn.setText("Do:  "+order.getOrderDateOfReturn());
        orderPrice.setText("Cena:  "+Float.toString(order.getOrderPrice()));
        orderDiscount.setText("Upust:  "+Float.toString(order.getOrderDiscount()));

        discountButton = findViewById(R.id.grantDiscountButton);
        if(order.getDiscountGrantedState() == 0)
        {
            discountButton.setVisibility(View.GONE);
        }

    }

    public void grantDiscount(View view)
    {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("Uwaga");
        builder.setMessage("Czy na pewno? Zmiany będą nieodwracalne");
        builder.setPositiveButton("Tak", new DialogInterface.OnClickListener()
        {
            @Override
            public void onClick(DialogInterface dialog, int which)
            {
                try
                {
                    SQLiteOpenHelper helper = new DataBase(getApplicationContext());
                    SQLiteDatabase db = helper.getWritableDatabase();
                    ContentValues discountValue = new ContentValues();
                    discountValue.put("DISCOUNTGRANTED",0);
                    db.update("ORDERS",discountValue,"_id=?", new String[]{Integer.toString(order.getOrderId())});
                    db.close();
                    Toast.makeText(getApplicationContext(),"Przyznano upust",Toast.LENGTH_LONG).show();
                    discountButton.setVisibility(View.GONE);
                    finish();
                }catch(SQLException ex)
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
    }

    public void returnOffer(View view)
    {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("Uwaga");
        builder.setMessage("Czy na pewno? Zmiany będą nieodwracalne");
        builder.setPositiveButton("Tak", new DialogInterface.OnClickListener()
        {
            @Override
            public void onClick(DialogInterface dialog, int which)
            {
                try
                {
                    SQLiteOpenHelper helper = new DataBase(getApplicationContext());
                    SQLiteDatabase db = helper.getWritableDatabase();
                    ContentValues carValue = new ContentValues();
                    ContentValues offerValue = new ContentValues();
                    carValue.put("ISRENTED",0);
                    offerValue.put("AVAILABLE",0);
                    db.update("CARS",carValue,"_id=?", new String[]{Integer.toString(order.getOrderCarID())});
                    db.update("OFFERS",offerValue,"CARID=?", new String[]{Integer.toString(order.getOrderCarID())});
                    db.close();
                    Toast.makeText(getApplicationContext(),"Pomyślnie przywrócono ofertę",Toast.LENGTH_LONG).show();
                    finish();
                }catch(SQLException ex)
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
    }

}
