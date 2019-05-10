package com.example.wiktorpieklik.car_rental.Activities;

import android.app.AlertDialog;
import android.content.ContentValues;
import android.content.DialogInterface;
import android.database.sqlite.SQLiteDatabase;
import android.database.sqlite.SQLiteOpenHelper;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.view.View;
import android.widget.Toast;

import com.example.wiktorpieklik.car_rental.Commons.Common;
import com.example.wiktorpieklik.car_rental.Model.Car;
import com.example.wiktorpieklik.car_rental.DataBase;
import com.example.wiktorpieklik.car_rental.Model.Offer;
import com.example.wiktorpieklik.car_rental.R;

public class OfferDetailsActivity extends AppCompatActivity
{
    public static final String offerID="ELOO";
    private Car car;
    private Offer offer;
    private Button editBT,saveBT;
    EditText offerPrice;

    @Override
    protected void onCreate(Bundle savedInstanceState)
    {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_offer_details);

        editBT = findViewById(R.id.editOfferButton);
        saveBT = findViewById(R.id.saveOfferButton);

        int offerId = (Integer)getIntent().getExtras().get(offerID);
        TextView offerName = findViewById(R.id.offerDetailName);
        offerPrice = findViewById(R.id.offerDetailsPriceET);

        /////////szukamy naszej oferty////////////////
        for(int i = 0; i< Common.offers.size(); i++)
        {
            if(Common.offers.get(i).getOfferId() == offerId)
            {
                offer = Common.offers.get(i);
                break;
            }
        }

        ////////szukamy auta z oferty/////////////////
        for(int i=0;i<Common.cars.size();i++)
        {
            if(Common.cars.get(i).getCarId() == offer.getOfferCarId())
            {
                car = Common.cars.get(i);
                break;
            }
        }

        offerName.setText(car.getCarInfoBrand()+" "+car.getCarInfoModel());
        offerPrice.setText(Float.toString(offer.getOfferPrice()));
    }

    public void editOfferClick(View view)
    {
        editBT.setVisibility(View.GONE);
        saveBT.setVisibility(View.VISIBLE);
        offerPrice.setEnabled(true);
    }

    public void saveOfferClick(View view)
    {
        editBT.setVisibility(View.VISIBLE);
        saveBT.setVisibility(View.GONE);
        try
        {
            SQLiteOpenHelper helper = new DataBase(this);
            SQLiteDatabase db = helper.getWritableDatabase();
            ContentValues offerValue = new ContentValues();
            offerValue.put("OFFERPRICE",Float.parseFloat(offerPrice.getText().toString()));
            db.update("OFFERS",offerValue,"_id=?", new String[]{Integer.toString(offer.getOfferId())});
            db.close();
            Toast.makeText(getApplicationContext(),"Pomyślnie zmieniono cenę", Toast.LENGTH_SHORT).show();
            finish();
        }catch(android.database.SQLException ex)
        {
            Toast.makeText(getApplicationContext(),"Błąd: "+ ex.toString(),Toast.LENGTH_LONG).show();
        }
        offerPrice.setEnabled(false);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu)
    {
        getMenuInflater().inflate(R.menu.menu_offers,menu);
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem menuItem)
    {
        AlertDialog.Builder builder = new AlertDialog.Builder(this);
        builder.setTitle("Uwaga");
        builder.setMessage("Czy na pewno chcesz usunąć ofertę?");
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
                   carValue.put("INOFFER",0);
                   db.update("CARS",carValue,"_id=?", new String[]{Integer.toString(car.getCarId())});
                   db.delete("OFFERS","_id=?", new String[]{Integer.toString(offer.getOfferId())});
                   Toast.makeText(getApplicationContext(),"Pomyślnie usunięto ofertę",Toast.LENGTH_SHORT).show();
                   db.close();
                   finish();
               }catch(android.database.SQLException ex)
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

        AlertDialog alertDialog = builder.create();
        alertDialog.show();
        return super.onOptionsItemSelected(menuItem);
    }
}
